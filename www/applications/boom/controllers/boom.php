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
			$id = SESSION('id');
		else
		{
			if($id_usuario == SESSION('id')) redirect(get('webURL')._sh.'/boom/perfil');
			$id = $id_usuario;

		}
		$data = $this->Boom_Model->getPublicaciones($id);
		
		$vars['publicaciones'] = $data;
		$vars['comentarios'] = $this->Boom_Model->getComentarios();
		$vars['likes'] = $this->Boom_Model->getLikes();
		$vars['id_usuario'] = $id;
		if(!isset($id_usuario))
		{
			$vars['view'] = $this->view('perfil', true);
			$this->render('content', $vars);
		}
		else
		{
			$vars['view'] = $this->view('profileX', true);
			$data = $this->Boom_Model->getUsuarioId($id_usuario);
			
			$vars['foto'] = $data[0];

			$amigos = $this->Boom_Model->getAmistades(SESSION('id'), $id_usuario);
			if($amigos!=NULL)
			{
				if($amigos[0]['amigos'] == 0)
					$vars['estado'] = 'enviada';
				else
					$vars['estado'] = 'amigos';
					
					
			}
			else
			{
				$amigos = $this->Boom_Model->getAmistades($id_usuario, SESSION('id'));
				if($amigos!=NULL)
				{
					if($amigos[0]['amigos'] == 0)
						$vars['estado'] = 'aceptar';
					else
						$vars['estado'] = 'amigos';
				}
			}
			$this->render('contentProfile', $vars);
		}
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
			SESSION('foto',$name);
			$vars['foto'] = $name;
		} else $vars['foto'] = SESSION('foto');
		
		$this->Boom_Model->saveConfig($vars);

		redirect(get('webURL')._sh.'boom/perfil');
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
			redirect(get('webURL')._sh.'boom/perfil');
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

		SESSION('id', $vars['id']);
		SESSION('nombre', $vars['nombre']);
		SESSION('apellidos', $vars['apellidos']);
		SESSION('email', $vars['email']);
		SESSION('foto','BOOM.jpg');
		redirect(get('webURL')._sh.'boom/inicioForm');
	}

	public function registrandoPublicacion($muro)
	{
		$var['pub'] = POST('publicacion')	;
		$var['id'] = uniqid();
		$var['usuario'] = SESSION('id');
		$var['fecha'] = date('Y-m-d');
		$var['hora'] = date('H:i:s');
		$var['muro'] = $muro;
		$this->Boom_Model->registroPublicacion($var);
		redirect(get('webURL')._sh.'boom/perfil/'.$muro);
	}

	public function registrandoComentario($id_usuario=NULL)
	{
		$var['com'] = POST('comentario')	;
		$var['id'] = uniqid();
		$var['id_publicacion'] = POST('publicacion');
		$var['fecha'] = date('Y-m-d');
		$var['hora'] = date('H:i:s');
		$var['id_usuario']=SESSION('id');
		$this->Boom_Model->registroComentario($var);
		redirect(get('webURL')._sh.'boom/perfil/'.$id_usuario);
	}

	public function solicitud($id)
	{
		$this->Boom_Model->enviarSolicitud(SESSION('id'),$id);
		redirect(get('webURL')._sh.'boom/perfil/'.$id );
	}

	public function aceptarSolicitud($id)
	{
		$this->Boom_Model->aceptarSolicitud(SESSION('id'),$id);
		redirect(get('webURL')._sh.'boom/perfil/'.$id );
	}

	public function buscarAmigos()
	{
		$amigo = POST('amigo');
		$vars['amigos'] = $this->Boom_Model->getAmigos($amigo);
		$vars['view'] = $this->view('busquedaAmigos', true);
		$this->render('content', $vars);
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
			SESSION('foto', $data[0]['foto']);
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