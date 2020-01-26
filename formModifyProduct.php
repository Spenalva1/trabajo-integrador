<?php

require 'clases/Connection.php';
require 'clases/Product.php';
require 'clases/Category.php';
require 'clases/Mark.php';
require 'clases/Validator.php';

$Mark = new Mark;
$marks = $Mark->listMarks();

$Category = new Category;
$categories = $Category->listCateogories();

if ($_GET) {
    $Product = new Product;
    $Product->getProductById();
}

if ($_POST) {
    $errors = $Product->ModifyProduct();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DHShop - admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/header-footer.css">
</head>

<body>
    <?php include 'header.php'; ?>
    <?php include 'nav.php'; ?>

    <main class="container">
        <h1>Formulario de alta de un producto</h1>

        <?php if ($_POST) { ?>
            <?php
            $mensaje = 'No se pudo agregar el Producto. ';
            $class = 'danger';
            if (!$errors) {
                $class = 'success';
                $mensaje = 'Producto "' . $Product->getName();
                $mensaje .= '" modificado con exito (id: ' . $Product->getId() . ')';
            }

            ?>
            <div class="alert alert-<?= $class; ?>">
                <?= $mensaje ?>
            </div>

            <?php if (!$errors) {
                echo '<a href="adminProducts.php">Volver</a>';
            }
            ?>


        <?php
        }

        if (!($_POST && !$errors)) {
        ?>
            <form action="" method="post" enctype="multipart/form-data">
                Nombre:
                <input value="<?php echo (isset($_POST["name"])) ? $_POST["name"] : $Product->getName() ?>" class="form-control" type="text" name="name" class="form-control" require>
                <?php echo (isset($errors["name"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["name"] . "</div>" : "" ?>
                <br><br>


                Precio:
                <input value="<?php echo (isset($_POST["price"])) ? $_POST["price"] : $Product->getPrice() ?>" type="text" name="price" class="form-control" require>
                <?php echo (isset($errors["price"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["price"] . "</div>" : "" ?>
                <br><br>



                Stock:
                <input value="<?php echo (isset($_POST["stock"])) ? $_POST["stock"] : $Product->getStock() ?>" type="number" name="stock" class="form-control" require>
                <?php echo (isset($errors["stock"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["stock"] . "</div>" : "" ?>
                <br><br>



                Descripción:
                <input value="<?php echo (isset($_POST["description"])) ? $_POST["description"] : $Product->getDescription() ?>" type="textarea" name="description" class="form-control" require>
                <?php echo (isset($errors["description"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["description"] . "</div>" : "" ?>
                <br><br>



                <img style="width: 300px" src='product_img/<?= $Product->getId()?>.jpg' alt=""> <br>
                Imagen:
                <input type="file" name="img" require>
                <?php echo (isset($errors["img"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["img"] . "</div>" : "" ?>
                <br> <br>



                Categoría:
                <select name="category">
                    <?php foreach ($categories as $category) {
                        $selected = '';
                        if ($_POST["category"] == $category["id"] || $Product->getCategory() == $category["id"]) {
                            $selected = "selected";
                        }
                        echo '<option value="' . $category["id"] . '" ' . $selected . '>' . $category["name"] . '</option>';
                    } ?>
                </select>
                <br> <br>



                Marca:
                <select name="mark">
                    <?php foreach ($marks as $mark) {
                        $selected = $Product->getMark();
                        if ($_POST["mark"] == $mark["id"] || $Product->getMark() == $mark["id"]) {
                            $selected = "selected";
                        }
                        echo '<option value="' . $mark["id"] . '" ' . $selected . '>' . $mark["name"] . '</option>';
                    } ?>
                </select>
                <br> <br>



                <input type="submit" value="Modificar">
                <input type="button" value="Volver" onclick="location.href='adminProducts.php';"> <br><br>
            </form>

        <?php } ?>

    </main>

</body>