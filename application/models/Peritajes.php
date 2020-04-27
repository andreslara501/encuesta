<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peritajes extends CI_Model
{
    function programacion_10(){
        $programaciones = $this 			-> db
                                            -> select("*, DATE_FORMAT(fecha, '%d - %m - %Y') AS fecha_formateada")
                                            -> order_by("id","DESC")
							 				-> get('peritajes', 10);
		$programaciones = $programaciones   -> result_array();


        $clientes = $this 			        -> db
							 				-> get('cliente');
		$clientes = $clientes               -> result_array();

        foreach ($programaciones as $programacion){
            $proyecto       = $this 			-> db
                                                -> where("id_proyecto = " . $programacion['proyecto'])
    							 				-> get('proyecto');
    		$proyecto       = $proyecto         -> result_array();

            $cliente = $clientes[array_search($proyecto[0]["cliente"], array_column($clientes, 'id_cliente'))];

            $respuesta[] = array("programacion" => $programacion, "proyecto" => $proyecto[0], "cliente" => $cliente);
        }

        return json_encode($respuesta);
    }
}
?>
