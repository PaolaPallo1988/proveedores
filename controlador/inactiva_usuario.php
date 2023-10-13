<?php

include("../conexion/conexion.php");

if (isset($_POST['inactivausuario'])) {

$id_usuario = mysqli_real_escape_string($conn_registro, (strip_tags($_POST['id_usuario'], ENT_QUOTES)));
$estado_id = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["estado_id"], ENT_QUOTES)));




$sql = "UPDATE usuario SET estado_id = '$estado_id' WHERE id_usuario='$id_usuario' ";

		if (mysqli_query($conn_registro, $sql)){

			echo "<script>
			Swal.fire({
			icon: 'success',
			title: 'Bien...',
			text: 'Usuario Actualizado Correctamente!',
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
