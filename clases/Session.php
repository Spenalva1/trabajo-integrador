<?php

class Session
{
    public static function checkIfCustomerIsLogged()
    {
        session_start();
        if (isset($_SESSION["customerId"])) {
            return true;
        }
        return false;
    }

    public static function checkIfAdminIsLogged()
    {
        session_start();
        if (isset($_SESSION["admin"])) {
            return true;
        }
        return false;
    }

    public static function logCustomerIn()
    {
        session_start();
        $email = $_POST["email"];
        $password = $_POST["password"];
        $errors = Validator::validateCustomerLogIn(Connection::connect());
        if (isset($errors["ok"])) {
            if (isset($_POST["remember"])) {
                setcookie("rememberEmail", $email, time() + 60 * 60 * 24 * 7);
                setcookie("rememberPassword", $password, time() + 60 * 60 * 24 * 7);
            }
            $_SESSION["customerId"] = $errors["ok"];
            header("location: index.php");
        } else {
            return $errors;
        }
    }
}
