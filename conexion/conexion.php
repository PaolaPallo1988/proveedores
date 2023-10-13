<?php   /// Ingresos +

$hostname_conn_registro = "localhost";
$database_conn_registro = "proveedores";
$username_conn_registro = "root";
$password_conn_registro = "";

$conn_registro = mysqli_connect($hostname_conn_registro, $username_conn_registro, $password_conn_registro, $database_conn_registro);
mysqli_set_charset($conn_registro, "utf8");


if ($conn_registro->connect_error) {

    die("Connection failed: " . $conn_registro->connect_error);
}
//echo "Conexion Exitosa";   


