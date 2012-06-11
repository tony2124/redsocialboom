<?php
/**
 * Access from index.php:
 */


class Boom_Controller extends ZP_Controller {
	
	public function __construct() {
		$this->app("boom");
		$this->Templates = $this->core("Templates");
		$this->Templates->theme();
		$this->Boom_Model = $this->model("Boom_Model");
	}
	
	public function index() {	
		if(!SESSION('nombre')) redirect(get('webURL')._sh.'boom/inicioForm');
		redirect(get('webURL')._sh.'boom/noticias');
	}

	public function configuracion()
	{
		$data = $this->Boom_Model->getUsuario(SESSION('email'));
		$vars['usuario'] = $data[0]; 
		$vars['view'] = $this->view('configuracion', true);
		$this->render('content', $vars);
	}

	public function perfil($id_usuario = NULL)
	{
		if(!isset($id_usuario))
			$id_usuario = SESSION('id');
		$data = $this->Boom_Model->getPublicaciones($id_usuario);
		$vars['view'] = $this->view('perfil', true);
		$vars['publicaciones'] = $data;
		$vars['comentarios'] = $this->Boom_Model->getComentarios();
		$vars['likes'] = $this->Boom_Model->getLikes();
		$vars['id_usuario'] = $id_usuario;
		$this->render('content', $vars);
	}

	public function saveConfig()
	{
		$vars['id_usuario'] = SESSION('id');
		$vars['nombre'] = POST('nombre');
		$vars['apellidos'] = POST('apellidos');
		$vars['clave'] = POST('clave');
		$vars['email'] = POST('email');
		$vars['futbol'] = POST('futbol');
		$vars['politica'] = POST('politica');
		$vars['estudio'] = POST('estudio');
		$vars['lugar'] = POST('lugar');

		if (FILES("foto", "tmp_name")) 
		{
			$path = imagenes._sh; 
		    $tmp_name = $_FILES["foto"]["tmp_name"];
			$name = $_FILES["foto"]["name"];
			$ext = explode(".",$name);		
			$id = uniqid();
			$name = $id.".".$ext[1];
			move_uploaded_file($tmp_name, $path.$name); # Guardar el archivo en una ubicaci�n, debe tener los permisos necesarios
		} 
		$vars['foto'] = $name;
		$this->Boom_Model->saveConfig($vars);
	}

	public function like($id_publicacion, $id_perfil)
	{
		$this->Boom_Model->setLike($id_publicacion, SESSION('id'));
		redirect(get('webURL')._sh.'boom/perfil/'.$id_perfil);
	}

	public function noLike($id_publicacion, $id_perfil)
	{
		$this->Boom_Model->setNoLike($id_publicacion, SESSION('id'));
		redirect(get('webURL')._sh.'boom/perfil/'.$id_perfil);
	}

	public function noticias()
	{
		
		$vars['view'] = $this->view("noticias", true);
		$this->render("content", $vars);
	}

	public function inicioForm()
	{
		if(SESSION('nombre'))
			redirect(get('webURL')._sh.'boom/noticias');
		$vars['view']['registro'] = $this->view("registroForm", true);
		$vars['view']['inicio'] = $this->view("inicioForm", true);
		$this->render("inicioForm", $vars);
	}

	//Scrips de registro
	public function registrando()
	{
		$vars['nombre'] = POST('nombre');
		$vars['apellidos'] = POST('apellidos');
		$vars['email'] = POST('email');
		$vars['pass'] = POST('pass');
		$vars['id'] = uniqid();
		$this->Boom_Model->registrarUsuario($vars);

		SESSION('id', $id);
		SESSION('nombre', $vars['nombre']);
		SESSION('apellidos', $vars['apellidos']);
		SESSION('email', $vars['email']);
		
		redirect(get('webURL')._sh.'boom/inicioForm');
	}

	public function registrandoPublicacion()
	{
		$var['pub'] = POST('publicacion')	;
		$var['id'] = uniqid();
		$var['usuario'] = SESSION('id');
		$var['fecha'] = date('Y-m-d');
		$var['hora'] = date('H:i:s');
		$this->Boom_Model->registroPublicacion($var);
		redirect(get('webURL')._sh.'boom/perfil');
	}

	public function registrandoComentario()
	{
		$var['com'] = POST('comentario')	;
		$var['id'] = uniqid();
		$var['id_publicacion'] = POST('publicacion');
		$var['fecha'] = date('Y-m-d');
		$var['hora'] = date('H:i:s');
		$this->Boom_Model->registroComentario($var);
		redirect(get('webURL')._sh.'boom/perfil');
	}

	public function iniciando()
	{
		$email = POST('email');
		$pass = POST('pass');

		$data = $this->Boom_Model->getUsuario($email);

		if($data[0]['password'] == $pass)
		{
			SESSION('id', $data[0]['id_usuario']);
			SESSION('nombre', $data[0]['nombre']);
			SESSION('apellidos', $data[0]['apellidos']);
			SESSION('email', $data[0]['email']);
		}
			//redirect(get('webURL')._sh.'boom/noticias');
		redirect(get('webURL')._sh.'boom/inicioForm');
		
	}

	public function saliendo()
	{
		unsetsessions();
		redirect(get('webURL')._sh.'boom/inicioForm');
	}
}