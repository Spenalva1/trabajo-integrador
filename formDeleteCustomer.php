<?php

require 'clases/Connection.php';
require 'clases/Customer.php';
require 'clases/Session.php';

if(!Session::checkIfAdminIsLogged()){
  header('location: adminLogIn.php');
}
if ($_GET) {
    $Customer = new Customer;
    $Customer->getCustomerById($_GET["id"]);
}

if ($_POST) {
    $Customer = new Customer;
    $Customer->deleteCustomer();
    header('location: adminCustomers.php');
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
        <h1>Eliminar cliente</h1>
        <form action="" method="POST">
            ¿Seguro desea eliminar el siguiente cliente: <?= $Customer->getFirst_name() . " " . $Customer->getLast_name() ?>? <br>
            <input type="text" name="id" style="display: none" value="<?= $Customer->getId() ?>">
            <input type="button" value="Volver" onclick="location.href='adminCustomers.php';">
            <input type="submit" value="Eliminar">
        </form>
    </main>

</body>