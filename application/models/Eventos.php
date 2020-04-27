<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventos extends CI_Model
{
    function informacion($id = 0){

        $data_eventos   = $this 		                    -> db
                                                            -> select("*, DATE_FORMAT(fecha, '%d - %m - %Y') AS fecha_formateada")
                                                            -> where("proyecto = $id")
							 			                    -> order_by("id_evento","DESC")
							 			                    -> get('evento');
		$eventos        = $data_eventos                     -> result_array();

        return $eventos;
    }

    function nuevo($proyecto, $data){
        $data["fecha"]                          = date("Y-m-d H:i:s");
        $data["proyecto"]                       = $proyecto;
        $result = $this -> db -> insert("evento", $data);

        $data2["estado_proyecto"]               = $data["estado_proyecto"];
        $result = $this -> db                   -> update("proyecto", $data2, "id_proyecto = '{$proyecto}'");

        return $data;
    }
}
?>
