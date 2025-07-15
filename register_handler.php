<?php
require_once 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST))
{
    $errors = [];
    $username = isset($_POST['username']) && !empty($_POST['username']) ?  $_POST['username'] : '';
    $password = isset($_POST['password']) && !empty($_POST['password']) ?  $_POST['password'] : '';
    if (empty($username))
        $errors[] = 'Please enter a username';
    if (strlen($username) > 50)
        $errors[] = 'Username must be less than 50 characters';
    if (empty($password))
        $errors[] = 'Please enter a password';
    if (strlen($password) > 255)
        $errors[] = 'Password must be less than 255 characters';

    if (empty($errors))
    {
        $pdo = new PDO(DSN, USER, PASSWORD);
        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $passwordHashed);
        $statement->execute();
        echo "<script>alert('Account Created Successfully </br> Redirection to login page!')</script>";
        header('Location: login.php');
        exit();
    }
    else {
        session_start();
        $_SESSION['errors'] = $errors;
        $_SESSION['username'] = $username;
        header('Location: register.php');
        exit();
    }
}