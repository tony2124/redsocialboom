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

	public function setAlbum($id, $usuario ,$nombre, $fecha)
	{
		return $this->Db->query("insert into albumes values('$id','$usuario','$nombre','$fecha')");
	}

	public function getFotos($id)
	{
		return $this->Db->query("select * from fotos natural join albumes where id_album = '$id'");
	}

	public function subirFotos($vars)
	{
		return $this->Db->query("insert into fotos values('$vars[id]','$vars[album]','$vars[foto]')");
	}

	public function getAlbumes($id)
	{
		return $this->Db->query("select * from albumes where id_usuario = '$id'");
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
		return $this->Db->query("select * from publicacion natural join usuarios where muro = '$id' order by fecha_publicacion desc, hora_publicacion desc");
	}

	public function getComentarios()
	{
		return $this->Db->query("select * from comentarios natural join usuarios order by fecha_comentario asc, hora_comentario asc");
	}

	public function registroPublicacion($var)
	{
		return $this->Db->query("insert into publicacion values('$var[id]','$var[usuario]','$var[muro]','$var[pub]','$var[fecha]','$var[hora]')");
	}

	public function registroComentario($var)
	{
		return $this->Db->query("insert into comentarios values('$var[id]','$var[id_usuario]','$var[id_publicacion]','$var[com]','$var[fecha]','$var[hora]')");
	}

	public function getAmigos($amigo)
	{
		return $this->Db->query("select * from usuarios where nombre like '$amigo%'");
	}

	public function getMisAmigos($id)
	{
		return $this->Db->query("select * from amistad natural join usuarios where (usuario1 = '$id' and amigos = 1 and id_usuario = usuario2) or (usuario2 = '$id' and amigos = 1 and id_usuario = usuario1)");
	}

	public function enviarSolicitud($id_usuario, $id_usuario_destino)
	{
		return $this->Db->query("insert into amistad values('$id_usuario','$id_usuario_destino',0)");
	}

	public function aceptarSolicitud($u1, $u2)
	{
		return $this->Db->query("update amistad set amigos = 1 where (usuario1 = '$u1' and usuario2 = '$u2') or (usuario1 = '$u2' and usuario2 = '$u1')");
	}
	public function getAmistades($id, $id_destino)
	{
		return $this->Db->query("select * from amistad where usuario1 = '$id' and usuario2 = '$id_destino'");
	}
}