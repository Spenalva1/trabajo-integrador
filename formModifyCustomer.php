<?php

require 'clases/Connection.php';
require 'clases/Customer.php';
require 'clases/Validator.php';
require 'clases/Session.php';

if(!Session::checkIfAdminIsLogged()){
  header('location: adminLogIn.php');
}
if ($_GET) {
    $Customer = new Customer;
    $Customer->getCustomerById();
}

if ($_POST) {
    $errors = $Customer->modifyCustomer();
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
        <h1>Formulario de modificación de un cliente</h1>

        <?php if ($_POST) { ?>
            <?php
            $mensaje = 'No se pudo modificar el cliente. ';
            $class = 'danger';
            if (!$errors) {
                header('location: adminCustomers.php');
            }

            ?>
            <div class="alert alert-<?= $class; ?>">
                <?= $mensaje ?>
            </div>

            <?php if (!$errors) {
                echo '<a href="adminProducts.php">Volver</a>';
            }
            ?>


        <?php
        }

        if (!($_POST && !$errors)) {
        ?>
            <form action="" method="post" enctype="multipart/form-data">

                Nombre:
                <input value="<?php echo (isset($_POST["first_name"])) ? $_POST["first_name"] : $Customer->getFirst_name() ?>" class="form-control" type="text" name="first_name" class="form-control" require>
                <?php echo (isset($errors["first_name"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["first_name"] . "</div>" : "" ?>
                <br>
                
                Apellido:
                <input value="<?php echo (isset($_POST["last_name"])) ? $_POST["last_name"] : $Customer->getLast_name() ?>" class="form-control" type="text" name="last_name" class="form-control" require>
                <?php echo (isset($errors["last_name"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["last_name"] . "</div>" : "" ?>
                <br>
                
                Email:
                <input value="<?php echo (isset($_POST["email"])) ? $_POST["email"] : $Customer->getEmail() ?>" class="form-control" type="text" name="email" class="form-control" require>
                <?php echo (isset($errors["email"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["email"] . "</div>" : "" ?>
                <br>
                
                Password:
                <input placeholder="********" class="form-control" type="password" name="password" class="form-control" require>
                <?php echo (isset($errors["password"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["password"] . "</div>" : "" ?>
                <br>
                
                Reingresar password:
                <input placeholder="********" class="form-control" type="password" name="repassword" class="form-control" require>
                <?php echo (isset($errors["repassword"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["repassword"] . "</div>" : "" ?>
                <br>
                
                Fecha de nacimiento:
                <input value="<?php echo (isset($_POST["birthdate"])) ? $_POST["birthdate"] : $Customer->getBirthdate() ?>" class="form-control" type="date" name="birthdate" class="form-control" require>
                <?php echo (isset($errors["birthdate"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["birthdate"] . "</div>" : "" ?>
                <br>
                
                Telefono:
                <input value="<?php echo (isset($_POST["phone"])) ? $_POST["phone"] : $Customer->getPhone() ?>" class="form-control" type="text" name="phone" class="form-control" require>
                <?php echo (isset($errors["phone"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["phone"] . "</div>" : "" ?>
                <br>
                
                Dni:
                <input value="<?php echo (isset($_POST["dni"])) ? $_POST["dni"] : $Customer->getDni() ?>" class="form-control" type="text" name="dni" class="form-control" require>
                <?php echo (isset($errors["dni"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["dni"] . "</div>" : "" ?>
                <br>
                
                Address:
                <input value="<?php echo (isset($_POST["address"])) ? $_POST["address"] : $Customer->getAddress() ?>" class="form-control" type="text" name="address" class="form-control" require>
                <?php echo (isset($errors["address"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["address"] . "</div>" : "" ?>
                <br>
                


                <img style="width: 300px" src='profile_img/<?= $Customer->getId()?>.jpg' alt=""> <br>
                Imagen:
                <input type="file" name="img" require>
                <?php echo (isset($errors["img"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["img"] . "</div>" : "" ?>
                <br> <br><br> <br>



                <input type="submit" value="Modificar">
                <input type="button" value="Volver" onclick="location.href='adminProducts.php';"> <br><br>
            </form>

        <?php } ?>

    </main>

</body>