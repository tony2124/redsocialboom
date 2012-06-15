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
		              <li><a href="<?php print get('webURL') . _sh . 'boom/noticias' ?>">Noticias</a></li>
		              <li><a href="<?php print get('webURL') . _sh . 'boom/perfil' ?>">Perfil</a></li>
		              <li><a href="<?php print get('webURL') . _sh . 'boom/amigos' ?>">Amigos</a></li>
		              <li><a href="<?php print get('webURL') . _sh . 'boom/fotos/'.SESSION('id') ?>">Fotos</a></li>
		              <li class="nav-header">Grupos&nbsp;<a href="<?php print get('webURL')._sh.'boom/grupos' ?>" class="btn bt-primary"><i class="icon-edit"></i></a></li>
		              <li><a href="#">Instituto tecnológico</a></li>
		              <li><a href="#">Clubes de ciencia</a></li>
		              <li><a href="#">Sistemas generación</a></li>		        
		              <li class="nav-header">Amigos recientes</li>
		              <?php if($amigos!=NULL) foreach ($amigos as $amigo ) { ?>
		              <img style="margin-left: 5px; margin-top: 5px;" src="<?php print get('webURL')._sh.'www/lib/images/usuarios/'.$amigo['foto'] ?>" width="40" height="40">	
		              <?php } ?>
		              
		              <!--<img style="margin-left: 5px; margin-top: 5px;" src="" width="40" height="40">
		              <img style="margin-left: 5px; margin-top: 5px;" src="" width="40" height="40">
		              <img style="margin-left: 5px; margin-top: 5px;" src="" width="40" height="40">
		              <img style="margin-left: 5px; margin-top: 5px;" src="" width="40" height="40">
		              <img style="margin-left: 5px; margin-top: 5px;" src="" width="40" height="40">
		              <img style="margin-left: 5px; margin-top: 5px;" src="" width="40" height="40">
		              <img style="margin-left: 5px; margin-top: 5px;" src="" width="40" height="40">-->
		             
		            </ul>
		          </div><!--/.well -->
			</div>
		    <div class="span9">
				<?php $this->load(isset($view) ? $view : NULL, TRUE); ?>
			</div>

<?php } ?>