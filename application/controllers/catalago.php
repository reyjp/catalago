<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Caracas_City'); 

class catalago extends CI_Controller
{


   

	public function catalagon()
	{
		
		
		$this->load->helper('url');
		$this->load->model('model_catalago');

		$data ['listado'] = $this->model_catalago->get_all();

		$this->load->view('header');
		$this->load->view('catalagon', $data);
		$this->load->view('footer');
	}

	public function agregar(){

		
		
		
		
		$this->load->view('header');

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('model_catalago');
		
       
		if ($this->input->post()) {
			$this->form_validation->set_rules('nombre','El Nombre','required');
			$this->form_validation->set_rules('imagen','La Imagen','required');
			$this->form_validation->set_rules('creador','Creador','required|min_length[3]');
			$this->form_validation->set_rules('acronimo','Acronimo','required|min_length[3]');
			$this->form_validation->set_rules('archivo_pdf','El archivo','required|min_length[3]');
			$this->form_validation->set_rules('usuariom','Tipo de Usuario','trim');
			$this->form_validation->set_rules('status','Estatus','trim');

			if ($this->form_validation->run()== TRUE) {
				
				$id_insertado = $this->model_catalago->add();
				
				redirect('catalago/catalagon');
				
			}else{
				$this->load->view('view_nuevo_catalago' );
			}
			
			
		}else{
			$this->load->view('view_nuevo_catalago' );
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
		$this->load->model('model_catalago');

			if ($this->input->post()) {
			$this->form_validation->set_rules('nombre','El Nombre','required');
			$this->form_validation->set_rules('imagen','La imagen','required');
			$this->form_validation->set_rules('creador','Creador','required|min_length[3]');
			$this->form_validation->set_rules('acronimo','Acronimo','required|min_length[3]');
			$this->form_validation->set_rules('archivo_pdf','El archivo','required|min_length[3]');
			$this->form_validation->set_rules('usuariom','Tipo de Usuario','trim');
			$this->form_validation->set_rules('status','Estatus','trim');

			if ($this->form_validation->run() == TRUE) {
				$this->model_catalago->edit($id);
				redirect('catalago/catalagon');
			}else{
				$this->load->view('view_nuevo_catalago');
				
			}

		}else{


			$data['datos_catalago'] = $this->model_catalago->get_by_id($id);

		if (empty($data['datos_catalago'])) {
			echo "el id es invalido";
		}else{
			$this->load->view('view_nuevo_catalago', $data);
		}

		}

	}

	public function eliminar($id = NULL){

		if ($id == NULL OR !is_numeric($id)) {
			echo 'falta id';
			return;
		}
		$this->load->view('header');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('model_catalago');


		if ($this->input->post()){
			$id_eliminar = $this->input->post('id');
			$this->model_catalago->eliminar($id_eliminar);
			redirect('catalago/catalagon');

		}else{


			$data['datos_catalago'] = $this->model_catalago->get_by_id($id);

			if (empty($data['datos_catalago'])) {
				echo "el id es invalido";

			}else{
			$this->load->view('view_delete_c', $data);
		}

		}

		

		

	}

	private function _do_upload()
	{
		$config['upload_path']          = 'upload/';
        $config['allowed_types']        = 'gif|jpg|png|pdf';
        $config['max_size']             = 100; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('photo')) //upload and validate
        {
            $data['inputerror'][] = 'photo';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}



}