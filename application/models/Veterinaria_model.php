<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Veterinaria_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
      $this->load->database();
  }
  function guardarMascota($mascota){
    $id = $mascota['id'];
    if ($id+0 > 0) {
      $this->db->where('id=',$id);
      unset($mascota['id']);
      $this->db->update('mascota',$mascota);
    }else{
    $this->db->insert('mascota',$mascota);
    }
  }
  function listarMascota(){
    $query = $this->db->get('mascota');

    return $query->result();
  }
  function cargarMascota($id)
  {
    $mascota = new stdclass();
    $mascota->id = 0;
    $mascota->nombre = "";
    $mascota->fecha_nacimiento = "";
    $mascota->tipo = "";
    $mascota->raza = "";
    $mascota->peso = "";
    $mascota->color = "";
    $mascota->foto = "";
    $mascota->comentario = "";

    $query = $this->db->where('id=',$id);
    $query = $this->db->get('mascota');

    $rs = $query->result();
    if(count($rs) > 0){
      $mascota = $rs[0];
    }

    return $mascota;
  }
  function eliminarMascota($id){
    $this->db->where('id=',$id);
    $this->db->delete('mascota');
  }


}
