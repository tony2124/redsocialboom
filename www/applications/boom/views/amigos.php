A continuacion se muestran tus amigos<br><br>
<?php if($amigos!=NULL) foreach ($amigos as $amigo) { ?>
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