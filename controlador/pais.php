<?php

include("../conexion/conexion.php");

$pais_legal = $_POST['pais_legal'];

$sql = "SELECT id_pais, nombre_pais, codtelefono_pais FROM pais  WHERE nombre_pais='$pais_legal'";

$result = mysqli_query($conn_registro, $sql);

$cadena1="";


while ($ver = mysqli_fetch_row($result)) {
	$cadena1 = $cadena1 . '<div class="formulario__input" value = ' .$ver[0] . '>' . ($ver[2]) . '</div>';
	//echo '<prev>';print_r ($ver[2]);echo '</prev>';
}
echo  $cadena1 . "</input>";


