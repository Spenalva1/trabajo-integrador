<?php

class Connection
{
    static function connect()
    {
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        $link = new PDO(
            'mysql:host=localhost;dbname=dhshop', 
            'root', 
            ''
            );
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return $link;
    }
}
