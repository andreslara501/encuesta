<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Procesos extends CI_Model
{
    function informacion($id = 0){

        $usuarios               = $this 			                        -> db
							 			                    -> order_by("nombre","ASC")
							 			                    -> get('usuario');
		$usuarios               = $usuarios                 -> result_array();

        $tipo_proyectos         = $this 					-> db
                                                            -> order_by("orden", "DESC")
							 							    -> get('tipo_proyecto');
		$tipo_proyectos         = $tipo_proyectos 	        -> result_array();

        $data_pxtps             = $this 					-> db
                                            				-> where("proyecto = $id")
							 								-> get('proyectoxtipo_proyecto');
		$data_pxtps             = $data_pxtps 				-> result_array();

        $procesos_filtrados = array();

        foreach ($data_pxtps as $pxtp){
            $usuario        = $usuarios[array_search($pxtp["usuario"], array_column($usuarios, 'id_usuario'))];
            $tipo_proyecto  = $tipo_proyectos[array_search($pxtp["tipo_proyecto"], array_column($tipo_proyectos, 'id_tipo_proyecto'))];

            $procesos_filtrados[] = array("nombre" => ucwords(strtolower($usuario["nombre"])), "id_usuario" => $usuario["id_usuario"], "descripcion" => ucwords(strtolower($tipo_proyecto["descripcion"])), "id_tipo_proyecto" => $tipo_proyecto["id_tipo_proyecto"]);
        }

        return $procesos_filtrados;
    }

    function editar_asgnacion_proceso($id, $usuario, $proceso){
        $data["usuario"]        = $usuario;

        $result = $this -> db -> update("proyectoxtipo_proyecto", $data, "proyecto = '{$id}' AND tipo_proyecto = '{$proceso}'");
        return json_encode((int)$proceso);
    }
}
?>
