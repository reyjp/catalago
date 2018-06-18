<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Caracas_City'); 

class catalago extends CI_Controller
{



	public function catalagon()
	{

		$this->load->model('model_catalago');

		$data ['listado'] = $this->model_catalago->get_all();

		$this->load->view('header');
		$this->load->view('catalagon', $data);
		$this->load->view('footer');
	}

	public function agregar(){


		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('model_catalago');


		if ($this->input->post()) {
			$this->form_validation->set_rules('nombre','El Nombre','required');
			$this->form_validation->set_rules('creador','Creador','required|min_length[3]');
			$this->form_validation->set_rules('acronimo','Acronimo','required|min_length[3]');
			$this->form_validation->set_rules('usuariom','Tipo de Usuario','trim');
			$this->form_validation->set_rules('status','Estatus','trim');

			if ($this->form_validation->run()== TRUE) {
				$this->model_catalago->add();
				print_r($this->input->post());
			}else{
				$this->load->view('view_nuevo_catalago' );
			}
			
			
		}else{
			$this->load->view('view_nuevo_catalago' );
		}
		

	}


}