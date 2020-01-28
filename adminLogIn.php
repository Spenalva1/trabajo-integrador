<?php

require 'clases/Connection.php';
require 'clases/Session.php';
require 'clases/Validator.php';

if(Session::checkIfAdminIsLogged()){
    header('location: admin.php');
}

if($_POST){
    Session::logAdminIn();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DHShop - admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/header-footer.css">
</head>

<body>
    <?php include 'header.php'; ?>

    <main class="container">
        <h1>Admin LogIn</h1>

        <?php 
            if($_POST){
                echo '<div class="alert alert-danger"> Usuario y/o contraseña incorrectos. </div>';
            }
        ?>

        <form action="" method="post">
            usuario:
            <input value="<?= ($_POST) ? $_POST['user'] : '' ?>" class="form-control" type="text" name="user" class="form-control" require>
            <br>

            contraseña:
            <input type="text" name="password" class="form-control" require>
            <br>

            <input type="submit" value="Entrar">
        </form>
    </main>

</body>