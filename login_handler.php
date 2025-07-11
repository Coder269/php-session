<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST))
{
    $errors = [];
    $username = isset($_POST['username']) && !empty($_POST['username']) ?  $_POST['username'] : '';
    $password = isset($_POST['password']) && !empty($_POST['password']) ?  $_POST['password'] : '';

    if (empty($username))
        $errors[] = 'Please enter a username';

    if (strlen($username) > 50)
        $errors[] = 'Username must be less than 50 characters';

    if (empty($password))
        $errors[] = 'Please enter a password!';

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
            $errors[] = 'Username does not exist!';
        }
        else if (!password_verify($password, $user['password'])) {
            $errors[2] = 'Password is incorrect!';
        }
        else
        {
            session_start();
            $_SESSION['username'] = $username;
            header('Location: dashboard.php');
            exit();
        }
    }
}


?>