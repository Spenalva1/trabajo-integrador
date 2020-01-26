<?php

class Category
{
    private $id;
    private $name;

    public function listCateogories()
    {
        $link = Connection::connect();
        $sql = "select id, name from categories";
        $stmt = $link->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategoryById()
    {
        $id = $_GET['id'];
        $link = Connection::connect();
        $stmt = $link->prepare("select id, name from categories where id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        if ($stmt->execute()) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->setId($result["id"]);
            $this->setName($result["name"]);
        }
    }

    public function addCategory()
    {

        $name = $_POST['name'];
        $link = Connection::connect();

        $validate = Validator::validateCategoryAdd($link);

        if ($validate) {
            return $validate;
        } else {
            $stmt = $link->prepare("insert into categories values (default, :name)");
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    
            if($stmt->execute()){
                $this->setId($link->lastInsertId());
                $this->setName($name);
                return false;
            }
            return "true";
        }



    }

    public function deleteCategory()
    {
        $id = $_POST['id'];
        $link = Connection::connect();
        $stmt = $link->prepare("delete from categories where id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function modifyCategory()
    {
        $name = $_POST['name'];
        $id = $_POST['id'];
        $link = Connection::connect();

        $validate = Validator::validateCategoryAdd($link);

        if($validate){
            return $validate;
        }else{
            $stmt = $link->prepare("update categories set name = :name where id = :id");
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            if ($stmt->execute()) {
                return false;
            }
            return true;
        }


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
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
