<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->database();
  }
  function guardarUsuario($usuario){
    $id = $usuario['id'];
    if ($id+0 > 0) {
      $this->db->where('id=',$id);
      unset($usuario['id']);
      $this->db->update('usuario',$usuario);
    }else{
    $this->db->insert('usuario',$usuario);
    }
  }
  function listarUsuarios(){
    $query = $this->db->get('usuario');

    return $query->result();
  }
  function cargarUsuario($id)
  {
    $usuario = new stdclass();
    $usuario->id = 0;
    $usuario->usuario = "";
    $usuario->clave = "";
    $usuario->nombre = "";
    $usuario->email = "";

    $query = $this->db->where('id=',$id);
    $query = $this->db->get('usuario');

    $rs = $query->result();
    if(count($rs) > 0){
      $usuario = $rs[0];
    }

    return $usuario;
  }
  function eliminarUsuario($id){
    $this->db->where('id=',$id);
    $this->db->delete('usuario');
  }

  function iniciarSesion($usr, $clv)
  {
    $this->db->where('usuario=',$usr);
    $this->db->where('clave=',$clv);
    $query = $this->db->get('usuario');



    $rs = $query->result();
    if(count($rs) > 0){
      $usuario = $rs[0];
      return $usuario->id;
    }
    $todos = $this->db->query('select count(*) as nr from usuario');
    $nn = $todos->result();


    if ($nn[0]->nr < 1 && $usr == 'admin' && $clv == '1tl4w3b') {
      return 99;
    }


          return false;


  }

}
