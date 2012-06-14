<?php 
	if(!defined("_access")) {
		die("Error: You don't have permission to access here..."); 
	}
?>
<!DOCTYPE html>
<html lang="<?php print get("webLang"); ?>">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title><?php print $this->getTitle(); ?></title>
		
		<link href="<?php print path("vendors/css/frameworks/bootstrap/css/bootstrap.min.css", "zan"); ?>" rel="stylesheet">
		<script type="text/javascript" src="<?php print path("vendors/js/jquery-1.7.1.min.js", "zan"); ?>"></script>
		<script type="text/javascript" src="<?php print path("vendors/css/frameworks/bootstrap/js/bootstrap.min.js", "zan"); ?>"></script>

		<link href="<?php print $this->themePath; ?>/css/style.css" rel="stylesheet">

	</head>

	<body>
		<?php if(SESSION('nombre')) { ?>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container-fluid">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="#"><img src="<?php print path("www/lib/images/BOOM.jpg",true); ?>" width="25" height="25">&nbsp;Boom!</a>
	  
	<div class="btn-group pull-right">
		<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
		 <i class="icon-user"></i> <?php print SESSION('nombre').' '.SESSION('apellidos') ?>
	          <span class="caret"></span>
	        </a>
	        <ul class="dropdown-menu">
	          <li><a href="<?php print get('webURL')._sh.'boom/configuracion' ?>">Configuración del perfil</a></li>	          
	          <li class="divider"></li>
	          <li><a href="<?php print get('webURL')._sh.'boom/saliendo' ?>">Salir sesion</a></li>
	        </ul>
	      </div></a>

	      <div class="nav-collapse">
	        <ul class="nav">
	          <li class="active"><a href="<?php print get('webURL') . _sh . 'boom/noticias' ?>">Noticias</a></li>
	          <li><a href="<?php print get('webURL') . _sh . 'boom/perfil' ?>">Perfil</a></li>
	          <li><a href="<?php print get('webURL') . _sh . 'boom/amigos' ?>">Amigos</a></li>
	          <li><a href="<?php print get('webURL') . _sh . 'boom/fotos' ?>">Fotos</a></li>
	        </ul>
	      </div><!--/.nav-collapse -->
	    </div>
	  </div>
	</div>
<?php }  else { ?>
<div style="width: 100%; height: 200px; background: green"></div>
<?php } ?>
