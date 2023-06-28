<?php

namespace App\Models;

use Config\Database\Connection;
use PDO;
use Exception;

class personal_ref_Model {
   // protected static $conx;   
    public $message;/* revisar */
    private $queryPost = 'INSTERT INTO personal_ref(id,  full_name, cel_number, relationship, company) VALUES(:id, :name, :number, :relationship, :ocupation)';
    private $queryGetAll = 'SELECT id AS "cc", full_name AS "name", cel_number AS "number", relationship AS "relationship", ocupation AS "ocupation" FROM personal_ref';
    private $queryDelete = 'DELETE FROM personal_ref WHERE id = :id';


    function __construct(private $Id, public $Full_name, private $Cel_number, private $Relationship, public $Company){
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


    public static function postPersonalRef(){
        try {
            $conx = new Connection;
            $res = $conx->connect()->prepare(self::$queryPost);
            $res->bindValue("id", self::$Id);
            $res->bindValue("name", self::$Full_name);
            $res->bindValue("number", self::$Cel_number);
            $res->bindValue("relationship", self::$Relationship);
            $res->bindValue("company", self::$Company);
            $res->execute();
            self::$message = ["Code"=> 200+$res->rowCount(), "Message"=> "inserted data"];
        } catch(\PDOException $e) {
            self::$message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r(self::$message);
        }
    }

    public static function getAllPersonalRef(){
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

    public function putPersonal_ref(){
        try {
            $conx = new Connection;
            $query = 'UPDATE personal_ref SET id=:id,full_name=:name,cel_number=:cel,relationship=:relations,occupation=:occupation WHERE id=:id';
            $res = $conx->connect()->prepare($query);
            $res->bindValue('id',$this->id);
            $res->bindValue('name', $this->full_name);
            $res->bindValue('cel', $this->cel_number);
            $res->bindValue('relations', $this->relationship);
            $res->bindValue('occupation', $this->occupation);
            $res->execute();
            $this->message =["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }

    public static function deleteIdPersonalRef(){
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