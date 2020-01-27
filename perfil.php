<?php

require 'clases/Connection.php';
require 'clases/Customer.php';
require 'clases/Validator.php';
require 'clases/Session.php';

if (!Session::checkIfCustomerIsLogged()) {
  header('location: index.php');
}

$Customer = new Customer;
$Customer->getCustomerById($_SESSION["customerId"]);

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
  <title>DHShop - Perfil</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/header-footer.css">
  <link rel="stylesheet" href="css/perfil.css">
</head>

<body>

  <?php include 'header.php'; ?>
  <div class="container-fluid">

    <main>

      <section class="user row">
        <article class="user-info col-12 row">
          <form class="col-12 col-md-8 row" action="" method="post" enctype="multipart/form-data">
            <fieldset class="row col-12">
              <h2>Datos de mi cuenta</h2>

              <!-- EMAIL -->
              <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="text" id="email" name="email" class="form-control" value="<?= ($_POST) ? $_POST["email"] : $Customer->getEmail() ?>">
                <?php echo (isset($errors["email"])) ? "<div class='invalid-feedback' style='display:block'>" . $errors["email"] . "</div>" : "" ?>
              </div>

              <!-- CONTRASEÑA -->
              <div class="form-group">
                <label for="pass">Cambiar contraseña</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="**********">
                <?php echo (isset($errors["pass"])) ? "<div class='invalid-feedback' style='display:block'>" . $errors["password"] . "</div>" : "" ?>
              </div>

              <!-- RE CONTRASEÑA -->
              <div class="form-group re-pass">
                <label for="repassword">Reingrese contraseña</label>
                <input type="password" id="repassword" name="repassword" class="form-control" placeholder="**********">
                <?php echo (isset($errors["repassword"])) ? "<div class='invalid-feedback' style='display:block'>" . $errors["repassword"] . "</div>" : "" ?>
              </div>

              <!-- Foto de perfil -->
              <div class="form-group">
                <label for="img">Foto de perfil</label> <br>
                <input name="img" type="file" id="img">
                <?php echo (isset($errors["img"])) ? "<div class='invalid-feedback' style='display:block' style='display: block'>" . $errors["img"] . "</div>" : "" ?>
              </div>

              <h2>Datos personales</h2>

              <!-- NOMBRE -->
              <div class="form-group">
                <label for="first_name">Nombre</label>
                <input type="text" id="first_name" name="first_name" class="form-control" value="<?= ($_POST) ? $_POST["first_name"] : $Customer->getFirst_name() ?>">
                <?php echo (isset($errors["first_name"])) ? "<div class='invalid-feedback' style='display:block'>" . $errors["first_name"] . "</div>" : "" ?>
              </div>


              <!-- APELLIDO -->
              <div class="form-group">
                <label for="last_name">Apellido</label>
                <input type="text" id="last_name" name="last_name" class="form-control" value="<?= ($_POST) ? $_POST["last_name"] : $Customer->getLast_name() ?>">
                <?php echo (isset($errors["last_name"])) ? "<div class='invalid-feedback' style='display:block'>" . $errors["last_name"] . "</div>" : "" ?>
              </div>

              <!-- DNI -->
              <div class="form-group">
                <label for="dni">Documento</label>
                <input type="text" id="dni" name="dni" class="form-control" value="<?= ($_POST) ? $_POST["dni"] : $Customer->getDni() ?>">
                <?php echo (isset($errors["dni"])) ? "<div class='invalid-feedback' style='display:block'>" . $errors["dni"] . "</div>" : "" ?>
              </div>

              <!-- FECHA DE NACIMIENTO -->
              <div class="form-group">
                <label for="birthdate">Fecha de nacimiento</label>
                <input type="date" id="birthdate" name="birthdate" class="form-control" value="<?= ($_POST) ? $_POST["birthdate"] : $Customer->getBirthdate() ?>">
                <?php echo (isset($errors["birthdate"])) ? "<div class='invalid-feedback' style='display:block'>" . $errors["birthdate"] . "</div>" : "" ?>
              </div>

              <!-- TELEFONO -->
              <div class="form-group">
                <label for="phone">Telefono</label>
                <input type="text" id="phone" name="phone" class="form-control" value="<?= ($_POST) ? $_POST["phone"] : $Customer->getPhone() ?>">
                <?php echo (isset($errors["phone"])) ? "<div class='invalid-feedback' style='display:block'>" . $errors["phone"] . "</div>" : "" ?>
              </div>

              <!-- DIRECCION -->
              <div class="form-group">
                <label for="address">Direccion</label>
                <input type="text" id="address" name="address" class="form-control" value="<?= ($_POST) ? $_POST["address"] : $Customer->getAddress() ?>">
                <?php echo (isset($errors["address"])) ? "<div class='invalid-feedback' style='display:block'>" . $errors["address"] . "</div>" : "" ?>
              </div>



            </fieldset>

            <!-- BOTONES -->
            <div class="button-container col-12">
              <button type="submit" id="btn-edit" class="btn btn-primary">Guardar Datos</button>
            </div>

          </form>
          <div class="col-12 col-md-4 imgAndHistory-container">
            <img id="profile-img" src="profile_img/<?= $Customer->getId() ?>.jpg" alt="">
            <br>
            <a href="historial_compras.php">Ver historial de compras</a><br>
            <a href="logOut.php">Cerrar sesión</a>
          </div>
        </article>
      </section>

    </main>
  </div>

  <footer>
    <section class="logo">
      <h1>DHShop</h1>
    </section>
    <section class="footer-nav">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="producto-lista.php">Productos</a></li>
        <li><a href="contacto.php">Contacto</a></li>
        <li><a href="faq.php">Ayuda</a></li>
      </ul>
    </section>
  </footer>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
</body>

</html>