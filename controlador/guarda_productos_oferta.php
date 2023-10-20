<?php
include "../conexion/conexion.php"; //CONEXION A LA BASE DE DATOS//
use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;

if (isset($_POST['guarda_oferta'])) {
    $usuario_id = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["usuario_id"], ENT_QUOTES)));
    $cedula_postulante = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["cedula_postulante"], ENT_QUOTES)));
    $nombre_postulante = mysqli_real_escape_string($conn_registro, (strip_tags($row["nombre_usuario"], ENT_QUOTES)));

    $producto_oferta = "2";

    //validar que se esta guardando un tipo array sin valor
    $option1 = isset($_POST['option1']) && is_array($_POST['option1']) ? $_POST['option1'] : [];
    $option1 = implode(',', $option1);
    $option2 = isset($_POST['option2']) && is_array($_POST['option2']) ? $_POST['option2'] : [];
    $option2 = implode(',', $option2);
    $option3 = isset($_POST['option3']) && is_array($_POST['option3']) ? $_POST['option3'] : [];
    $option3 = implode(',', $option3);
    $option4 = isset($_POST['option4']) && is_array($_POST['option4']) ? $_POST['option4'] : [];
    $option4 = implode(',', $option4);
    $option5 = isset($_POST['option5']) && is_array($_POST['option5']) ? $_POST['option5'] : [];
    $option5 = implode(',', $option5);
    $option6 = isset($_POST['option6']) && is_array($_POST['option6']) ? $_POST['option6'] : [];
    $option6 = implode(',', $option6);
    $option7 = isset($_POST['option7']) && is_array($_POST['option7']) ? $_POST['option7'] : [];
    $option7 = implode(',', $option7);
    $option8 = isset($_POST['option8']) && is_array($_POST['option8']) ? $_POST['option8'] : [];
    $option8 = implode(',', $option8);
    $option9 = isset($_POST['option9']) && is_array($_POST['option9']) ? $_POST['option9'] : [];
    $option9 = implode(',', $option9);
    $option10 = isset($_POST['option10']) && is_array($_POST['option10']) ? $_POST['option10'] : [];
    $option10 = implode(',', $option10);
    $option11 = isset($_POST['option11']) && is_array($_POST['option11']) ? $_POST['option11'] : [];
    $option11 = implode(',', $option11);

    $c4ivr_opt1 = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["c4ivr_opt1"] ?? null, ENT_QUOTES)));
    $areonavefija_opt2 = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["areonavefija_opt2"] ?? null, ENT_QUOTES)));
    $defensaaerea_opt3 = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["defensaaerea_opt3"] ?? null, ENT_QUOTES)));
    $aeronaverot_opt4 = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["aeronaverot_opt4"] ?? null, ENT_QUOTES)));
    $armamento_opt5 = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["armamento_opt5"] ?? null, ENT_QUOTES)));
    $combate_opt6 = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["combate_opt6"] ?? null, ENT_QUOTES)));
    $blindados_opt7 = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["blindados_opt7"] ?? null, ENT_QUOTES)));
    $contramedidas_opt8 = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["contramedidas_opt8"] ?? null, ENT_QUOTES)));
    $semoviente_opt9 = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["semoviente_opt9"] ?? null, ENT_QUOTES)));
    $armamento_opt10 = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["armamento_opt10"] ?? null, ENT_QUOTES)));
    $equipo_opt11 = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["equipo_opt11"] ?? null, ENT_QUOTES)));


    $sqlusuario = "SELECT * FROM producto_oferta WHERE usuario_id_oferta='$usuario_id'";
    $result = mysqli_query($conn_registro, $sqlusuario);

    if (mysqli_num_rows($result) > 0) {
        // Si es mayor a cero imprimimos que ya existe la causa
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ya existe documentación de # $nombre_postulante!',
                footer: 'Ministerio de Defensa Nacional'
            }
                ).then(function() {
                    window.location = '../vistas/productos_oferta.php';
                });
            </script>";
    } else {

        $sqlactualizar = "UPDATE usuario SET estado_productosOferta='$producto_oferta' WHERE cedula_usuario='$cedula_postulante'";
        $sqlproducto_oferta = mysqli_query($conn_registro, $sqlactualizar);

        $sqlcalificacion = "INSERT INTO producto_oferta  (usuario_id_oferta,cedula_postulante_oferta,
                                option1,option2,option3,option4,option5,option6,option7,option8,option9,option10,option11,
                                c4ivr_opt1,areonavefija_opt2,defensaaerea_opt3,aeronaverot_opt4,armamento_opt5,combate_opt6, blindados_opt7,contramedidas_opt8, semoviente_opt9, armamento_opt10,equipo_opt11) VALUES 
                                ('" . $usuario_id . "','" . $cedula_postulante . "',
                                '" . $c4ivr_opt1 . "','" . $areonavefija_opt2 . "','" . $defensaaerea_opt3 . "','" . $aeronaverot_opt4 . "','" . $armamento_opt5 . "','" . $combate_opt6 . "','" . $blindados_opt7 . "','" . $contramedidas_opt8 . "','" . $semoviente_opt9 . "','" . $armamento_opt10 . "','" . $equipo_opt11 . "',
                                '" . $option1 . "','" . $option2 . "','" . $option3 . "','" . $option4 . "','" . $option5 . "','" . $option6 . "','" . $option7 . "','" . $option8 . "','" . $option9 . "','" . $option10 . "','" . $option11 . "')";
        if (mysqli_query($conn_registro, $sqlcalificacion)) {
            $cedula = mysqli_real_escape_string($conn_registro, (strip_tags($_POST['cedula_postulante'], ENT_QUOTES)));
            $query = "SELECT * FROM usuario WHERE cedula_usuario= '$cedula'";
            $results = mysqli_query($conn_registro, $query);
            while ($registrousu = mysqli_fetch_array($results)) {
                $datosusu = $registrousu[0] . "||" . //ID
                    $registrousu[1] . "||" . //NOMBRE USUARIO
                    $registrousu[2] . "||" . //NOMBRE USUARIO
                    $registrousu[3] . "||" . //CEDULA USUARIO
                    $registrousu[6];        //CORREO USUARIO
                $id = $registrousu['id_usuario'];
                //    SACAR LA IP DE LA MAQUINA 
                if (getenv('HTTP_CLIENT_IP')) {
                    $ip = getenv('HTTP_CLIENT-IP');
                } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
                    $ip = getenv('HTTP_X_FORWARDED_FOR');
                } elseif (getenv('HTTP_X_FORWARDED')) {
                    $ip = getenv('HTTP_X_FORWARDED');
                } elseif (getenv('HTTP_FORWARDED_FOR')) {
                    $ip = getenv('HTTP_FORWARDED_FOR');
                } elseif (getenv('HTTP_FORWARDED')) {
                    $ip = getenv('HTTP_FORWARDED');
                } else {
                    $ip = $_SERVER['REMOTE_ADDR'];
                }
                //    SACAR LA IP DE LA MAQUINA 
                // SACA LA FECHA 

                $fecha = date("Y-m-d h:i:s");
                // echo date("Y-m-d h:i:s");
                // SACA LA FECHA 
                // Envíe un correo electrónico al usuario con el token en un enlace en el que pueda hacer clic
                // These must be at the top of your script, not inside a function
                require '../vendor/phpmailer/phpmailer/src/Exception.php';
                require '../vendor/phpmailer/phpmailer/src/SMTP.php';
                require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
                //Load Composer's autoloader
                require '../vendor/autoload.php';
                $body =       "<html >
                <head>
                    <title></title>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1'>
                    <link href='css/style.css' rel='stylesheet'>
                    <title>Confirmación de Correo</title>
                    <style type='text/css'>
                        /* Take care of image borders and formatting */
                        img {
                            max-width: 600px;
                            outline: none;
                            text-decoration: none;
                            -ms-interpolation-mode: bicubic;
                        }
                        a {
                            border: 0;
                            outline: none;
                        }
                        a img {
                            border: none;
                        }
                        /* General styling */
                        td,
                        h1,
                        h2,
                        h3 {
                            font-family: Helvetica, Arial, sans-serif;
                            font-weight: 400;
                        }
                        td {
                            font-size: 13px;
                            line-height: 150%;
                            text-align: left;
                        }
                        body {
                            -webkit-font-smoothing: antialiased;
                            -webkit-text-size-adjust: none;
                            width: 100%;
                            height: 100%;
                            color: #37302d;
                            background: #ffffff;
                        }
                        table {
                            border-collapse: collapse !important;
                        }
                        h1,
                        h2,
                        h3 {
                            padding: 0;
                            margin: 0;
                            color: #444444;
                            font-weight: 400;
                            line-height: 110%;
                        }
                        h1 {
                            font-size: 35px;
                        }
                        h2 {
                            font-size: 30px;
                        }
                        h3 {
                            font-size: 24px;
                        }
                        h4 {
                            font-size: 18px;
                            font-weight: normal;
                        }
                        .important-font {
                            color: #21BEB4;
                            font-weight: bold;
                        }
                        .hide {
                            display: none !important;
                        }
                        .force-full-width {
                            width: 100% !important;
                        }
                    </style>
                    <style type='text/css' media='screen'>
                        @media screen {
                            @import url(http://fonts.googleapis.com/css?family=Open+Sans:400);
                            /* Thanks Outlook 2013! */
                            td,
                            h1,
                            h2,
                            h3 {
                                font-family: 'Open Sans', 'Helvetica Neue', Arial, sans-serif !important;
                            }
                        }
                    </style>
                    <style type='text/css' media='only screen and (max-width: 600px)'>
                        /* Mobile styles */
                        @media only screen and (max-width: 600px) {
                            table[class='w320'] {
                                width: 320px !important;
                            }
                            table[class='w300'] {
                                width: 300px !important;
                            }
                            table[class='w290'] {
                                width: 290px !important;
                            }
                            td[class='w320'] {
                                width: 320px !important;
                            }
                            td[class~='mobile-padding'] {
                                padding-left: 14px !important;
                                padding-right: 14px !important;
                            }
                            td[class*='mobile-padding-left'] {
                                padding-left: 14px !important;
                            }
                            td[class*='mobile-padding-right'] {
                                padding-right: 14px !important;
                            }
                            td[class*='mobile-block'] {
                                display: block !important;
                                width: 100% !important;
                                text-align: left !important;
                                padding-left: 0 !important;
                                padding-right: 0 !important;
                                padding-bottom: 15px !important;
                            }
                            td[class*='mobile-no-padding-bottom'] {
                                padding-bottom: 0 !important;
                            }
                            td[class~='mobile-center'] {
                                text-align: center !important;
                            }
                            table[class*='mobile-center-block'] {
                                float: none !important;
                                margin: 0 auto !important;
                            }
                            *[class*='mobile-hide'] {
                                display: none !important;
                                width: 0 !important;
                                height: 0 !important;
                                line-height: 0 !important;
                                font-size: 0 !important;
                            }
                            td[class*='mobile-border'] {
                                border: 0 !important;
                            }
                        }
                    </style>
                </head>
                <body class='body' style='padding:0; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none' bgcolor='#ffffff'>
                        <table align='center' cellpadding='0' cellspacing='0' width='100%' height='100%'>
                            <tr>
                                <td align='center' valign='top' bgcolor='#ffffff' width='100%'>
                                    <table cellspacing='0' cellpadding='0' width='100%'>
                                        <tr>
                                            <td style='background:#1f1f1f' width='100%'>
                                                <center>
                                                    <table cellspacing='0' cellpadding='0' width='600' class='w320'>
                                                        <tr>
                                                            <td valign='top' class='mobile-block mobile-no-padding-bottom mobile-center' width='270' style='background:#1f1f1f;padding:30px 10px 10px 50px;'>
                                                                <a href='#' style='text-decoration:none;'>
                                                                    <img src='https://registro.midena.gob.ec/ContactoCiudadano/images/AdminLTELogo.png' width='500' height='200' alt='Your Logo' />
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='border-bottom:1px solid #e7e7e7;'>
                                                <center>
                                                    <table cellpadding='0' cellspacing='0' width='600' class='w320'>
                                                        <tr>
                                                            <td align='left' class='mobile-padding' style='padding:20px'>
                                                            <br class='mobile-hide' />
                                                                <h1 align='center'>Sistema de Calificaci&oacute;n de Proveedores</h1><br>
                                                                    Se&ntilde;or Postulante:<br><br> 
                                                                    El ingreso de su documentaci&oacute;n para la Calificaci&oacute;n fue EXITOSO , el $fecha , desde un dispositivo con la siguiente IP  $ip<br><br>
                                                                    Gracias por usar el Sistema de Calificaci&oacute;n de Proveedores.
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </center>
                                            </td>
                                        </tr>
                                        <br>
                                        <tr>
                                            <td style='background-color:#1f1f1f;'>
                                                <center>
                                                    <table border='0' cellpadding='0' cellspacing='0' width='600' class='w320' style='height:100%;color:#ffffff' bgcolor='#1f1f1f'>
                                                        <tr>
                                                            <td align='right' valign='middle' class='mobile-padding' style='font-size:12px;padding:20px; background-color:#1f1f1f; color:#ffffff; text-align:left; '>
                                                                <h4 align='center'>Calle la Exposici&oacute;n S4-71 y Benigno Vela, C&oacute;digo Postal: 170403 / <h4>
                                                                        <h4 align='center'>Quito - Ecuador. </h4>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </center>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                </body>
                </html> ";
                $body = preg_replace('/\\\\/', '', $body);
                $mail = new PHPMailer(true);
                //indico a la clase que use SMTP
                $mail->IsSMTP();
                //permite modo debug para ver mensajes de las cosas que van ocurriendo
                // $mail->SMTPDebug = 4;
                //Debo de hacer autenticación SMTP
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = "tls";
                //indico el servidor de Gmail para SMTP
                $mail->Host = "mta.midena.gob.ec";
                //indico el puerto que usa Gmail
                $mail->Port = 25;
                $mail->IsHTML(true);
                //indico un usuario / clave de un usuario de gmail
                $mail->Username = "ppallo";
                $mail->Password = "SElene.1988";
                $mail->SetFrom('infoproveedores@midena.gob.ec', 'REGISTRO DE PROVEEDORES');
                $mail->Subject = "ACCESO EXITOSO : " . $registrousu['nombre_usuario'];
                //$mail->MsgHTML("Señor postulante, para su conocimiento le informamos que usted solicitó un RESETEO DE CLAVE para acceder a los SERVICIOS EN LÍNEA , haga clic en el siguiente enlace <a href=\"http://localhost/php/Proveedores_2022_FT/nueva_contrasena.php?token=" . $token . "\">link</a> para resetear la contrasena del sitio
                //                Su clave temporal para acceso a Servicios en Línea es
                //                ". $token. " , y tiene una duracion de 10 minutos.");
                $mail->MsgHTML($body);
                //indico destinatario
                $address = $registrousu['correo_usuario'];
                $address1 = "notificacionproveedo@midena.gob.ec";
                $mail->AddAddress($address, $address1, $registrousu['nombre_usuario'] . " " . $registrousu['apellido_usuario']);
                if (!$mail->send()) {
                    echo "Error al enviar: " . $mail->ErrorInfo;
                } else {
                    echo "<script>
                                            Swal.fire({
                                            icon:  'success',
                                            title: 'Bien...',
                                            text:  'Datos Ingresados Correctamente!',
                                            footer: 'Ministerio de Defensa Nacional'
                                        }
                                            ).then(function() {
                                                window.location = '../vistas/confirmacion_carga.php';
                                            });
                                        </script>";
                };
            }
        } else {
            echo "Error: " . $sqlcalificacion . "<br>" . mysqli_error($conn_registro);
        }
    }
}

// Cerramos la conexi�n
$conn_registro->close();
