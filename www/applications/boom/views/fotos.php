<form action="<?php print get('webURL')._sh.'boom/crearAlbum/'.$id ?>" method="post">
	<input type="text" placeholder="Nombre del álbum" name="nombre">&nbsp;
	<input type="submit" value="Crear" class="btn btn-success">
</form>
<hr>
<?php 
	foreach ($albumes as $album) { ?>
		<table>
			<tr><td><img src="<?php print get('webURL')._sh.'/www/lib/images/carpeta.jpg' ?>" width="100" heigth="100"></td>
			<tr><td> <a href="<?php print get('webURL')._sh.'boom/album/'.$album['id_album'] ?>"><?php print $album['nombre_album'] ?></a></td></tr>
		</table>
	<?php }
 ?>