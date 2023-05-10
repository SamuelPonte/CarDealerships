<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

if (isset($_POST["submit"])) {
    /* Grabbing the data */
    $username = $_POST["username"];
    $pass = $_POST["password"];

    /* Running error handlers and user signup */
    if(empty($username) || empty($pass)){
        $_SESSION['errormsglogin'] = "You did not fill in all fields!";
        redirect('login');
        exit();
    }

    $login = $queryBuilder->getUser($username, $pass);

    /* Going to back to front page */
    redirect('');
}