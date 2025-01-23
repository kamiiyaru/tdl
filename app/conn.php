<?php

class Koneksi {
    private $connection;

    public function __construct() {
        // Configure your database connection
        $this->connection = new mysqli("localhost", "root", "", "tdl");

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function conn() {
        return $this->connection;
    }
}