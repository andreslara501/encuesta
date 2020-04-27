<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Responsable extends CI_Model
{
    function informacion($id = 0){
        $informacion    = $this 			-> db
									        //-> order_by("id_proyecto","DESC")
                                            -> where("id_responsable = $id")
							 				-> get('responsable');
		$respuesta      = $informacion      -> result_array();
        return $respuesta;
    }
}
?>
