<?php

include "functions.php";

if ($_GET) {
  $json = file_get_contents("users.json");
  $json = json_decode($json, true);
  $currentUser = getUserById($json, $_GET["id"]);
}

if ($_POST) {

  $json = file_get_contents("users.json");
  $json = json_decode($json, true);

  $newUser["id"] = $_POST["id"];


  if (strlen($_POST["name"]) == 0) {
    $newUser["name"] = getUserById($json, $_POST["id"])["name"];
  } else {
    $newUser["name"] = trim($_POST["name"]);
  }



  if (strlen($_POST["email"]) == 0) {
    $newUser["email"] = getUserById($json, $_POST["id"])["email"];
  } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $errors["email"] = "Formato de email incorrecto";
  } else if (!checkIfAvailableByEmail($json, $_POST["email"])) {
    if (getUserByEmail($json, $_POST["email"])["id"] != $_POST["id"]) {
      $errors["email"] = "El email ya se encuentra en uso";
    } else {
      $newUser["email"] = trim($_POST["email"]);
    }
  } else {
    $newUser["email"] = trim($_POST["email"]);
  }


  if (strlen($_POST["pass"]) == 0) {
    $newUser["password"] = getUserById($json, $_POST["id"])["password"];
  } else if (strlen($_POST["pass"]) < 8) {
    $errors["pass"] = "La contraseña debe tener al menos 8 caracteres";
  } else if ($_POST["pass"] != $_POST["repass"]) {
    $errors["repass"] = "Las contraseñas no coinciden";
  } else {
    $newUser["password"] = password_hash($_POST["pass"], PASSWORD_DEFAULT);
  }




  if ($_FILES["img"]["error"] === UPLOAD_ERR_OK) {
    $imgName = $_FILES["img"]["name"];
    $img = $_FILES["img"]["tmp_name"];
    $ext = pathinfo($imgName, PATHINFO_EXTENSION);

    if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
      $imgUser = "profile_img/" . $_POST["id"] . "." . $ext;
      $newUser["img"] = $imgUser;
    }else{
      $errors["img"] = "La imagen debe ser .jpg , .jpeg o .png";
      $_FILES["img"]["error"] = 4;
    }
  } else {
    $newUser["img"] = $_POST["oimg"];
  }





  if (strlen($_POST["dni"]) == 0) {
    $newUser["dni"] = getUserById($json, $_POST["id"])["dni"];
  } else if (!is_numeric($_POST["dni"])) {
    $errors["dni"] = "Debe ingresar un valor numérico";
  } else if (!checkIfAvailableByDni($json, $_POST["dni"])) {
    if (getUserByDni($json, $_POST["dni"])["id"] != $_POST["id"]) {
      $errors["dni"] = "El dni ya se encuentra en uso";
    } else {
      $newUser["dni"] = trim($_POST["dni"]);
    }
  } else {
    $newUser["dni"] = trim($_POST["dni"]);
  }





  if (strlen($_POST["birthdate"]) == 0) {
    $newUser["birthdate"] = getUserById($json, $_POST["id"])["birthdate"];
  } else {
    $birthdate = strtotime(date('Y-m-d', strtotime($_POST["birthdate"])) . " +18 years");
    if ($birthdate < time()) {
      $newUser["birthdate"] = $_POST["birthdate"];
    } else {
      $errors["birthdate"] = "Debes ser mayor a 18 años";
    }
  }


  if (strlen($_POST["phone"]) == 0) {
    $newUser["phone"] = getUserById($json, $_POST["id"])["phone"];
  } else if (!is_numeric($_POST["phone"])) {
    $errors["phone"] = "Debe ingresar un valor numérico";
  } else {
    $newUser["phone"] = trim($_POST["phone"]);
  }


  if (strlen($_POST["address"]) == 0) {
    $newUser["address"] = getUserById($json, $_POST["id"])["address"];
  } else {
    $newUser["address"] = trim($_POST["address"]);
  }




  if (!isset($errors)) {
    if ($_FILES["img"]["error"] === UPLOAD_ERR_OK) {
      move_uploaded_file($img, $imgUser);
    }

    foreach ($json as $user) {
      if ($user == getUserById($json, $_POST["id"])) {
        $newJSON[] = $newUser;
      } else {
        $newJSON[] = $user;
      }
    }
    $newJSON = json_encode($newJSON);
    file_put_contents("users.json", $newJSON);
    header('location: perfil.php?id=' . $_POST["id"]);
  }
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
      <?php if (isset($_GET["id"])) : ?>

        <section class="user row">
          <article class="user-info col-12 row">
            <form class="col-12 col-md-8 row" action="" method="post" enctype="multipart/form-data">
              <fieldset class="row col-12">
                <h2>Datos de mi cuenta</h2>

                <input type="text" name="id" id="id" value="<?= ($_POST) ? $_POST["id"] : $_GET["id"] ?>">
                <input type="text" name="oimg" id="oimg" value="<?= ($_POST) ? $_POST["oimg"] : $currentUser["img"] ?>">

                <!-- EMAIL -->
                <div class="form-group">
                  <label for="email">E-Mail</label>
                  <input type="text" id="email" name="email" class="form-control <?= ($_POST) ? validateInput($errors, 'email') : ''; ?>" value="<?= ($_POST) ? $_POST["email"] : $currentUser["email"] ?>">
                  <?php echo (isset($errors["email"])) ? "<div class='invalid-feedback'>" . $errors["email"] . "</div>" : "" ?>
                </div>

                <!-- CONTRASEÑA -->
                <div class="form-group">
                  <label for="pass">Contraseña</label>
                  <input type="password" id="pass" name="pass" class="form-control <?= ($_POST) ? validateInput($errors, 'pass') : ''; ?>" placeholder="**********">
                  <?php echo (isset($errors["pass"])) ? "<div class='invalid-feedback'>" . $errors["pass"] . "</div>" : "" ?>
                </div>

                <!-- RE CONTRASEÑA -->
                <div class="form-group re-pass">
                  <label for="repass">Reingrese contraseña</label>
                  <input type="password" id="repass" name="repass" class="form-control <?= ($_POST) ? validateInput($errors, 'repass') : ''; ?>" placeholder="**********">
                  <?php echo (isset($errors["repass"])) ? "<div class='invalid-feedback'>" . $errors["repass"] . "</div>" : "" ?>
                </div>


                <!-- Foto de perfil -->
                <div class="form-group">
                  <label for="img">Foto de perfil</label> <br>
                  <input name="img" type="file" id="img">
                  <?php echo (isset($errors["img"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["img"] . "</div>" : "" ?>
                </div>

                <h2>Datos personales</h2>

                <!-- NOMBRE -->
                <div class="form-group">
                  <label for="name">Nombre</label>
                  <input type="text" id="name" name="name" class="form-control" value="<?= ($_POST) ? $_POST["name"] : $currentUser["name"] ?>">
                </div>

                <!-- DNI -->
                <div class="form-group">
                  <label for="dni">Documento</label>
                  <input type="text" id="dni" name="dni" class="form-control <?= ($_POST) ? validateInput($errors, 'dni') : ''; ?>" value="<?= ($_POST) ? $_POST["dni"] : $currentUser["dni"] ?>">
                  <?php echo (isset($errors["dni"])) ? "<div class='invalid-feedback'>" . $errors["dni"] . "</div>" : "" ?>
                </div>

                <!-- FECHA DE NACIMIENTO -->
                <div class="form-group">
                  <label for="birthdate">Fecha de nacimiento</label>
                  <input type="date" id="birthdate" name="birthdate" class="form-control <?= ($_POST) ? validateInput($errors, 'birthdate') : ''; ?>" value="<?= ($_POST) ? $_POST["birthdate"] : $currentUser["birthdate"] ?>">
                  <?php echo (isset($errors["birthdate"])) ? "<div class='invalid-feedback'>" . $errors["birthdate"] . "</div>" : "" ?>
                </div>

                <!-- TELEFONO -->
                <div class="form-group">
                  <label for="phone">Telefono</label>
                  <input type="text" id="phone" name="phone" class="form-control <?= ($_POST) ? validateInput($errors, 'phone') : ''; ?>" value="<?= ($_POST) ? $_POST["phone"] : $currentUser["phone"] ?>">
                  <?php echo (isset($errors["phone"])) ? "<div class='invalid-feedback'>" . $errors["phone"] . "</div>" : "" ?>
                </div>

                <!-- DIRECCION -->
                <div class="form-group">
                  <label for="address">Direccion</label>
                  <input type="text" id="address" name="address" class="form-control <?= ($_POST) ? validateInput($errors, 'address') : ''; ?>" value="<?= ($_POST) ? $_POST["address"] : $currentUser["address"] ?>">
                  <?php echo (isset($errors["address"])) ? "<div class='invalid-feedback'>" . $errors["address"] . "</div>" : "" ?>
                </div>



              </fieldset>

              <!-- BOTONES -->
              <div class="button-container col-12">
                <button type="submit" id="btn-edit" class="btn btn-primary">Guardar Datos</button>
              </div>

            </form>
            <div class="col-12 col-md-4 imgAndHistory-container">
              <img id="profile-img" src="<?= $currentUser["img"] ?>" alt="">
              <br>
              <a href="historial_compras.php">Ver historial de compras</a><br>
              <a href="logOut.php">Cerrar sesión</a>
            </div>
          </article>
        </section>

      <?php else : header('location: perfil.php?id=0') ?>
      <?php endif; ?>

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