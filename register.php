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
    <h1>Create A New Account</h1>
</header>
<main>
    <form action="register_handler.php" method="post">
        <fieldset>
            <legend>Registration</legend>
            <label for="username">Username :</label>
            <input type="text" name="username" id="username"  maxlength="50" value="<?=$username ?>" >
            <br>
            <div class=<?= isset($errors[0]) ? 'error' : '' ?>><?= isset($errors[0]) ? $errors[0] : ''; ?></div>
            <div class=<?= isset($errors[1]) ? 'error' : '' ?>><?= isset($errors[1]) ? $errors[1] : ''; ?></div>
            <br>
            <label for="password">Password :</label>
            <input type="password" name="password" id="password" required maxlength="255">
            <br>
            <div class=<?= isset($errors[2]) ? 'error' : '' ?>><?= isset($errors[2]) ? $errors[2] : ''; ?></div>
            <div class=<?= isset($errors[3]) ? 'error' : '' ?>><?= isset($errors[3]) ? $errors[3] : ''; ?></div>
            <br>
            <br>
            <input type="submit" value="Register">
        </fieldset>
    </form>
    <p>If you already have an account please <a href="login.php" >Log in Here</a>!</p>

</main>
</body>
</html>
