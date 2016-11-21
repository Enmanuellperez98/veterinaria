<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seguridad extends CI_Controller{

  public function __construct()
  {
    define('NOLOGIN', true);
    parent::__construct();
    $this->load->model(array('usuario_model'));
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->load->view('usuario/login');

  }
  function salir()
  {
    session_destroy();
    redirect('seguridad');
  }
  function login()
  {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $tmp = $this->usuario_model->iniciarSesion($usuario, $clave);
    if ($tmp !== false) {
      $_SESSION['usuario'] = $tmp;
      redirect('cal');
    }else {
      $this->load->view('usuario/error');
    }
  }

}
