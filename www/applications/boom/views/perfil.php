<h4>Publica lo que estás pensando...</h4>
<form action="<?php print get('webURL')._sh.'boom/registrandoPublicacion' ?>" method="post">
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
<?php } else foreach ($publicaciones as $pub) { ?>
<div class="well" style="background: #eeeeee">
	<img style="float:left; margin: 10px;" src="<?php print path("www/lib/images/BOOM.jpg",true) ?>" width="80" height="80"> 
	<div style="foat:left">
		<?php print '<a href="">'.$pub['nombre'].' '.$pub['apellidos'].'</a><br>'.$pub['texto_publicacion'] ?>
	</div>
	<hr>
	<div>A 5 personas les gusta esto :D</div>
	<div>
		<a class="btn btn-success" href="">Me gusta</a>&nbsp;
		<a class="btn btn-danger" href="">No me gusta</a> 
	</div>
	<div style="font-size: 9px;">
		<i>Publicado el <?php print $pub['fecha_publicacion'] ?> a las <?php print $pub['hora_publicacion'] ?></i>
	</div>

	<hr style="border-top: 1px solid yellow">
	<?php if($comentarios!=NULL) foreach ($comentarios as $com) if($com['id_publicacion'] == $pub['id_publicacion']){ ?>
	<!-- COMENTARIOS -->
	<div class="well">
		<img style="float:left; margin-left: 50px; margin-right: 10px" src="" width="80" height="80"> 
		<div style="foat:left">
			<?php print '<a href="">'.$pub['nombre'].' '.$pub['apellidos'].'</a><br>'. $com['texto_comentario'] ?>
		</div>
		<hr>
		<div style="font-size: 9px;">
			<i>Publicado el <?php print $com['fecha_comentario'] ?> a las <?php print $com['hora_comentario'] ?></i>
		</div>
	</div>
		<?php } ?>
	<!--formulario COMENTAR -->
	<form action="<?php print get('webURL')._sh.'boom/registrandoComentario' ?>" method="post">
		<img src="" style="float:left; margin-right: 10px; margin-left: 50px;" width="80" height="80">
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
<!--
<div class="well" style="background: #eeeeee">
	<img style="float:left; margin: 10px;" src="<?php print path("www/lib/images/USER.jpg",true) ?>" width="80" height="80"> 
	<div style="foat:left">
		Ya de vi de principio veo un par de huellas.
	</div>
	<hr>
	<div>A 5 personas les gusta esto :D</div>
	<div>
		<a class="btn btn-success" href="">Me gusta</a>&nbsp;
		<a class="btn btn-danger" href="">No me gusta</a> 
	</div>
	<div style="font-size: 9px;">
		<i>Publicado el 05 de Junio del 2012 a las 13:53</i>
	</div>
	<hr style="border-top: 1px solid yellow">
	<form>
		<img src="" style="float:left; margin-right: 10px" width="80" height="80">
		<div style="float:left; width: 550px;">
		<textarea style="width:100%" placeholder="Escribe un comentario"></textarea>
		</div>
		<p>
			<input type="submit" class="pull-right btn btn-primary btn-large" value="Comentar">
		</p>
		<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	</form>
</div>-->

