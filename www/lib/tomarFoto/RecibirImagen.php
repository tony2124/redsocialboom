<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
$jpeg_data = file_get_contents('php://input');
$filename = "MIFOTO.jpg";
$result = file_put_contents( $filename, $jpeg_data );
?>
</body>
</html>