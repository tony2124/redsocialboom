<form action="<?php print get('webURL')._sh.'boom/crearAlbum/'.$id ?>" method="post">
	<input type="text" placeholder="Nombre del álbum" name="nombre">&nbsp;
	<input type="submit" value="Crear" class="btn btn-success">
</form>
<hr><h3>ÁLBUMES</h3><hr>
<table>
<?php $i = 0;
	if($albumes == NULL) print 'NO HAY ÁLBUMES'; else foreach ($albumes as $album) { 
			if($i%4 == 0)	
			print '<tr>';
			?>
			<td><img src="<?php print get('webURL')._sh.'/www/lib/images/carpeta.jpg' ?>" width="100" heigth="100">
			<a href="<?php print get('webURL')._sh.'boom/album/'.$album['id_album'] ?>"><?php print $album['nombre_album'] ?></a></td>

		
	<?php $i++; if($i%4 == 0)	print '</tr>'; 
}
 ?>
 </table>