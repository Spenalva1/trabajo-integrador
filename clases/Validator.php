<?php

class Validator
{
    public static function validateForgottenPass()
    {
        $email = $_POST["email"];
        if (strlen($_POST["email"]) == 0) {
            $errors["email"] = "Completar campo";
        } else {
            $link = Connection::connect();
            $stmt = $link->prepare("select id from customers where email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return false;
            }
            $errors["email"] = "El email ingresado no se encuentra registrado";
        }
        return $errors;
    }

    public static function validateCustomerLogIn($link)
    {
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (strlen($email) == 0) {
            $errors["email"] = 'Completar campo';
        } else {
            $stmt = $link->prepare("select id, password from customers
                                where email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$result) {
                $errors["email"] = 'El email ingresado no se encuentra registrado';
            }
        }

        if (strlen($password) == 0) {
            $errors["password"] = 'completar campo';
        }

        if (!isset($errors)) {
            if (password_verify($password, $result["password"])) {
                $errors["ok"] = $result["id"];
            }
            $errors["password"] = "contraseña incorrecta";
        }

        return $errors;
    }



    public static function validateProductAdd($link, $modified = null) //$modified tendra un valor no null solo cuando se este modificando un producto
    {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $mark = $_POST['mark'];

        if (strlen($name) == 0) {                                                           //lleno el campo?
            $errors['name'] = 'Completar campo';
        } else if (!($modified == $name)) {     //se esta modificando un producto sin modificar su nombre?

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
        } else if (!$modified) {                                         // no se subio el archivo y tampoco se esta modificando un producto?
            $errors["image"] = "No se subió ningún archivo";
        }

        if (isset($errors)) {
            return $errors;
        }
        return false;
    }


    public static function validateCustomerAdd($link, $modified = null)  //$modified tendra un valor no null solo cuando se este modificando un producto
    {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $repassword = $_POST["repassword"];
        $birthdate = $_POST["birthdate"];
        $phone = $_POST["phone"];
        $dni = $_POST["dni"];
        $address = $_POST["address"];

        if (strlen($first_name) == 0) {
            $errors["first_name"] = "Completar campo";
        }

        if (strlen($last_name) == 0) {
            $errors["last_name"] = "Completar campo";
        }

        if (strlen($email) == 0) {
            $errors["email"] = "Completar campo";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Formato de email incorrecto";
        } else if (!($modified["email"] == $email)) { //se esta modificando un cliente sin modificar su email?

            // si entra aca significa que se está agregando un cliente o que se esta modificando el email de un cliente

            $stmt = $link->prepare("select email from customers where email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {                                                    // ya existe un cliente con ese email?
                $errors["email"] = "El email ya se encuentra en uso";
            }
        }



        if (!$modified) {
            if (strlen($password) == 0) {
                $errors["password"] = "Completar campo";
            } else if (strlen($password) < 8) {
                $errors["password"] = "La contraseña debe tener al menos 8 caracteres";
            } else if ($password != $repassword) {
                $errors["repassword"] = "Las contraseñas no coinciden";
            }
        }



        if ($_FILES["img"]["error"] === UPLOAD_ERR_OK) {
            $ext = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
            if ($ext != "jpg") {
                $errors["img"] = "El archivo debe ser '.jpg'";
            }
        }


        if (strlen($dni) == 0) {
            $errors["dni"] = "Completar campo";
        } else if (!is_numeric($dni)) {
            $errors["dni"] = "Debe ingresar un valor numérico";
        } else if (!($modified["dni"] == $dni)) { //se esta modificando un cliente sin modificar su dni?

            // si entra aca significa que se está agregando un cliente o que se esta modificando el dni de un cliente
            $stmt = $link->prepare("select dni from customers where dni = :dni");
            $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {                                                    // ya existe un cliente con ese dni?
                $errors["dni"] = "El dni ya se encuentra en uso";
            }
        }

        if (strlen($birthdate) == 0) {
            $errors["birthdate"] = "Completar campo";
        } else {
            $birthdate = strtotime(date('Y-m-d', strtotime($birthdate)) . " +18 years");
            if ($birthdate < time()) {
                $newUser["birthdate"] = $birthdate;
            } else {
                $errors["birthdate"] = "Debes ser mayor a 18 años";
            }
        }

        if (strlen($phone) == 0) {
            $errors["phone"] = "Completar campo";
        } else if (!is_numeric($phone)) {
            $errors["phone"] = "Debe ingresar un valor numérico";
        }

        if (strlen($address) == 0) {
            $errors["address"] = "Completar campo";
        }


        if (isset($errors)) {
            return $errors;
        }

        return false;
    }


    public static function validateMarkAdd($link)
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
}
