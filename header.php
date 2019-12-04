<?php

if ($_SESSION) {

  $head[] = [
    "href" => "perfil.php",
    "text" => "Mi perfil"
  ];
  $head[] = [
    "href" => "carrito.php",
    "text" => "Carrito"
  ];
  
} else {

  $head[] = [
    "href" => "registro.php",
    "text" => "Crear cuenta"
  ];
  $head[] = [
    "href" => "ingreso.php",
    "text" => "Ingresar"
  ];

}

?>

<header>
  <section class='logo-usuario'>
    <article class='logo'>
      <a href='index.php'><img src='img/logo-dh.PNG' alt=''></a>
    </article>
    <article class='usuario-acciones'>
      <a href='<?= $head[0]["href"] ?>' id='registrarme'><?= $head[0]["text"] ?></a>
      <a href='<?= $head[1]["href"] ?>' id='ingresar'><?= $head[1]["text"] ?></a>
    </article>
  </section>
  <hr>
  <nav id='nav' class='navbar navbar-expand-lg navbar-light '>
    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
      <span class='navbar-toggler-icon'></span>
    </button>

    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
      <ul class='navbar-nav mr-auto'>
        <li class='nav-item active'>
          <a class='nav-link' href='index.php'>Home <span class='sr-only'>(current)</span></a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='producto-lista.php'>Productos</a>
        </li>
        <li class='nav-item '>
          <a class='nav-link' href='contacto.php'>Contacto</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='faq.php'>Ayuda</a>
        </li>
      </ul>
      <form class='form-inline my-2 my-lg-0'>
        <input class='form-control mr-sm-2' type='search' placeholder='Search' aria-label='Search'>
        <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Buscar</button>
      </form>
    </div>
  </nav>
  <hr>
</header>