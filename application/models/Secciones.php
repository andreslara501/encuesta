<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Secciones extends CI_Model
{
    function todas(){
        $consulta = $this 			        -> db
							 				-> order_by("id","ASC")
							 				-> get('seccion');
		$consulta = $consulta               -> result_array();
        return $consulta;
    }
}
?>
