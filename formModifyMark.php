<?php

require 'clases/Connection.php';
require 'clases/Mark.php';
require 'clases/Validator.php';
require 'clases/Session.php';

if(!Session::checkIfAdminIsLogged()){
  header('location: adminLogIn.php');
}
if ($_GET) {
    $Mark = new Mark;
    $Mark->getMarkById();
}

if ($_POST) {
    $Mark = new Mark;
    $check = $Mark->modifyMark();
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
    <?php include 'nav.php'; ?>

    <main class="container">
        <h1>Modificar marca</h1>

        <?php if ($_POST) { ?>
            <?php
            $mensaje = 'No se pudo Modificar la Marca. ';
            $mensaje .= $check;
            $class = 'danger';
            if (!$check) {
                $class = 'success';
                $mensaje = 'Marca modificada con exito';
            }

            ?>
            <div class="alert alert-<?= $class; ?>">
                <?= $mensaje ?>
            </div>

            <a href="adminMarks.php">Volver</a>

        <?php } else { ?>

            <form action="" method="POST">
                Modificar:
                <input type="text" name="name" value="<?= $Mark->getName() ?>"> <br><br>
                <input type="text" name="id" style="display: none" value="<?= $Mark->getId() ?>">
                <input type="button" value="Volver" onclick="location.href='adminMarks.php';">
                <input type="submit" value="Modificar">
            </form>

        <?php } ?>




    </main>

</body>