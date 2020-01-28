<?php

include 'clases/Session.php';

if(Session::checkIfCustomerIsLogged()){
    header('location: index.php');
}

if ($_POST) {

    include 'clases/Connection.php';
    include 'clases/Validator.php';
    $errors = Session::logCustomerIn();
}

?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- ESPACIO PARA CSS DEL PROYECTO -->
    <link rel="stylesheet" href="css/login.css">
    <title>Ingresar</title>
</head>

<body>

    <main>
        <section>
            <div class="container-fluid">
                <div class="main-content mt-3">
                    <h1 id="title-page">Ingresar</h1>
                    <a href="index.php"><img src="img/logo-dh.PNG" alt=""></a>
                    <form method="post" action="">
                        <div class="form-group">
                            <input value="<?php echo (isset($_POST["email"])) ? $_POST["email"] : ((isset($_COOKIE["rememberEmail"]) ? $_COOKIE["rememberEmail"] : "")) ?>" type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
                            <?php echo (isset($errors["email"])) ? "<div style='display:block' class='invalid-feedback'>" . $errors["email"] . "</div>" : "" ?>
                        </div>

                        <div class="form-group">
                            <input value="<?php echo (!$_POST) ? ((isset($_COOKIE["rememberPassword"]) ? $_COOKIE["rememberPassword"] : "")) : "" ?>" type="password" name="password" class="form-control" id="pass" placeholder="Password">
                            <?php  echo (isset($errors["password"])) ? "<div style='display:block' class='invalid-feedback'>" . $errors["password"] . "</div>" : "" ?>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" name="remember" id="remember">
                            <label class="form-check-label" for="remember">
                                Recuerdame
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary">ingresar</button>
                    </form>
                    <form id="registro" action="registro.php">
                        <button type="submit" class="btn btn-danger">Crear cuenta</button>
                    </form>

                    <p>¿Olvidaste la contraseña? <a href="forgottenPass.php">Haz click aquí</a></p>
                </div>
            </div>
        </section>
    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>