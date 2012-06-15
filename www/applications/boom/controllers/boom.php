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
		$vars['amigos'] = $this->Boom_Model->getMisAmigos(SESSION('id'));
		$vars['grupos'] = $this->Boom_Model->getGrupos(SESSION('id'));
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

		$vars['amigos'] = $this->Boom_Model->getMisAmigos($id);
		$vars['grupos'] = $this->Boom_Model->getGrupos($id);
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

	public function like($id_publicacion, $id_perfil, $grupo = NULL)
	{
		$this->Boom_Model->setLike($id_publicacion, SESSION('id'));
		if(isset($grupo))
			redirect(get('webURL')._sh.'boom/grupos/'.$id_perfil);
		else if(isset($id_perfil))
			redirect(get('webURL')._sh.'boom/perfil/'.$id_perfil);
		else
			redirect(get('webURL')._sh.'boom/noticias');
	}

	public function noLike($id_publicacion, $id_perfil)
	{
		$this->Boom_Model->setNoLike($id_publicacion, SESSION('id'));
		if(isset($id_perfil))
			redirect(get('webURL')._sh.'boom/perfil/'.$id_perfil);
		else
			redirect(get('webURL')._sh.'boom/noticias');
	}

	public function noticias()
	{
		$vars['comentarios'] = $this->Boom_Model->getComentarios();
		$vars['likes'] = $this->Boom_Model->getLikes();
		$vars['amigos'] = $this->Boom_Model->getMisAmigos(SESSION('id'));
		$vars['grupos'] = $this->Boom_Model->getGrupos(SESSION('id'));
		$i = 0;
		if( $vars['amigos'] != NULL ) foreach ($vars['amigos'] as $amigo) {
			$vars['publicaciones'][$i] = $this->Boom_Model->getPublicaciones($amigo['id_usuario']);
		}

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

	public function registrandoPublicacion($muro, $grupo = NULL)
	{
		$var['pub'] = POST('publicacion')	;
		$var['id'] = uniqid();
		$var['usuario'] = SESSION('id');
		$var['fecha'] = date('Y-m-d');
		$var['hora'] = date('H:i:s');
		$var['muro'] = $muro;
		$this->Boom_Model->registroPublicacion($var);
		if(isset($grupo))
			redirect(get('webURL')._sh.'boom/grupos/'.$muro);
		else 
			redirect(get('webURL')._sh.'boom/perfil/'.$muro);
	}

	public function registrandoComentario($id_usuario=NULL, $grupo = NULL)
	{
		$var['com'] = POST('comentario')	;
		$var['id'] = uniqid();
		$var['id_publicacion'] = POST('publicacion');
		$var['fecha'] = date('Y-m-d');
		$var['hora'] = date('H:i:s');
		$var['id_usuario']=SESSION('id');
		$this->Boom_Model->registroComentario($var);
		if(isset($grupo))
			redirect(get('webURL')._sh.'boom/grupos/'.$id_usuario);
		else 
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
		$vars['amigos'] = $this->Boom_Model->getMisAmigos(SESSION('id'));
		$amigo = POST('amigo');
		$vars['amigosBusqueda'] = $this->Boom_Model->getAmigos($amigo);
		//____($vars['amigosBusqueda']);
		$vars['grupos'] = $this->Boom_Model->getGrupos(SESSION('id'));
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

	public function amigos()
	{
		$vars['amigos'] = $this->Boom_Model->getMisAmigos(SESSION('id'));
		$vars['view'] = $this->view('amigos', true);
		$vars['grupos'] = $this->Boom_Model->getGrupos(SESSION('id'));
		$this->render('content', $vars);
	}

	public function fotos($id)
	{
		$vars['amigos'] = $this->Boom_Model->getMisAmigos($id);
		$vars['grupos'] = $this->Boom_Model->getGrupos(SESSION('id'));
		$vars['albumes'] = $this->Boom_Model->getAlbumes($id);
		$vars['view'] = $this->view('fotos', true);
		$vars['id'] = $id;
		$this->render('content', $vars);
	}

	public function crearAlbum($id)
	{
		$id_album = uniqid();
		if(mkdir(imagenes._sh.'albumes/'.$id_album, 0777))
			$this->Boom_Model->setAlbum($id_album, SESSION('id') ,POST('nombre'), date('Y-m-d'));
		redirect(get('webURL')._sh.'boom/fotos/'.$id);
	}

	public function album($id)
	{
		$vars['fotos'] = $this->Boom_Model->getFotos($id);
		//Amigos de persona actual
		$vars['amigos'] = $this->Boom_Model->getMisAmigos(SESSION('id'));
		$vars['grupos'] = $this->Boom_Model->getGrupos(SESSION('id'));
		$vars['album'] = $id;
		$vars['view'] = $this->view('verfotos', true);
		$this->render('content', $vars);
	}

	public function subirFoto($album)
	{
		$vars['id'] = uniqid();
		$vars['album'] = $album;

		if (FILES("foto", "tmp_name")) 
		{
			$path = imagenes.'/albumes/'.$album._sh; 
		    $tmp_name = $_FILES["foto"]["tmp_name"];
			$name = $_FILES["foto"]["name"];
			$ext = explode(".",$name);		
			$id = uniqid();
			$name = $id.".".$ext[1];
			move_uploaded_file($tmp_name, $path.$name);
			$vars['foto'] = $name;
			$this->Boom_Model->subirFotos($vars);
		}

		redirect(get('webURL')._sh.'boom/album/'.$album);
		
	}

	public function grupos($id = NULL)
	{

		$vars['amigos'] = $this->Boom_Model->getMisAmigos(SESSION('id'));
		$vars['grupos'] = $this->Boom_Model->getGrupos(SESSION('id'));

		if(!isset($id)){
		$vars['view'] = $this->view('crearGrupo', true);
		}
		else
		{
			$vars['publicaciones'] = $this->Boom_Model->getPublicaciones($id);
			$vars['comentarios'] = $this->Boom_Model->getComentarios();
			$vars['grupo'] = $this->Boom_Model->getGrupoName($id);
			$vars['likes'] = $this->Boom_Model->getLikes();
			$vars['estado'] = 'joined';
			$vars['view'] = $this->view('grupo', true);
		}
		
		$this->render('content', $vars);
	}


	public function creandoGrupo()
	{
		$vars['id'] = uniqid();
		$vars['nombre'] = POST('name');
		$vars['id_usuario'] = SESSION('id');
		$this->Boom_Model->crearGrupo($vars);
		redirect(get('webURL')._sh.'boom/grupos');
	}
}