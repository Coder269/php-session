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
