<?php

class CommDB
{

    private $servername;
    private $username;
    private $password;
    private $dbname;

    protected function connect()
    {
        //the simplest way to read .env file just for the test
        $dbconfig = parse_ini_file(".env");

        $this->servername = $dbconfig('DB_HOST');
        $this->username = $dbconfig('DB_USERNAME');
        $this->password = $dbconfig('DB_PASSWORD');
        $this->dbname = $dbconfig('DB_NAME');

        try {
            return new PDO("pgsql:host={$this->servername}; dbname={$this->dbname}", "{$this->username}", "{$this->password}");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
