<?php

class Database
{
    public $db;

    public function __construct()
    {
        $servername = "localhost";
        $dbname = "book_zone";
        $username = "root";
        $password = "";


        //crearemos una nueva conexión instanciando el objeto PDO
        $this->db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        //establecemos el modo PDO error a exception para poder recuperar las excepeciones
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // return $this->db;
    }

    public function connect()
    {
        return $this->db;
    }


}