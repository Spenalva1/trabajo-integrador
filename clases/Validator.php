<?php

class Validator{
    
    static function validateMarkAdd($link){

        $name = $_POST['name'];

        $stmt = $link->prepare("select name from marks where name = :name");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        
        
        if($result){
            return 'La marca "' . $result['name'] . '" ya ha sido agregada';
        }else{
            return false;
        }
    }

}
