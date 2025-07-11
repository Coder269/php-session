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
    if (strlen($password) > 50)
        $errors[] = 'Password must be less than 50 characters';

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
}

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <title>Register</title>
    <style>
        fieldset {
            width: 50%;
            margin: 2rem auto;
            text-align: center;
            padding: 2rem;

        }
        legend {
            text-align: left;
            font-weight: bold;
        }
        input[ type = submit ] {
            width: 100px;
            padding: 10px;
            border: 1px solid black;
            border-radius: 0.5rem;
        }
    </style>
</head>
<body>
<header>
    <h1 style="text-align: center">Create A New Account</h1>
</header>
<main>
    <form action="register.php" method="post">
        <fieldset>
            <legend>Registration</legend>
            <label for="username">Username :</label>
            <input type="text" name="username" id="username" required maxlength="50" >
            <br>
            <br>
            <label for="password">Password :</label>
            <input type="password" name="password" id="password" required maxlength="50">
            <br>
            <br>
            <br>
            <input type="submit" value="Register">
        </fieldset>
    </form>
    <p>If you already have an account please <a href="login.php" >Log in Here</a>!</p>

</main>
</body>
</html>
