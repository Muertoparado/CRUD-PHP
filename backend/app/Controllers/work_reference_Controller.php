<?php

namespace App\Controllers;

use PDO;
use App\Models\work_reference_Model;
class work_reference_Controller{

/*     public function __construct(){

    } */

    

    public function GetWorkReference(){
        try {
            echo"get work reference";
            $workReference = work_reference_Model::getAllWork_reference();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function PostWorkReferences(){
        try {
            $datos = json_decode(file_get_contents('php://input'),true);
            $pReference = new work_reference_Model(...$datos);  
            echo json_encode($pReference->postWork_reference());
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }   

    public function DeleteWorkReference(){
        try {   
            $datos = json_decode(file_get_contents('php://input'),true);
            $pReference = new work_reference_Model(...$datos['id']);  
            echo json_encode($pReference->deleteIdWork_reference());
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }


}
?>