<?php

require 'clases/Connection.php';
require 'clases/Mark.php';

$Mark = new Mark;
$marks = $Mark->listMarks();

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
    <h1>Administración</h1>

    <div class="list-group">
        <a class="list-group-item list-group-item-action" href="adminMarks.php">
            Administración de Marcas
        </a>
        <a class="list-group-item list-group-item-action" href="adminCategories.php">
            Administración de Categorías
        </a>
        <a class="list-group-item list-group-item-action" href="adminProducts.php">
            Administración de Productos
        </a>
        <a class="list-group-item list-group-item-action" href="adminCustomers.php">
            Administración de Usuarios
        </a>
    </div>
</main>

</body>