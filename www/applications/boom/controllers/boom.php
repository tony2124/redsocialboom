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
		$vars['view'] = $this->view("inicioForm", true);
		$this->render("content", $vars);
	}
}