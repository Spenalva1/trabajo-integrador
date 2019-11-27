<?php

include("functions.php");


if ($_POST) {

    $json = file_get_contents("users.json");
    $json = json_decode($json, true);

    $newUser["id"] = count($json);


    if (strlen($_POST["name"]) == 0) {
        $errors["name"] = "Completar campo";
    } else {
        $newUser["name"] = trim($_POST["name"]);
    }



    if (strlen($_POST["email"]) == 0) {
        $errors["email"] = "Completar campo";
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Formato de email incorrecto";
    } else if (!checkIfAvailableByEmail($json, $_POST["email"])) {
        $errors["email"] = "El email ya se encuentra en uso";
    } else {
        $newUser["email"] = trim($_POST["email"]);
    }


    if (strlen($_POST["pass"]) == 0) {
        $errors["pass"] = "Completar campo";
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
            $imgUser = "profile_img/" . count($json) . "." . $ext;
            $newUser["img"] = $imgUser;
        } else {
            $errors["img"] = "La imagen debe ser .jpg , .jpeg o .png";
            $_FILES["img"]["error"] = 4;
        }
    } else {
        $newUser["img"] = "img/perfil.png";
    }





    if (strlen($_POST["dni"]) == 0) {
        $errors["dni"] = "Completar campo";
    } else if (!is_numeric($_POST["dni"])) {
        $errors["dni"] = "Debe ingresar un valor numérico";
    } else if (!checkIfAvailableByDni($json, $_POST["dni"])) {
        $errors["dni"] = "El dni ya se encuentra en uso";
    } else {
        $newUser["dni"] = trim($_POST["dni"]);
    }





    if (strlen($_POST["birthdate"]) == 0) {
        $errors["birthdate"] = "Completar campo";
    } else {
        $birthdate = strtotime(date('Y-m-d', strtotime($_POST["birthdate"])) . " +18 years");
        if ($birthdate < time()) {
            $newUser["birthdate"] = $_POST["birthdate"];
        } else {
            $errors["birthdate"] = "Debes ser mayor a 18 años";
        }
    }


    if (strlen($_POST["phone"]) == 0) {
        $errors["phone"] = "Completar campo";
    } else if (!is_numeric($_POST["phone"])) {
        $errors["phone"] = "Debe ingresar un valor numérico";
    } else {
        $newUser["phone"] = trim($_POST["phone"]);
    }


    if (strlen($_POST["address"]) == 0) {
        $errors["address"] = "Completar campo";
    } else {
        $newUser["address"] = trim($_POST["address"]);
    }



    if (!isset($errors)) {
        if ($_FILES["img"]["error"] === UPLOAD_ERR_OK) {
            move_uploaded_file($img, $imgUser);
        }
        $json[] = $newUser;
        $json = json_encode($json);
        file_put_contents("users.json", $json);
        header("location: index.php");
    }
}


?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/register-css.css">
    <!-- ESPACIO PARA CSS DEL PROYECTO -->
    <title>Registro</title>
</head>

<body>
    <div class="container-fluid">

        <main>


            <section id="register-form">
                <div class="main-title">
                    <h1>Registrarse</h1>
                </div>
                <div class="logo-company">
                    <a href="index.php"><img src="img/logo-dh.PNG" alt=""></a>
                </div>




                <form method="post" action="" enctype="multipart/form-data">


                    <!-- NOMBRE COMPLETO -->
                    <div class="form-group">
                        <label for="name">Nombre Completo</label>
                        <input value="<?php echo (isset($_POST["name"])) ? $_POST["name"] : "" ?>" name="name" type="text" class="form-control <?= ($_POST) ? validateInput($errors, 'name') : ''; ?> " id="name" placeholder="Ingrese su nombre completo">
                        <?php echo (isset($errors["name"])) ? "<div class='invalid-feedback'>" . $errors["name"] . "</div>" : "" ?>
                    </div>


                    <!-- EMAIL -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input value="<?php echo (isset($_POST["email"])) ? $_POST["email"] : "" ?>" name="email" type="text" class="form-control <?= ($_POST) ? validateInput($errors, 'email') : ''; ?>" id="email" aria-describedby="emailHelp" placeholder="Ingrese su email">
                        <?php echo (isset($errors["email"])) ? "<div class='invalid-feedback'>" . $errors["email"] . "</div>" : "" ?>
                    </div>


                    <!-- CONTRASEÑA -->
                    <div class="form-group">
                        <label for="pass">Contraseña</label>
                        <input name="pass" type="password" class="form-control <?= ($_POST) ? validateInput($errors, 'pass') : ''; ?>" id="pass" placeholder="Ingrese su contraseña">
                        <?php echo (isset($errors["pass"])) ? "<div class='invalid-feedback'>" . $errors["pass"] . "</div>" : "" ?>
                    </div>


                    <!-- CONFIRMACION DE CONTRASEÑA -->
                    <div class="form-group">
                        <label for="repass">Confirme Contraseña</label>
                        <input name="repass" type="password" class="form-control <?= ($_POST) ? validateInput($errors, 'repass') : ''; ?>" id="repass" placeholder="Confirme su Contraseña">
                        <?php echo (isset($errors["repass"])) ? "<div class='invalid-feedback'>" . $errors["repass"] . "</div>" : "" ?>
                    </div>

                    <!-- FOTO DE PERFIL -->
                    <div class="form-group">
                        <label for="img">Foto de perfil</label> <br>
                        <input name="img" type="file" id="img">
                        <?php echo (isset($errors["img"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["img"] . "</div>" : "" ?>
                    </div>

                    <!-- DNI -->
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input value="<?php echo (isset($_POST["dni"])) ? $_POST["dni"] : "" ?>" name="dni" type="text" class="form-control <?= ($_POST) ? validateInput($errors, 'dni') : ''; ?>" id="dni" placeholder="Ingrese su DNI">
                        <?php echo (isset($errors["dni"])) ? "<div class='invalid-feedback'>" . $errors["dni"] . "</div>" : "" ?>
                    </div>


                    <!-- FECHA DE NACIMIENTO -->
                    <div class="form-group">
                        <label for="birthdate">Fecha de nacimiento</label>
                        <input value="<?php echo (isset($_POST["birthdate"])) ? $_POST["birthdate"] : "" ?>" name="birthdate" type="date" class="form-control <?= ($_POST) ? validateInput($errors, 'birthdate') : ''; ?>" id="birthdate">
                        <?php echo (isset($errors["birthdate"])) ? "<div class='invalid-feedback'>" . $errors["birthdate"] . "</div>" : "" ?>
                    </div>


                    <!-- TELEFONO -->
                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input value="<?php echo (isset($_POST["phone"])) ? $_POST["phone"] : "" ?>" name="phone" type="text" class="form-control <?= ($_POST) ? validateInput($errors, 'phone') : ''; ?>" id="phone" placeholder="Ingrese su numero de teléfono">
                        <?php echo (isset($errors["phone"])) ? "<div class='invalid-feedback'>" . $errors["phone"] . "</div>" : "" ?>
                    </div>

                    <!-- DIRECCION -->
                    <div class="form-group">
                        <label for="phone">Dirección</label>
                        <input value="<?php echo (isset($_POST["address"])) ? $_POST["address"] : "" ?>" name="address" type="text" class="form-control <?= ($_POST) ? validateInput($errors, 'address') : ''; ?>" id="address" placeholder="Ingrese su numero de dirección">
                        <?php echo (isset($errors["address"])) ? "<div class='invalid-feedback'>" . $errors["address"] . "</div>" : "" ?>
                    </div>



                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-6 column">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>

                </form>

                <div class="btn-social-network">
                    <hr>
                    <span>O</span>
                    <hr><br>
                </div>
                <div class="btn-social-network">
                    <a href="https://gmail.com"><img src="img/gmail.svg" alt="Gmail"></a>
                    <a href="https://facebook.com"><img src="img/facebook.svg" alt="Facebook"></a>
                    <a href="https://twitter.com"><img src="img/twitter.svg" alt="Twitter"></a>
                </div>

                <p>¿Ya tiene una cuenta? <a href="ingreso.php">Click aquí</a></p>

            </section>
        </main>



        <aside>
            <!-- ASIDE DEL PROYECTO -->
        </aside>

        <footer>
            <!-- FOOTER DEL PROYECTO -->
        </footer>
    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>