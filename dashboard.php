<?php
session_start();
if (isset($_SESSION['username']))
{
    $username = $_SESSION['username'];
}
else
{
    header('Location: login.php');
    exit();
}

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <title>Welcome Page</title>
</head>
<body>
<main>
    <h1>Welcome <?= $username ?></h1>
    <button><a href="logout.php">Logout</a></button>
</main>
</body>
</html>
