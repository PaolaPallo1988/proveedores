
<?php
include "conexion/conexion.php"; //CONEXION A LA BASE DE DATOS//


if (isset($_POST['guardapostulante'])) {
    $recaptcha_response = $_POST['g-recaptcha-response'];
    $recaptcha_secret = '6Lc44LMlAAAAABERUXpbzg7dO154_ybX2FTV-266';
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    if (!$recaptcha_response) {
        echo "<script>
                         Swal.fire({
                            icon: 'error',
                            title: 'Error de RECAPTCHA...',
                            text: 'Ingrese el recaptcha solicitado!',
                            footer: 'Intente Nuevamente?'
                            });
                        </script>";
    } else {
        $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
        $arr = json_decode($recaptcha, true);
        if ($arr['success']) {
            $nombre_postulante = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["nombre_postulante"], ENT_QUOTES)));
            $ruc_postulante = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["ruc_postulante"], ENT_QUOTES)));
            $password_postulante = (strip_tags($_POST["password_postulante"], ENT_QUOTES));
            $vpassword_postulante = (strip_tags($_POST["vpassword_postulante"], ENT_QUOTES));
            $estado_id = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["estado_id"], ENT_QUOTES)));
            $perfil_id = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["perfil_id"], ENT_QUOTES)));
            $correo_postulante = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["correo_postulante"], ENT_QUOTES)));
            $hashPassword = password_hash($password_postulante, PASSWORD_DEFAULT);
            $estado_calificacion = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["estado_calificacion"], ENT_QUOTES)));
            $estado_productosOferta = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["estado_productosOferta"], ENT_QUOTES)));


            $usuario = $nombre_postulante;
            $directorio = ("Fotos_Perfil/$usuario/");
            $nombre_imagen = $directorio . $usuario . ".JPG";
            $tipo_imagen = strtolower(pathinfo($nombre_imagen, PATHINFO_EXTENSION));
            $size = $_FILES["imagen"]["size"];
            $permitidos = array(0 => 'image/jpg', 1 => 'image/jpeg', 2 => 'image/png');
            $imagen = null;

            $sqlpostulanteImagen = "INSERT INTO usuario  (nombre_usuario, cedula_usuario, perfil_id, estado_id, correo_usuario, password_usuario,imagen) VALUES 
            ('" . $nombre_postulante . "','" . $ruc_postulante . "','" . $perfil_id . "','" . $estado_id . "','" . $correo_postulante . "','" . $hashPassword . "','" . $nombre_imagen . "')";

            $sqlpostulante = "INSERT INTO usuario  (nombre_usuario, cedula_usuario, perfil_id, estado_id, correo_usuario, password_usuario,estado_calificacion, estado_productosOferta) VALUES 
            ('" . $nombre_postulante . "','" . $ruc_postulante . "','" . $perfil_id . "','" . $estado_id . "','" . $correo_postulante . "','" . $hashPassword . "','" . $estado_calificacion . "','" . $estado_productosOferta . "')";

            $verficarruc = mysqli_query($conn_registro, "SELECT * FROM usuario WHERE cedula_usuario = '$ruc_postulante'");
            $verficarusuario = mysqli_query($conn_registro, "SELECT * FROM usuario WHERE nombre_usuario = '$nombre_postulante'");
            $verficarcorreo = mysqli_query($conn_registro, "SELECT * FROM usuario WHERE correo_usuario = '$correo_postulante'");

            if (mysqli_num_rows($verficarcorreo) > 0) {
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Correo ya existe!',
                        footer: 'Intente Nuevamente?'
                        }
                        ).then(function() {
                        window.location = 'registro_postulante.php';
                        });
                    </script>";
            } else {
                if (mysqli_num_rows($verficarusuario) > 0) {
                    echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Usuario ya existe!',
                            footer: 'Intente Nuevamente?'
                            }
                            ).then(function() {
                            window.location = 'registro_postulante.php';
                            });
                        </script>";
                } else {
                    if (mysqli_num_rows($verficarruc) > 0) {
                        echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'RUC ya existe!',
                                    footer: 'Intente Nuevamente?'
                                }
                                ).then(function() {
                                window.location = 'registro_postulante.php';
                                });
                                </script>";
                    } else {
                        if ($password_postulante == $vpassword_postulante) {
                            if (!empty($_FILES['imagen']['tmp_name'])) {
                                if ($size >= 6900000) {
                                    echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'El archivo es mayor que 200KB, debes reduzcirlo antes de subirlo!',
                                    footer: 'Intente Nuevamente?'
                                    });
                                </script>";
                                } else {
                                    if (in_array($_FILES["imagen"]["type"], $permitidos)) {
                                        if (!file_exists($directorio)) {
                                            mkdir($directorio, 0777, true);
                                        }
                                        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $nombre_imagen)) {

                                            if (mysqli_query($conn_registro, $sqlpostulanteImagen)) {
                                                echo "<script>
                                            Swal.fire({
                                            icon: 'success',
                                            title: 'Bien...',
                                            text: 'Usuario Ingresado Correctamente!',
                                            footer: 'Dirección de Tecnologías de la Información'
                                            }
                                            ).then(function() {
                                            window.location = 'index.php';
                                            });
                                            </script>";
                                            } else {
                                                echo "Error: " . $sqlpostulanteImagen . "<br>" . mysqli_error($conn_registro);
                                            }
                                        } else {
                                            echo "<script>
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            text: 'No se cargo correctamente el archivo',
                                            footer: 'Ministerio de Defensa Nacional'
                                            });
                                        </script>";
                                        }
                                    } else {
                                        echo "<script>
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            text: 'Tu archivo tiene que ser JPG / GIF / PNG Otros archivos no son permitidos!',
                                            footer: 'Intente Nuevamente?'
                                            });
                                        </script>";
                                    }
                                }
                            } else {
                                if (mysqli_query($conn_registro, $sqlpostulante)) {
                                    echo "<script>
                                            swal.fire({
                                            icon: 'success',
                                            title: 'Bien...',
                                            text: 'Usuario Ingresado Correctamente!',
                                            footer: 'Dirección de Tecnologías de la Información'
                                            }
                                            ).then(function() {
                                            window.location = 'index.php';
                                            });
                                            </script>";
                                } else {
                                    echo "Error: " . $sqlpostulante . "<br>" . mysqli_error($conn_registro);
                                }
                            }
                        } else {
                            echo "<script>
                         Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Contraseñas no coinciden!',
                            footer: 'Intente Nuevamente?'
                            });
                        </script>";
                        }
                    }
                }
            }
        } else {
            echo "ERROR RECAPTCHA";
        }
    }
}
// Cerramos la conexi�n
$conn_registro->close();
    