<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Revision_ticket extends CI_Model
{
    function update($nombre, $data){
        $data = array("valor" => $data);
        $result = $this -> db -> update("configuracion", $data, "nombre = '" . $nombre . "'");
        return json_encode($result);
    }

    function nuevo($data){
        $result = $this -> db -> insert("revision_ticket", $data);
        return $this -> db -> insert_id();
    }
}
?>
