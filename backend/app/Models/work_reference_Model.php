<?php

namespace App\Models;

use config\Database\Connection;
use PDO;
use Exception;

class work_reference_Model {
   // protected static $conx;   
    public $message;/* revisar */
    private $queryPost = 'INSTERT INTO work_reference(id,  full_name, cel_number, position, company) VALUES(:id, :name, :number, :position, :company)';
    private $queryGetAll = 'SELECT id AS "cc", full_name AS "name", cel_number AS "number", position AS "position", company AS "company" FROM work_reference';
    private $queryDelete = 'DELETE FROM work_reference WHERE id = :id';

    function __construct(private $Id, public $Full_name, private $Cel_number, private $Position, public $Company){
    }

    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
                $this->$name = $value;
        }
        throw new Exception("Propiedad invalida: " . $name);
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        throw new Exception("Propiedad invalidaa: " . $name);
    }


    public static function postWork_reference(){
        try {
            $conx = new Connection;
            $res = $conx->connect()->prepare(self::$queryPost);
            $res->bindValue("id", self::$Id);
            $res->bindValue("name", self::$Full_name);
            $res->bindValue("number", self::$Cel_number);
            $res->bindValue("position", self::$Position);
            $res->bindValue("company", self::$Company);
            $res->execute();
            self::$message = ["Code"=> 200+$res->rowCount(), "Message"=> "inserted data"];
        } catch(\PDOException $e) {
            self::$message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r(self::$message);
        }
    }

    public static function getAllWork_reference(){
        try {
            $conx = new Connection;
            $res = $conx->connect()->prepare(self::$queryGetAll);
            $res->execute();
            self::$message = ["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch(\PDOException $e) {
            self::$message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r(self::$message);
        }
    }

    public static function deleteIdWork_reference(){
        try {
            $conx = new Connection;
            $res= $conx->connect()->prepare(self::$queryDelete);
            $res->bindParam(':id', $id);
            $res->execute();
            self::$message = ["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch(\PDOException $e) {
            self::$message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r(self::$message);
        }
    }
}

?>