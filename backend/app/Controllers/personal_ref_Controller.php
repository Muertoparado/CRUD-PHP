<?php

namespace App\Controllers;

use PDO;
use App\Models\personal_ref_Model;

class personal_ref_Controller{

/*     public function __construct(){

    } */

    

    public function GetPersonalRef(){
        try {
            echo"get work reference";
            $workReference = personal_ref_Model::getAllPersonalRef();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function PostPersonalRef(){
        try {
            $datos = json_decode(file_get_contents('php://input'),true);
            $pReference = new personal_ref_Model(...$datos);  
            echo json_encode($pReference->postPersonalRef());
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }   

    public function PutPersonal_ref(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new Personal_ref_Model($_DATA['id'],$_DATA['full_name'],$_DATA['cel_number'],$_DATA['relationship'],$_DATA['occupation'],);
            $res = $obj->PutPersonal_ref();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha actualizado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function DeletePersonalRef(){
        try {   
            $datos = json_decode(file_get_contents('php://input'),true);
            $pReference = new personal_ref_Model(...$datos['id']);  
            echo json_encode($pReference->deleteIdPersonalRef());
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }


}
?>