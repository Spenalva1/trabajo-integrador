<?php

require 'clases/Connection.php';
require 'clases/Product.php';

$Product = new Product;
$products = $Product->listProducts();

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
    <main class="container">
      <h1>Panel de administración de Productos</h1>

      <a href="admin.php" class="btn btn-outline-secondary m-3">Volver a principal</a>

      <table class="table table-stripped table-bordered table-hover">
        <thead class="thead-dark">
          <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Descripción</th>
            <th>Imagen</th>
            <th>Marca</th>
            <th>Categoría</th>
            <th colspan="2">
              <a href="formAddProduct.php" class="btn btn-dark">
                agregar
              </a>
            </th>
          </tr>
        </thead>
        <tbody>

          <?php 
            foreach ($products as $product) {
              
              echo '<tr><td>' . $product["id"] . '</td>';
              echo '<td>' . $product["name"] . '</td>';
              echo '<td>$' . $product["price"] . '</td>';
              echo '<td>' . $product["stock"] . '</td>';
              echo '<td>' . $product["description"] . '</td>';
              echo '<td><img class="img-fluid img-thumbnail main-image" src="product_img/' . $product["id"] . '.jpg" alt=""></td>';
              echo '<td>' . $product["mark"] . '</td>';
              echo '<td>' . $product["category"] . '</td>';
              echo '<td><a href="formModifyProduct.php?id=' . $product["id"] . '" class="btn btn-outline-secondary">modificar</a></td>';
              echo '<td><a href="formDeleteProduct.php?id=' . $product["id"] . '" class="btn btn-outline-secondary">eliminar</a></td>';

            }
          ?>

        </tbody>
      </table>

      <a href="admin.php" class="btn btn-outline-secondary m-3">Volver a principal</a>

    </main>

</body>