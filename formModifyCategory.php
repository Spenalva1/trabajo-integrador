<?php

require 'clases/Connection.php';
require 'clases/Category.php';
require 'clases/Validator.php';
require 'clases/Session.php';

if(!Session::checkIfAdminIsLogged()){
  header('location: adminLogIn.php');
}
if ($_GET) {
    $Category = new Category;
    $Category->getCategoryById();
}

if ($_POST) {
    $Category = new Category;
    $check = $Category->modifyCategory();
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
        <h1>Modificar categoría</h1>

        <?php if ($_POST) { ?>
            <?php
            $mensaje = 'No se pudo Modificar la categoría. ';
            $mensaje .= $check;
            $class = 'danger';
            if (!$check) {
                $class = 'success';
                $mensaje = 'Categoría modificada con exito';
            }

            ?>
            <div class="alert alert-<?= $class; ?>">
                <?= $mensaje ?>
            </div>

            <a href="adminCategories.php">Volver</a>

        <?php } else { ?>

            <form action="" method="POST">
                Modificar:
                <input type="text" name="name" value="<?= $Category->getName() ?>"> <br><br>
                <input type="text" name="id" style="display: none" value="<?= $Category->getId() ?>">
                <input type="button" value="Volver" onclick="location.href='adminCategories.php';">
                <input type="submit" value="Modificar">
            </form>

        <?php } ?>




    </main>

</body>