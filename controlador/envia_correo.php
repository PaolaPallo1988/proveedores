
<?php
$errors = [];
include "conexion/conexion.php"; //CONEXION A LA BASE DE DATOS//
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if (isset($_POST['reset_password'])) {


    $email = mysqli_real_escape_string($conn_registro, (strip_tags($_POST['email'], ENT_QUOTES)));
    // asegurar que el usuario existe en nuestro sistema
    $query = "SELECT * FROM usuario WHERE correo_usuario='$email'";
    $results = mysqli_query($conn_registro, $query);
    $results1 = mysqli_query($conn_registro, $query);

    if (empty($email)) {
        array_push($errors, "Su correo es requerido");
    } else if (mysqli_num_rows($results) <= 0) {

        array_push($errors, "Lo sentimos, no existe ningún usuario en nuestro sistema con ese correo electrónico");
        sleep(5);
    }

    // generate a unique random token of length 100
    $token = bin2hex(random_bytes(20));

    while ($registrousu = mysqli_fetch_array($results1)) {
        $datosusu = $registrousu[0] . "||" . //ID
            $registrousu[1] . "||" . //NOMBRE USUARIO
            $registrousu[2] . "||" . //NOMBRE USUARIO
            $registrousu[3] . "||" . //CEDULA USUARIO
            $registrousu[6];        //CORREO USUARIO

        $id = $registrousu['id_usuario'];

        if (count($errors) == 0) {
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
            $fecha = date("Y-m-d h:i:s");
            echo $fecha;

            // almacenar el token en la tabla de la base de datos de restablecimiento de contraseña contra el correo electrónico del usuario
            $sql = "INSERT INTO password_reset (usuario_id_passreset,email_passreset, token_passreset) VALUES ('$id','$email', '$token')";
            $query = mysqli_query($conn_registro, $sql);
            // Envíe un correo electrónico al usuario con el token en un enlace en el que pueda hacer clic

            // These must be at the top of your script, not inside a function
            require 'vendor/phpmailer/phpmailer/src/Exception.php';
            require 'vendor/phpmailer/phpmailer/src/SMTP.php';
            require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
            //Load Composer's autoloader
            require 'vendor/autoload.php';
            $body = "<html >
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
                                                                        <img src='https://registro.midena.gob.ec/ContactoCiudadano/images/your-logo-2.png' width='500' height='200' alt='Your Logo' />
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
                                                                    Para su conocimiento le informamos que usted solicit&oacute; un RESETEO DE CLAVE, para acceder a los SERVICIOS EN L&Iacute;NEA a trav&eacute;s de la IP:  $ip , el  $fecha , 
                                                                    haga clic en el siguiente ENLACE <a href=\"http://localhost/php/Proveedores_2022_FT/nueva_contrasena.php?token=" . $token . "\"> LINK </a>  para resetear la contrase&ntilde;a del sitio. <br>
                                                                    Su clave temporal para acceso a Servicios en L&iacute;nea es:  " . $token . " , y tiene una duraci&oacute;n de 10 minutos. <br>
                                                                </td>
                                                                <td class='mobile-hide' style='padding-top:20px;padding-bottom:0; vertical-align:bottom;' valign='bottom'>
                                                                    <table cellspacing='0' cellpadding='0' width='100%'>
                                                                        <tr>
                                                                            <td align='right' valign='bottom' style='padding-bottom:0; vertical-align:bottom;'>
                                                                                <img style='vertical-align:bottom;' src='https://registro.midena.gob.ec/ContactoCiudadano/images/Diosa.png' width='174' height='294' />
                                                                            </td>
                                                                        </tr>
                                                                    </table>
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
            //$mail->SMTPDebug = 1;
            //Debo de hacer autenticación SMTP
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = "tls";
            //indico el servidor de Gmail para SMTP
            $mail->Host = "mta.midena.gob.ec";
            //indico el puerto que usa Gmail
            $mail->Port = 25;
            //indico un usuario / clave de un usuario de gmail
            $mail->Username = "ppallo";
            $mail->Password = "SElene.1988";
            $mail->SetFrom('infoproveedores@midena.gob.ec', 'REGISTRO DE PROVEEDORES');
            $mail->Subject = "ENTREGA DE CLAVE TEMPORAL" . $registrousu['cedula_usuario'];
            //$mail->MsgHTML("Señor postulante, para su conocimiento le informamos que usted solicitó un RESETEO DE CLAVE para acceder a los SERVICIOS EN LÍNEA , haga clic en el siguiente enlace <a href=\"http://localhost/php/Proveedores_2022_FT/nueva_contrasena.php?token=" . $token . "\">link</a> para resetear la contrasena del sitio
            //                Su clave temporal para acceso a Servicios en Línea es
            //                ". $token. " , y tiene una duracion de 10 minutos.");
            $mail->MsgHTML($body);
            //indico destinatario
            $address = $email;
            $mail->AddAddress($address, $registrousu['nombre_usuario'] . " " . $registrousu['apellido_usuario']);
            if (!$mail->send()) {
                echo "Error al enviar: " . $mail->ErrorInfo;
            } else {
                header('location: pendiente.php?email=' . $email);
            }
        }
    }
}


if (isset($_POST['nuevo_password'])) {
    $var = "CONTRASEÑA INCORRECTA";
    $var1 = "CONTRASEÑA ACTUALIZADA";
    $new_password = (strip_tags($_POST["new_password"], ENT_QUOTES));
    $newv_password = (strip_tags($_POST["newv_password"], ENT_QUOTES));
    $sql = "SELECT * FROM password_reset INNER JOIN usuario ON  password_reset.usuario_id_passreset = usuario.id_usuario";
    $query = mysqli_query($conn_registro, $sql);
    while ($usuario = mysqli_fetch_assoc($query)) {
        $emailactualiza = $usuario['email_passreset'];
        $tokenelimina = $usuario['token_passreset'];
        if ($new_password === $newv_password) {
            $new_passwordhash = password_hash($newv_password, PASSWORD_DEFAULT);
            $sqlactualiza = "UPDATE usuario SET password_usuario='$new_passwordhash' WHERE correo_usuario='$emailactualiza' ";
            $queryactualiza = mysqli_query($conn_registro, $sqlactualiza);

            if ($queryactualiza) {
                $sqlelimina = "DELETE FROM password_reset WHERE token_passreset='$tokenelimina'";
                $queryelimina = mysqli_query($conn_registro, $sqlelimina);
                echo "<script> alert('" . $var1 . "');
                                window.location='index.php'; 
                </script>";
            }
        } else {
            echo "<script> alert('" . $var . "'); </script>";
        }
    }
}

$conn_registro->close();
