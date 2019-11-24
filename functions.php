<?php 

function validateInput($errors, $name){
    if (isset($errors[$name])){
        return 'is-invalid';
    }else{
        return 'is-valid';
    }
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

function getUserById($users, $id){
    foreach ($users as $user) {
        if ($user["id"] == $id){
            return $user;
        }
    }
    return null;
}


function getUserByEmail($users, $email){
    foreach ($users as $user) {
        if ($user["email"] == $email){
            return $user;
        }
    }
    return null;
}

function getUserByDni($users, $dni){
    foreach ($users as $user) {
        if ($user["dni"] == $dni){
            return $user;
        }
    }
    return null;
}

?>
