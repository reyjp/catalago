<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Caracas_City'); 

class configuracion extends CI_Controller
{



	public function configuracion_n()
	{
		$this->load->helper('url');
		$this->load->model('model_configuracion');

		$data ['listado'] = $this->model_configuracion->get_all();

		$this->load->view('header');
		$this->load->view('configuracion_n', $data);
		$this->load->view('footer');
	}

	public function agregar(){

		$this->load->view('header');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('model_configuracion');


		if ($this->input->post()) {
			$this->form_validation->set_rules('nombre_empresa','El Nombre','required');
			$this->form_validation->set_rules('abreviatura','Abreviatura','required|min_length[3]');
			$this->form_validation->set_rules('link','Enlace','required|min_length[3]');
			$this->form_validation->set_rules('linkf','Facebook','required|min_length[3]');
			$this->form_validation->set_rules('linkl','Linkedind','required|min_length[3]');
			$this->form_validation->set_rules('linkg','Google','required|min_length[3]');
			$this->form_validation->set_rules('linkt','Twitter','required|min_length[3]');			

			

			if ($this->form_validation->run()== TRUE) {
				$id_insertado = $this->model_configuracion->add();
				echo "el id creado es:".$id_insertado;
				
			}else{
				$this->load->view('view_nuevo_configuracion' );
			}
			
			
		}else{
			$this->load->view('view_nuevo_configuracion' );
		}
		

	}

	public function modificar($id = NULL ){

		if ($id == NULL OR !is_numeric($id)) {
			echo 'falta id';
			return;
		}

		$this->load->view('header');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('model_configuracion');

			if ($this->input->post()) {
			$this->form_validation->set_rules('nombre_empresa','El Nombre','required');
			$this->form_validation->set_rules('abreviatura','Abreviatura','required|min_length[3]');
			$this->form_validation->set_rules('link','Enlace','required|min_length[3]');
			$this->form_validation->set_rules('linkf','Facebook','required|min_length[3]');
			$this->form_validation->set_rules('linkl','Linkedind','required|min_length[3]');
			$this->form_validation->set_rules('linkg','Google','required|min_length[3]');
			$this->form_validation->set_rules('linkt','Twitter','required|min_length[3]');		

			if ($this->form_validation->run() == TRUE) {
				$this->model_configuracion->edit($id);
				redirect('#');
			}else{
				$this->load->view('view_nuevo_configuracion');
				
			}

		}else{


			$data['datos_configuracion'] = $this->model_configuracion->get_by_id($id);

		if (empty($data['datos_configuracion'])) {
			echo "el id es invalido";
		}else{
			$this->load->view('view_nuevo_configuracion', $data);
		}

		}

	}

	public function eliminar($id = NULL){

		if ($id == NULL OR !is_numeric($id)) {
			echo 'falta id';
			return;
		}

		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('model_configuracion');


		if ($this->input->post()){
			$id_eliminar = $this->input->post('id');
			$this->model_configuracion->eliminar($id_eliminar);
			redirect('configuracion/configuracion_n');

		}else{


			$data['datos_configuracion'] = $this->model_configuracion->get_by_id($id);

			if (empty($data['datos_configuracion'])) {
				echo "el id es invalido";

			}else{
			$this->load->view('view_delete_co', $data);
		}

		}

		

		

	}


}