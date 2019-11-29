<?php

if ($_POST) {

    include 'functions.php';
    
    $json = file_get_contents("users.json");
    $json = json_decode($json, true);
    
    if (strlen($_POST["email"]) == 0) {
        $errors["email"] = "Completar campo";
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Formato de email incorrecto";
    } else if (getUserByEmail($json, $_POST["email"]) === null) {
        $errors["email"] = "El email no se encuentra registrado";
    }
    
    if (strlen($_POST["pass"]) == 0) {
        $errors["pass"] = "Completar campo";
    }
    
    if (!isset($errors)) {
        if (checkLogIn($_POST["email"], $_POST["pass"], $json)){
            session_start();
            $_SESSION["userId"] = getUserByEmail( $json, $_POST["email"])["id"];
            header("location: index.php");
            var_dump($_SESSION);
        }else{
            $errors["pass"] = "Contraseña incorrecta";
        }
    }
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
                            <input value="<?php echo (isset($_POST["email"])) ? $_POST["email"] : "" ?>" type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
                            <?php echo (isset($errors["email"])) ? "<div class='invalid-feedback'>" . $errors["email"] . "</div>" : "" ?>
                        </div>
                        <div class="form-group">
                            <input type="password" name="pass" class="form-control <?= ($_POST) ? validateInput($errors, 'pass') : ''; ?>" id="pass" placeholder="Password">
                            <?php echo (isset($errors["pass"])) ? "<div class='invalid-feedback'>" . $errors["pass"] . "</div>" : "" ?>
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