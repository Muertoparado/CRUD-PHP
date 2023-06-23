<?php

namespace Config\Database;

use PDO;

class connect {
    private $dbname;
    private $host;
    private $pdo;
    private $user;
    private $password;
    private $port;
    function __construct()
    {
        //echo "asdasd";
        try {
            $this->host = $_ENV['HOST'];
            $this->dbname = $_ENV['DATABASE'];
            $this->user = $_ENV['USER'];
            $this->password = $_ENV['PASSWORD'];
            $this->port = $_ENV['PORT'];

        $dsn = "mysql:host=". $this->host . ";database=". $this->dbname;
        $this->pdo = new PDO($dsn, $this->user, $this->password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$this->pdo = new PDO("mysql:host=".$this->host.";port=".$this->port.";dbname=".$this->dbname.";user=".$this->user.";password=".$this->password);
        //$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            echo"ok";
        } catch (\PDOException $e) {
                         //  echo 'message'=> 'error conexion';
                        print_r('error'.$e->getMessage());
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