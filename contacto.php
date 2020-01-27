<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>DHShop - Contacto</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/header-footer.css">
  <link rel="stylesheet" href="css/contacto.css">
  <script src="https://kit.fontawesome.com/67f61afa3e.js" crossorigin="anonymous"></script>
</head>

<body>

  <?php include 'header.php'; ?>

  <div class="container-fluid">
    <main>
      <form class="contact" action="">
        <h1>Contactate con nosotros</h1>


        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm"><b>Nombre</b></span>
          </div>
          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm"><b>Correo electrónico</b></span>
          </div>
          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>

        <p><b>Mensaje</b></p>

        <textarea class="form-control" aria-label="With textarea"></textarea>

        <button class="btn btn-primary" type="submit">Enviar</button>
      </form>

      <div class="info">
        <p><b>También podés contactarnos por:</b></p><br>
        <ul>
          <li><i class="fas fa-envelope"></i>
            DHShop@gmail.com</li>
          <li><i class="fab fa-facebook-square"></i>
            DHShop</li>
          <li><i class="fab fa-instagram"></i>
            DHShop</li>
          <li><i class="fab fa-whatsapp"></i>
            (011) 15-1234-5678</li>
          <li><i class="fas fa-phone"></i>
            (011) 1234-5678</li>

        </ul>

      </div>

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