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

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>
<header>
    <h1>Log in</h1>
</header>
<main>
<form action="login.php" method="post">
    <fieldset>
        <legend>Sign-in</legend>
        <label for="username">Username :</label>
        <input type="text" name="username" id="username" required maxlength="50">
        <?php
        if (!empty($errors[0]))
        echo "<div class='error'>$errors[0]</div>";
        if (!empty($errors[1]))
            echo "<div class='error'>$errors[1]</div>";
        ?>
        <br>
        <br>
        <label for="password">Password :</label>
        <input type="password" name="password" id="password" required>
        <?php
        if (!empty($errors[2]))
            echo "<div class='error'>$errors[2]</div>";
        ?>
        <br>
        <br>
        <br>
        <input type="submit" value="Sign-in">
    </fieldset>
</form>
    <p>If you don't have an account yet, please <a href="register.php" >Register Here</a>!</p>
</main>
</body>
</html>
