<?php
    //stop error report
    error_reporting(0);
    //import User class
    include_once('./class/User.php');

    //get login data
    if (isset($_REQUEST['login'])) {
        $email = htmlentities($_REQUEST['email']);
        $password = htmlentities($_REQUEST['password']);

        $login = $user->login($email, $password);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-in</title>
</head>
<body>
    <h3>Log-In</h3>
    <form action="<?= $_SERVER['PHP_SELF'];?>" method="POST">
        <p>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="" required>
        </p>

        <p>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="" required>
        </p>
        <input type="submit" name="login" value="Login">
        <p>You don't have an account? <a href="index.php">Register</a></p>
    </form>
</body>
</html>