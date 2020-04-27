<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagos extends CI_Model
{
    function pagos_proyecto($id = 0){
        $informacion    = $this 			-> db
                                            -> select("*, DATE_FORMAT(fecha, '%d - %m - %Y') AS fecha_formateada")
                                            -> where("proyecto = $id")
							 				-> get('pago');
		$respuesta      = $informacion      -> result_array();

        //$respuesta[]date("l", mktime(0, 0, 0, 7, 1, 2000))

        return $respuesta;
    }

    function nuevo_pago_proyecto($proyecto, $data){
        $pagos_db       = $this 			-> db
                                            -> where("tipo_pago = 2")
							 				-> get('pago');
		$pagos          = $pagos_db         -> result_array();

        $numero_mayor = 0;
        foreach($pagos AS $pago) {
            if($numero_mayor < $pago["numero"]){
                $numero_mayor = $pago["numero"];
            }
        }

        $data["proyecto"]       = $proyecto;
        $data["fecha"]          = date("Y-m-d H:i:s");
        $data["tipo_pago"]      = 2;
        $data["numero"]         = $numero_mayor + 1;
        $data["concepto"]       = "RP " . $data["numero"];
        $data["valor"]          = preg_replace("/\D/", "", $data["valor"]);

        $result = $this -> db -> insert("pago", $data);

        return array("proyecto" => $data["proyecto"], "numero" => $data["numero"]);
    }
}
?>
