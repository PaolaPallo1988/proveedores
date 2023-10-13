<?php

require('../conexion/conexion.php');
require('../login/session.php');

$result = mysqli_query($conn_registro, "SELECT * FROM usuario u INNER JOIN perfil p INNER JOIN postulante pos INNER JOIN razonsoc r INNER JOIN telefonos_ecuador tel ON u.id_usuario='$session_id' AND p.id_perfil= u.perfil_id AND u.id_usuario= pos.usuario_id AND pos.razonsoc_id= r.id_razonsoc  AND u.id_usuario = tel.usuarioId_ecuador ")  or die('Error In Session');
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
    <link href="../css/estilos.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
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
                    <div class="col-md-12 col-sm-12 ">
                        <center>
                            <div class="dashboard_graph"> <!--clase para poner el fondo blanco -->
                                <div class="imagen">
                                    <!-- <div class="col-md-12"> -->
                                    <!-- <div class="profile clearfix"> -->
                                    <?php
                                    $nombre_postulante = $row['nombre_usuario'];
                                    $nombre_imagen = "../Fotos_Perfil/$nombre_postulante/$nombre_postulante.JPG";
                                    if (file_exists($nombre_imagen)) {
                                    ?>
                                        <div><img src="../Fotos_Perfil/<?php echo $row['nombre_usuario'] ?>/<?php echo $row['nombre_usuario']; ?>.JPG" alt="..." class="img-circle profile_img"></div>
                                    <?php
                                    } else {
                                    ?>
                                        <div><img src="../images/AdminLTELogo.png" alt="..." class="img-circle profile_img"></div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="texto">
                                    <p><?php echo $row['nombre_usuario'] . " " . $row['apellido_usuario']; ?></font><br></p>
                                    <p><?php echo $row['cedula_usuario']; ?></p>
                                    <p><?php echo $row['nombre_razonsoc']; ?></p>
                                    <p><?php echo $row['siglas_postulante']; ?></p>
                                    <p><?php echo $row['actividad_postulante']; ?> &nbsp;/&nbsp; <?php echo $row['distribuidor_postulante']; ?></p>
                                </div>
                                <br><br>
                                <div>
                                    <div class="row">
                                        <br><label class="formulario_label_reporte" style="margin-top: 10px;"> PAIS </label>
                                        <div class="formulario_input_reporte"> <?php echo $row['pais_postulante']; ?> </div>
                                    </div>
                                    <div class="row">
                                        <label class="formulario_label_reporte" style="margin-top: 10px;"> PROVINCIA </label>
                                        <div class="formulario_input_reporte"><?php echo $row['provincia_postulante']; ?> </div>
                                    </div>
                                    <div class="row">
                                        <label class="formulario_label_reporte" style="margin-top: 10px;"> CIUDAD </label>
                                        <div class="formulario_input_reporte"> <?php echo $row['ciudad_postulante']; ?> </div>
                                    </div>
                                    <div class="row">
                                        <label class="formulario_label_reporte" style="margin-top: 10px;"> DIRECCIÓN </label>
                                        <div class="formulario_input_reporte"> <?php echo $row['direcPrinEcu_postulante']; ?> <?php echo $row['direcSecEcu_postulante']; ?> <?php echo $row['direcNumEcu_postulante']; ?><?php echo $row['direcPisoEcu_postulante']; ?></div>
                                    </div>
                                    <div class="row">
                                        <label class="formulario_label_reporte" style="margin-top: 10px;"> EMAIL </label>
                                        <div class="formulario_input_reporte"> <?php echo $row['correo_usuario']; ?> </div>
                                    </div>
                                    <div class="row">
                                        <label class="formulario_label_reporte" style="margin-top: 10px;"> PAGINA WEB </label>
                                        <!-- <div class="formulario_input_reporte"> <?php echo $row['paginaweb_postulante']; ?> </div> -->
                                        <?php if (empty($row['paginaweb_postulante'])) {
                                        ?>
                                            <div class="formulario_input_reporte"> NO DISPONE </div>
                                        <?php
                                        } ?>
                                    </div>
                                    <div class="row">
                                        <label class="formulario_label_reporte" style="margin-top: 10px;"> TELÉFONOS </label>
                                        <div class='col-sm-5'>
                                            <?php
                                            $sql = "SELECT * FROM usuario u INNER JOIN telefonos_ecuador tel WHERE u.id_usuario = tel.usuarioId_ecuador";
                                            $result = mysqli_query($conn_registro, $sql);
                                            while ($rowTelefono = mysqli_fetch_array($result)) {
                                                $telefono_ecuador = $rowTelefono['telefono_ecuador'];
                                            ?>
                                                <div class="formulario_input_reporte"> <?php echo $telefono_ecuador ?></div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <label class="formulario_label_reporte" style="margin-top: 10px;"> EXTENCIÓN </label>
                                        <div class='col-sm-5'>
                                            <div class="formulario_input_reporte"> <?php echo $row['extecu_postulante']; ?></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="formulario_label_reporte" style="margin-top: 20px;"> CONSTITUCIÓN DEL CAPITAL </label>
                                        <div class="formulario_input_reporte"> <?php echo $row['constitucion_capital']; ?> </div>
                                    </div>
                                    <div class="row">
                                        <label class="formulario_label_reporte" style="margin-top: 20px;"> ESTADOS DE SITUACIÓN FINANCIERA </label>
                                        <div class="formulario_input_reporte"> <?php echo $row['estado_balance']; ?> &nbsp;&nbsp; <?php echo $row['estado_decurrente']; ?></div>
                                    </div>
                                    <h3 style="margin-top: 70px; color:rgb(6, 58, 110); font-weight: 600;"> PRODUCTOS Y SERVICIOS QUE OFERTA</h3>
                                    <div class="row">
                                        <label class="formulario_label_reporte"> SISTEMAS C4IVR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
                                        <?php
                                        $sql = "SELECT * FROM usuario u INNER JOIN producto_oferta p WHERE u.id_usuario = p.usuario_id_oferta";
                                        $result = mysqli_query($conn_registro, $sql);
                                        while ($rowProducto = mysqli_fetch_array($result)) {
                                            $sistemaC4IVR = $rowProducto['c4ivr_opt1'];
                                            $detalleSistemaC4IVR = $rowProducto['option1'];
                                            if (!empty($sistemaC4IVR)) {
                                                $array2 = explode(",", $sistemaC4IVR);
                                                foreach ($array2 as $arr) {
                                        ?>
                                                    <div class="producto"> <?php echo $arr ?></div>
                                                <?php
                                                }
                                                ?>
                                                <label class="formulario_label_reporte"> ESPECIFICACIÓN DEL BIEN : <label class="span"><?php echo $detalleSistemaC4IVR ?></label></label>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="producto"> <?php echo (' -----------------------------------  ') ?></div>
                                            <?php
                                            }
                                            ?>
                                        <?php
                                        }
                                        ?>
                                    </div><br><br>
                                    <div class="row">
                                        <label class="formulario_label_reporte"> AERONAVES DE ALA FIJA Y SUS COMPONENTES </label>
                                        <?php
                                        $sql = "SELECT * FROM usuario u INNER JOIN producto_oferta p WHERE u.id_usuario = p.usuario_id_oferta";
                                        $result = mysqli_query($conn_registro, $sql);
                                        while ($rowProducto = mysqli_fetch_array($result)) {
                                            $aeronaveFijo = $rowProducto['areonavefija_opt2'];
                                            $detalleAeronaveFijo = $rowProducto['option2'];
                                            if (!empty($aeronaveFijo)) {
                                                $array2 = explode(",", $aeronaveFijo);
                                                foreach ($array2 as $arr) {
                                        ?>
                                                    <div class="producto"> <?php echo $arr ?></div>
                                                <?php
                                                }
                                                ?>
                                                <label class="formulario_label_reporte"> ESPECIFICACIÓN DEL BIEN : <label class="span"><?php echo $detalleAeronaveFijo ?></label></label>
                                                <div class="detalle"> </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="producto"> <?php echo (' -----------------------------------  ') ?></div>
                                            <?php
                                            }
                                            ?>
                                        <?php
                                        }
                                        ?>
                                    </div><br><br>
                                    <div class="row">
                                        <label class="formulario_label_reporte"> DEFENSA AÉREA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <?php
                                        $sql = "SELECT * FROM usuario u INNER JOIN producto_oferta p WHERE u.id_usuario = p.usuario_id_oferta";
                                        $result = mysqli_query($conn_registro, $sql);
                                        while ($rowProducto = mysqli_fetch_array($result)) {
                                            $defensaAerea = $rowProducto['defensaaerea_opt3'];
                                            $detalleDefensaAerea = $rowProducto['option3'];
                                            if (!empty($defensaAerea)) {
                                                $array2 = explode(",", $defensaAerea);
                                                foreach ($array2 as $arr) {
                                        ?>
                                                    <div class="producto"> <?php echo $arr ?></div>
                                                <?php
                                                }
                                                ?>
                                                <label class="formulario_label_reporte"> ESPECIFICACIÓN DEL BIEN : <label class="span"><?php echo $detalleDefensaAerea ?></label></label>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="producto"> <?php echo (' -----------------------------------  ') ?></div>
                                            <?php
                                            }
                                            ?>
                                        <?php
                                        }
                                        ?>

                                    </div><br><br>
                                    <div class="row">
                                        <label class="formulario_label_reporte"> AERONAVES DE ALA ROTATORIA </label>
                                        <?php
                                        $sql = "SELECT * FROM usuario u INNER JOIN producto_oferta p WHERE u.id_usuario = p.usuario_id_oferta";
                                        $result = mysqli_query($conn_registro, $sql);
                                        while ($rowProducto = mysqli_fetch_array($result)) {
                                            $aeronaveRotatoria = $rowProducto['aeronaverot_opt4'];
                                            $detalleAeronaveRotatoria = $rowProducto['option4'];
                                            if (!empty($aeronaveRotatoria)) {
                                                $array2 = explode(",", $aeronaveRotatoria);
                                                foreach ($array2 as $arr) {
                                        ?>
                                                    <div class="producto"> <?php echo $arr ?></div>
                                                <?php
                                                }
                                                ?>
                                                <label class="formulario_label_reporte"> ESPECIFICACIÓN DEL BIEN : <label class="span"><?php echo $detalleAeronaveRotatoria ?></label></label>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="producto"> <?php echo (' -----------------------------------  ') ?></div>
                                            <?php
                                            }
                                            ?>
                                        <?php
                                        }
                                        ?>
                                    </div><br><br>
                                    <div class="row">
                                        <label class="formulario_label_reporte"> ARMAMENTO Y APOYO DE FUEGO </label>
                                        <?php
                                        $sql = "SELECT * FROM usuario u INNER JOIN producto_oferta p WHERE u.id_usuario = p.usuario_id_oferta";
                                        $result = mysqli_query($conn_registro, $sql);
                                        while ($rowProducto = mysqli_fetch_array($result)) {
                                            $armamentoApoyo = $rowProducto['armamento_opt5'];
                                            $detalleArmamentoApoyo = $rowProducto['option5'];
                                            if (!empty($armamentoApoyo)) {
                                                $array2 = explode(",", $armamentoApoyo);
                                                foreach ($array2 as $arr) {
                                        ?>
                                                    <div class="producto"> <?php echo $arr ?></div>
                                                <?php
                                                }
                                                ?>
                                                <label class="formulario_label_reporte"> ESPECIFICACIÓN DEL BIEN : <label class="span"> <?php echo $detalleArmamentoApoyo ?></label></label>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="producto"> <?php echo (' -----------------------------------  ') ?></div>
                                            <?php
                                            }
                                            ?>
                                        <?php
                                        }
                                        ?>
                                    </div><br><br>
                                    <div class="row">
                                        <label class="formulario_label_reporte"> MEDIOS DE COMBATE NAVAL Y FLUVIAL </label>
                                        <?php
                                        $sql = "SELECT * FROM usuario u INNER JOIN producto_oferta p WHERE u.id_usuario = p.usuario_id_oferta";
                                        $result = mysqli_query($conn_registro, $sql);
                                        while ($rowProducto = mysqli_fetch_array($result)) {
                                            $combateNaval = $rowProducto['combate_opt6'];
                                            $detalleCombateNaval = $rowProducto['option6'];
                                            if (!empty($combateNaval)) {
                                                $array2 = explode(",", $combateNaval);
                                                foreach ($array2 as $arr) {
                                        ?>
                                                    <div class="producto"> <?php echo $arr ?></div>
                                                <?php
                                                }
                                                ?>
                                                <label class="formulario_label_reporte"> ESPECIFICACIÓN DEL BIEN : <label class="span"><?php echo $detalleCombateNaval ?></label></label>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="producto"> <?php echo (' -----------------------------------  ') ?></div>
                                            <?php
                                            }
                                            ?>
                                        <?php
                                        }
                                        ?>
                                    </div><br><br>
                                    <div class="row">
                                        <label class="formulario_label_reporte"> VEHICULOS BLINDADOS Y MECANIZADOS </label>
                                        <?php
                                        $sql = "SELECT * FROM usuario u INNER JOIN producto_oferta p WHERE u.id_usuario = p.usuario_id_oferta";
                                        $result = mysqli_query($conn_registro, $sql);
                                        while ($rowProducto = mysqli_fetch_array($result)) {
                                            $blindadosMecanizado = $rowProducto['blindados_opt7'];
                                            $detalleBlindadosMecanizado = $rowProducto['option7'];
                                            if (!empty($blindadosMecanizado)) {
                                                $array2 = explode(",",  $blindadosMecanizado);
                                                foreach ($array2 as $arr) {
                                        ?>
                                                    <div class="producto"> <?php echo $arr ?></div>
                                                <?php
                                                }
                                                ?>
                                                <label class="formulario_label_reporte"> ESPECIFICACIÓN DEL BIEN : <label class="span"> <?php echo $detalleBlindadosMecanizado ?></label></label>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="producto"> <?php echo (' -----------------------------------  ') ?></div>
                                            <?php
                                            }
                                            ?>
                                        <?php
                                        }
                                        ?>
                                    </div><br><br>
                                    <div class="row">
                                        <h1><label class="formulario_label_reporte"> CONTRAMEDIDAS DEFENSIVAS DE AERONAVES </label></h1>
                                        <?php
                                        $sql = "SELECT * FROM usuario u INNER JOIN producto_oferta p WHERE u.id_usuario = p.usuario_id_oferta";
                                        $result = mysqli_query($conn_registro, $sql);
                                        while ($rowProducto = mysqli_fetch_array($result)) {
                                            $contramedidasDefensivas = $rowProducto['contramedidas_opt8'];
                                            $detalleContramedidasDefensivas = $rowProducto['option8'];
                                            if (!empty($contramedidasDefensivas)) {
                                                $array2 = explode(",",  $contramedidasDefensivas);
                                                foreach ($array2 as $arr) {
                                        ?>
                                                    <div class="producto"> <?php echo $arr ?></div>
                                                <?php
                                                }
                                                ?>
                                                <label class="formulario_label_reporte"> ESPECIFICACIÓN DEL BIEN : <label class="span"><?php echo $detalleContramedidasDefensivas ?></label></label>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="producto"> <?php echo (' -----------------------------------  ') ?></div>
                                            <?php
                                            }
                                            ?>
                                        <?php
                                        }
                                        ?>
                                    </div><br><br>
                                    <div class="row">
                                        <label class="formulario_label_reporte"> &nbsp;&nbsp;SEMOVIENTES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
                                        <?php
                                        $sql = "SELECT * FROM usuario u INNER JOIN producto_oferta p WHERE u.id_usuario = p.usuario_id_oferta";
                                        $result = mysqli_query($conn_registro, $sql);
                                        while ($rowProducto = mysqli_fetch_array($result)) {
                                            $semoviente = $rowProducto['semoviente_opt9'];
                                            $detalleSemoviente = $rowProducto['option9'];
                                            if (!empty($semoviente)) {
                                                $array2 = explode(",",  $semoviente);
                                                foreach ($array2 as $arr) {
                                        ?>
                                                    <div class="producto"> <?php echo $arr ?></div>
                                                <?php
                                                }
                                                ?>
                                                <label class="formulario_label_reporte"> ESPECIFICACIÓN DEL BIEN : <label class="span"><?php echo $detalleSemoviente ?></label></label>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="producto"> <?php echo (' -----------------------------------  ') ?></div>
                                            <?php
                                            }
                                            ?>
                                        <?php
                                        }
                                        ?>
                                    </div><br><br>
                                    <div class="row">
                                        <label class="formulario_label_reporte"> ARMAMENTO Y EQUIPO NO LETAL </label>
                                        <?php
                                        $sql = "SELECT * FROM usuario u INNER JOIN producto_oferta p WHERE u.id_usuario = p.usuario_id_oferta";
                                        $result = mysqli_query($conn_registro, $sql);
                                        while ($rowProducto = mysqli_fetch_array($result)) {
                                            $armamentoEquipo = $rowProducto['armamento_opt10'];
                                            $detalleArmamentoEquipo = $rowProducto['option10'];
                                            if (!empty($armamentoEquipo)) {
                                                $array2 = explode(",",  $armamentoEquipo);
                                                foreach ($array2 as $arr) {
                                        ?>
                                                    <div class="producto"> <?php echo $arr ?></div>
                                                <?php
                                                }
                                                ?>
                                                <label class="formulario_label_reporte"> ESPECIFICACIÓN DEL BIEN : <label class="span"> <?php echo $detalleArmamentoEquipo ?></label></label>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="producto"> <?php echo (' -----------------------------------  ') ?></div>
                                            <?php
                                            }
                                            ?>
                                        <?php
                                        }
                                        ?>
                                    </div><br><br>
                                    <div class="row">
                                        <label class="formulario_label_reporte"> EQUIPOS ESPECIALES, DE SOPORTE EN TIERRA, COMPONENTES MAYORES Y EQUIPOS DE VUELO </label>
                                        <?php
                                        $sql = "SELECT * FROM usuario u INNER JOIN producto_oferta p WHERE u.id_usuario = p.usuario_id_oferta";
                                        $result = mysqli_query($conn_registro, $sql);
                                        while ($rowProducto = mysqli_fetch_array($result)) {
                                            $equipoEspecial = $rowProducto['equipo_opt11'];
                                            $detalleEquipoEspecial = $rowProducto['option11'];
                                            if (!empty($equipoEspecial)) {
                                                $array2 = explode(",",  $equipoEspecial);
                                                foreach ($array2 as $arr) {
                                        ?>
                                                    <div class="producto"> <?php echo $arr ?></div>
                                                <?php
                                                }
                                                ?>
                                                <label class="formulario_label_reporte"> ESPECIFICACIÓN DEL BIEN : <label class="span"><?php echo $detalleEquipoEspecial ?></label></label>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="producto"> <?php echo (' -----------------------------------  ') ?></div>
                                            <?php
                                            }
                                            ?>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <h3 style="margin-top: 70px; color:rgb(6, 58, 110); font-weight: 600;"> DOCUMENTOS CARGADOS AL SISTEMA</h3>
                                    <table>
                                        <tr>
                                            <th>GENERALES</th>
                                            <th>ESPECIFICOS</th>
                                        </tr>
                                        <tr>
                                            <td>1.1 Solicitud de calificación de bienes estratégicos y/o prestación de servicios conexos. En el caso de persona jurídica nacional o extranjera la solicitud deberá estar firmada por quien ejerza la representación legal o apoderado del fabricante y/o distribuidor autorizado;</td>
                                            <td> 2.1.1. Estar al día en las obligaciones tributarias con el Servicio de Rentas Internas (SRI); </td>
                                        </tr>
                                        <tr>
                                            <td>1.2 Formulario de datos generales del proveedor y de los bienes y servicios que estén en capacidad de proveer;</td>
                                            <td> 2.1.2. Original o copia certificada del Registro Único de Contribuyentes (RUC); y,</td>
                                        </tr>
                                        <tr>
                                            <td>1.3 El proveedor (fabricante o distribuidor) de bienes estratégicos y/o prestación de servicios conexos, presentará los documentos que acrediten la capacidad y experiencia en su fabricación, distribución y/o comercialización. Para la capacidad presentará certificaciones MILlTARY STANDARD: (MIL STD), Standardization Agreement (STANAG), ISO, etc. u otros documentos del bien y/o prestación de! servicio conexo de acuerdo a la naturaleza del bien ofertado. Para la experiencia presentará documentos respecto de la comercialización y/o certificaciones emitidas por los clientes a quienes ha proveído. El distribuidor, además, presentará una carta de autorización como distribuidor;</td>
                                            <td> 2.1.3. Si es empleador, deberá estar al día en las obligaciones patronales en el Instituto Ecuatoriano de Seguridad Social (IESS);</td>
                                        </tr>
                                        <tr>
                                            <td>1.4 El distribuidor nacional o extranjero que por su reciente creación o autorización de distribución (no mayor a 1 año), no pueda presentar los documentos que acrediten su capacidad y experiencia, podrá presentar los documentos del fabricante del bien y/o servicio conexo que oferta;</td>
                                            <td>------------------------------------</td>
                                        </tr>
                                        <tr>
                                            <td>1.5 Declaración juramentada otorgada ante Notario Público, a través de la cual la persona natural o el representante legal de la persona jurídica nacional o extranjera establezca:<br>
                                                1.5.1 El domicilio de la persona natural o jurídica, nacional o extranjera; y de, su representante legal o apoderado;<br>
                                                1.5.2 Acuerdo de responsabilidad del compromiso de confidencialidad y reserva de información; y,<br>
                                                1.5.3 Declaración de que toda la documentación presentada es auténtica y fidedigna.<br></td>
                                            <td>------------------------------------</td>
                                        </tr>
                                        <tr>
                                            <td>1.6 Estados de situación financiera del año inmediato anterior que muestre indicadores de la situación económica, de la persona natural o jurídica, nacional o extrajera que actúen como fabricante y/o distribuidor autorizado;</td>
                                            <td>------------------------------------</td>
                                        </tr>
                                        <tr>
                                            <td>1.7 Poder para realizar los trámites administrativos y legales como apoderado o simplemente para el proceso de calificación de la persona natural o jurídica, nacional o extranjera.</td>
                                            <td>------------------------------------</td>
                                        </tr>
                                    </table>
                                    <h3><a href="../vistas/calificacionReporte_pdf.php" target="_blank" class="btn btn-success"><i class="fas fa-file-fdp"></i>GENERAR REPORTE</a></h3>
                                </div>
                            </div>
                        </center>
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