<?php

class modeloslogin extends CI_Model{

	public function __construct(){
		$this->load->database();
	}
   function ValidarUser($username,$password){         //   Consulta para buscar en la tabla Usuario aquellos usuarios que coincidan con el mail y password ingresados en pantalla de login
      $query = $this->db->where('username',$username);   //   consulta user
      $query = $this->db->get('usuario');
      return $query->row();    //   Devolvemos al controlador la fila que coincide con la búsqueda. (FALSE en caso que no existir coincidencias)

   }

   function validarpass($username) {

   $query = $this->db->query('SELECT password FROM usuario WHERE "username" = ?' , $username);

   return $query->row();
   }
   
}
?>
