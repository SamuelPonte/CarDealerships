<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);


$name = $_POST["name"];
$email = trim($_POST["email"]);
$birthdate = $_POST["data"];
$username = $_POST["username"];
$phone = trim($_POST["phone"]);

/* Running error handlers and user signup */
if (empty($name) || empty($email) || empty($birthdate) || empty($username) || empty($phone)) {
    $_SESSION['errormsgPersonal'] = "You did not fill in all fields!";
    redirect('PersonalData/' . $_SESSION["userid"]);
    exit();
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['errormsgPersonal'] = "Invalid email format";
    redirect('PersonalData/' . $_SESSION["userid"]);
    exit();
} elseif (!preg_match("/^[0-9]{9}$/", $phone)) {
    $_SESSION['errormsgPersonal'] = "Invalid phone number format. The phone number must have exactly 9 digits";
    redirect('PersonalData/' . $_SESSION["userid"]);
    exit();
} elseif (strtotime($birthdate) > strtotime('-18 years')) {
    $_SESSION['errormsgPersonal'] = "You must be at least 18 years old to register";
    redirect('PersonalData/' . $_SESSION["userid"]);
    exit();
} elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    $_SESSION['errormsgPersonal'] = "Invalid username format. Only letters and numbers are allowed";
    redirect('PersonalData/' . $_SESSION["userid"]);
    exit();
} elseif (!$queryBuilder->checkUserUpdate($username, $email,$_SESSION["userid"])) {
    $_SESSION['errormsgPersonal'] = "Username or email already taken";
    redirect('PersonalData/' . $_SESSION["userid"]);
    exit();
} else {
    unset($_SESSION['errormsgPersonal']);
    $queryBuilder->update('Users', $id, [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'birthdate' => $_POST['data'],
        'username' => $_POST['username'],
        'phone' => $_POST['phone']
    ]);

    /* Going to back to front page */
    redirect('PersonalData/' . $_SESSION["userid"]);
}
