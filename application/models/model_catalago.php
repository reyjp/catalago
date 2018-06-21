<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_catalago extends CI_Model
{
    /* function __construct()
     {
          parent::__construct();
     }*/



     function get_all()
     {
     	$this->load->database();
     	$query  = $this->db->get('catalagon');

     	return $query->result();
     	
     }

      function get_by_id($id)
     {
          $this->load->database();
           $query  = $this->db->where('id',$id);
          $query  = $this->db->get('catalagon');

          return $query->result();
          
     }

     function add()
     {
          $this->load->database(); 
           $hoy    = date("Y")."-".date("m")."-".date("d")." ".date("H:i:s");
          $data_insertar = $this->input->post();
          $data_insertar["fechac"] = $hoy;
          unset($data_insertar['btn_enviar']);

          $this->db->insert('catalagon', $data_insertar);

          return $this->db->insert_id(); 
     }

     function edit($id)
     {
     	  $this->load->database(); 
             $hoy    = date("Y")."-".date("m")."-".date("d")." ".date("H:i:s");
          $data_editar = $this->input->post();
           $data_editar["fechaum"] = $hoy;
          unset($data_editar['btn_enviar']);

          $this->db->where('id',$id);
          $this->db->update('catalagon', $data_editar);
     }


     function eliminar($id)
     {
         $this->load->database(); 
         

          $this->db->where('id',$id);
          $this->db->delete('catalagon');
     }  
     


 }



 /* Fin del Archivo contactos*/


