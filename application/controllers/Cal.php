<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cal extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->helper('url');
    $this->load->model('Veterinaria_model');


  }

  function index()
  {

    $data = array();
    $id = (isset($_GET['id']))?$_GET['id']+0:0;
    $data['mascota'] = $this->Veterinaria_model->cargarMascota($id);
    $data['mascotas']=$this->Veterinaria_model->listarMascota();
  $this->load->view('veterinario/Princ_veterinaria',$data);
  }

  function guardarMascota()
  {

    if ($_POST) {
      $this->Veterinaria_model->guardarMascota
  ($_POST);
    }
    $this->load->view('veterinario/mensaje');
  }


    function deleteMascota()
    {
          $id = (isset($_GET['id']))?$_GET['id']+0:0;
          $this->Veterinaria_model->eliminarMascota
      ($id);
          $this->load->view('veterinario/mensaje');
    }

}
