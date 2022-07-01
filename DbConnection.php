<?php

class DbConnection
{
    private $ip = "127.0.0.1";
    private $name = "root";
    private $password = "";
    private $database = "product_list";

    public function getConnection()
    {
        return mysqli_connect($this->ip, $this->name, $this->password, $this->database);
    }
}
