<?php 
	if(!defined("_access")) {
		die("Error: You don't have permission to access here..."); 
	}
	
	if(isMobile()) {
		include "mobile/content.php";
	} else {
?>
<div class="container" style="width:100%">
	<div class="content">
		<div class="row">
			<div class="span3">
				<div class="sidebar-nav well">
					<i class="icon-edit"></i>&nbsp;<a href="<?php print get('webURL')._sh.'boom/configuracion' ?>">Cambia tu foto</a>
					<img src="<?php print path("www/lib/images/usuarios/".SESSION('foto'),true) ?>">
		            <ul class="nav nav-list">
		              <li class="nav-header">Boom!</li>
		              <li class="active"><a href="#">Noticias</a></li>
		              <li><a href="#">Perfil</a></li>
		              <li><a href="#">Amigos</a></li>
		              <li><a href="#">Fotos</a></li>
		              <li class="nav-header">Grupos</li>
		              <li><a href="#">Instituto tecnológico</a></li>
		              <li><a href="#">Clubes de ciencia</a></li>
		              <li><a href="#">Sistemas generación</a></li>		        
		              <li class="nav-header">Amigos recientes</li>
		              <img style="margin-left: 5px; margin-top: 5px;" src="" width="40" height="40">
		              <img style="margin-left: 5px; margin-top: 5px;" src="" width="40" height="40">
		              <img style="margin-left: 5px; margin-top: 5px;" src="" width="40" height="40">
		              <img style="margin-left: 5px; margin-top: 5px;" src="" width="40" height="40">
		              <img style="margin-left: 5px; margin-top: 5px;" src="" width="40" height="40">
		              <img style="margin-left: 5px; margin-top: 5px;" src="" width="40" height="40">
		              <img style="margin-left: 5px; margin-top: 5px;" src="" width="40" height="40">
		              <img style="margin-left: 5px; margin-top: 5px;" src="" width="40" height="40">
		             
		            </ul>
		          </div><!--/.well -->
			</div>
		    <div class="span9">
				<?php $this->load(isset($view) ? $view : NULL, TRUE); ?>
			</div>

<?php } ?>