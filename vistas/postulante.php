<?php
require('../conexion/conexion.php');
require('../login/session.php');
$result = mysqli_query($conn_registro, "SELECT * FROM usuario u INNER JOIN perfil p ON u.id_usuario='$session_id' AND p.id_perfil= u.perfil_id") or die('Error In Session');
$row = mysqli_fetch_array($result);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../images/favicon.ico" type="image/ico" />
    <title>Sistema de Calificación de Proveedores | MDN </title>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- INTERLINIADO -->
    <link href="../css/botones.css" rel="stylesheet">
    <!-- Font Awesome5 KIT -->
    <script src="https://kit.fontawesome.com/62ca4df395.js" crossorigin="anonymous"></script>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3  left_col">
                <div class="left_col scroll-view"><br><br>
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="postulante.php" class="site_title"><i class="fa fa-desktop"></i> <span> PROVEEDORES</span></a>
                    </div>
                    <div class="clearfix"></div>
                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <figure class="full-box">
                            <?php
                            $nombre_postulante = $row['nombre_usuario'];
                            $nombre_imagen = "../Fotos_Perfil/$nombre_postulante/$nombre_postulante.JPG";
                            if (file_exists($nombre_imagen)) {
                            ?>
                                <div align="center"><img src="../Fotos_Perfil/<?php echo $row['nombre_usuario'] ?>/<?php echo $row['nombre_usuario']; ?>.JPG" alt="..." class="img-circle profile_img"></div><br>
                            <?php
                            } else {
                            ?>
                                <div align="center"><img src="../images/AdminLTELogo.png" alt="..." class="img-circle profile_img"></div><br>
                            <?php
                            }
                            ?>
                            <figcaption class="text-center text-titles">
                                <font size='3' face="times new rowman"><?php echo $row['nombre_usuario'] . " " . $row['apellido_usuario']; ?></font><br>
                                <font size='3' face="times new rowman"><?php echo $row['nombre_perfil']; ?></font><br><br>
                            </figcaption>
                        </figure>
                    </div>
                    <!-- /menu profile quick info -->
                    <!-- sidebar menu --><!-- /menu footer buttons -->
                    <br><br><br>
                    <?php
                    $cedula_postulante = $row['cedula_usuario'];
                    $sqlestado = "SELECT * FROM usuario WHERE cedula_usuario= '$cedula_postulante'";
                    $resultado = mysqli_query($conn_registro, $sqlestado);
                    if ($estado = mysqli_fetch_array($resultado)) {
                        if (($estado['estado_calificacion'] === '1') && ($estado['estado_productosOferta'] === '1')) {
                            include('../cabeceras/menu_lateral.php');
                        } else {
                            if (($estado['estado_calificacion'] === '2') && ($estado['estado_productosOferta'] === '1')) {
                                include('../cabeceras/menu_lateral_calificacion.php');
                            } else {
                                include('../cabeceras/menu_lateral_productosOferta.php');
                            }
                        }
                    }
                    ?>
                    <!-- /sidebar menu --><!-- /menu footer buttons -->
                </div>
            </div>
            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <?php
                                $nombre_postulante = $row['nombre_usuario'];
                                $nombre_imagen = "../Fotos_Perfil/$nombre_postulante/$nombre_postulante.JPG";
                                if (file_exists($nombre_imagen)) {
                                ?>
                                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                        <img src="../Fotos_Perfil/<?php echo $row['nombre_usuario'] ?>/<?php echo $row['nombre_usuario']; ?>.JPG" alt=""><?php echo  $row['nombre_usuario'] . " " . $row['apellido_usuario']; ?>
                                    </a>
                                <?php
                                } else {
                                ?>
                                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                        <img src="../images/AdminLTELogo.png" alt=""><?php echo  $row['nombre_usuario'] . " " . $row['apellido_usuario']; ?>
                                    </a>
                                <?php
                                }
                                ?>
                                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="javascript:;">Ayuda</a>
                                    <a class="dropdown-item" id="salir" href="../login/logout.php"><i class="fa fa-sign-out pull-right"></i> Salir</a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->
            <!-- page content -->
            <div class="right_col" role="main">
                <!-- /top tiles -->
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="dashboard_graph">
                            <div class="row x_title">
                                <div style="background-color:#0A307C" class="container p-4 my-4 text-white">
                                    <div class="col-md-9">
                                        <h3 align="center">REGISTRO DE PROVEEDORES</h3>
                                    </div>
                                </div>
                                <!--<div class="col-md-12">
                                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                        <span>Diciembre 30, 2014 - Enero 28, 2015</span> <b class="caret"></b>
                                    </div>
                                </div>-->
                            </div>
                            <div class="col-md-5 col-sm-5  bg-white">
                                <div class="x_title">
                                    <h3>
                                        <center style="color:#060505;">MINISTERIO DE DEFENSA NACIONAL DEL ECUADOR</center>
                                    </h3><br>
                                    <div class="clearfix"></div>
                                </div>
                                <div>
                                    <h2 align="justify">
                                        <div style="color:#060505;" class="interlineado">El Ministerio de Defensa Nacional del Ecuador inicia un sistema de registro de proveedores. <br><br>
                                            Esta base de datos es la principal fuente del Ministerio para la calificación, inscripción y registro de proveedores como personas naturales o jurídicas, nacionales o extrajeras; que posteriormente podrán ser llamados a procesos de contratación con el Estado Ecuatoriano. <br><br>
                                            El interesado para esta calificación debe llenar la &nbsp;<a style="color:#080E71;" href="../files/formato_solicitud.pdf" style="cursor:pointer" target="_blank" rel="noopener noreferrer">Solicitud </a><i style="color:#5f66ad;" class="fa-solid fa-book"></i> del trámite requerido, detallar de forma precisa los bienes o servicios que suministra
                                            en el <a style="color:#080E71;" href="../files/DATOS_GENERALES1.pdf" style="cursor:pointer" target="_blank">Formulario de Datos Generales </a><i style="color:#5f66ad;" class="fa-solid fa-pen-to-square"></i> así como el modelo de la <a style="color:#080E71;" href="../files/declaracion_juramentada.pdf" style="cursor:pointer" target="_blank" rel="noopener noreferrer">Declaracion Juramentada </a><i style="color:#5f66ad;" class="fa-solid fa-book-atlas"></i> de domicilio, confidencialidad y autenticidad de la información.<br><br>
                                            <b>Nota:</b> Recuerde descargar, llenar y escanear los siguientes documentos debidamente legalizados:<br>
                                            <ol> <b>1.-</b> Solicitud<br>
                                                <b>2.-</b> Formulario de datos Generales<br>
                                                <b>3.-</b> Declaración Juramentada<br>
                                            </ol>
                                            Los mismos serán necesarios, para ser anexado en la sección de Documentos Generales, de la pestaña Postulación<br><br>
                                            <b>Alcance:</b>
                                            El trámite está orientado a la ampliación de bienes estratégicos y/o prestación de servicios conexos, inscripción, habilitación, actualización en el Registro de Proveedores de Bienes Estratégicos y Servicios Conexos (RPBE).
                                        </div>
                                    </h2>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-7 ">
                                <div> <embed src="../files/CONVOCATORIA-PROVEEDORES-JUL-2022.pdf" type="application/pdf" width="100%" height="800px" /></div><br>
                            </div>
                            <div class="row x_title">
                                <div style="background-color:#0A307C" class="container p-2 my-2 text-white">
                                    <div class="col-md-12">
                                        <h3 align="justify" style="cursor:pointer" data-toggle='collapse' data-target='#demo2'> ¿A quién está dirigido? <i style="color:white;" class="derecha fa-duotone fa-question"></i></h3>
                                    </div>
                                </div>
                                <h2 id='demo2' class='collapse'>
                                    <div class="interlineado">
                                        <ul style="color:#060505;">
                                            ◙ &nbsp;&nbsp; Persona Natural Ecuatoriano<br>
                                            ◙ &nbsp;&nbsp; Persona Natural Extranjera Domiciliada en Ecuador<br>
                                            ◙ &nbsp;&nbsp; Persona Jurídica Ecuatoriano<br>
                                            ◙ &nbsp;&nbsp; Persona Jurídica Extranjera Domiciliada en Ecuador<br>
                                            ◙ &nbsp;&nbsp; Persona Jurídica Extranjera Domiciliada en Ecuador<br>
                                            ◙ &nbsp;&nbsp; Persona Jurídica Extranjera NO Domiciliada en Ecuador
                                        </ul>
                                    </div>
                                </h2>
                            </div>
                            <div class="row x_title">
                                <div style="background-color:#0A307C" class="container p-2 my-2 text-white">
                                    <div class="col-md-12">
                                        <h3 align="justify" style="cursor:pointer" data-toggle='collapse' data-target='#demo3'> ¿Qué obtendré si completo satisfactoriamente el trámite? <i style="color:white;" class="derecha fa-duotone fa-question"></i></h3>
                                    </div>
                                </div>
                            </div>
                            <h2 id='demo3' class='collapse'>
                                <div class="interlineado">
                                    <ol style="color:#060505;">
                                        Obtendrá la calificación e inscripción en el Registro de Proveedores de Bienes Estratégicos (RPBE), lo cual le faculta para participar en procesos de estudio de mercado y como oferentes en procesos de contratación de Bienes Estratégicos y/o Servicios Conexos para la Defensa Nacional.
                                    </ol>
                                </div>
                            </h2>
                            <div class="row x_title">
                                <div style="background-color:#0A307C" class="container p-2 my-2 text-white">
                                    <div class="col-md-12">
                                        <h3 align="justify" style="cursor:pointer" data-toggle='collapse' data-target='#demo5'> ¿Qué necesito para hacer el trámite? <i style="color:white;" class="derecha fa-duotone fa-question"></i> </h3>
                                    </div>
                                </div>
                            </div>
                            <h2 id='demo5' class='collapse'>
                                <div class="interlineado">
                                    <ul style="color:#060505;">
                                        Debe Cumplir con los requisitos establecidos en el Instructivo.</br>
                                        <ol style="color:#060505;">
                                            <li>  Realizar el pre registro en línea, ingresando la información de forma digital al Sistema y entregar la documentación física en el Ministerio de Defensa Nacional del Ecuador.
                                            <li>  Llenar los formularios en línea y descargar los formularios para la firma, escaneo y carga de los mismos en el sistema 
                                            <li>  Cargar en el sistema los respaldos digitales de los requisitos conforme la naturaleza de su personería (natural, jurídica, nacional o extranjera) </li>
                                            <li>  Entregar los documento de forma física en el Ministerio de Defensa Nacional Calle La Exposición S4-71 y Benigno Vela, Sector La Recoleta. </li>
                                            <li>  Horario de atención a nivel nacional de lunes a viernes de: 8:30 a 16:00. Durante los periodos de convocatoria publicado en esta página y que corresponden exclusivamente a marzo y julio. </li>
                                        </ol>
                                    </ul>
                                </div>
                            </h2>
                            <div class="row x_title">
                                <div style="background-color:#0A307C" class="container p-2 my-2 text-white">
                                    <div class="col-md-12">
                                        <h3 align="justify" style="cursor:pointer" data-toggle='collapse' data-target='#demo4'> ¿Cómo hago el trámite? <i style="color:white;" class="derecha fa-duotone fa-question"></i></h3>
                                    </div>
                                </div>
                            </div>
                            <h2 id='demo4' class='collapse'>
                                <div class="interlineado">
                                    <ol style="color:#060505;">
                                        Cumplir con los requisitos establecidos en el Instructivo. <br>
                                        <dd>
                                            <li style="cursor:pointer"><a style="color:#060505;" href="../files/documentos_generales.pdf" target="_blank">Documentos Generales <i style="color:#5f66ad;" class="fa-solid fa-pen-to-square"></i></a>
                                            <li>Documentos Específicos :</li>
                                        </dd>
                                        <dd style="color:#060505; cursor:pointer" class="dd1">
                                            ◙ <a style="color:#060505;" target="_blank" href="../files/personas_naturales_ecuatorianos_o_extranjeros_domiciliados_ecuador.pdf">Persona Natural Ecuatoriano <i style="color:#5f66ad;" class="fa-solid fa-pen-to-square"></i></a><br>
                                            ◙ <a style="color:#060505;" target="_blank" href="../files/personas_naturales_ecuatorianos_o_extranjeros_domiciliados_ecuador.pdf">Persona Natural Extranjera Domiciliada en Ecuador <i style="color:#5f66ad;" class="fa-solid fa-pen-to-square"></i></a><br>
                                            ◙ <a style="color:#060505;" target="_blank" href="../files/personas_juridicas_nacionales_o_extranjeras_domiciliada_ecuador.pdf"> Jurídica Ecuatoriano </a><i style="color:#5f66ad;" class="fa-solid fa-pen-to-square"></i><br>
                                            ◙ <a style="color:#060505;" target="_blank" href="../files/personas_juridicas_nacionales_o_extranjeras_domiciliada_ecuador.pdf"> Jurídica Extranjera Domiciliada en Ecuador <i style="color:#5f66ad;" class="fa-solid fa-pen-to-square"></i></a><br>
                                            ◙ <a style="color:#060505;" target="_blank" href="../files/personas_juridicas_extranjera_no_domiciliada_ecuador.pdf">Jurídica Extranjera NO Domiciliada en Ecuador <i style="color:#5f66ad;" class="fa-solid fa-pen-to-square"></i></a><br>
                                        </dd>
                                        Una vez revisado los documentos del menu lateral:<br>
                                        <ol>
                                            1.- Nomativa<br>
                                            2.- Catálogo<br>
                                            3.- Documentos<br>
                                        </ol><br>
                                        Dirigase a la pestaña <b>POSTULACION</b> , en la cual deberá llenar el registro en el sistema.
                                    </ol>

                                </div>
                            </h2>
                            <div class="row x_title">
                                <div style="background-color:#0A307C" class="container p-2 my-2 text-white">
                                    <div class="col-md-12">
                                        <h3 align="justify" style="cursor:pointer" data-toggle='collapse' data-target='#demo6'> ¿Cuál es el costo de el trámite? <i style="color:white;" class="derecha fa-duotone fa-question"></i></h3>
                                    </div>
                                </div>
                            </div>
                            <h2 id='demo6' class='collapse'>
                                <div class="interlineado">
                                    <ul style="color:#060505;">
                                        El trámite no tiene costo.
                                        <br>
                                    </ul>
                                </div>
                            </h2>
                            <div class="row x_title">
                                <div style="background-color:#0A307C" class="container p-2 my-2 text-white">
                                    <div class="col-md-12">
                                        <h3 align="justify" style="cursor:pointer" data-toggle='collapse' data-target='#demo7'> Canales de atención <i style="color:white;" class="derecha fa-duotone fa-question"></i> </h3>
                                    </div>
                                </div>
                            </div>
                            <h2 id='demo7' class='collapse'>
                                <div class="interlineado">
                                    <ul style="color:#060505;">
                                        ◙ &nbsp;&nbsp; Ministerio de Defensa Nacional Calle La Exposición S4-71 y Benigno Vela, Sector La Recoleta <a title="Ubicación del Ministerio de Defensa Nacional del Ecuador" href="https://goo.gl/maps/W7gTK1DrkejG5j61A" target="_blank" rel="noopener noreferrer"><i class="fa-sharp fa-solid fa-map"></i> Ver </a><br><br>
                                        <iframe loading="lazy" style="border: 1;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d498.72324319530406!2d-78.5125257!3d-0.2308154!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb839bda8c40c8ba1!2sMinisterio%20de%20Defensa%20Nacional!5e0!3m2!1ses!2sec!4v1582906294900!5m2!1ses!2sec" width="59%" height="250" frameborder="0" allowfullscreen="allowfullscreen"> </iframe><br><br>
                                        ◙ &nbsp;&nbsp; Para recepción de documentación física en Secretaría General del Ministerio de Defensa Nacional <br>
                                        ◙ &nbsp;&nbsp; Horario de atención de lunes a viernes de: 8:30 a 16:00
                                    </ul>
                                </div>
                            </h2>
                            <div class="row x_title">
                                <div style="background-color:#0A307C" class="container p-2 my-2 text-white">
                                    <div class="col-md-12">
                                        <h3 align="justify" style="cursor:pointer" data-toggle='collapse' data-target='#demo8'> Aviso legal <i style="color:white;" class="derecha fa-duotone fa-question"></i></h3>
                                    </div>
                                </div>
                            </div>
                            <h2 id='demo8' class='collapse'>
                                <div class="interlineado" align="justify">
                                    <ul style="color:#060505;">
                                        Los interesados deberán presentar la solicitud de postulación en la Secretaria General
                                        del Ministerio de Defensa Nacional, dirigida al Coordinador General de Contratación de
                                        Bienes Estratégicos. La documentación deberá ser entregada en físico, foliada y con
                                        respaldo en archivo digital(formato PDF), en sobre cerrado; en un tiempo no mayor de 40
                                        días calendario a partir de la publicación de la convocatoria.<br><br>
                                        La sola presentación de la solicitud y el pre registro en el sistema para calificar como
                                        proveedor, no garantiza que el solicitante obtenga su registro favorable como proveedor de
                                        bienes estratégicos y servicios conexos; una vez cumplido con el procedimiento de calificación
                                        este será debidamente notificado.
                                    </ul>
                                </div>
                            </h2>
                            <div class="row x_title">
                                <div style="background-color:#0A307C" class="container p-2 my-2 text-white">
                                    <div class="col-md-12">
                                        <h3 align="justify" style="cursor:pointer" data-toggle='collapse' data-target='#demo1'> Contacto para atención ciudadana <i style="color:white;" class="derecha fa-duotone fa-question"></i></h3>
                                    </div>
                                </div>
                            </div>
                            <h2 id='demo1' class='collapse'>
                                <div class="interlineado">
                                    <ul style="color:#060505;">
                                        <b>Contacto:</b> &nbsp; Dirección Registro de Proveedores de Bienes Estratégicos<br>
                                        <b>Email:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; infoproveedores@midena.gob.ec<br>
                                        <b>Teléfono:</b> &nbsp;&nbsp;&nbsp;2983200<br>
                                </div>
                                </ul>
                            </h2>
                        </div>
                    </div>
                </div><br />
            </div>
            <!-- /page content -->
            <!-- footer content -->
            <?php include('../cabeceras/pie_pagina.php'); ?>
            <!-- /footer content -->
        </div>
    </div>

    <!-- SWEETALERT -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- SEGURIDAD -->
    <script src="../js/formularios/seguridad.js"></script>
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

</body>

</html>