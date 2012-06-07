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
		return $this->Db->query("insert into usuarios values('$vars[id]','$vars[nombre]','$vars[apellidos]','$vars[email]','$vars[pass]')");
	}
	
	public function getUsuario($email)
	{
		return $this->Db->query("select * from usuarios where email = '$email'");
	}

	public function getPublicaciones($id)
	{
		return $this->Db->query("select * from publicacion natural join usuarios where id_usuario = '$id' order by fecha_publicacion desc, hora_publicacion desc");
	}

	public function getComentarios()
	{
		return $this->Db->query("select * from comentarios natural join usuarios");
	}

	public function registroPublicacion($var)
	{
		return $this->Db->query("insert into publicacion values('$var[id]','$var[usuario]','$var[pub]','$var[fecha]','$var[hora]')");
	}

	public function registroComentario($var)
	{
		return $this->Db->query("insert into comentarios values('$var[id]','$var[id_publicacion]','$var[com]','$var[fecha]','$var[hora]')");
	}
}