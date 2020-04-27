<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Bogota');
class Api extends CI_Controller{
	public function index(){
		echo "hola ;)";
	}

	public function respuestas($accion, $usuario = 0){
		session_start();
		switch ($accion){
			case "nueva":
				$data = $this -> input -> post();

				$contrato 		= $data["contrato"];
				$genero 		= $data["genero"];
				$cargo 			= $data["cargo"];
				$area 			= $data["area"];


				unset($data["contrato"]);
				unset($data["genero"]);
				unset($data["cargo"]);
				unset($data["area"]);

				var_dump($data);

				foreach ($data as $key => $value){
					$array_input = explode("_", $key);

					$data_limpia["usuario"] 	= $_SESSION['usuario'];
					$data_limpia["seccion"] 	= $array_input[1];
					$data_limpia["pregunta"] 	= $array_input[2];
					$data_limpia["valor"] 		= $value;
					$data_limpia["ip"] 			= $_SERVER['REMOTE_ADDR'];
					$data_limpia["fecha"]   	= date("Y-m-d H:i:s");
					$data_limpia["contrato"] 	= $contrato;
					$data_limpia["genero"] 		= $genero;
					$data_limpia["cargo"] 		= $cargo;
					$data_limpia["area"] 		= $area;

					if($array_input[0]=="actual"){
						$data_limpia["tipo"] 		= 0;
					}else{
						$data_limpia["tipo"] 		= 1;
					}

					$this -> load -> model("respuestas");
					$resultado = $this -> respuestas -> nueva($data_limpia);
				}

				session_start();
				$_SESSION['usuario'] 			= "";
				session_destroy();

				echo json_encode($resultado);
				break;
			default:
				echo "Error, acción no seleccionada";
				break;
		}
	}

	public function sesion($accion){
		switch ($accion){
			case "cerrar":
				session_start();
				$_SESSION['usuario'] 			= "";
				session_destroy();

				echo
				"<script>
					window.location.replace('/admin/');
				</script>";
				break;

			default:
				echo "Error, acción no seleccionada";
				break;
		}
	}

	public function clear_caracteres($string){
		$string_explode = explode("/", $string);
		foreach ($string_explode as &$tmp_explode){
			$tmp_explode = filter_var($tmp_explode, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
			$tmp_explode = htmlentities($tmp_explode);
			$tmp_explode = str_replace(" ", "_", $tmp_explode);
			$tmp_explode = preg_replace('/[^a-z0-9_\.]/', '', strtolower($tmp_explode));
		}

		return implode("/", $string_explode);
	}

	public function numeros_limpios($texto = "error"){
		return preg_replace("/\D/", "", $texto);
	}
}
?>
