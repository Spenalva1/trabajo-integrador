<?php

include 'clases/Customer.php';
include 'clases/Connection.php';
include 'clases/Validator.php';
include 'clases/Session.php';

if(Session::checkIfCustomerIsLogged()){
    header('location: index.php');
}

if ($_POST) {
    $errors = Customer::forgottenPass();
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

    <header>
        <!-- HEADER DEL PROYECTO -->
        <div>

        </div>
    </header>

    <main>
        <section>
            <div class="container-fluid">
                <div class="main-content mt-3">
                    <a href="index.php"><img src="img/logo-dh.PNG" alt=""></a>

                    <?php if (!isset($errors["newPass"])) : ?>

                        <form method="post" action="">
                        <div class="form-group">
                                <input name="email" type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" value="<?php echo (isset($_POST["email"])) ? $_POST["email"] : "" ?>">
                                <?php echo (isset($errors["email"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["email"] . "</div>" : "" ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Recuperar contraseña</button>
                        </form>

                    <?php else : ?>

                        <span>Su nueva contraseña es:</span>

                        <h2> <?= $errors["newPass"] ?> </h2>

                        <span style="text-align: center">Para cambiarla, ingrese a su cuenta y cambiela en su pagina de perfil</span>

                    <?php endif ?>

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