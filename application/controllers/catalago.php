<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Caracas_City'); 
class catalago extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();
          //Cargamos el modelo deel controlador
          $this->load->model('model_catalago');
          $this->load->model('model_seguridad');
          $this->load->model('model_login');
     }
     function Seguridad(){
     	$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
         $this->model_seguridad->SessionActivo($url);
     }
     public function index(){
          /*Si el usuario esta logeado*/
          $this->Seguridad();
          $this->load->view('header');
          $data['catalagos'] = $this->model_catalago->ListarCatalago();         
          $this->load->view('view_catalago', $data);
          $this->load->view('footer');
	}
     public function nuevo(){
	      
        /*Si el usuario esta logeado*/
        $this->Seguridad();
		$hoy    = date("Y")."-".date("m")."-".date("d")." ".date("H:i:s");
				
		$this->ValidaCampos();
		if($this->form_validation->run() == TRUE){
				//Verificamos si existe el email
			   $VerifyExist = $this->model_catalago->ExisteEmail($this->input->post("EMAIL"));
               if($VerifyExist==0){
               	    $CatalagosInsertar = $this->input->post();//Recibimos todo los campos por array nos lo envia codeigther
               	    $CatalagosInsertar["FECHA_REGISTRO"] = $hoy;//le agregamos la fecha de registro
               	    //guardamos los registros
               	    $this->model_catalago->SaveCatalago($CatalagosInsertar);
               	    redirect("catalagos?save=true");
               }
			   if($VerifyExist>0){
                    $this->session->set_flashdata('msg', '<div class="alert alert-error text-center">Email Duplicado</div>');
                    $this->load->view('header');
					$this->load->view('view_nuevo_catalago');
					$this->load->view('footer');
               }
			
		}else{
			  $this->load->view('header');
			  $this->load->view('view_nuevo_catalago');
			  $this->load->view('footer');
		} 
     }
	 function ValidaCampos(){
		/*Campos para validar que no esten vacio los campos*/
		 $this->form_validation->set_rules("NOMBRE", "Nombre", "trim|required");
		 $this->form_validation->set_rules("IMAGEN", "Imagen", "trim|required");
		 $this->form_validation->set_rules("ACRONIMO", "Acronimo", "trim|required|valid_email");
		 $this->form_validation->set_rules("CREADOR", "Tipo", "callback_select_tipo");
		 $this->form_validation->set_rules("ESTATUS", "Estatus", "callback_select_estatus");
	 }
	 function select_tipo($campo)
	{
		//Validamos tipo de usuario
		if($campo=="0"){
			$this->form_validation->set_message('select_tipo', 'El Campo Tipo Es Obligatorio.');
			return false;
		} else{
		// Retornamos
		return true;
		}
	}
	function select_estatus($campo)
	{
		// Validamos Estatus
		if($campo=="NONE"){
			$this->form_validation->set_message('select_estatus', 'El Campo Estatus es Obligatorio.');
			return false;
		} else{
		// 
		return true;
		}
	}
	 public function editar($id = NULL){
		
		if ($id == NULL OR !is_numeric($id)){
			$data['Modulo']  = "Catalagos";
			$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
			$this->load->view('header');
			$this->load->view('view_errors',$data);
			$this->load->view('footer');
			return;
		}
		if ($this->input->post()) {
			
			$this->ValidaCampos();
				
			if ($this->form_validation->run() == TRUE){
				$datos_update = $this->input->post();
				$id_insertado = $this->model_catalago->edit($datos_update,$id);
				redirect('catalagos?update=true');
				
			}else{
				$this->Nuevo();
			}
			
		}else{
			$data['datos_catalagos'] = $this->model_catalago->BuscarID($id);
			if (empty($data['datos_catalagos'])){
				$data['Modulo']  = "Catalagos";
				$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
				$this->load->view('header');
				$this->load->view('view_errors',$data);
				$this->load->view('footer');
			}else{
				$this->load->view('header');
				$this->load->view('view_nuevo_catalago',$data);
				$this->load->view('footer');
			}
		}
		
	}
	public function eliminar($id = NULL){
		if ($id == NULL OR !is_numeric($id)){
			$data['Modulo']  = "Catalagos";
			$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
			$this->load->view('header');
			$this->load->view('view_errors',$data);
			$this->load->view('footer');
			return;
		}
		if ($this->input->post()) {
			$id_eliminar = $this->input->post('ID');
			$boton       = strtoupper($this->input->post('btn_guardar'));
			if($boton=="NO"){
				redirect("catalagos");
			}else{
                                $this->model_catalago->Eliminar($id_eliminar);
				redirect("catalagos?delete=true");
			}
		}else{
			$data['datos_catalagos'] = $this->model_catalago->BuscarID($id);
			if (empty($data['datos_catalagos'])){
				$data['Modulo']  = "Catalagos";
				$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
				$this->load->view('header');
				$this->load->view('view_errors',$data);
				$this->load->view('footer');
			}else{
				$this->load->view('header');
				$this->load->view('view_delete',$data);
				$this->load->view('footer');
			}
		}
	}

	public function permisos($id = NULL){
	   if ($id == NULL OR !is_numeric($id)){
			$data['Modulo']  = "Catalagos";
			$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
			$this->load->view('header');
			$this->load->view('view_errors',$data);
			$this->load->view('footer');
			return;
		}
		if ($this->input->post()) {
			    $id              = $this->input->post("ID");
				$permission_data = $this->input->post("permissions")!=false ? $this->input->post("permissions"):array();
				/*APLICAMOS UPDATE*/
				$this->model_catalago->DesactivaPermisos($id);
				foreach($permission_data as $Permisos){
				    $ExistePermiso = $this->model_catalago->ExistePermiso($id,$Permisos);
					/*EXISTE PERMISO ACTUALIZAMOS, SI NO INSERTAMOS*/
				    if($ExistePermiso==1){
						$this->model_catalago->ActualizaPermiso($id,$Permisos);
					}else{
						$AgregaPermiso  = array(
							'ID_CATALAGO' => $id,
							'ID_MENU'    => $Permisos
						);
						$this->model_catalago->AgregaPermiso($AgregaPermiso);
					}
				}
				/*Si el usuario que se asigno permisos es el que esta logeado entonces refrescamos la sesion*/
				$IdUserLogin = $this->session->userdata('ID');
				if($IdUserLogin==$id){
					$Menu = $this->model_login->PermisosMenu($id);
					$this->session->set_userdata($Menu);
				}
				
				redirect('catalagos?permisos=true');
		}else{
			$data['datos_catalagos'] = $this->model_catalago->BuscarID($id);
			if (empty($data['datos_catalagos'])){
				$data['Modulo']  = "Catalagos";
				$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
				$this->load->view('header');
				$this->load->view('view_errors',$data);
				$this->load->view('footer');
			}else{
				$EstatusPermiso = array();
				$DescripcionPerm= array();
				$idMenus		= array();
				$CountPermiso 	= 0;
			    $MenuCargardo 	= $this->model_catalago->MenuCompleto();
				foreach($MenuCargardo as $Menu){
					$MiMenu = $this->model_catalago->MiMenu($id,$Menu->ID);
					$EstatusPermiso[$CountPermiso] = array();
					$DescripcionPerm[$CountPermiso]= array();
					$idMenus[$CountPermiso]		   = array();
					$EstatusPermiso[$CountPermiso] = $MiMenu;
					$DescripcionPerm[$CountPermiso]= $Menu->DESCRIPCION;
					$idMenus[$CountPermiso]		   = $Menu->ID;
					$CountPermiso = $CountPermiso + 1;
					
				}
				$data['estatus_menu']     = $EstatusPermiso;
				$data['descripcion_menu'] = $DescripcionPerm;
				$data['id_menu']		  = $idMenus;
				$this->load->view('header');
				$this->load->view('view_permisos',$data);
				$this->load->view('footer');
			}
		}
		
	 }
}
/* Archivo clientes.php */
/* Location: ./application/controllers/clientes.php */