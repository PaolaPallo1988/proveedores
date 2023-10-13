<!DOCTYPE html>
<?php
session_start();
session_destroy();
?>
<html lang="en">

<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
	<title>Sistema de Calificación de Proveedores | MDN</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
</head>

<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a class="navbar-brand" href="https://www.defensa.gob.ec/">SISTEMA DE CALIFICACIÓN DE PROVEEDORES DTI - MDN</a>
		</div>
	</nav> <br><br>
	<div class="col-md-3"> </div>
	<div class="col-md-6 well">
		<h3 class="text-primary"> Autocierre de Sesión por Inactividad de 20 minutos</h3>
		<hr style="border-top:1px dotted #ccc;" />
		<center>
			<h3>Se ha cerrado sesión por Inactividad</h3>
		</center>
		<a href="../index.php">Volver a acceder</a>
	</div>
	<!-- SEGURIDAD QUE LA PAGINA SE CIERRE EN 20 MINUTOS -->
	<script src="../js/formularios/seguridad.js"></script>
</body>