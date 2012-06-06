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
		$vars["message"] = __(_("Hello World"));
		$vars["view"]	 = $this->view("show", TRUE);
		
		$this->render("content", $vars);
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
		$this->Boom_Model->registrarUsuario($vars);
		
			SESSION('nombre', $vars['nombre']);
			SESSION('apellidos', $vars['apellidos']);
			SESSION('email', $vars['email']);
		
		redirect(get('webURL')._sh.'boom/inicioForm');
	}

	public function iniciando()
	{
		$email = POST('email');
		$pass = POST('pass');

		$data = $this->Boom_Model->getUsuario($email);

		if($data[0]['password'] == $pass)
		{
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