<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);


if (isset($_POST["submit"])) {
    /* Grabbing the data */
    $name = $_POST["name"];
    $email = $_POST["email"];
    $birthdate = $_POST["data"];
    $username = $_POST["username"];
    $pass = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];
    $phone = $_POST["phone"];

    /* Running error handlers and user signup */
    if (empty($name) || empty($email) || empty($birthdate) || empty($username) || empty($pass) || empty($passwordRepeat) || empty($phone)) {
        $_SESSION['errormsg'] = "You did not fill in all fields!";
        redirect('NewAccount');
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errormsg'] = "Invalid email format";
        redirect('NewAccount');
        exit();
    } elseif (!preg_match("/^[0-9]{9}$/", $phone)) {
        $_SESSION['errormsg'] = "Invalid phone number format. The phone number must have exactly 9 digits";
        redirect('NewAccount');
        exit();
    } elseif (strtotime($birthdate) > strtotime('-18 years')) {
        $_SESSION['errormsg'] = "You must be at least 18 years old to register";
        redirect('NewAccount');
        exit();
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $_SESSION['errormsg'] = "Invalid username format. Only letters and numbers are allowed";
        redirect('NewAccount');
        exit();
    } elseif (!preg_match("/^(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[a-z]).{6,}$/", $pass)) {
        $_SESSION['errormsg'] = "Password must be at least 6 characters long, including at least 1 special character and at least 1 number.";
        redirect('NewAccount');
        exit();
    } elseif ($pass !== $passwordRepeat) {
        $_SESSION['errormsg'] = "Password do not match";
        redirect('NewAccount');
        exit();
    } elseif (!$queryBuilder->checkUser($username, $email)) {
        $_SESSION['errormsg'] = "Username or email already taken";
        redirect('NewAccount');
        exit();
    } else {
        unset($_SESSION['errormsg']);
        $signup = $queryBuilder->setUser($name, $email, $username, $birthdate, $pass, $phone);

        /* Going to back to front page */
        redirect('login');
    }
}
