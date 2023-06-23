<?php

namespace App\Controller;

use App\Models\work_reference_Model;

class work_reference_Controller{

    public function __construct(){

    }

    public function getWorkReference(){
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
            echo json_encode($pReference>PostWorkReference());
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }   
}
?>