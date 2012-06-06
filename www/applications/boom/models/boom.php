<?php
/**
 * Access from index.php:
 */
if(!defined("_access")) {
	die("Error: You don't have permission to access here...");
}

class Boom_Model extends ZP_Model {
	
	public function __construct() {
		$this->Db = $this->db();
		$this->helpers();
	}

	public function registrarUsuario($vars)
	{
		$id = uniqid();
		return $this->Db->query("insert into usuarios values('$id','$vars[nombre]','$vars[apellidos]','$vars[email]','$vars[pass]')");
	}
	
	public function getUsuario($email)
	{
		return $this->Db->query("select * from usuarios where email = '$email'");
	}
}