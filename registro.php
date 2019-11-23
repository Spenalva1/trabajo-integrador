<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/register-css.css">
    <!-- ESPACIO PARA CSS DEL PROYECTO -->
    <title>Registro</title>
</head>

<body>
    <div class="container-fluid">

        <header>
            <!-- HEADER DEL PROYECTO -->
        </header>

        <main>
            <!-- name, username, password, email address, confirm password,  -->


            <section id="register-form">
                <div class="main-title">
                    <h1>Registrarse</h1>
                </div>
                <div class="logo-company">
                    <a href="index.html"><img src="img/logo-dh.PNG" alt=""></a>
                </div>




                <form method="post" action="" enctype="multipart/form-data">


                    <!-- NOMBRE COMPLETO -->
                    <div class="form-group">
                        <label for="name">Nombre Completo</label>
                        <input name="name" type="text" class="form-control" id="name"
                            placeholder="Ingrese su nombre completo">
                    </div>


                    <!-- NOMBRE DE USUARIO -->
                    <div class="form-group">
                        <label for="username">Nombre de usuario</label>
                        <input name="username" type="text" class="form-control" id="username"
                            placeholder="Seleccione su nombre de usuario">
                    </div>


                    <!-- EMAIL -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" type="text" class="form-control" id="email" aria-describedby="emailHelp"
                            placeholder="Ingrese su email">
                    </div>


                    <!-- CONTRASEÑA -->
                    <div class="form-group">
                        <label for="pass">Contraseña</label>
                        <input name="pass" type="password" class="form-control" id="pass"
                            placeholder="Ingrese su contraseña">
                    </div>


                    <!-- CONFIRMACION DE CONTRASEÑA -->
                    <div class="form-group">
                        <label for="repass">Confirme Contraseña</label>
                        <input name="pass" type="password" class="form-control" id="repass"
                            placeholder="Confirme su Contraseña">
                    </div>

                    <!-- FOTO DE PERFIL -->
                    <div class="form-group">
                        <label for="birthdate">Foto de perfil</label> <br>
                        <input name="img" type="file" id="img">
                    </div>

                    <!-- DNI -->
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input name="dni" type="text" class="form-control" id="dni" placeholder="Ingrese su DNI">
                    </div>


                    <!-- FECHA DE NACIMIENTO -->
                    <div class="form-group">
                        <label for="birthdate">Fecha de nacimiento</label>
                        <input name="birthdate" type="date" class="form-control" id="birthdate">
                    </div>


                    <!-- TELEFONO -->
                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input name="phone" type="text" class="form-control" id="phone"
                            placeholder="Ingrese su numero de teléfono">
                    </div>

                    <!-- DIRECCION -->
                    <div class="form-group">
                        <label for="phone">Dirección</label>
                        <input name="address" type="text" class="form-control" id="address"
                            placeholder="Ingrese su numero de dirección">
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

                <p>¿Ya tiene una cuenta? <a href="login.html">Click aquí</a></p>

            </section>
        </main>



        <aside>
            <!-- ASIDE DEL PROYECTO -->
        </aside>

        <footer>
            <!-- FOOTER DEL PROYECTO -->
        </footer>
    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>