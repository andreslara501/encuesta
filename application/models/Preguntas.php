<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Preguntas extends CI_Model
{
    function todas(){
        $consulta = $this 			        -> db
							 				-> order_by("id","ASC")
							 				-> get('pregunta');
		$consulta = $consulta               -> result_array();

        $preguntas = array();
        foreach ($consulta as $pregunta){
            $preguntas[$pregunta["seccion"]][$pregunta["id"]] = array("id" => $pregunta["id"], "descripcion" => $pregunta["descripcion"]);
        }

        return $preguntas;
    }
}
?>
