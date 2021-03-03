<?php
    //start session
    session_start();

    class User{

        //Method for register
        public function register($name, $email, $password) {
            //set variables to session
            $_SESSION['username'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;

            if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
                header("Location: login.php");
            }
            //header("Location: login.php");
        }

        //Method for login
        public function login($email, $password) {
            //check if input that exist in session
            if( $_SESSION['email'] == $email && $_SESSION['password'] == $password) {
                //direct user to page
                header("Location: index.php");
            } else {
                echo "<h5>Invalid credentials</h5>";
            }
        }

        //Method for logout
        public function logout() {
            //destroy session
            session_destroy();
            //redirect to registrtion page
            header("Location: index.php");
            //exit
            exit();
        }
    }

    //Instantiate User class
    $user = new User();
?>