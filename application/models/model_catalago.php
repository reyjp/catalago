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
 }



 /* Fin del Archivo contactos*/


