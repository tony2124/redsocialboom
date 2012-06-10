<table width="100%">
	<tr>
		<td>

<p><b>DATOS PERSONALES</b></p>
<label>Tu nombre</label><input type="text" name="nombre" value="<?php print $usuario['nombre'] ?>">
<label>Tus apellidos</label><input type="text" name="nombre" value="<?php print $usuario['apellidos'] ?>">
<label>Cambia tu contraseña</label><input type="password" name="nombre" value="<?php print $usuario['password'] ?>">
<label>Correo electrónico</label><input type="text" name="nombre" value="<?php print $usuario['email'] ?>">

		</td>
		<td>
<p><b>FOTO ACTUAL</b></p>
<?php if($usuario['foto'] != NULL) { ?>
<div style="width: 300px; height: 210px; background-size: cover; background: url('<?php print get('webURL')._sh.'www/lib/images/usuarios/'.$usuario['foto'] ?>')"></div>
<?php }else{ ?>
<div style="width: 300px; height: 210px; background-size: cover; background: url('<?php print get('webURL')._sh.'www/lib/images/usuarios/BOOM.jpg' ?>')"></div>
<?php } ?>
<input type="file" name="foto">
		</td>
	</tr>
</table>

<hr>

<hr>
<table width="100%">
	<tr>
		<td valign="top">
<p><b>TUS INTERESES</b></p>
<label>Equipo de futbol favorito</label>
<input type="text" name="futbol" value="<?php print $usuario['futbol'] ?>"> 
<label>Ideología política</label>
<textarea name="politica"><?php print $usuario['politica'] ?></textarea>
		</td>
		<td>
<p><b>TUS ESTUDIOS</b></p>
<label>¿Donde estás estudiando?</label>
<input type="text" name="estudio" value="<?php print $usuario['estudio'] ?>"> 
<p>¿De dónde eres?</p>
<input type="text" name="lugar" value="<?php print $usuario['lugar'] ?>"> 
		</td>
	</tr>
</table>
<hr>
<input type="submit" value="Guardar datos" class="btn btn-success">
<hr>
