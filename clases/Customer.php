<?php

class Customer
{
    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $password;
    private $birthdate;
    private $phone;
    private $dni;
    private $address;

    public function listCustomers()
    {
        $link = Connection::connect();
        $sql = "select * from customers";
        $stmt = $link->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function addCustomer()
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

        $link = Connection::connect();
        $errors = Validator::validateCustomerAdd($link);

        if ($errors) {
            return $errors;
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $link->prepare("insert into customers values (default, :first_name, :last_name, :email, :password, :birthdate, :phone, :dni, :address)");

            $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
            $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $hash, PDO::PARAM_STR);
            $stmt->bindParam(':birthdate', $birthdate, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
            $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
            $stmt->bindParam(':address', $address, PDO::PARAM_STR);

            if ($stmt->execute()) {
                move_uploaded_file($_FILES["img"]["tmp_name"], 'profile_img/' . $link->lastInsertId() . '.jpg');
                header("location: ingreso.php");
                return false;
            }
            return true;
        }
    }

    public static function forgottenPass(){
        $errors = Validator::validateForgottenPass();
        if(!$errors){
            $email = $_POST["email"];
            $newPass = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(15/strlen($x)) )),1,15);
            $hash = password_hash($newPass, PASSWORD_DEFAULT);
            $link = Connection::connect();
            $stmt = $link->prepare("update customers set password = :hash where email = :email");
            $stmt->bindParam(':hash', $hash, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            
            return ["newPass" => $newPass];
        }
        return $errors;
    }

    public function getCustomerById($id)
    {
        $link = Connection::connect();
        $stmt = $link->prepare("select * from customers where id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        if ($stmt->execute()) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->setId($result["id"]);
            $this->setFirst_name($result["first_name"]);
            $this->setLast_name($result["last_name"]);
            $this->setEmail($result["email"]);
            $this->setPassword($result["password"]);
            $this->setBirthdate($result["birthdate"]);
            $this->setPhone($result["phone"]);
            $this->setDni($result["dni"]);
            $this->setAddress($result["address"]);
        }
    }


    public function modifyCustomer()
    {
        $id = $this->getId();
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $repassword = $_POST["repassword"];
        $birthdate = $_POST["birthdate"];
        $phone = $_POST["phone"];
        $dni = $_POST["dni"];
        $address = $_POST["address"];

        $modified = [
            "email" => $this->getEmail(),
            "dni" =>  $this->getDni()
        ];

        

        $link = Connection::connect();
        $errors = Validator::validateCustomerAdd($link, $modified);

        if ($errors) {
            return $errors;
        } else {
            if(strlen($password) > 0){
                $hash = password_hash($password, PASSWORD_DEFAULT);
            }else{
                echo 'hola';
                $hash = $this->getPassword();
            }
            $stmt = $link->prepare("update customers set 
                                    first_name = :first_name,
                                    last_name = :last_name,
                                    email = :email,
                                    password = :password,
                                    birthdate = :birthdate,
                                    phone = :phone,
                                    dni = :dni,
                                    address = :address
                                    where id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
            $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $hash, PDO::PARAM_STR);
            $stmt->bindParam(':birthdate', $birthdate, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
            $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
            $stmt->bindParam(':address', $address, PDO::PARAM_STR);

            if ($stmt->execute()) {
                if($_FILES["img"]){
                    move_uploaded_file($_FILES["img"]["tmp_name"], 'profile_img/' . $this->getid() . '.jpg');
                }
                return false;
            }
            return true;
        }
    }

    public function deleteCustomer()
    {
        $id = $_POST['id'];
        $link = Connection::connect();
        $stmt = $link->prepare("delete from customers where id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }





    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of first_name
     */
    public function getFirst_name()
    {
        return $this->first_name;
    }

    /**
     * Set the value of first_name
     *
     * @return  self
     */
    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * Get the value of last_name
     */
    public function getLast_name()
    {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     *
     * @return  self
     */
    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of birthdate
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set the value of birthdate
     *
     * @return  self
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get the value of phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of dni
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set the value of dni
     *
     * @return  self
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }
}
