<?php

class DataBase {
    private $servername = "localhost";
    private $username = "admin";
    private $password = "password";
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
        $connection = new Mysqli($this->servername, $this->username, $this->password, $this->database);
    
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

