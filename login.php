<?php

if (!empty($_POST))
{
    $errors = [];
   $pseudo = isset($_POST['login']) && !empty($_POST['login']) ?  $_POST['login'] : '';
   if (empty($pseudo))
    $errors[] = 'Veuillez renseigner votre login';

   if (empty($errors))
   {
       session_start();
       $_SESSION['login'] = $pseudo;
       header('Location: index.php');
       exit();
   }
}


?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <style>
        fieldset {
            width: 50%;
            margin: 2rem auto;
            text-align: center;

        }
    </style>
</head>
<body>
<header>
    <h1 style="text-align: center">Connexion</h1>
</header>
<main>
<form action="login.php" method="post">
    <fieldset>
        <legend>Connexion</legend>
        <label for="login">Votre Login :</label>
        <input type="text" name="login" id="login">
        <br>
        <br>
        <input type="submit" value="Connexion">
    </fieldset>
</form>
</main>
</body>
</html>
