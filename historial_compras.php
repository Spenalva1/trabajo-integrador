<?php
  session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>DHShop - Compras</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/header-footer.css">
  <link rel="stylesheet" href="css/historial_compras.css">
</head>

<body>

  <?php include 'header.php'; ?>

  <div class="container-fluid">

    <main>
      <section class="row">
        <h2 class="col-12 col-sm-6">Historial de compras</h2>

        <div class="col-12 col-sm-3 ml-auto linkToPerfil">
          <a href="perfil.html">Volver al perfil</a>
        </div>

      </section>
      <section class="products-list col-12 ">
        <article class="col row product-added">
          <img class="col-12 col-sm-3 img-fluid img-thumbnail" src="img/product.jpg" alt="">
          <div class="col-12 col-sm-5 product-added-info">
            <h4>Nombre del producto</h4>
            <div class="quantity-container"><span class="quantity-label">Cantidad: </span><span class="quantity">5</span></div>
            <span class="price">Total: $$$$$$</span>
          </div>
          <div class="purchase-date col-12 col-sm-4">
            <span>Comprasdo el: DD/MM/AAAA</span>
          </div>
        </article>
        <article class="col row product-added">
          <img class="col-12 col-sm-3 img-fluid img-thumbnail" src="img/product.jpg" alt="">
          <div class="col-12 col-sm-5 product-added-info">
            <h4>Nombre del producto</h4>
            <div class="quantity-container"><span class="quantity-label">Cantidad: </span><span class="quantity">5</span></div>
            <span class="price">Total: $$$$$$</span>
          </div>
          <div class="purchase-date col-12 col-sm-4">
            <span>Comprasdo el: DD/MM/AAAA</span>
          </div>
        </article>
        <article class="col row product-added">
          <img class="col-12 col-sm-3 img-fluid img-thumbnail" src="img/product.jpg" alt="">
          <div class="col-12 col-sm-5 product-added-info">
            <h4>Nombre del producto</h4>
            <div class="quantity-container"><span class="quantity-label">Cantidad: </span><span class="quantity">5</span></div>
            <span class="price">Total: $$$$$$</span>
          </div>
          <div class="purchase-date col-12 col-sm-4">
            <span>Comprasdo el: DD/MM/AAAA</span>
          </div>
        </article>
        <article class="col row product-added">
          <img class="col-12 col-sm-3 img-fluid img-thumbnail" src="img/product.jpg" alt="">
          <div class="col-12 col-sm-5 product-added-info">
            <h4>Nombre del producto</h4>
            <div class="quantity-container"><span class="quantity-label">Cantidad: </span><span class="quantity">5</span></div>
            <span class="price">Total: $$$$$$</span>
          </div>
          <div class="purchase-date col-12 col-sm-4">
            <span>Comprasdo el: DD/MM/AAAA</span>
          </div>
        </article>
        <article class="col row product-added">
          <img class="col-12 col-sm-3 img-fluid img-thumbnail" src="img/product.jpg" alt="">
          <div class="col-12 col-sm-5 product-added-info">
            <h4>Nombre del producto</h4>
            <div class="quantity-container"><span class="quantity-label">Cantidad: </span><span class="quantity">5</span></div>
            <span class="price">Total: $$$$$$</span>
          </div>
          <div class="purchase-date col-12 col-sm-4">
            <span>Comprasdo el: DD/MM/AAAA</span>
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