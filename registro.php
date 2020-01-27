<?php

session_start();

if ($_SESSION) {
    header('location: index.php');
}

include 'clases/Customer.php';
include 'clases/Connection.php';
include 'clases/Validator.php';



if ($_POST) {
    $Customer = new Customer;
    $errors = $Customer->addCustomer();
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


                    <!-- NOMBRE -->
                    <div class="form-group">
                        <label for="first_name">Nombre</label>
                        <input value="<?php echo (isset($_POST["first_name"])) ? $_POST["first_name"] : "" ?>" name="first_name" type="text" class="form-control" id="name" placeholder="Ingrese su nombre">
                        <?php echo (isset($errors["first_name"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["first_name"] . "</div>" : "" ?>
                    </div>

                    <!-- APELLIDO -->
                    <div class="form-group">
                        <label for="last_name">Apellido</label>
                        <input value="<?php echo (isset($_POST["last_name"])) ? $_POST["last_name"] : "" ?>" name="last_name" type="text" class="form-control" id="name" placeholder="Ingrese su apellido">
                        <?php echo (isset($errors["last_name"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["last_name"] . "</div>" : "" ?>
                    </div>


                    <!-- EMAIL -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input value="<?php echo (isset($_POST["email"])) ? $_POST["email"] : "" ?>" name="email" type="text" class="form-control" placeholder="Ingrese su email">
                        <?php echo (isset($errors["email"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["email"] . "</div>" : "" ?>
                    </div>


                    <!-- CONTRASEÑA -->
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Ingrese su contraseña">
                        <?php echo (isset($errors["password"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["password"] . "</div>" : "" ?>
                    </div>


                    <!-- CONFIRMACION DE CONTRASEÑA -->
                    <div class="form-group">
                        <label for="repassword">Confirme Contraseña</label>
                        <input name="repassword" type="password" class="form-control" id="repassword" placeholder="Confirme su Contraseña">
                        <?php echo (isset($errors["repassword"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["repassword"] . "</div>" : "" ?>
                    </div>

                    <!-- FOTO DE PERFIL -->
                    <div class="form-group">
                        <label for="img">Foto de perfil</label> <br>
                        <input name="img" type="file" id="img">
                        <?php echo (isset($errors["img"])) ? "<div class='invalid-feedback' style='display: block' style='display: block'>" . $errors["img"] . "</div>" : "" ?>
                    </div>

                    <!-- DNI -->
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input value="<?php echo (isset($_POST["dni"])) ? $_POST["dni"] : "" ?>" name="dni" type="text" class="form-control" id="dni" placeholder="Ingrese su DNI">
                        <?php echo (isset($errors["dni"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["dni"] . "</div>" : "" ?>
                    </div>


                    <!-- FECHA DE NACIMIENTO -->
                    <div class="form-group">
                        <label for="birthdate">Fecha de nacimiento</label>
                        <input value="<?php echo (isset($_POST["birthdate"])) ? $_POST["birthdate"] : "" ?>" name="birthdate" type="date" class="form-control" id="birthdate">
                        <?php echo (isset($errors["birthdate"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["birthdate"] . "</div>" : "" ?>
                    </div>


                    <!-- TELEFONO -->
                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input value="<?php echo (isset($_POST["phone"])) ? $_POST["phone"] : "" ?>" name="phone" type="text" class="form-control" id="phone" placeholder="Ingrese su numero de teléfono">
                        <?php echo (isset($errors["phone"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["phone"] . "</div>" : "" ?>
                    </div>

                    <!-- DIRECCION -->
                    <div class="form-group">
                        <label for="phone">Dirección</label>
                        <input value="<?php echo (isset($_POST["address"])) ? $_POST["address"] : "" ?>" name="address" type="text" class="form-control" id="address" placeholder="Ingrese su numero de dirección">
                        <?php echo (isset($errors["address"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["address"] . "</div>" : "" ?>
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