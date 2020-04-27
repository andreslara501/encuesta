<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Respuestas extends CI_Model
{
    function nueva($data){
        $data_usu = array("usado" => 1);
        $result = $this -> db -> update("usuario", $data_usu, "correo = '{$data["usuario"]}'");

        $result = $this -> db -> insert("respuestas", $data);
        return $this -> db -> insert_id();
    }

    function todas(){
        $consulta = $this 			        -> db
							 				-> order_by("id","ASC")
							 				-> get('respuestas');
		$consulta = $consulta               -> result_array();
        return $consulta;
    }
}
?>
