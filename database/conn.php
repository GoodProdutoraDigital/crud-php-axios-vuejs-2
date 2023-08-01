<?php

class conn {
    public static function Conectar(){
        define('url', 'localhost');
        define('user', 'root');
        define('pass', 'dA2uMelO3oVE5e3OqI4eJuvOs4zeMA');
        define('database', 'crud_vuejs');
        $opt = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        try {
            $con = new PDO("mysql:host=".url."; dbname=".database, user, pass, $opt);
            return $con;
        } catch (Exception $e) {
            die("Erro ao conectar com bando de dados: ".$e->getMessage());
        }
    }

}