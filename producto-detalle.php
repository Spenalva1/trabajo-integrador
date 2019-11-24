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
        <article class="row col-12 col-md-4 product-images">
          <img class="img-fluid img-thumbnail main-image" src="img/product.jpg" alt="">
          <div class="col-3">
            <img class="img-fluid img-thumbnail" src="img/product.jpg" alt="">
          </div>
          <div class="col-3">
            <img class="img-fluid img-thumbnail" src="img/product.jpg" alt="">
          </div>
          <div class="col-3">
            <img class="img-fluid img-thumbnail" src="img/product.jpg" alt="">
          </div>
          <div class="col-3">
            <img class="img-fluid img-thumbnail" src="img/product.jpg" alt="">
          </div>
        </article>

        <article class="col-12 col-md-8 product-info">
          <h2>Nombre del producto</h2>
          <h3>$$$$$$$$</h3>
          <div class="stock-div">
            <span class="stock">En stock </span> / <span class="ofstock">Sin stock</span>
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
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, mollitia minima? Nam, tempora veritatis quam
          commodi autem illo. Aliquid eius sint tempora libero reprehenderit voluptas doloribus. Aspernatur ex optio
          maiores reprehenderit. Harum laudantium nam amet ducimus vitae! Ipsa rerum tempore consequatur in illum, nobis
          eveniet delectus sit adipisci culpa quis impedit reiciendis dolore, minima sint nihil porro officiis est
          praesentium consequuntur repellendus. Sapiente dolorum pariatur, fugiat maxime debitis at? Aut exercitationem
          quis soluta sed fugiat veritatis inventore dignissimos. Placeat labore numquam cupiditate facere blanditiis
          quisquam, dolor perferendis molestiae deleniti a accusantium modi fugit accusamus recusandae nulla fugiat?
          Perferendis, cum! Natus placeat corporis, deserunt porro repudiandae amet cumque ipsam reiciendis odio ut
          alias illo distinctio vel eveniet aspernatur consequuntur hic praesentium itaque provident? Laboriosam quas
          assumenda beatae incidunt eveniet excepturi quam minima, magni illo corporis placeat at officia provident
          illum eaque veniam alias amet aliquid recusandae fugit. Provident optio ex tenetur. Voluptate ratione nihil
          dolorem sequi reprehenderit? Asperiores error placeat adipisci reprehenderit molestias quas aliquam ipsa
          aperiam perspiciatis, nisi possimus impedit quibusdam veritatis fuga ea illo voluptate, temporibus velit
          officiis. Molestias mollitia, nostrum, eligendi neque architecto enim officiis placeat error sunt iste
          veritatis ex quisquam ipsa laboriosam! Accusantium dolores libero ducimus!</p>
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