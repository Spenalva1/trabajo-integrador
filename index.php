<?php


include 'functions.php';

if ($_POST) {
  $emails = file_get_contents("newsletter.json");
  $emails = json_decode($emails, true);


  if (strlen($_POST["email"]) == 0) {
    $errors["email"] = "Completar campo";
  } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $errors["email"] = "Formato de email incorrecto";
  }else if (!checkIfAvailableByEmail($emails, $_POST["email"])) {
    $errors["email"] = "";
  } else {
    $newEmail["email"] = $_POST["email"];
  }

  if (!isset($errors)) {
    $emails[] = $newEmail;
    $emails = json_encode($emails);
    file_put_contents("newsletter.json", $emails);
  }
}

session_start();






?>










<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>DHShop - Home</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/header-footer.css">
  <link rel="stylesheet" href="css/index.css">
</head>

<body>

  <?php include 'header.php'; ?>




  <div class="container-fluid">
    <h1>DHShop</h1>
    <main>
      <section class="row carousel">
        <article class="col-12">
          <h2>NOVEDADES</h2>
        </article>
        <div class="bd-example">
          <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="img/carousel-1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block first-item">
                  <h5>First slide label</h5>
                  <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="img/carousel-2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block second-item">
                  <h5>Second slide label</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="img/carousel-3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block third-item">
                  <h5>Third slide label</h5>
                  <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
              <span class="carousel-control-next-icon" id="avanzar" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </section>

      <hr>

      <section class="cards">
        <h2>Por qué comprar en DHShop</h2>
        <article class="card" id="card1 row">
          <div class="card-image col-ms-12 col-md-6">
            <img src="img/card1.jpg" alt="">
          </div>
          <div class="card-text col-ms-12 col-md-6">
            <h3>Variedad de productos</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos perspiciatis commodi corrupti aliquid
              pariatur, impedit error dicta? Harum doloremque ea delectus natus laudantium a voluptas officiis quod,
              deleniti mollitia eum?</p>
          </div>
        </article>
        <article class="card" id="card2 row">
          <div class="card-text col-ms-12 col-md-6">
            <h3>La mejor calidad</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos perspiciatis commodi corrupti aliquid
              pariatur, impedit error dicta? Harum doloremque ea delectus natus laudantium a voluptas officiis quod,
              deleniti mollitia eum?</p>
          </div>
          <div class="card-image col-ms-12 col-md-6">
            <img src="img/card1.jpg" alt="">
          </div>
        </article>
        <article class="card" id="card3 row">
          <div class="card-image col-ms-12 col-md-6">
            <img src="img/card1.jpg" alt="">
          </div>
          <div class="card-text col-ms-12 col-md-6">
            <h3>Envíos a todo el país</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos perspiciatis commodi corrupti aliquid
              pariatur, impedit error dicta? Harum doloremque ea delectus natus laudantium a voluptas officiis quod,
              deleniti mollitia eum?</p>
          </div>
        </article>
      </section>

      <hr>




      <section class="newsletter">
        <h2>Newsletter</h2>

        <form method="post" action="">
          <h3>Subscribete para enterarte de todas las novedades</h3>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input name="email" type="email" class="form-control" id="inputEmail3" placeholder="Email">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Subscribirme</button>
            </div>
          </div>
        </form>

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