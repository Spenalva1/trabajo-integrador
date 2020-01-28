<?php
include 'clases/Session.php';
include 'clases/Cart.php';
include 'clases/Connection.php';

if (!Session::checkIfCustomerIsLogged()) {
  header('location: index.php');
}


$Cart = new Cart;
$products = $Cart->listProducts();

if ($_POST) {
  if (isset($_POST["delete"])) {
    $Cart->deleteProduct();
  }else{
    $Cart->modifyCuantityOfProduct();
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>DHShop - Carrito</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/header-footer.css">
  <link rel="stylesheet" href="css/carrito.css">
</head>

<body>

  <?php include 'header.php'; ?>

  <div class="container-fluid">
    <main class="row">
      <section class="products-list col-12 col-md-7">

        <?php foreach ($products as $product) {
          echo '<article class="row product-added">';
          echo '<img class="col-3 img-fluid img-thumbnail" src="product_img/' . $product["id"] . '.jpg" alt="">';
          echo '<div class="col-7 product-added-info">';
          echo '<h4>' . $product["name"] . '</h4>';
          echo '<form method="post">';
          echo '<input style="display: none" name="id" value="' . $product["id"] . '"></input>';
          echo 'Cantidad: <input type="number" name="quantity" min="1" max="50" value="' . $product["quantity"] . '">   ';
          echo '<input type="submit" value="modificar">';
          echo '</form>';
          echo '<span class="price">$' . $product["price"] . '</span>';
          echo '</div>';
          echo '<div class="remove-btn col-2">';
          echo '<form method="post">';
          echo '<input style="display: none" name="delete" value="' . $product["id"] . '"></input>';
          echo '<button type="submit" class="btn btn-danger">Quitar</button><br>';
          echo '</form>';
          echo '</div>';
          echo '</article>';
        } ?>

      </section>

      <section class="proceder col-12 col-md-5">
        <form action="">
          <span class="total-price-label">Total: </span> <span class="total-price">$<?= $Cart->getTotalPrice() ?> </span>
          <br>
          <button type="button" class="btn btn-success">Proceder a pagar</button>
          <form action=""></form>
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