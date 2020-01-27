<?php

require 'clases/Connection.php';
require 'clases/Customer.php';

$Customer = new Customer;
$customers = $Customer->listCustomers();

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
      <h1>Panel de administración de usuarios</h1>

      <a href="admin.php" class="btn btn-outline-secondary m-3">Volver a principal</a>

      <table class="table table-stripped table-bordered table-hover">
        <thead class="thead-dark">
          <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>imagen de perfil</th>
            <th>Fecha de nacimiento</th>
            <th>Telefono</th>
            <th>Dirección</th>
            <th colspan="2"></th>
          </tr>
        </thead>
        <tbody>

          <?php 
            foreach ($customers as $customer) {
              
              echo '<tr><td>' . $customer["id"] . '</td>';
              echo '<td>' . $customer["first_name"] . '</td>';
              echo '<td>' . $customer["last_name"] . '</td>';
              echo '<td>' . $customer["email"] . '</td>';
              echo '<td><img class="img-fluid img-thumbnail main-image" src="profile_img/' . $customer["id"] . '.jpg" alt=""></td>';
              echo '<td>' . $customer["birthdate"] . '</td>';
              echo '<td>' . $customer["phone"] . '</td>';
              echo '<td>' . $customer["address"] . '</td>';
              echo '<td><a href="formModifyCustomer.php?id=' . $customer["id"] . '" class="btn btn-outline-secondary">modificar</a></td>';
              echo '<td><a href="formDeleteCustomer.php?id=' . $customer["id"] . '" class="btn btn-outline-secondary">eliminar</a></td>';

            }
          ?>

        </tbody>
      </table>

      <a href="admin.php" class="btn btn-outline-secondary m-3">Volver a principal</a>

    </main>

</body>