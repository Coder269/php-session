<?php

session_start();
$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

//nettoyer la session
unset($_SESSION['errors']);
unset($_SESSION['username']);


?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <title>Log-in Page</title>
</head>
<body>
<header>
    <h1>Log-in</h1>
</header>
<main>
    <form action="login_handler.php" method="post">
        <fieldset>
            <legend>Sign-in</legend>
            <label for="username">Username :</label>
            <input type="text" name="username" id="username" required maxlength="50" value="<?= $username ?>">
            <?php
            if (!empty($errors[0]))
                echo "<div class='error'>$errors[0]</div>";
            if (!empty($errors[1]))
                echo "<div class='error'>$errors[1]</div>";
            ?>
            <br>
            <br>
            <br>
            <label for="password">Password :</label>
            <input type="password" name="password" id="password" required maxlength="255">
            <?php
            if (!empty($errors[2]))
                echo "<div class='error'>$errors[2]</div>";
            ?>
            <?php
            if (!empty($errors[3]))
                echo "<div class='error'>$errors[3]</div>";
            ?>
            <br>
            <br>
            <br>
            <input type="submit" value="Sign-in">
        </fieldset>
    </form>
    <p>If you don't have an account yet, please <a href="register.php">Register Here</a>!</p>
</main>
</body>
</html>
