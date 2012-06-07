<form action="<?php print get('webURL')._sh.'boom/iniciando' ?>" method="post">
	<fieldset>
		<legend>Inicio de sesión</legend>
	<div style="float: left; margin-right: 10px">
		<img src="<?php print path('www/lib/images/BOOM.jpg',true) ?>" width="150" height="150">
	</div>
	<div style="float: left">
		<br>
		<div class="input-prepend">
              <span class="add-on"><i class="icon-envelope"></i></span>
              <input type="text" name="email" placeholder="Correo electrónico">
            </div>

		<div class="input-prepend">
              <span class="add-on"><i class="icon-edit"></i></span>
              <input type="password" name="pass" placeholder="Contraseña">
            </div>

		<input type="submit" class="btn btn-primary btn-large" value="Entrar"> 
	</div>
	</fieldset>
</form>