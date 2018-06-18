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

		if ($this->input->post()) {
			echo "informacion recibida";
			print_r($this->input->post());
		}else{
			$this->load->view('view_nuevo_catalago' );
		}
		

	}


}