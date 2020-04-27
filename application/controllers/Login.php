<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Bogota');
class Login extends CI_Controller
{
	public function index(){
		echo "hola ;)";
	}

	public function login_form(){
		$data = $this -> input -> post();

		if(isset($data["usuario"])){
			$result = $this -> db
	                        -> where("correo='" . $data["usuario"] . "'")
	                        -> get("usuario");
			$row = $result -> row_array();

			if(!is_null($row)){
				if($row["usado"]==1){
					echo json_encode(2);
				}else{
					echo json_encode(1);
					$_SESSION['usuario'] 			= $data["usuario"];
				}

			}else{
				echo json_encode(0);
			}
		}
	}

	public function out() {
		$_SESSION['usuario'] = "";
		session_destroy();
	}
}
?>
