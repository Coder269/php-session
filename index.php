<?php
session_start();
$pseudo = isset($_SESSION['login']) ? $_SESSION['login'] : 'Guest';
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome Page</title>
    <style>
        main {
            text-align: center;
        }
        button a {
            text-decoration: none;
            color: black;
        }
        button {
            padding: 10px;
            border: 1px solid black;
            border-radius: 0.5rem;
        }
    </style>
</head>
<body>
<main>
    <h1>Welcome <?= $pseudo ?></h1>
    <?php
    if (isset($_SESSION['login'])) {
        echo '<button><a href="logout.php">Logout</a></button>';
    } else {
        echo '<button><a href="login.php">Login</a></button>';
    }
    ?>
</main>
</body>
</html>
