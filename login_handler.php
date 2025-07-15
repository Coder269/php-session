<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST))
{
    $errors = [];
    $username = isset($_POST['username']) && !empty($_POST['username']) ?  $_POST['username'] : '';
    $password = isset($_POST['password']) && !empty($_POST['password']) ?  $_POST['password'] : '';

    if (empty($username))
        $errors[0] = 'Please enter a username';

    if (strlen($username) > 50)
        $errors[1] = 'Username must be less than 50 characters';

    if (empty($password))
        $errors[2] = 'Please enter a password!';

    if (strlen($password) > 255)
        $errors[3] = 'Password must be less than 255 characters';

    if (empty($errors))
    {
        $pdo = new PDO(DSN, USER, PASSWORD);
        $query = "SELECT * FROM users WHERE username = :username";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        $user = $statement->fetch();
        if (!$user)
        {
            $errors[] = 'This Username does not exist!';
        }
        else if (!password_verify($password, $user['password'])) {
            $errors[2] = 'The Password is incorrect!';
        }
        else
        {
            session_start();
            $_SESSION['username'] = $username;
            header('Location: dashboard.php');
            exit();
        }
    }
    if (!empty($errors)) {
        session_start();
        $_SESSION['errors'] = $errors;
        $_SESSION['username'] = $username;
        header('Location: login.php');
        exit();
    }
}