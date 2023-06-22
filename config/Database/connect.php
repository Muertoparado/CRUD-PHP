<?php

namespace Config\Database;

use PDO;

class connect {
    private $dbname;
    private $host;
    private $pdo;
    private $user;
    private $password;
    function __construct()
    {
        try {
            $this->host = $_ENV['host'];
            $this->dbname = $_ENV['database'];
            $this->user = $_ENV['user'];
            $this->password = $_ENV['password'];

            $dsn = "mysql:host=". $this->host .";database=". $this->dbname;
            $this->pdo = new PDO($dsn, $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            
           // $this->conx = new PDO($this->driver.":host=".$this->__get('host').";port=".$this->port.";dbname=".$this->__get('dbname').";user=".$this->user.";password=".$this->password);
           // $this->conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            return [
                'message'=> 'error conexion',
                'error'=> $e->getMessage(),
            ];
        }
    }

    public function connect(){
        try {
            return $this->pdo;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function disconect(){
        $this->pdo=null;
    }
}
?>