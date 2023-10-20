<?php

include("../conexion/conexion.php");

$pais = $_POST['pais'];

$sql = "SELECT id_pais, nombre_pais, codtelefono_pais FROM pais  WHERE nombre_pais='$pais'";

$result = mysqli_query($conn_registro, $sql);

$cadena="<select id='codtelefono_pais' name='codtelefono_pais' style='text-transform:uppercase;'  class='formulario__input' disabled>";

//$cadena="";


while ($ver = mysqli_fetch_row($result)) {

	$cadena=$cadena.'<option value='.$ver[2].'>'.($ver[2]).'</option>';
}
echo  $cadena."</select>";


