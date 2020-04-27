<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyecto extends CI_Model
{
    function informacion($id = 0){
        $informacion    = $this 			-> db
                                            -> select("
                                                id_proyecto,
                                                fecha,
                                                estado_proyecto,
                                                cliente,
                                                responsable,
                                                direccion,
                                                telefono,
                                                observaciones,
                                                curaduria,
                                                norad,
                                                valor
                                            ")
                                            -> where("id_proyecto = $id")
							 				-> get('proyecto');
		$respuesta      = $informacion      -> result_array();
        return $respuesta;
    }

    function nuevo_($data){
        $data["proyecto"]       = $proyecto;
        $data["fecha"]          = date("Y-m-d H:i:s");
        $data["tipo_pago"]      = 2;
        $data["numero"]         = $numero_mayor + 1;
        $data["concepto"]       = "RP " . $data["numero"];
        $data["valor"]          = preg_replace("/\D/", "", $data["valor"]);

        $result = $this -> db -> insert("pago", $data);

        return array("proyecto" => $data["proyecto"], "numero" => $data["numero"]);
    }

    function editar($id, $data){
        $result = $this -> db -> update("proyecto", $data, "id_proyecto = '{$id}'");
        return json_encode($result);
    }
}
?>
