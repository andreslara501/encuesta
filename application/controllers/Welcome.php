<?php
	session_start();

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function _output($output)
    {
        echo $this -> sanitize_output($output);
    }

	function sanitize_output($buffer) {
		/*
	    $search = array(
	        '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
	        '/[^\S ]+\</s',     // strip whitespaces before tags, except space
	        '/(\s)+/s',         // shorten multiple whitespace sequences
	        '/<!--(.|\s)*?-->/' // Remove HTML comments
	    );
	    $replace = array(
	        '>',
	        '<',
	        '\\1',
	        ''
	    );
	    $buffer = preg_replace($search, $replace, $buffer);
	    return $buffer;*/
		return $buffer;
	}
	/* Configuración */
	public $menu_activo = 1;

	/* Propiedades */
	public $paginas;

	public function index(){
		if(!isset($_SESSION['usuario'])){
			echo
			"<script>
				window.location.replace('/admin/');
			</script>";
			exit("no se pudo abrir el archivo");
		}

		$this -> load -> model("secciones");
		$data_secciones = $this -> secciones -> todas();

		$this -> load -> model("preguntas");
		$data_preguntas = $this -> preguntas -> todas();

		$data_etiquetas =[
			"titulo"		=> "Encuesta OCAI",
			"descripcion" 	=> "Encuesta OCAI",
			"img" 			=> "/theme/img/universidades.jpg",
			"url" 			=> "...",
			"google" 		=> "..."
		];

		$data["etiquetas"] 					= $data_etiquetas;
		$data["secciones"] 					= $data_secciones;
		$data["preguntas"] 					= $data_preguntas;
		$this -> theme_load($data);
	}

	function theme_load($data){
		$this -> load -> view('../../theme/views/start', $data);
		$this -> load -> view('../../theme/views/head', $data);
		$this -> load -> view('../../theme/views/menu');
		$this -> load -> view('../../theme/views/content');
		$this -> load -> view('../../theme/views/footer');
	}

}
?>
