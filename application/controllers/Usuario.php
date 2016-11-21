<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller{

  public function __construct()
  {

    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('usuario_model');
  }

  function index()
  {
    $data = array();
    $id = 0;
    if (isset($_GET['id'])) {
      $id = $_GET['id']+0;
    }
    $data['usuario'] = $this->usuario_model->cargarUsuario($id);
    $data['usuarios'] = $this->usuario_model->listarUsuarios();
  $this->load->view('usuario/principal',$data);

  }
  function guardar()
  {

    if ($_POST) {
      $this->usuario_model->guardarUsuario($_POST);
    }
    $this->load->view('usuario/mensaje');
  }

  function delete()
  {
        $id = (isset($_GET['id']))?$_GET['id']+0:0;
        $this->usuario_model->eliminarUsuario($id);
        $this->load->view('usuario/mensaje');
  }

}
