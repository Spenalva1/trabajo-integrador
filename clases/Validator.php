<?php

class Validator
{
    static function validateMarkAdd($link)
    {

        $name = $_POST['name'];

        $stmt = $link->prepare("select name from marks where name = :name");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);



        if ($result) {
            return 'La marca "' . $result['name'] . '" ya ha sido agregada';
        } else {
            return false;
        }
    }

    static function validateCategoryAdd($link)
    {

        $name = $_POST['name'];

        $stmt = $link->prepare("select name from categories where name = :name");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);



        if ($result) {
            return 'La categoría "' . $result['name'] . '" ya ha sido agregada';
        } else {
            return false;
        }
    }


    static function validateProductAdd($link, $modified = null) //$modified tendra un valor no null solo cuando se este modificando un producto
    {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $mark = $_POST['mark'];

        if (strlen($name) == 0) {                                                           //lleno el campo?
            $errors['name'] = 'Completar campo';
        } else if(!($modified == $name)){     //se esta modificando un producto sin modificar su nombre?
            
            // si entra aca significa que se está agregando un producto o que se esta modificando el nombre de un producto

            $stmt = $link->prepare("select name from products where name = :name");
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);


            if ($result) {                                                    // ya existe un producto con ese nombre?
                $errors['name'] = 'Ya existe un producto con ese nombre';
            }
        }

        if (strlen($price) == 0) {                                                     //lleno el campo?
            $errors['price'] = 'Completar campo';
        } else if ($price <= 0) {                                                      //ingreso un valor positivo? 
            $errors['price'] = 'Debe ingresar un valor positivo';
        }

        if (strlen($stock) == 0) {                                                     //lleno el campo?
            $errors['stock'] = 'Completar campo';
        }

        if (strlen($description) == 0) {                                                     //lleno el campo?
            $errors['description'] = 'Completar campo';
        }


        if ($_FILES["img"]["error"] === UPLOAD_ERR_OK) {                // error en la subida del archivo?
            $ext = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
            if ($ext != "jpg") {
                $errors["img"] = "El archivo debe ser '.jpg'";
            }
        } else if (!$modified){                                         // no se subio el archivo y tampoco se esta modificando un producto?
            $errors["image"] = "No se subió ningún archivo";
        }

        if (isset($errors)) {
            return $errors;
        }
        return false;
    }
}
