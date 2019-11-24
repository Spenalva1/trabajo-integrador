<?php 

function validateInput($errors, $name){
    if (isset($errors[$name])){
        return 'is-invalid';
    }else{
        return 'is-valid';
    }
}

function checkIfAvailableByUsername($array, $username){
    foreach ($array as $user) {
        if ($user["username"] == $username){
            return false;
        }
    }
    return true;
}

function checkIfAvailableByEmail($array, $email){
    foreach ($array as $user) {
        if ($user["email"] == $email){
            return false;
        }
    }
    return true;
}

function checkIfAvailableByDni($array, $dni){
    foreach ($array as $user) {
        if ($user["dni"] == $dni){
            return false;
        }
    }
    return true;
}


?>