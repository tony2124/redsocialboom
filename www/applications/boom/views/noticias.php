<h4>Publica lo que estás pensando...</h4>
<form action="<?php print get('webURL')._sh.'boom/registrandoPublicacion/'.SESSION('id') ?>" method="post">
	<textarea name="publicacion" style="width:100%" placeholder="¿Cuál es tu estado de ánimo?..."></textarea>
	<p>
		<input type="submit" class="pull-right btn btn-primary btn-large" value="Publicar">
	</p>
	<p>&nbsp;</p>
</form>
<hr>

<?php if($publicaciones == NULL) { ?>
	<div class="alert alert-success">
		<h3>Empieza haciendo una publicacion y busca a tus amigos</h3>
	</div>
<?php } else foreach ($publicaciones as $publi) foreach ($publi as $pub) { ?>

<div class="well" style="background: #eeeeee">
	<img style="float:left; margin: 10px;" src="<?php print path("www/lib/images/usuarios/".$pub['foto'],true) ?>" width="80" height="80"> 
	<div style="foat:left">
		<?php print '<a href="'.get('webURL')._sh.'boom/perfil/'.$pub['id_usuario'].'">'.$pub['nombre'].' '.$pub['apellidos'].'</a><br>'.$pub['texto_publicacion'] ?>
	</div>
	<hr>
	<?php $lks=0; $usuario = false; if($likes) foreach ($likes as $like) {
		if($like['id_publicacion'] == $pub['id_publicacion'])
		{
			$lks++;
			if($like['id_usuario'] == SESSION('id'))
				$usuario = true;
		}
			
	} ?>
	<div>A <?php print $lks ?> personas les gusta esto</div>
	<div>
		<?php if($usuario == false){ ?>
		 <a class="btn btn-success btn-mini" href="<?php print get('webURL')._sh.'boom/like/'.$pub['id_publicacion'] ?>">Me gusta</a>&nbsp;
			<?php }else{ ?>
	     <a class="btn btn-danger btn-mini" href="<?php print get('webURL')._sh.'boom/noLike/'.$pub['id_publicacion'] ?>">Ya no me gusta</a>
		<?php } ?>
	</div>
	<div style="font-size: 9px;">
		<i>Publicado el <?php print $pub['fecha_publicacion'] ?> a las <?php print $pub['hora_publicacion'] ?></i>
	</div>

	<hr style="border-top: 1px solid yellow">
	<?php if($comentarios!=NULL) foreach ($comentarios as $com) if($com['id_publicacion'] == $pub['id_publicacion']){ ?>
	<!-- COMENTARIOS -->
	<div class="well">
		<img style="float:left; margin-left: 10px; margin-right: 10px" src="<?php print get('webURL')._sh.'www/lib/images/usuarios/'.$com['foto'] ?>" width="80" height="80"> 
		<div style="foat:left">
			<?php print '<a href="'.get('webURL')._sh.'boom/perfil/'.$com['id_usuario'].'">'.$com['nombre'].' '.$com['apellidos'].'</a><br>'. $com['texto_comentario'] ?>
		</div>
		<hr>
		<div style="font-size: 9px;">
			<i>Publicado el <?php print $com['fecha_comentario'] ?> a las <?php print $com['hora_comentario'] ?></i>
		</div>
	</div>
		<?php } ?>
	<!--formulario COMENTAR -->
	<form action="<?php print get('webURL')._sh.'boom/registrandoComentario' ?>" method="post">
		<img src="<?php print get('webURL')._sh.'www/lib/images/usuarios/'.SESSION('foto') ?>" style="float:left; margin-right: 10px; margin-left: 50px;" width="80" height="80">
		<div style="float:left; width: 500px;">
		<textarea name="comentario" style="width:100%" placeholder="Escribe un comentario"></textarea>
		<input type="hidden" name="publicacion" value="<?php print $pub['id_publicacion'] ?>">
		</div>
		<p>
			<input type="submit" class="pull-right btn btn-primary btn-large" value="Comentar">
		</p>
		<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	</form>
</div>
<hr>
<?php } ?>



