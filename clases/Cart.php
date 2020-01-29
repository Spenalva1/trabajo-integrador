<?php
// $stock = $stock - $quantityWanted;
// $link = Connection::connect();
// $stmt = $link->prepare("update products set stock = :stock where id = :id");
// $stmt->bindParam(':stock', $stock, PDO::PARAM_STR);
// $stmt->bindParam(':id', $product_id, PDO::PARAM_STR);
// $stmt->execute();

class Cart
{
    public $id;

    public function checkOut($products) //falta qué hacer cuando no compra nada
    {
        $link = Connection::connect();
        foreach($products as $product){
            $stmt = $link->prepare("select stock from products where id = :id");
            $stmt->bindParam(':id', $product["id"], PDO::PARAM_STR);
            $stmt->execute();
            $stock = $stmt->fetch(PDO::FETCH_ASSOC)["stock"];
            if($product["quantity"] > $stock){
                $errors[] = $product["name"];
            }
        }
        if(isset($errors)){
            return $errors;
        }
        // si llega aca es porque hay stock para todo lo que pide el cliente
        
        $stmt= $link->prepare("insert into receipts values(default, :date, :customerId)"); //se crea el recibo
        $stmt->bindParam(':date', date("Y-m-d H:i:s"), PDO::PARAM_STR);
        $stmt->bindParam(':customerId', $_SESSION["customerId"], PDO::PARAM_STR);
        $stmt->execute();


        //que se guarden en receiptsProducts los productos del recibo
        


        
        $stmt= $link->prepare("delete from carts where customer_id = :customerId"); //se borran los productos comprados del carrito
        $stmt->bindParam(':customerId', $_SESSION["customerId"], PDO::PARAM_STR);
        $stmt->execute();
        header('location: index.php');
        
        return false;
    }


    public function listProducts()
    {
        $link = Connection::connect();
        $sql = "select products.id, products.name, products.price, carts.quantity 
                from products
                inner join carts on carts.product_id = products.id
                inner join customers on carts.customer_id = customers.id
                where customers.id = :customerId";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':customerId', $_SESSION["customerId"], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function addProduct($product_id, $stock)
    {
        $customer_id = $_SESSION["customerId"];
        $quantityWanted = $_POST["quantity"];
        if ($quantityWanted <= $stock) {    //existe la cantidad de stock deseada?
            $link = Connection::connect();
            $stmt = $link->prepare("select id from carts where customer_id = :customer_id and product_id = :product_id");
            $stmt->bindParam(':customer_id', $customer_id, PDO::PARAM_STR);
            $stmt->bindParam(':product_id', $product_id, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$result) {
                //entra solo si el producto no fue agregado anteriormente por el mismo usuario
                $stmt = $link->prepare("insert into carts values (default, :customer_id, :product_id, :quantityWanted)");
                $stmt->bindParam(':customer_id', $customer_id, PDO::PARAM_STR);
                $stmt->bindParam(':product_id', $product_id, PDO::PARAM_STR);
                $stmt->bindParam(':quantityWanted', $quantityWanted, PDO::PARAM_STR);
                $stmt->execute();
                header('location: carrito.php');
                return false;
            } else {
                return "El producto ya se encuentra en su carrito";
            }
        } else {
            return "No hay stock para la cantidad deseada";
        }
    }


    public function deleteProduct()
    {
        $product_id = $_POST["delete"];
        $link = Connection::connect();
        $stmt = $link->prepare("delete from carts where customer_id = :customerId and product_id = :product_id");
        $stmt->bindParam(':customerId', $_SESSION["customerId"], PDO::PARAM_STR);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_STR);
        $stmt->execute();
        header('location: carrito.php');
    }


    public function modifyCuantityOfProduct()
    {
        $customer_id = $_SESSION["customerId"];
        $quantityWanted = $_POST["quantity"];
        $product_id = $_POST["id"];
        $link = Connection::connect();
        $stmt = $link->prepare("select stock from products where id = :product_id");
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_STR);
        $stmt->execute();
        $stock = $stmt->fetch(PDO::FETCH_ASSOC)["stock"];
        if ($quantityWanted <= $stock) {
            $stmt = $link->prepare("update carts set quantity = :quantityWanted where product_id = :product_id and customer_id = :customer_id");
            $stmt->bindParam(':quantityWanted', $quantityWanted, PDO::PARAM_STR);
            $stmt->bindParam(':product_id', $product_id, PDO::PARAM_STR);
            $stmt->bindParam(':customer_id', $customer_id, PDO::PARAM_STR);
            $stmt->execute();
        }
        header('location: carrito.php');
    }

    public function getTotalPrice()
    {
        $products = $this->listProducts();
        $total = 0;
        foreach ($products as $product) {
            $total += $product["price"] * $product["quantity"];
        }
        return round($total, 2);
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
}
