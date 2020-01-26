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

if ($_POST) {
    $Product = new Product;
    $errors = $Product->addProduct();
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
                $mensaje = 'Producto ' . $Product->getName();
                $mensaje .= ' agregada con exito (id: ' . $Product->getId() . ')';
            }

            ?>
            <div class="alert alert-<?= $class; ?>">
                <?= $mensaje ?>
            </div>

            <?php if (!$errors) {
                echo '<a href="formAddProduct.php">Agregar otro producto</a>';
            }
            ?>


        <?php
        }

        if (!($_POST && !$errors)) {
        ?>
            <form action="" method="post" enctype="multipart/form-data">
                Nombre:
                <input value="<?php echo (isset($_POST["name"])) ? $_POST["name"] : "" ?>" class="form-control" type="text" name="name" class="form-control" require>
                <?php echo (isset($errors["name"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["name"] . "</div>" : "" ?>
                <br><br>


                Precio:
                <input value="<?php echo (isset($_POST["price"])) ? $_POST["price"] : "" ?>" type="text" name="price" class="form-control" require>
                <?php echo (isset($errors["price"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["price"] . "</div>" : "" ?>
                <br><br>



                Stock:
                <input value="<?php echo (isset($_POST["stock"])) ? $_POST["stock"] : "" ?>" type="number" name="stock" class="form-control" require>
                <?php echo (isset($errors["stock"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["stock"] . "</div>" : "" ?>
                <br><br>



                Descripción:
                <input value="<?php echo (isset($_POST["description"])) ? $_POST["description"] : "" ?>" type="textarea" name="description" class="form-control" require>
                <?php echo (isset($errors["description"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["description"] . "</div>" : "" ?>
                <br><br>



                Imagen:
                <input type="file" name="img" require>
                <?php echo (isset($errors["image"])) ? "<div class='invalid-feedback' style='display: block'>" . $errors["image"] . "</div>" : "" ?>
                <br> <br>



                Categoría:
                <select name="category">
                    <?php foreach ($categories as $category) {
                         $selected = '';
                         if (isset($_POST["category"])) {
                             if ($_POST["category"] == $category["id"]){
                                 $selected = "selected";
                             }
                         }
                        echo '<option value="' . $category["id"] . '" ' . $selected . '>' . $category["name"] . '</option>';
                    } ?>
                </select>
                <br> <br>



                Marca:
                <select name="mark">
                    <?php foreach ($marks as $mark) {
                        $selected = '';
                        if (isset($_POST["mark"])) {
                            if ($_POST["mark"] == $mark["id"]){
                                $selected = "selected";
                            }
                        }
                        echo '<option value="' . $mark["id"] . '" ' . $selected . '>' . $mark["name"] . '</option>';
                    } ?>
                </select>
                <br> <br>



                <input type="submit" value="Agregar">
                <input type="button" value="Volver" onclick="location.href='adminProducts.php';">
            </form>

        <?php } ?>

    </main>

</body>