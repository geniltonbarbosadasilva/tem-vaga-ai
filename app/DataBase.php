<?php

class DataBase {
    private $servername = "localhost";
    private $username = "genilton";
    private $password = "2528";
    private $database = "temvaga";
    private $connection;

    public function __construct() {
        $this->connection = $this->connect();
    }

    public function __destruct() {
        $this->connection->close();
    }

    public function connect()
    {
        // Create connection
        $connection = new mysqli($this->servername, $this->username, $this->password, $this->database);
    
        // Check connection
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error. "<br>");
        } 
        return $connection;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}

