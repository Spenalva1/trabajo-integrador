<?php
include 'clases/Connection.php';
include 'clases/Product.php';
session_start();

$Product = new Product;
$Product->getProductById();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>DHShop - Nombre del producto</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/header-footer.css">
  <link rel="stylesheet" href="css/producto-detalle.css">
</head>

<body>

  <?php include 'header.php'; ?>
  <div class="container-fluid">
    <main>
      <section class="row product-detail">
          <img class="img-fluid img-thumbnail main-image row col-12 col-md-4" src="product_img/<?= $Product->getId() ?>.jpg" alt="">

        
        <article class="col-12 col-md-8 product-info">
          <h2><?= $Product->getName() ?></h2>
          <h3>$<?= $Product->getPrice() ?></h3>

          <div class="stock-div">
            <?php if ($Product->getStock() > 0) {
              echo '<span class="stock">En stock </span>';
            } else {
              echo '<span class="ofstock">Sin stock</span>';
            } ?>
          </div>


          <form action="">
            <div>
              <label for="">Cantidad: </label>
              <input type="number" name="quantity" min="1" max="10" value="1"><br>
            </div>
            <button type="submit" class="btn btn-primary">Agregar al carrito</button>
          </form>

        </article>
      </section>

      <section class="product-description">
        <h3>Descripcion</h3>
        <p><?= $Product->getDescription() ?></p>
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