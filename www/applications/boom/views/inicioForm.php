<form action="<?php print get('webURL')._sh.'boom/iniciando' ?>" method="post">
	<div style="float: left; margin-right: 10px">
		<img src="<?php print path('www/lib/images/ENTRAR.jpg',true) ?>" width="130" height="150">
	</div>
	<div style="float: left">
		<br>
		<div class="input-prepend">
              <span class="add-on"><i class="icon-envelope"></i></span>
              <input type="text" name="email" placeholder="Correo electrónico">
            </div>

		<div class="input-prepend">
              <span class="add-on"><i class="icon-edit"></i></span>
              <input type="text" name="pass" placeholder="Contraseña">
            </div>

		<input type="submit" class="btn btn-primary btn-large" value="Entrar"> 
		<hr><a href="">Regístrate</a>
	</div>
</form>