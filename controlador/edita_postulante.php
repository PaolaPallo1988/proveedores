<?php

include("../conexion/conexion.php");

if (isset($_POST['actualizapostulante'])) {

$id_usuario = mysqli_real_escape_string($conn_registro, (strip_tags($_POST['id_usuario'], ENT_QUOTES)));
$nombre_usuario = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["nombre_usuario"], ENT_QUOTES)));
$cedula_usuario = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["cedula_usuario"], ENT_QUOTES)));
$correo_usuario = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["correo_usuario"], ENT_QUOTES)));
$password_usuario = (strip_tags($_POST["password_usuario"], ENT_QUOTES));
$hashPassword = password_hash($password_usuario, PASSWORD_DEFAULT);


$sql = "UPDATE usuario SET nombre_usuario = '$nombre_usuario', cedula_usuario = '$cedula_usuario', correo_usuario = '$correo_usuario', password_usuario = '$hashPassword' WHERE id_usuario='$id_usuario' ";

		if (mysqli_query($conn_registro, $sql)){

			echo "<script>
			Swal.fire({
			icon: 'success',
			title: 'Bien...',
			text: 'Usuario actualizado Correctamente!',
			footer: 'Dirección de Tecnologías de la Información'
			}
			).then(function() {
			window.location = '../vistas/usuarios_ingreso.php';
			});
			</script>";

		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn_registro);
				}

		



 }
