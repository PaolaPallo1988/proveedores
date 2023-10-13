<?php

require('../conexion/conexion.php');
require('../login/session.php');

$result = mysqli_query($conn_registro, "SELECT * FROM usuario u INNER JOIN perfil p INNER JOIN postulante pos INNER JOIN razonsoc r INNER JOIN telefonos_ecuador tel ON u.id_usuario='$session_id' AND p.id_perfil= u.perfil_id AND u.id_usuario= pos.usuario_id AND pos.razonsoc_id= r.id_razonsoc  AND u.id_usuario = tel.usuarioId_ecuador ")  or die('Error In Session');
$row = mysqli_fetch_array($result);


ob_start();
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
    <title>Reporte Calificación | MDN </title>
    <!-- JQVMap -->
    <link href="../css/estilos_reporte.css" rel="stylesheet" />

    </script>
    <style>
        /* MARGENES PARA LA HOJA */
        @page {
            margin: 120px 90px 120px 90px;
            /* Arriba | Derecha | Abajo | Izquierda */
        }

        header {
            position: fixed;
            top: -60px;
            left: 0px;
            right: 0px;
            height: 40px;

            /** Extra personal styles **/
            background-color: rgb(6, 58, 110);
            color: white;
            text-align: center;
            line-height: 35px;
        }

        footer {
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            height: 40px;


            /** Extra personal styles **/
            background-color: rgb(6, 58, 110);
            color: white;
            text-align: center;
            line-height: 35px;
        }



        /*  ESTILO DEL REPORTE DE CALIFICACIÓN */

        .imagen {
            width: 120px;
        }

        .texto {
            /* width: 400px; */
            color: rgb(6, 58, 110);
            font-weight: 800;
            font-size: 14px;
            font-family: "arial";
            line-height: 5px;

        }

        /*  ESTILO DEL REPORTE DE CALIFICACIÓN */


        .img {
            border-radius: 50%;
            width: 70%;
            background: #fff;
            margin-left: 15%;
            z-index: 1000;
            position: inherit;
            margin-top: 20px;
            border: 1px solid rgba(52, 73, 94, 0.44);
            padding: 4px
        }



        /*  ESTILO DE LOS LABEL Y DIV DEL REPORTE DE CALIFICACIÓN */


        .formulario_input_reporte {
            /* border: snow ; */
            line-height: 25px;
            border-bottom: 1px solid black;
            color: #000;
            text-transform: uppercase;
            font-size: 12px;
            padding: 10px 20px;
            /* width: 90%; */
            font-family: "arial";
        }

        .formulario_label_reporte {
            margin-top: 10px;
            margin-left: 5px;
            font-weight: 600;
            color: #000;
            font-size: 14px;
            font-family: "arial";
            color: rgb(6, 58, 110);
            text-align: left;
        }

        .producto {
            /* border: snow ; */
            line-height: 25px;
            /* border-bottom: 1px solid black;  */
            color: #0e0c0c;
            text-transform: uppercase;
            font-size: 12px;
            padding: 10px 20px;
            /* width: 90%; */
            text-align: justify;
            font-family: "arial";
            line-height: 5px;

        }

        span {
            color: #000;

        }

        .detalle {
            /* border: snow ; */
            line-height: 25px;
            /* border-bottom: 1px solid black;  */
            color: #000;
            text-transform: uppercase;
            font-size: 12px;
            padding: 10px 20px;
            /* width: 90%; */
            /* margin-top: 8px; */
            text-align: justify;
            font-family: "arial";

        }

        /*  ESTILO DE LOS LABEL Y DIV DEL REPORTE DE CALIFICACIÓN */

        /*  ESTILO DE LA TABLA DEL REPORTE DE CALIFICACIÓN */
        table {
            font-family: arial;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #130f0f;
            text-align: justify;
            color: #000;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        /*  ESTILO DE LA TABLA DEL REPORTE DE CALIFICACIÓN */

        /*  SALTOS DE PÁGINA */
        .page-break {
            page-break-after: always;
        }

        /*  SALTOS DE PÁGINA */
    </style>

</head>

<HEADER>
    REPORTE DE INGRESO DE DATOS CALIFICACIÓN
</HEADER>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <!-- page content -->
            <div class="right_col" role="main">
                <!-- /top tiles -->
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <center>
                            <div class="dashboard_graph"> <!--clase para poner el fondo blanco -->
                                <!-- <div class="imagen"> -->
                                <?php
                                // $nombre_postulante = $row['nombre_usuario'];
                                // $nombre_imagen = "../Fotos_Perfil/$nombre_postulante/$nombre_postulante.JPG";
                                // if (file_exists($nombre_imagen)) {
                                ?>
                                <!-- https://www.youtube.com/watch?v=PvI3nbffuqk&ab_channel=Develoteca-OscarJ.UhP%C3%A9rez -->
                                <!-- <div><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>../Proveedores_2022_FT/Fotos_Perfil/<?php echo $row['nombre_usuario'] ?>/<?php echo $row['nombre_usuario']; ?>.JPG" alt="..." class="img-circle profile_img"></div> -->
                                <?php
                                // } else {
                                ?>
                                <!-- <div><img src="../images/AdminLTELogo.png" alt="..." class="img"></div> -->
                                <?php
                                // }
                                ?>
                                <!-- </div> -->
                                <div class="texto">
                                    <p><?php echo $row['nombre_usuario'] . " " . $row['apellido_usuario']; ?></font>
                                    </p>
                                    <p><?php echo $row['cedula_usuario']; ?></p>
                                    <p><?php echo $row['nombre_razonsoc']; ?></p>
                                    <p><?php echo $row['siglas_postulante']; ?></p>
                                    <p><?php echo $row['actividad_postulante']; ?> &nbsp;/&nbsp; <?php echo $row['distribuidor_postulante']; ?></p>
                                </div>
                                <br><br>
                                <div>

                                    <div class="row">
                                        <br>
                                        <div class="formulario_label_reporte " style="margin-top: 10px;"> PAIS : </div>
                                        <div class="formulario_input_reporte"><?php echo $row['pais_postulante']; ?> </div>
                                    </div>
                                    <div class="row">
                                        <div class="formulario_label_reporte" style="margin-top: 10px;"> PROVINCIA </div>
                                        <div class="formulario_input_reporte"><?php echo $row['provincia_postulante']; ?> </div>
                                    </div>
                                    <div class="row">
                                        <div class="formulario_label_reporte" style="margin-top: 10px;"> CIUDAD </div>
                                        <div class="formulario_input_reporte"> <?php echo $row['ciudad_postulante']; ?> </div>
                                    </div>
                                    <div class="row">
                                        <div class="formulario_label_reporte" style="margin-top: 10px;"> DIRECCIÓN </div>
                                        <div class="formulario_input_reporte"> <?php echo $row['direcPrinEcu_postulante']; ?> <?php echo $row['direcSecEcu_postulante']; ?> <?php echo $row['direcNumEcu_postulante']; ?><?php echo $row['direcPisoEcu_postulante']; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="formulario_label_reporte" style="margin-top: 10px;"> EMAIL </div>
                                        <div class="formulario_input_reporte"> <?php echo $row['correo_usuario']; ?> </div>
                                    </div>
                                    <div class="row">
                                        <div class="formulario_label_reporte" style="margin-top: 10px;"> PAGINA WEB </div>
                                        <!-- <div class="formulario_input_reporte"> <?php echo $row['paginaweb_postulante']; ?> </div> -->
                                        <?php if (empty($row['paginaweb_postulante'])) {
                                        ?>
                                            <div class="formulario_input_reporte"> NO DISPONE </div>
                                        <?php
                                        } ?>
                                    </div>
                                    <div class="row">
                                        <div class="formulario_label_reporte" style="margin-top: 10px;"> TELÉFONOS </div>
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
                                        <div class="formulario_label_reporte" style="margin-top: 10px;"> EXTENCIÓN </div>
                                        <div class='col-sm-5'>
                                            <div class="formulario_input_reporte"> <?php echo $row['extecu_postulante']; ?></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="formulario_label_reporte" style="margin-top: 20px;"> CONSTITUCIÓN DEL CAPITAL </div>
                                        <div class="formulario_input_reporte"> <?php echo $row['constitucion_capital']; ?> </div>
                                    </div>
                                    <div class="row">
                                        <div class="formulario_label_reporte" style="margin-top: 20px;"> ESTADOS DE SITUACIÓN FINANCIERA </div>
                                        <div class="formulario_input_reporte"> <?php echo $row['estado_balance']; ?> &nbsp;&nbsp; <?php echo $row['estado_decurrente']; ?></div>
                                    </div>
                                    <h3 style="margin-top: 70px; color:rgb(6, 58, 110); font-weight: 600;"> PRODUCTOS Y SERVICIOS QUE OFERTA</h3>
                                    <div class="row">
                                        <div class="formulario_label_reporte">SISTEMAS C4IVR </div>
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
                                                <div class="formulario_label_reporte"> ESPECIFICACIÓN DEL BIEN : <span> <?php echo $detalleSistemaC4IVR ?> </span> </div>
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
                                        <div class="formulario_label_reporte"> AERONAVES DE ALA FIJA Y SUS COMPONENTES </div><br>
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
                                                <div class="formulario_label_reporte"> ESPECIFICACIÓN DEL BIEN : <span><?php echo $detalleAeronaveFijo ?></span> </div>
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
                                        <div class="formulario_label_reporte"> DEFENSA AÉREA </div>
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
                                                <div class="formulario_label_reporte"> ESPECIFICACIÓN DEL BIEN : <span><?php echo $detalleDefensaAerea ?></span></div>
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
                                        <div class="formulario_label_reporte"> AERONAVES DE ALA ROTATORIA </div>
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
                                                <div class="formulario_label_reporte"> ESPECIFICACIÓN DEL BIEN : <span><?php echo $detalleAeronaveRotatoria ?></span></div>
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
                                        <div class="formulario_label_reporte"> ARMAMENTO Y APOYO DE FUEGO </div>
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
                                                <div class="formulario_label_reporte"> ESPECIFICACIÓN DEL BIEN : <span><?php echo $detalleArmamentoApoyo ?></span></div>
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
                                        <div class="formulario_label_reporte"> MEDIOS DE COMBATE NAVAL Y FLUVIAL </div>
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
                                                <div class="formulario_label_reporte"> ESPECIFICACIÓN DEL BIEN : <span><?php echo $detalleCombateNaval ?></span></div>
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
                                        <div class="formulario_label_reporte"> VEHICULOS BLINDADOS Y MECANIZADOS </div>
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
                                                <div class="formulario_label_reporte"> ESPECIFICACIÓN DEL BIEN : <span> <?php echo $detalleBlindadosMecanizado ?></span></div>
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
                                        <h1>
                                            <div class="formulario_label_reporte"> CONTRAMEDIDAS DEFENSIVAS DE AERONAVES </div>
                                        </h1>
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
                                                <div class="formulario_label_reporte"> ESPECIFICACIÓN DEL BIEN : <span><?php echo $detalleContramedidasDefensivas ?></span></div>
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
                                        <div class="formulario_label_reporte"> &nbsp;&nbsp;SEMOVIENTES </div>
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
                                                <div class="formulario_label_reporte"> ESPECIFICACIÓN DEL BIEN : <span><?php echo $detalleSemoviente ?></span></div>
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
                                        <div class="formulario_label_reporte"> ARMAMENTO Y EQUIPO NO LETAL </div>
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
                                                <div class="formulario_label_reporte"> ESPECIFICACIÓN DEL BIEN : <span> <?php echo $detalleArmamentoEquipo ?></span></div>
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
                                        <div class="formulario_label_reporte"> EQUIPOS ESPECIALES, DE SOPORTE EN TIERRA, COMPONENTES MAYORES Y EQUIPOS DE VUELO </div>
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
                                                <div class="formulario_label_reporte"> ESPECIFICACIÓN DEL BIEN : <span><?php echo $detalleEquipoEspecial ?></span></div>
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
                                    <div class="page-break"></div>
                                    <h3 style="color:rgb(6, 58, 110); font-weight: 600;"> DOCUMENTOS CARGADOS AL SISTEMA</h3>
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
                                </div>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

</body>

<footer> 
     REGISTRO DE PROVEEDORES DE BIENES ESTRATÉGICOS © <?php echo date("d-m-Y h:i:s"); ?> 
</footer>

</html>



<?php

// https://www.youtube.com/watch?v=VSw_CoFj6hY&ab_channel=CarlosCastillo


$html = ob_get_clean();
require('../dompdf/autoload.inc.php');


// PREPARA UNA VARIABLE PARA RECIBIR LO QUE DESTA GUARDADO DE HTML
use Dompdf\Dompdf;




// PERMITE QUE OBTENGA IMAGENES
//https://www.youtube.com/watch?v=yGBd3ymCnE8&list=PLYAyQauAPx8mv6I7SG-4sNGVngclrO6WQ&index=8&ab_channel=CodeStack
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

//INSTANCIAR LA CLASE
$dompdf = new Dompdf($options);

// PSAR EL CONTENIDO DE HTML
$dompdf->loadHtml($html);

//TAMAÑO FORMATO DE LA HOJA
$dompdf->setPaper('A4');

//REALIZAR HTML A PDF
$dompdf->render();

// PASAR POR PRIMER PARAMETRO EL 
$dompdf->stream('REPORTE CALIFICACION', array('attachment"' => false));

?>