<form action="<?php print get('webURL')._sh.'/boom/creandoGrupo' ?>" method="post">
<p>Nombre del grupo</p><input type="text" name="name"><br><input type="submit" value="Crear" class="btn btn-success">
</form>
<hr><h3>MIS GRUPOS</h3><hr>
<?php foreach ($grupos as $grupo) { ?>
	<div style="border: 1px solid black; width: 400px; padding: 10px; margin-bottom: 20px;">
		<p><a href="<?php print get('webURL')._sh.'boom/grupo/'.$grupo['id_grupo'] ?>"><?php print $grupo['nombre_grupo'] ?></a></p>
	</div>
<?php } ?>