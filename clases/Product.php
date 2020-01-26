<?php

class Product
{
    private $id;
    private $name;
    private $price;
    private $stock;
    private $description;
    private $mark;
    private $category;

    public function listProducts()
    {
        $link = Connection::connect();
        $sql = "select products.id, products.name, products.price, products.stock, products.description, marks.name as mark, categories.name as category 
                from products
                inner join marks on products.mark_id = marks.id
                inner join categories on products.category_id = categories.id";
        $stmt = $link->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addProduct()
    {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $description = $_POST['description'];
        $category_id = $_POST['category'];
        $mark_id = $_POST['mark'];

        

        $link = Connection::connect();
        $errors = Validator::validateProductAdd($link);

        if ($errors) {
            return $errors;
        } else {
            $stmt = $link->prepare("insert into products values (default, :name, :price, :stock, :description, :mark_id, :category_id)");
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':price', $price, PDO::PARAM_STR);
            $stmt->bindParam(':stock', $stock, PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->bindParam(':mark_id', $mark_id, PDO::PARAM_STR);
            $stmt->bindParam(':category_id', $category_id, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $this->setName($name);
                $this->setId($link->lastInsertId());
                move_uploaded_file($_FILES["img"]["tmp_name"], 'product_img/' . $link->lastInsertId() . '.jpg');
                return false;
            }
            return true;
        }
    }

    public function deleteProduct()
    {
        $id = $_POST['id'];
        $link = Connection::connect();
        $stmt = $link->prepare("delete from products where id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function getProductById(){
        $id = $_GET['id'];
        $link = Connection::connect();
        $stmt = $link->prepare("select id, name, price, stock, description, mark_id, category_id from products where id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        if ($stmt->execute()) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->setId($result["id"]);
            $this->setName($result["name"]);
            $this->setprice($result["price"]);
            $this->setStock($result["stock"]);
            $this->setDescription($result["description"]);
            $this->setMark($result["mark_id"]);
            $this->setCategory($result["category_id"]);
        }
    }

    public function modifyProduct(){
        $id = $this->getId();
        $name = $_POST['name'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $description = $_POST['description'];
        $category_id = $_POST['category'];
        $mark_id = $_POST['mark'];

        

        $link = Connection::connect();
        $errors = Validator::validateProductAdd($link, $this->getName());

        if ($errors) {
            return $errors;
        } else {
            $stmt = $link->prepare("update products set 
                                    name = :name,
                                    price = :price,
                                    stock = :stock,
                                    description = :description,
                                    mark_id = :mark_id,
                                    category_id = :category_id
                                    where id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':price', $price, PDO::PARAM_STR);
            $stmt->bindParam(':stock', $stock, PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->bindParam(':mark_id', $mark_id, PDO::PARAM_STR);
            $stmt->bindParam(':category_id', $category_id, PDO::PARAM_STR);

            if ($stmt->execute()) {
                if(!$this->getName()){                  //entra a este if solo si se esta agregando un nuevo producto
                    $this->setName($name);
                    $this->setId($link->lastInsertId());
                }
                if($_FILES["img"]){
                    move_uploaded_file($_FILES["img"]["tmp_name"], 'product_img/' . $this->getid() . '.jpg');
                }
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

    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of stock
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     *
     * @return  self
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of mark
     */
    public function getMark()
    {
        return $this->mark;
    }

    /**
     * Set the value of mark
     *
     * @return  self
     */
    public function setMark($mark)
    {
        $this->mark = $mark;

        return $this;
    }

    /**
     * Get the value of category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }
}
