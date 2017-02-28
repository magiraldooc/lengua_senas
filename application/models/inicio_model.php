<?php

class Inicio_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
  /* function validarNombre($data){
   	$this->db->where('userName',$data['nombre']);
	$query = $this->db->get('user');

	if($query->num_rows() == 1)
		{
			return $query->row();
		}else{
			$this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
			redirect(base_url().'index.php/inicio','refresh');
		}

   }*/
//    
     
     
    
}
?>