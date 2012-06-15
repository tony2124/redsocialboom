La búsqueda ha devuelto los siguientes resultados:<br><br>
<?php if($amigosBusqueda!=NULL) foreach ($amigosBusqueda as $amigo) { ?>
  <div style="padding: 3px;">
	<table>
		<tr><td>
	<div style="width: 80px; height: 80px; background-size: cover; background: url('<?php print get('webURL')._sh.'www/lib/images/usuarios/'.$amigo['foto'] ?>')"></div>
		</td>
		<td>
			<a href="<?php print get('webURL')._sh.'boom/perfil/'.$amigo['id_usuario'] ?>"><?php print $amigo['nombre'].' '.$amigo['apellidos'] ?></a><br>
			Lugar: <?php print $amigo['lugar'] ?><br>
			Equipo de futbol favorito: <?php print $amigo['futbol'] ?><br>
			Estudios: <?php print $amigo['estudio'] ?><br>
		</td>
	</tr>
	</table>
  </div>
<?php } ?>
<hr><h3>GRUPOS</h3><hr>
<?php if($gruposBusqueda!=NULL) foreach ($gruposBusqueda as $amigo) { ?>
  <div style="padding: 3px;">
	<table>
		<tr><td>
	<div style="width: 80px; height: 80px; background-size: cover; background: url('<?php print get('webURL')._sh.'www/lib/images/usuarios/'.$amigo['foto'] ?>')"></div>
		</td>
		<td>
			<a href="<?php print get('webURL')._sh.'boom/grupos/'.$amigo['id_grupo'] ?>"><?php print $amigo['nombre_grupo'] ?></a><br>
			<br>
		</td>
	</tr>
	</table>
  </div>
<?php } ?>