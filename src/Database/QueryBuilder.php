<?php

namespace App\Database;


use Connection;
use \PDO;

class QueryBuilder
{
    private $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /* All Cars */
    public function getAll($table, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, $class);
    }
    public function findById($table, $id, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE id=:id");
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
    public function getByColumn($table, $column, $value, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE $column = :value");
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        $stmt->execute(['value' => $value]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, $class);
    }

    /* Upload Imagens */
    public function moveUploadedFileAssingID($file, $id)
    {
        return move_uploaded_file($file['tmp_name'], "Imagens/$id.jpg");
    }
    public function moveUploadedFile($file, $dest_dir, $id)
    {
        $filename = basename($file['name']);
        $dest_path = $dest_dir . "$id" . $filename;
        return move_uploaded_file($file['tmp_name'], $dest_path);
    }

    /* Register */
    public function setUser($name, $email, $username, $birthdate, $pass, $phone)
    {
        $stmt = $this->pdo->prepare('INSERT INTO Users (name, email, username, birthdate, pass, phone, role_id) VALUES (?,?,?,?,?,?,1)');

        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($name, $email, $username, $birthdate, $hashedPass, $phone))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }
    public function checkUser($username, $email)
    {
        $stmt = $this->pdo->prepare('SELECT username FROM Users WHERE username = ? OR email = ?; ');

        if (!$stmt->execute(array($username, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $resultCheck = true;
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        }
        return $resultCheck;
    }

    /* Login */
    public function getUser($username, $pass)
    {
        $stmt = $this->pdo->prepare('SELECT pass FROM Users WHERE username = ?');

        if (!$stmt->execute(array($username))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $passHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($passHashed) == 0) {
            $stmt = null;
            $_SESSION['errormsglogin'] = "User not found";
            redirect('login');
            exit();
        }


        $checkPass = password_verify($pass, $passHashed[0]["pass"]);

        if ($checkPass == false) {
            $stmt = null;
            $_SESSION['errormsglogin'] = "Wrong password";
            redirect('login');
            exit();
        } elseif ($checkPass == true) {
            $stmt = $this->pdo->prepare('SELECT * FROM Users WHERE username = ? AND pass = ?;');

            if (!$stmt->execute(array($username, $passHashed[0]['pass']))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($user) == 0) {
                $stmt = null;
                $_SESSION['errormsglogin'] = "User not found";
                redirect('login');
                exit();
            }
            unset($_SESSION['errormsglogin']);
            $_SESSION["userid"] = $user[0]["id"];
            $_SESSION["username"] = $user[0]["username"];
            $_SESSION["userrole"] = $user[0]["role_id"];

            $stmt = null;
        }
    }

    /* Criar carro */
    public function create($table, $attributes)
    {
        $stmt = $this->pdo->prepare("INSERT INTO $table (" .
            implode(",", array_keys($attributes)) .
            ") VALUES (:" . implode(', :', array_keys($attributes)) . ")");
        $stmt->execute($attributes);
        return $this->pdo->lastInsertId();
    }


    /* Autualizar  */
    public function update($table, $id, $attributes)
    {
        $query = "UPDATE $table SET ";
        foreach ($attributes as $key => $attribute)
            $query .= "$key=:$key,";
        $query = rtrim($query, ",");
        $query .= ' WHERE id=:id';
        $attributes['id'] = $id;
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($attributes);
        return $stmt->rowCount() == 1;
    }
    public function checkUserUpdate($username, $email, $id)
    {
        $stmt = $this->pdo->prepare('SELECT username FROM Users WHERE (username = ? OR email = ?) AND id != ?; ');
        if (!$stmt->execute(array($username, $email, $id))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $resultCheck = true;
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        }
        return $resultCheck;
    }



    /* Apagar */
    public function deleteById($table, $id)
    {

        $stmt = $this->pdo->prepare("DELETE FROM $table WHERE id=:id");
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount() == 1;
    }
    public function delete($id)
    {
        $this->pdo->beginTransaction();
        
        $stmt = $this->pdo->prepare("DELETE FROM Favorites WHERE car_id = :id");
        $stmt->execute(['id' => $id]);
        
        $stmt = $this->pdo->prepare("DELETE FROM Images WHERE car_id = :id");
        $stmt->execute(['id' => $id]);
        
        $stmt = $this->pdo->prepare("DELETE FROM Cars WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $this->pdo->commit();
        return true;
    }

    /* Filtrar */
    public function filtroDesc($vbrand, $vmodel, $vpriceFrom, $vpriceTo, $vyearFrom, $vyearTo, $vfuelsType, $vcondition, $vboxType, $vplace, $class = "StdClass")
    {
        $sql = "SELECT Cars.*, Brands.name as brand, Models.name as model FROM Cars 
            INNER JOIN Models ON Cars.model_id = Models.id 
            INNER JOIN Brands ON Models.brand_id = Brands.id 
            WHERE 1=1";
        $params = [];
        if ($vbrand !== '') {
            $sql .= " AND  Brands.id = :vbrand";
            $params[':vbrand'] = $vbrand;
        }
        if ($vmodel !== '') {
            $sql .= " AND Models.id = :vmodel";
            $params[':vmodel'] = $vmodel;
        }
        if ($vpriceFrom !== '') {
            $sql .= " AND price >= :vpriceFrom";
            $params[':vpriceFrom'] = $vpriceFrom;
        }
        if ($vpriceTo !== '') {
            $sql .= " AND price <= :vpriceTo";
            $params[':vpriceTo'] = $vpriceTo;
        }
        if ($vyearFrom !== '') {
            $sql .= " AND year >= :vyearFrom";
            $params[':vyearFrom'] = $vyearFrom;
        }
        if ($vyearTo !== '') {
            $sql .= " AND year <= :vyearTo";
            $params[':vyearTo'] = $vyearTo;
        }
        if ($vfuelsType !== '') {
            $sql .= " AND fuelsType_id = :vfuelsType";
            $params[':vfuelsType'] = $vfuelsType;
        }
        if ($vcondition !== '') {
            $sql .= " AND condition_id = :vcondition";
            $params[':vcondition'] = $vcondition;
        }
        if ($vboxType !== '') {
            $sql .= " AND boxType_id = :vboxType";
            $params[':vboxType'] = $vboxType;
        }
        if ($vplace !== '') {
            $sql .= " AND place = :vplace";
            $params[':vplace'] = $vplace;
        }
        $sql .= " ORDER BY price DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_CLASS, $class);
    }

    public function filtroAsc($vbrand, $vmodel, $vpriceFrom, $vpriceTo, $vyearFrom, $vyearTo, $vfuelsType, $vcondition, $vboxType, $vplace, $class = "StdClass")
    {
        $sql = "SELECT Cars.*, Brands.name as brand, Models.name as model FROM Cars 
            INNER JOIN Models ON Cars.model_id = Models.id 
            INNER JOIN Brands ON Models.brand_id = Brands.id 
            WHERE 1=1";
        $params = [];
        if ($vbrand !== '') {
            $sql .= " AND  Brands.id = :vbrand";
            $params[':vbrand'] = $vbrand;
        }
        if ($vmodel !== '') {
            $sql .= " AND Models.id = :vmodel";
            $params[':vmodel'] = $vmodel;
        }
        if ($vpriceFrom !== '') {
            $sql .= " AND price >= :vpriceFrom";
            $params[':vpriceFrom'] = $vpriceFrom;
        }
        if ($vpriceTo !== '') {
            $sql .= " AND price <= :vpriceTo";
            $params[':vpriceTo'] = $vpriceTo;
        }
        if ($vyearFrom !== '') {
            $sql .= " AND year >= :vyearFrom";
            $params[':vyearFrom'] = $vyearFrom;
        }
        if ($vyearTo !== '') {
            $sql .= " AND year <= :vyearTo";
            $params[':vyearTo'] = $vyearTo;
        }
        if ($vfuelsType !== '') {
            $sql .= " AND fuelsType_id = :vfuelsType";
            $params[':vfuelsType'] = $vfuelsType;
        }
        if ($vcondition !== '') {
            $sql .= " AND condition_id = :vcondition";
            $params[':vcondition'] = $vcondition;
        }
        if ($vboxType !== '') {
            $sql .= " AND boxType_id = :vboxType";
            $params[':vboxType'] = $vboxType;
        }
        if ($vplace !== '') {
            $sql .= " AND place = :vplace";
            $params[':vplace'] = $vplace;
        }
        $sql .= " ORDER BY price ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_CLASS, $class);
    }

    /* Pesquisar */
    public function getSearch($input, $class)
    {
        $stmt = $this->pdo->prepare("SELECT Cars.*, Brands.name as brand, Models.name as model, FuelTypes.name as fuelType FROM Cars 
        INNER JOIN Models ON Cars.model_id = Models.id 
        INNER JOIN Brands ON Models.brand_id = Brands.id 
        INNER JOIN FuelTypes ON Cars.fuelsType_id = FuelTypes.id
        WHERE price LIKE :input OR color LIKE :input OR address LIKE :input OR Brands.name LIKE :input OR Models.name LIKE :input OR FuelTypes.name LIKE :input");
        
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        $inputParam = $input . '%';
        $stmt->bindValue(':input', $inputParam, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /* Pesquisar user */
    public function findUser($table, $value, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE id =:value");
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        $stmt->execute(['value' => $value]);
        return $stmt->fetch();
    }
}
