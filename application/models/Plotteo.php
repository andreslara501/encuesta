<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plotteo extends CI_Model
{
    function activar($id = 0){
        $data["fecha_inicio"]       = date("Y-m-d H:i:s");
        $data["estado"]             = 0;
        $result = $this -> db       -> update("ticket", $data, "id = '{$id}'");

        $this -> db -> where('ticket', $id);
        $result = $this -> db -> delete('revision_ticket');
        return json_encode($result);
    }

    function nuevo($data){
        $data["estado"]             = 0;
        $result = $this -> db -> insert("plotteo", $data);
        return $this -> db -> insert_id();
    }

    function plottear($id){
        $data["estado"]             = 1;
        $result = $this -> db       -> update("plotteo", $data, "id_archivo = '{$id}'");
        return json_encode($result);
    }
}
?>
