<?php

class DbConnection
{
    private $ip = "sql11.freemysqlhosting.net";
    private $name = "sql11503433";
    private $password = "mj3S4XwW68";
    private $database = "sql11503433";

    public function getConnection()
    {
        return mysqli_connect($this->ip, $this->name, $this->password, $this->database);
    }
}
