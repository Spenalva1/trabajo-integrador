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
          <form class="col-12 col-md-8 row">
            <fieldset class="row col-12" disabled>
              <h2>Datos de mi cuenta</h2>

              <!-- EMAIL -->
              <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" id="email" name="email" class="form-control" value="emailexample@gmail.com">
              </div>

              <!-- CONTRASEÑA -->
              <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="text" id="password" name="password" class="form-control" placeholder="**********">
              </div>

              <!-- RE CONTRASEÑA -->
              <div class="form-group re-pass">
                <label for="repass">Reingrese contraseña</label>
                <input type="text" id="repass" name="repass" class="form-control" placeholder="Disabled input">
              </div>

              <h2>Datos personales</h2>

              <!-- APELLIDOS -->
              <div class="form-group">
                <label for="email">Apellidos</label>
                <input type="text" id="surname" name="surname" class="form-control" value="apellido apellido">
              </div>

              <!-- NOMBRES -->
              <div class="form-group">
                <label for="email">Nombres</label>
                <input type="text" id="name" name="name" class="form-control" value="nombre nombre">
              </div>

              <!-- DNU -->
              <div class="form-group">
                <label for="email">Documento</label>
                <input type="text" id="dni" name="dni" class="form-control" value="12345678">
              </div>

              <!-- FECHA DE NACIMIENTO -->
              <div class="form-group">
                <label for="email">Fecha de nacimiento</label>
                <input type="date" id="fecnac" name="fecnac" class="form-control">
              </div>

              <!-- TELEFONO -->
              <div class="form-group">
                <label for="email">Telefono</label>
                <input type="text" id="phone" name="phone" class="form-control" value="4578945612">
              </div>


              <h3>Direcciones</h3>

              <!-- DIRECCIONES -->
              <div class="form-group">
                <label for="email">Direccion 1</label>
                <input type="text" id="addres" name="addres" class="form-control" value="calle calle 123">
              </div>



            </fieldset>

            <!-- BOTONES -->
            <div class="button-container col-12">
              <button type="submit" id="btn-edit" class="btn btn-primary">Editar Datos</button>
              <button type="submit" id="btn-cancel" class="btn btn-danger">Cancelar</button>
              <button type="submit" id="btn-save" class="btn btn-success">Guardar</button>
            </div>

          </form>
          <div class="col-12 col-md-4 imgAndHistory-container">
            <img id="profile-img" src="img/perfil.png" alt="">
            <br>
            <a href="historial_compras.html">Ver historial de compras</a>
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