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
		return $this->Db->query("insert into usuarios values('$vars[id]','$vars[nombre]','$vars[apellidos]','$vars[email]','$vars[pass]','BOOM.jpg','','','','')");
	}

	public function getLikes()
	{
		return $this->Db->query("select * from gustos");
	}
	
	public function setLike($id_publicacion, $id_usuario)
	{
		return $this->Db->query("insert into gustos values ('$id_publicacion', '$id_usuario')");
	}

	public function setNoLike($id_publicacion, $id_usuario)
	{
		return $this->Db->query("delete from gustos where id_publicacion = '$id_publicacion' and id_usuario = '$id_usuario'")	;
	}

	public function saveConfig($vars)
	{
		return $this->Db->query("update usuarios set nombre = '$vars[nombre]', apellidos = '$vars[apellidos]',email = '$vars[email]',password = '$vars[clave]',foto ='$vars[foto]',politica = '$vars[politica]',futbol = '$vars[futbol]',estudio ='$vars[estudio]',lugar = '$vars[lugar]' where id_usuario = '$vars[id_usuario]'");
	}

	public function getUsuario($email)
	{
		return $this->Db->query("select * from usuarios where email = '$email'");
	}

	public function getUsuarioId($id)
	{
		return $this->Db->query("select * from usuarios where id_usuario = '$id'");
	}

	public function getPublicaciones($id)
	{
		return $this->Db->query("select * from publicacion natural join usuarios where id_usuario = '$id' order by fecha_publicacion desc, hora_publicacion desc");
	}

	public function getComentarios()
	{
		return $this->Db->query("select * from comentarios natural join usuarios order by fecha_comentario asc, hora_comentario asc");
	}

	public function registroPublicacion($var)
	{
		return $this->Db->query("insert into publicacion values('$var[id]','$var[usuario]','$var[pub]','$var[fecha]','$var[hora]')");
	}

	public function registroComentario($var)
	{
		return $this->Db->query("insert into comentarios values('$var[id]','$var[id_usuario]','$var[id_publicacion]','$var[com]','$var[fecha]','$var[hora]')");
	}
}