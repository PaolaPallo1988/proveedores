<?php

use PhpParser\Node\Expr\Empty_;

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
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Sweetalert2 -->
    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>
    <!-- buscar en la tabla postulante -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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
                                    <div class="col-md-12">
                                        <h3 align="center">REGISTRO DE PROVEEDORES</h3>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr align="center">
                                                    <th>CODIGO</th>
                                                    <th>PROVEEDOR</th>
                                                    <th>REPRESENTANTE LEGAL</th>
                                                    <th>RUC /C.I</th>
                                                    <th>PAÍS</th>
                                                    <th>CIUDAD</th>
                                                    <th>TIPO DE PROVEEDOR</th>
                                                    <th>ACTIVIDAD</th>
                                                    <th>DIRECCIÓN</th>
                                                    <th>TELÉFONO</th>
                                                    <th>EMAIL</th>
                                                    <th>PRODUCTOS BIENES Y/O SERVICIOS</th>
                                                    <th>PROCESO</th>
                                                    <th>ACCIONES</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                include("../conexion/conexion.php");
                                                $sqlusuario = "SELECT * FROM usuario u INNER JOIN postulante p INNER JOIN producto_oferta po INNER JOIN razonsoc r INNER JOIN telefonos_ecuador tel  ON u.perfil_id = '4' AND p.procesoId_postulante='1' AND r.id_razonsoc= p.razonsoc_id  AND tel.cedulaPostulante_ecuador=u.cedula_usuario  AND po.cedula_postulante_oferta = u.cedula_usuario";
                                                $mysqli = mysqli_query($conn_registro, $sqlusuario);
                                                while ($usuarios = mysqli_fetch_array($mysqli)) {
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $usuarios['id_usuario'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $usuarios['nombre_usuario'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $usuarios['nombre_legal'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $usuarios['cedula_usuario'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $usuarios['pais_postulante'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $usuarios['ciudad_postulante'] ?>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <?php if ($usuarios['razonsoc_id'] == $usuarios['id_razonsoc']) {  // campo igual 1 true 
                                                            ?>
                                                                <?php echo $usuarios['nombre_razonsoc'] ?>
                                                            <?php }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $usuarios['actividad_postulante'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $usuarios['direcPrinEcu_postulante'] . " " . $usuarios['direcNumEcu_postulante'] . " " . $usuarios['direcSecEcu_postulante'] . " " . $usuarios['direcPisoEcu_postulante'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $usuarios['telefono_ecuador'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $usuarios['correo_usuario'] ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $sql = "SELECT * FROM usuario u INNER JOIN producto_oferta p WHERE u.id_usuario = p.usuario_id_oferta";
                                                            $result = mysqli_query($conn_registro, $sql);
                                                            while ($rowProducto = mysqli_fetch_array($result)) {
                                                                $sistemaC4IVR = $rowProducto['c4ivr_opt1'];
                                                                $aeronaveFijo = $rowProducto['areonavefija_opt2'];
                                                                $defensaAerea = $rowProducto['defensaaerea_opt3'];
                                                                $aeronaveRotatoria = $rowProducto['aeronaverot_opt4'];
                                                                $armamentoApoyo = $rowProducto['armamento_opt5'];
                                                                $combateNaval = $rowProducto['combate_opt6'];
                                                                $blindadosMecanizado = $rowProducto['blindados_opt7'];
                                                                $contramedidasDefensivas = $rowProducto['contramedidas_opt8'];
                                                                $semoviente = $rowProducto['semoviente_opt9'];
                                                                $armamentoEquipo = $rowProducto['armamento_opt10'];
                                                                $equipoEspecial = $rowProducto['equipo_opt11'];
                                                                if ((!empty($sistemaC4IVR)) && (!empty($aeronaveFijo))) {
                                                                    $array2 = explode(",", $sistemaC4IVR);
                                                                    $array3 = explode(",", $aeronaveFijo);
                                                                    $array4 = explode(",", $defensaAerea);
                                                                    $array5 = explode(",", $aeronaveRotatoria);
                                                                    $array6 = explode(",", $armamentoApoyo);
                                                                    $array7 = explode(",", $combateNaval);
                                                                    $array8 = explode(",", $blindadosMecanizado);
                                                                    $array9 = explode(",", $contramedidasDefensivas);
                                                                    $array10 = explode(",", $semoviente);
                                                                    $array11 = explode(",", $armamentoEquipo);
                                                                    $array12 = explode(",", $equipoEspecial);
                                                                    foreach ($array2 as $arr) {
                                                            ?>
                                                                        <div class="producto"> <?php echo $arr ?></div>
                                                                    <?php
                                                                    }
                                                                    foreach ($array3 as $arr1) {
                                                                    ?>
                                                                        <div class="producto"> <?php echo $arr1 ?></div>

                                                                    <?php
                                                                    }
                                                                    foreach ($array4 as $arr2) {
                                                                    ?>
                                                                        <div class="producto"> <?php echo $arr2 ?></div>
                                                                    <?php
                                                                    }
                                                                    foreach ($array5 as $arr3) {
                                                                    ?>
                                                                        <div class="producto"> <?php echo $arr3 ?></div>
                                                                    <?php
                                                                    }
                                                                    foreach ($array6 as $arr4) {
                                                                    ?>
                                                                        <div class="producto"> <?php echo $arr4 ?></div>
                                                                    <?php
                                                                    }
                                                                    foreach ($array7 as $arr5) {
                                                                    ?>
                                                                        <div class="producto"> <?php echo $arr5 ?></div>
                                                                    <?php
                                                                    }
                                                                    foreach ($array8 as $arr6) {
                                                                    ?>
                                                                        <div class="producto"> <?php echo $arr6 ?></div>
                                                                    <?php
                                                                    }
                                                                    foreach ($array9 as $arr7) {
                                                                    ?>
                                                                        <div class="producto"> <?php echo $arr7 ?></div>
                                                                    <?php
                                                                    }
                                                                    foreach ($array10 as $arr8) {
                                                                    ?>
                                                                        <div class="producto"> <?php echo $arr8 ?></div>
                                                                    <?php
                                                                    }
                                                                    foreach ($array11 as $arr9) {
                                                                    ?>
                                                                        <div class="producto"> <?php echo $arr9 ?></div>
                                                                    <?php
                                                                    }
                                                                    foreach ($array12 as $arr10) {
                                                                    ?>
                                                                        <div class="producto"> <?php echo $arr10 ?></div>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                <?php
                                                                }
                                                                ?>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td style="text-align: center;">                                                                                               
                                                            <?php 
                                                            $sqlproceso="SELECT * FROM procesos pro INNER JOIN postulante p WHERE pro.id_proceso= p.procesoId_postulante ";
                                                            $resultProceso= mysqli_query($conn_registro,$sqlproceso);
                                                            while ($resultTotProceso=mysqli_fetch_array($resultProceso)){                                                            
                                                            if ($resultTotProceso['procesoId_postulante'] == $resultTotProceso['id_proceso']) {  // campo igual 1 true 
                                                            ?>
                                                                <span class="badge badge-pill badge-success " ><?php echo $resultTotProceso['nombre_proceso'] ?></span>
                                                            <?php 
                                                            }
                                                        }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <!--<a class="btn btn-app" href="usuario_ver.php?id_usuario=<?php //echo $usuarios['id_usuario']; 
                                                                                                                            ?>"><i class="fa fa-eye" aria-hidden="true"></i> Ver</a>  -->
                                                                <a class="btn btn-app" href="postulante_edita.php?id_postulante_ingreso=<?php echo $usuarios['id_usuario']; ?> "><i class='fa fa-user-plus' aria-hidden='true'></i> Fecha Caducidad</a>
                                                                <a class="btn btn-app" href="postulante_desactiva.php?id_postulante_desactiva=<?php echo $usuarios['id_usuario']; ?>"><i class='fa fa-user-times' aria-hidden='true'></i> Imprimir</a>
                                                                <!-- https://fontawesome.com/v4/icon/user-times -->
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                mysqli_free_result($mysqli);
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>




</body>

</html>