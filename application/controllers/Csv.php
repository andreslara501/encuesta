<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Bogota');
class Csv extends CI_Controller{
	public function index(){
	    header("Content-disposition: attachment; filename=encuesta.csv");
	    header("Content-type: text/csv");

		$this -> load -> model("respuestas");
		$resultado = $this -> respuestas -> todas();

		echo "id, usuario, seccion, ip, contrato, genero, cargo, area, fecha,";

		$k = 1;

		for($i=1;$i<=24;$i++){
			echo $i . "_actual, ";
			$k++;
		}
		for($i=1;$i<=23;$i++){
			echo $i . "_deseado, ";
			$k++;
		}

		echo "24_deseado";

		$usuario = "";

		$i = 1;
		foreach ($resultado as $respuesta){
			if($usuario != $respuesta["usuario"]){
				echo "\n";
				echo $i . ",";
				echo $respuesta["usuario"] . ",";
				echo $respuesta["seccion"] . ",";
				echo $respuesta["ip"] . ",";
				echo $respuesta["contrato"] . ",";
				echo $respuesta["genero"] . ",";
				echo $respuesta["cargo"] . ",";
				echo $respuesta["area"] . ",";
				echo $respuesta["fecha"] . ",";
				$usuario = $respuesta["usuario"];
				$i++;
			}

			echo $respuesta["valor"] . ",";
		}
	}
}
?>
