<?php

namespace App\Models;

use PDO;

class work_reference {
    protected static $conx;
    public $message;/* revisar */
    private $queryPost = 'INSTERT INTO work_reference(id,  full_name, cel_number, position, company) VALUES(:id, :name, :number, :position, :company)';
    private $queryGetAll = 'SELECT id AS "cc", full_name AS "name", cel_number AS "number", position AS "position", company AS "company" FROM work_reference';
    function __construct(private $Id, public $Full_name, private $Cel_number, private $Position, public $Company){
    }

    public function postWork_reference(){
        try {
            $res = self::$conx->prepare($this->queryPost);
            $res->bindValue("id", $this->Id);
            $res->bindValue("name", $this->Full_name);
            $res->bindValue("number", $this->Cel_number);
            $res->bindValue("position", $this->Position);
            $res->bindValue("company", $this->Company);
            $res->execute();
            $this->message = ["Code"=> 200+$res->rowCount(), "Message"=> "inserted data"];
        } catch(\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }

    public function getAllWork_reference(){
        try {
            $res = $this->conx->prepare($this->queryGetAll);
            $res->execute();
            $this->message = ["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch(\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }
}

?>