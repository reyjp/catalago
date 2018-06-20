<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_configuracion extends CI_Model
{
    /* function __construct()
     {
          parent::__construct();
     }*/



     function get_all()
     {
     	$this->load->database();
     	$query  = $this->db->get('configuracion_n');

     	return $query->result();
     	
     }

      function get_by_id($id)
     {
          $this->load->database();
           $query  = $this->db->where('id',$id);
          $query  = $this->db->get('configuracion_n');

          return $query->result();
          
     }

     function add()
     {
          $this->load->database(); 
          $data_insertar = $this->input->post();
          unset($data_insertar['btn_enviar']);

          $this->db->insert('configuracion_n', $data_insertar);

          return $this->db->insert_id(); 
     }

     function edit($id)
     {
     	  $this->load->database(); 
          $data_editar = $this->input->post();
          unset($data_editar['btn_enviar']);

          $this->db->where('id',$id);
          $this->db->update('configuracion_n', $data_editar);
     }


     function eliminar($id)
     {
         $this->load->database(); 
         

          $this->db->where('id',$id);
          $this->db->delete('configuracion_n');
     }  
     


 }


