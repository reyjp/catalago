<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class principal extends CI_Controller
{
  public function index()
  {
    $this->load->view('header');
    $archivos = $this->consultas->getArchivos();
    $data['archivos']=$archivos;
    $this->load->view('main', $data);
    $this->load->view('footer');
  }

  public function addFile()
  {
    $nombre = $this->input->post('nombre');
    $file_name = $_FILES['archivo']['name'];
    $file_size = $_FILES['archivo']['size'];
    $file_tmp = $_FILES['archivo']['tmp_name'];
    $file_type = $_FILES['archivo']['type'];
    $fp = fopen($file_tmp, 'r+b');
    $binario = fread($fp, filesize($file_tmp));
    fclose($fp);

    $datos = array(
      'archivo' => $binario,
      'nombre'=>$nombre
    );
    $this->insertar->insertarGral("tb_archivos",$datos);
  }


  public function verArchivo($idA)
  {
    $consulta = $this->consultas->getArchivo($idA);
    $archivo = $consulta['archivo'];
    $nombre= $consulta['nombre'];
    header("Content-type: application/pdf");
    header("Content-Disposition: inline; filename=$nombre.pdf");
    print_r($archivo);
  }


  public function delFile()
  {
      $idA = $this->input->post('idArchivo');
      $this->delete->eliminarId("tb_archivos",$idA);
  }

} // fin class
