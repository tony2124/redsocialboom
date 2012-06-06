<div style="margin-right: 20px">
<form action="<?php print get('webURL')._sh.'boom/registrando' ?>" method="post">
	<fieldset>
		<legend>Regístrate en Boom!</legend>
	<label>Nombre</label>
	<input type="text" name="nombre">
	<label>Apellidos</label>
	<input type="text" name="apellidos">
	<label>Correo electrónico</label>
	<input type="text" name="email">
	<label>Contraseña</label>
	<input type="password" name="pass"><br>
	<input type="submit" class="btn">
	</fieldset>
</form>
</div>