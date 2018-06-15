<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_catalago extends CI_Model {
	public function ListarCatalagos(){
		$this->db->order_by('ID ASC');
		return $this->db->get('catalagos')->result();
	}
	public function ExisteImagen($email){
          $this->db->from('catalagos');
          $this->db->where('IMAGEN',$email);
          return $this->db->count_all_results();
     }
     public function SaveCatalagos($arrayCliente){
     	/*Nos aseguramos si realizamos todo o no*/
     	$this->db->trans_start();
     	$this->db->insert('catalagos', $arrayCliente);
     	$this->db->trans_complete();	
     }
	 function BuscarID($id){

		$query = $this->db->where('ID',$id);
		$query = $this->db->get('catalagos');
		return $query->result();
		
	}
	function edit($data,$id){

		$this->db->where('ID',$id);
		$this->db->update('catalagos',$data);
		
	}
	function Eliminar($id){

		$this->db->where('ID',$id);
		$this->db->delete('catalagos');
		
	}
	function MenuCompleto(){
		$this->db->order_by('ORDENAMIENTO ASC');
		return $this->db->get('menu_sistema')->result();
	}
	function MiMenu($id,$id_menu){
		$this->db->from('permisosmenu');
		$this->db->where('ID_CATALAGO',$id);
		$this->db->where('ID_MENU',$id_menu);
		$this->db->where('ESTATUS',0);
		return $this->db->count_all_results();
	}
	function DesactivaPermisos($id){
		$this->db->where('ID_CATALAGO',$id);
		$success = $this->db->update('permisosmenu',array('ESTATUS' => 1));
	}
	function ExistePermiso($id,$id_menu){
		$this->db->from('permisosmenu');
		$this->db->where('ID_CATALAGO',$id);
		$this->db->where('ID_MENU',$id_menu);
		return $this->db->count_all_results();
	}
	function ActualizaPermiso($id,$id_menu){
		$this->db->where('ID_CATALAGO',$id);
		$this->db->where('ID_MENU',$id_menu);
		$success = $this->db->update('permisosmenu',array('ESTATUS' => 0));
	}
	function AgregaPermiso($arraypermisos){
		$this->db->trans_start();
     	$this->db->insert('permisosmenu', $arraypermisos);
     	$this->db->trans_complete();
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_catalago extends CI_Model {
	public function ListarCatalagos(){
		$this->db->order_by('ID ASC');
		return $this->db->get('catalagos')->result();
	}
	public function ExisteImagen($imagen){
          $this->db->from('catalagos');
          $this->db->where('IMAGEN',$email);
          return $this->db->count_all_results();
     }
     public function SaveCatalagos($arrayCliente){
     	/*Nos aseguramos si realizamos todo o no*/
     	$this->db->trans_start();
     	$this->db->insert('catalagos', $arrayCliente);
     	$this->db->trans_complete();	
     }
	 function BuscarID($id){

		$query = $this->db->where('ID',$id);
		$query = $this->db->get('catalagos');
		return $query->result();
		
	}
	function edit($data,$id){

		$this->db->where('ID',$id);
		$this->db->update('catalagos',$data);
		
	}
	function Eliminar($id){

		$this->db->where('ID',$id);
		$this->db->delete('catalagos');
		
	}
	function MenuCompleto(){
		$this->db->order_by('ORDENAMIENTO ASC');
		return $this->db->get('menu_sistema')->result();
	}
	function MiMenu($id,$id_menu){
		$this->db->from('permisosmenu');
		$this->db->where('ID_CATALAGO',$id);
		$this->db->where('ID_MENU',$id_menu);
		$this->db->where('ESTATUS',0);
		return $this->db->count_all_results();
	}
	function DesactivaPermisos($id){
		$this->db->where('ID_CATALAGO',$id);
		$success = $this->db->update('permisosmenu',array('ESTATUS' => 1));
	}
	function ExistePermiso($id,$id_menu){
		$this->db->from('permisosmenu');
		$this->db->where('ID_CATALAGO',$id);
		$this->db->where('ID_MENU',$id_menu);
		return $this->db->count_all_results();
	}
	function ActualizaPermiso($id,$id_menu){
		$this->db->where('ID_CATALAGO',$id);
		$this->db->where('ID_MENU',$id_menu);
		$success = $this->db->update('permisosmenu',array('ESTATUS' => 0));
	}
	function AgregaPermiso($arraypermisos){
		$this->db->trans_start();
     	$this->db->insert('permisosmenu', $arraypermisos);
     	$this->db->trans_complete();
	}
}
?>