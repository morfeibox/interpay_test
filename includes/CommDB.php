<?php

class CommDB {

    private $servername;
    private $username;
    private $password;
    private $dbname;

    protected function connect() {
        $this->servername = "localhost";
        $this->username = "postgres";
        $this->password = "root";
        $this->dbname = "postgres";
        return new PDO("pgsql:host={$this->servername}; dbname={$this->dbname}", "{$this->username}", "{$this->password}");
    }


}