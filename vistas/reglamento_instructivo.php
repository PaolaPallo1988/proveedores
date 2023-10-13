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
    <!-- Font Awesome5 KIT -->
    <script src="https://kit.fontawesome.com/62ca4df395.js" crossorigin="anonymous"></script>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3  left_col">
                <div class="left_col scroll-view"><br>
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
                    <div class="col-md-12 col-sm-12 "><br>
                        <div class="row x_title">
                            <div style="background-color:#0A307C" class="container p-1 my-1  text-white">
                                <div class="col-md-12">
                                    <h3 align="center">REGLAMENTO </h3>
                                </div>
                            </div>
                        </div>
                        <h2 align="justify">
                            <div class="interlineado">
                                <FONT SIZE=5 FACE="verdana"><br>
                                    <ul style="color:#060505;">
                                        <ol>
                                            <i style="color:#5f66ad;" class="fa-sharp fa-solid fa-download"></i>
                                            <a style="color:#5f66ad;" size="10" Target="_blank" href="../files/reglamento.pdf"> Reglamento para la contratación de bienes para la Defensa Nacional</a>
                                        </ol><br>
                                </FONT>
                                </ul>
                            </div>
                            <div class="row x_title">
                                <div class="container p-3 mb-2 bg-gradient-light text-dark">
                                    <div class="col-md-12">
                                        <h4 align="center" data-toggle='collapse' style="cursor:pointer" data-target='#solicitud'>Vista Previa del Reglamento &nbsp;<i class="fa-solid fa-magnifying-glass-chart"> </h4></i>
                                    </div>
                                </div>
                            </div>
                            <h2 id='solicitud' class='collapse'>
                                <center>
                                    <div> <embed src="../files/reglamento.pdf" type="application/pdf" width="950px" height="600px" /></div><br>
                                </center>
                            </h2>
                    </div>
                    <div class="col-md-12 col-sm-12 "><br><br><br><br>
                        <div class="row x_title">
                            <div class="container p-1 my-1  text-white" style="background-color:#0A307C">
                                <div class="col-md-12">
                                    <h3 align="center">INSTRUCTIVO</h3>
                                </div>
                            </div>
                        </div>
                        <h2 align="justify">
                            <div class="interlineado">
                                <FONT SIZE=5 FACE="verdana"><br>
                                    <ul style="color:#060505;">
                                        <ol>
                                            <i style="color:#5f66ad;" class="fa-sharp fa-solid fa-download"></i>
                                            <a style="color:#5f66ad;" size="10" Target="_blank" href="../files/instructivo.pdf"> Instructivo No. MDN-SUF-2019-002 "CLASIFICACIÓN DE PROVEEDORES DE BIENES ESTRATÉGICOS <br>
                                                <ol>Y/O PRESENTACIÓN DE SERVICIOS CONEXOS NECESARIOS PARA LA DEFENSA NACIONAL
                                            </a>
                                        </ol><br>
                                </FONT>
                                </ul>
                            </div>
                            <div class="row x_title">
                                <div class="container p-3 mb-2 bg-gradient-light text-dark">
                                    <div class="col-md-12">
                                        <h4 align="center" data-toggle='collapse' style="cursor:pointer" data-target='#solicitud1'>Vista Previa del Instructivo &nbsp;<i class="fa-solid fa-magnifying-glass-chart"> </h4></i>
                                    </div>
                                </div>
                            </div>
                            <h2 id='solicitud1' class='collapse'>
                                <div class="col-md-12 col-sm-12 ">
                                    <center>
                                        <div> <embed src="../files/instructivo.pdf" type="application/pdf" width="950px" height="600px" /></div><br>
                                    </center>
                                </div>
                            </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

    <!-- footer content -->
    <footer>
        <div class="pull-right">
            SISTEMA CALIFICACIÓN DE PROVEEDORES - DTI - <a href="https://www.defensa.gob.ec/">MDN</a>
        </div>
        <div class="clearfix"></div>
    </footer>
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