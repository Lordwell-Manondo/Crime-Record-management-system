<?php
class Connection {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbName = "crms";

    public function connect() {
        $conn = new mysqli($this->host, $this->username, $this->password, $this->dbName);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }
}
