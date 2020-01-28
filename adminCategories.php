<?php

require 'clases/Connection.php';
require 'clases/Category.php';
require 'clases/Session.php';

if(!Session::checkIfAdminIsLogged()){
  header('location: adminLogIn.php');
}

$Category = new Category;
$categories = $Category->listCateogories();

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
      <h1>Panel de administración de categorías</h1>

      <a href="admin.php" class="btn btn-outline-secondary m-3">Volver a principal</a>

      <table class="table table-stripped table-bordered table-hover">
        <thead class="thead-dark">
          <tr>
            <th>id</th>
            <th>Categoría</th>
            <th colspan="2">
              <a href="formAddCategory.php" class="btn btn-dark">
                agregar
              </a>
            </th>
          </tr>
        </thead>
        <tbody>

          <?php 
            foreach ($categories as $category) {
              
              echo '<tr><td>' . $category["id"] . '</td>';
              echo '<td>' . $category["name"] . '</td>';
              echo '<td><a href="formModifyCategory.php?id=' . $category["id"] . '" class="btn btn-outline-secondary">modificar</a></td>';
              echo '<td><a href="formDeleteCategory.php?id=' . $category["id"] . '" class="btn btn-outline-secondary">eliminar</a></td>';

            }
          ?>

        </tbody>
      </table>

      <a href="admin.php" class="btn btn-outline-secondary m-3">Volver a principal</a>

    </main>

</body>