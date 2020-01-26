<?php

require 'clases/Connection.php';
require 'clases/Category.php';
require 'clases/Validator.php';

if ($_POST) {
    $Category = new Category;

    $check = $Category->addCategory();
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
    <h1>Formulario de alta de una categoría</h1>

    <?php if ($_POST) { ?>
        <?php
        $mensaje = 'No se pudo agregar la Categoría. ';
        $mensaje .= $check;
        $class = 'danger';
        if (!$check) {
            $class = 'success';
            $mensaje = 'Categoría ' . $Category->getName();
            $mensaje .= ' agregada con exito (id: ' . $Category->getId() . ')';
        }

        ?>
        <div class="alert alert-<?= $class; ?>">
            <?= $mensaje ?>
        </div>

        <a href="formAddCategory.php">Agregar otra categoría</a>

    <?php } else { ?>

        <form action="" method="post">
            Categoría:
            <br>
            <input type="text" name="name" class="form-control" requires>
            <br>
            <input type="submit" value="Agregar">
            <input type="button" value="Volver" onclick="location.href='adminCategories.php';">
        </form>

    <?php } ?>

</main>

</body>