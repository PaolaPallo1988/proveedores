
<?php

include "../conexion/conexion.php"; //CONEXION A LA BASE DE DATOS//


if (isset($_POST['guardausuario'])) {
    $nombre_usuario = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["nombre_usuario"], ENT_QUOTES)));
    $apellido_usuario = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["apellido_usuario"], ENT_QUOTES)));
    $cedula_usuario = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["cedula_usuario"], ENT_QUOTES)));
    $estado_id = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["estado_id"], ENT_QUOTES)));
    $perfil_id = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["perfil_id"], ENT_QUOTES)));
    $correo_usuario = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["correo_usuario"], ENT_QUOTES)));
    $usuario_creacion_resp = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["usuario_creacion_resp"], ENT_QUOTES)));
    $password_usuario = (strip_tags($_POST["password_usuario"], ENT_QUOTES));
    $hashPassword = password_hash($password_usuario, PASSWORD_DEFAULT);

    $archivo = "true";
    $usuario = $nombre_usuario;
    $directorio = ("../Fotos_Perfil/$usuario/");
    $nombre_imagen = $directorio . $usuario . ".JPG";
    $tipo_imagen = strtolower(pathinfo($nombre_imagen, PATHINFO_EXTENSION));
    $size = $_FILES["imagen"]["size"];
    $permitidos = array(0 => 'image/jpg', 1 => 'image/jpeg', 2 => 'image/png');
    $sqlusuario = "INSERT INTO usuario  (nombre_usuario, apellido_usuario, cedula_usuario, perfil_id, estado_id, correo_usuario, usuario_creacion_resp, password_usuario,imagen) VALUES 
                                ('" . $nombre_usuario . "','" . $apellido_usuario . "','" . $cedula_usuario . "','" . $perfil_id . "','" . $estado_id . "','" . $correo_usuario . "','" . $usuario_creacion_resp . "','" . $hashPassword . "','" . $nombre_imagen . "')";

    if (!empty($_FILES['imagen']['tmp_name'])) {
        if ($size > 900000) {
            echo "<script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'No se admite archivos mayores a 900KB',
        footer: '<a href>Intente Nuevamente?</a>'
        }
        ).then(function() {
            window.location = '../vistas/usuarios_ingreso.php';
        });
        </script>";
        } else {
            if (in_array($_FILES["imagen"]["type"], $permitidos)) {
                if (!file_exists($directorio)) {
                    mkdir($directorio, 0777, true);
                }
                if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $nombre_imagen)) {
                    if (mysqli_query($conn_registro, $sqlusuario)) {
                        echo "<script>
                         Swal.fire({
                        icon:  'success',
                        title: 'Bien...',
                        text:  'Usuario Ingresado Correctamente!',
                        footer:'Dirección de Tecnologías de la Información'
                        }
                        ).then(function() {
                            window.location = '../vistas/usuarios_ingreso.php';
                        });
                        </script>";
                        $sqlimagen = "INSERT INTO usuario  (imagen) VALUES ('" . $nombre_imagen . "')";
                    } else {
                        echo "Error: " . $sqlusuario . "<br>" . mysqli_error($conn_registro);
                    }
                } else {
                    echo "<script>
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Archivo no se cargo',
                    footer: '<a href>Intente Nuevamente?</a>'
                    }
                    ).then(function() {
                        window.location = '../vistas/usuarios_ingreso.php';
                    });
                    </script>";
                }
            } else {
                echo "<script>
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Tu archivo tiene que ser JPG / GIF / PNG Otros archivos no son permitidos!',
                footer: '<a href>Intente Nuevamente?</a>'
                }
                ).then(function() {
                    window.location = '../vistas/usuarios_ingreso.php';
                });
                </script>";
            }
        }
    } else {
        echo "<script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Imagen no se cargo correctamente',
        footer: '<a href>Intente Nuevamente?</a>'
        }
        ).then(function() {
            window.location = '../vistas/usuarios_ingreso.php';
        });
        </script>";
    }
}
$conn_registro->close();
