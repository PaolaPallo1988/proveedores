<?php

include "../conexion/conexion.php"; //CONEXION A LA BASE DE DATOS//
//echo '<prev>';print_r($sqlcalificacion);echo '<prev>';


if (isset($_POST['guardaContactoCiudadano'])) {
    $nombre_ciudadano = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["nombre_contactoCiudadano"], ENT_QUOTES)));
    $cedula_ciudadano = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["cedula_contactoCiudadano"], ENT_QUOTES)));
    $correo_ciudadano = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["correo_contactoCiudadano"], ENT_QUOTES)));
    $requerimiento_ciudadano = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["requerimiento_contactoCiudadano"], ENT_QUOTES)));
    $tipo_ciudadano = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["tipo_contactoCiudadano"], ENT_QUOTES)));


    $sqlciudadano = "INSERT INTO contacto_ciudadano  (cedula_contactoCiudadano, nombre_contactoCiudadano, requerimiento_contactoCiudadano, correo_contactoCiudadano,tipo_contactoCiudadano) VALUES 
    ('" . $cedula_ciudadano . "','" . $nombre_ciudadano . "','" . $requerimiento_ciudadano . "','" . $correo_ciudadano . "','" . $tipo_ciudadano . "')";


    if (mysqli_query($conn_registro, $sqlciudadano)) {
        require '../PHPMailer/class.phpmailer.php';
        require '../PHPMailer/PHPMailerAutoload.php';

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
                                                                <h1 align='center'>Sistema de Calificaci&Oacute;n de Proveedores</h1><br>
                                                                Estimado  $nombre_ciudadano :<br><br> 
                                                                El Sistema de Calificaci&oacute;n de Proveedores, nos renovamos para servirle mejor, su mensaje a sido recibido con &eacutexito,<br>
                                                                en las pr&oacuteximas horas un funcionario respondera sus dudas, comentarios, sugerencias enviadas,<br>
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
        $body = utf8_encode($body);
        $mail = new PHPMailer();
        //indico a la clase que use SMTP
        $mail->IsSMTP();
        //permite modo debug para ver mensajes de las cosas que van ocurriendo
        //$mail->SMTPDebug = 1;
        //Debo de hacer autenticación SMTP
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        //indico el servidor de Gmail para SMTP
        $mail->Host = "smtp.gmail.com";
        //indico el puerto que usa Gmail
        $mail->Port = 587;
        //indico un usuario / clave de un usuario de gmail
        $mail->Username = "papallotito@gmail.com";
        $mail->Password = "fcacarhosxnyvblu";
        $mail->SetFrom('infoproveedores@midena.gob.ec', 'REGISTRO DE PROVEEDORES');
        $mail->Subject = "NOTIFICACION: SU MENSAJE FUE ENVIADO A LA PLATAFORMA DE SISTEMA DE CALIFICACION DE PROVEEDORES" . " " . $cedula_ciudadano;
        $mail->MsgHTML($body);
        //indico destinatario
        $address = $correo_ciudadano;
        $mail->AddAddress($address, $nombre_ciudadano);
        if (!$mail->send()) {
            echo "Error al enviar: " . $mail->ErrorInfo;
        } else {
            echo "<script>
            Swal.fire({
            icon:  'success',
            title: 'Mensaje Enviado Correctamente...',
            text:  'Su mensaje a sido enviado exitosamente a infoproveedores@midena.gob.ec, pronto responderemos a sus dudas e inquitudes',
            footer: 'Ministerio de Defensa Nacional'
            }
            ).then(function() {
            window.location = 'contacto_ciudadano.php';
            });
            </script>";
        }
         
    }


    function enviarCorreo($correo_ciudadano,$requerimiento_ciudadano,$cedula_ciudadano,$nombre_ciudadano,$tipo_ciudadano)
    {
        $body = "<html>
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
                                                        <h1 align='center'>Sistema de Calificaci&Oacute;n de Proveedores</h1><br>
                                                        De: $nombre_ciudadano:<br>
                                                        C&eacute;dula / RUC : $cedula_ciudadano<br>
                                                        Correo: $correo_ciudadano <br>
                                                        Requerimiento: $tipo_ciudadano <br>
                                                        Mensaje: $requerimiento_ciudadano,<br><br> 
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
        $body = utf8_encode($body);
        $mail = new PHPMailer();
        //indico a la clase que use SMTP
        $mail->IsSMTP();
        //permite modo debug para ver mensajes de las cosas que van ocurriendo
        //$mail->SMTPDebug = 1;
        //Debo de hacer autenticación SMTP
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        //indico el servidor de Gmail para SMTP
        $mail->Host = "smtp.gmail.com";
        //indico el puerto que usa Gmail
        $mail->Port = 587;
        //indico un usuario / clave de un usuario de gmail
        $mail->Username = "papallotito@gmail.com";
        $mail->Password = "fcacarhosxnyvblu";
        $mail->SetFrom($correo_ciudadano, 'CONTACTO CIUDADANO');
        $mail->Subject = "MENSAJE ENVIADO POR" . "  " . $nombre_ciudadano;
        $mail->MsgHTML($body);
        //indico destinatario
        $address = "papallotito@gmail.com";
        $mail->AddAddress($address, $nombre_ciudadano);
        if (!$mail->send()) {
            echo "Error al enviar: " . $mail->ErrorInfo;
        } else {
            echo "<script>
            Swal.fire({
            icon:  'success',
            title: 'Mensaje Enviado Correctamente...',
            text:  'Su mensaje a sido enviado exitosamente a infoproveedores@midena.gob.ec, pronto responderemos a sus dudas e inquitudes',
            footer: 'Ministerio de Defensa Nacional'
            }
            ).then(function() {
            window.location = 'contacto_ciudadano.php';
            });
            </script>";
        }
        return true;
    }

    enviarCorreo($correo_ciudadano,$requerimiento_ciudadano,$cedula_ciudadano,$nombre_ciudadano,$tipo_ciudadano);


}
