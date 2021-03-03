
<?php
    //stop error report
    error_reporting(0);

    //import User class
    include_once('./class/User.php');

    // check if register form is submited
    if (isset($_REQUEST['register'])) {
        // get and set input data
        $name = htmlentities($_REQUEST['name']);
        $email = htmlentities($_REQUEST['email']);
        $password = htmlentities($_REQUEST['password']);

        //set user register data
        $register = $user->register($name, $email, $password);

        if ($register) {
            $login = $user->login($email, $password);
        } else {
            echo "<h5>Unable to create account</h5>";
        }

    }

    // check logout form submitted
    if(isset($_POST['logout'])) {
        //call logout() method from class user
        $user->logout();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo (empty($_SESSION['username']) ? "Register" : "Home");?></title>
</head>
<body>
<!-- REGISTER SECTION -->
    <?php if(empty($_SESSION['username'])){?>
        <div>
            <h3>Register</h3>
            <form action="<?= $_SERVER['PHP_SELF'];?>" method="POST">
                <p>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="" required>
                </p>
                <p>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="" required>
                </p>
                <p>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" value="" required>
                </p>
                <input type="submit" name="register" value="Register">
            </form>
        </div>
    <?php }?>

<!-- WELCOME SECTION -->
    <?php if(!empty($_SESSION['username'])){?>
        <div>
            <h1>Welcome <?php echo $_SESSION['username']; ?></h1>

            <form action="<?= $_SERVER['PHP_SELF'];?>" method="POST">
                <input type="submit" name="logout" value="Log-out">
            </form>
        </div>
    <?php }?>
</body>
</html>