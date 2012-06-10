<?php 
	if(!defined("_access")) {
		die("Error: You don't have permission to access here..."); 
	}
	
	if(!isMobile()) {
?>
<div class="span4">
	<h3>Busca amigos!</h3>
	<form action="" method="post">
		<input type="text" placeholder="Escribe el nombre" name="amigo"><br>
		<input type="submit" value="Buscar" class="btn">
	</form>
</div>

<?php 
	} 
?>

