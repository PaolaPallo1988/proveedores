<?php
require('../conexion/conexion.php');
require('../login/session.php');
$result = mysqli_query($conn_registro, "SELECT * FROM usuario u INNER JOIN perfil p ON u.id_usuario='$session_id' AND p.id_perfil= u.perfil_id") or die('Error In Session');
$row = mysqli_fetch_array($result);
$nombre_usuario = $row['nombre_usuario'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Calificación de Proveedores | MDN </title>
    <!-- <Validación de Formulario con Javascript>-->
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilos.css">
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- COLAPSE PARA MOSTRAR LA INFORMACIÓN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--<script src="libreria.js"></script>-->
    <!-- Sweetalert2 -->
    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>
    <!-- usar calendario -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- BOOSTRAP 5 CHECKED -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!--- UTILIZAR JAX --->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!--- FORMATO DE BOTONES ---><!-- INTERLINIADO -->
    <link href="../css/botones.css" rel="stylesheet">

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view"><br><br>
                    <div class="navbar nav_title" style="border: 140;">
                        <a href="postulante.php" class="site_title"><i class="fa fa-desktop"></i> <span><b>PROVEEDORES</b></span></a>
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
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <font size="3" face="arial">
                            <form class="form-label-left input_mask" name="postulante_principal" method="POST" id="postulante_principal" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                                <?php include("../controlador/guarda_calificacion.php"); ?>
                                <input type='hidden' class="form-control" required name="usuario_id" id="usuario_id" value="<?php echo  $row['id_usuario']; ?>" />
                                <input type='hidden' class="form-control" required name="estado_id" id="estado_id" value="1" readonly />
                                <input type='hidden' class="form-control" required name="procesoId_postulante" id="procesoId_postulante" value="1" readonly />
                                <input type='hidden' class="form-control" required name="usuario_creacion_resp" id="usuario_creacion_resp" value="<?php echo  $row['nombre_usuario'] . " " . $row['apellido_usuario']; ?>" readonly />
                                <div class="x_panel"><br>
                                    <div class="container p-2 my-2 text-white" style="background-color:#0A307C">
                                        <font size=5> DATOS GENERALES ( los campos marcados con * son obligatorios)</font>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div><br><br>
                                    <div class="x_content" style="color:black">
                                        <div class="row">
                                            <div class='col-sm-6' id='grupo__razonsoc_postulante'>
                                                <label class="formulario__label">TIPO DE RAZÓN SOCIAL * </label>
                                                <div class='input-group date'>
                                                    <select class="formulario__input" name="razonsoc_postulante" id="razonsoc_postulante" onclick="validarAdjuntos()" onchange="mostrarform(this.value);" required>
                                                        <option value="">SELECCIONAR... </option>
                                                        <?php
                                                        include("../conexion/conexion.php");
                                                        $sqlrazonsoc = "SELECT * FROM razonsoc";
                                                        $queryrazonsoc = mysqli_query($conn_registro, $sqlrazonsoc);
                                                        while ($rowrazonsoc = mysqli_fetch_array($queryrazonsoc)) {
                                                            $id_razonsoc = $rowrazonsoc['id_razonsoc'];
                                                            $nombre_razonsoc = $rowrazonsoc['nombre_razonsoc'];
                                                        ?>
                                                            <option value="<?php echo $id_razonsoc ?>"><?php echo $nombre_razonsoc ?> </option>
                                                        <?php } ?>
                                                    </select>
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">Seleccion un tipo de razón social </p>
                                            </div>
                                            <div class=' col-sm-6'>
                                                <label class="formulario__label">IDENTIFICACIÓN </label>
                                                <div class='input-group date'>
                                                    <input type='text' style="background-color:#E0F3E7" class="formulario__input" name="cedula_postulante" id="cedula_postulante" style="text-transform:uppercase;" value="<?php echo  $row['cedula_usuario']; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" disabled />
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                            </div>
                                        </div></br>
                                        <div class="row">
                                            <div class='col-sm-6'>
                                                <label class="formulario__label"> NOMBRE O RAZÓN SOCIAL </label>
                                                <div class='input-group date'>
                                                    <input type='text' style="background-color:#E0F3E7" class="formulario__input" name="nombre_postulante" id="nombre_postulante" style="text-transform:uppercase;" value="<?php echo  $nombre_usuario ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" disabled />
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                            </div>
                                            <div class='col-sm-6' id="grupo__siglas_postulante">
                                                <label class="formulario__label"> SIGLAS *</label>
                                                <div class='input-group date'>
                                                    <input type='text' class="formulario__input" name="siglas_postulante" id="siglas_postulante" style="text-transform:uppercase;" minlength="3" onkeyup="javascript:this.value=this.value.toUpperCase();" required />

                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">En el caso de no tener siglas digite N/A </p>
                                            </div>
                                        </div></br>
                                        <div class="row">
                                            <div class='col-sm-6' id='grupo__actividad_postulante'>
                                                <label class="formulario__label"> ACTIVIDAD * </label>
                                                <div class='input-group date'>
                                                    <select class="formulario__input" name="actividad_postulante" id="actividad_postulante" onchange="mostrar(this.value);" required>
                                                        <option value="N/A">SELECCIONAR...</option>
                                                        <option value="DISTRIBUIDOR">DISTRIBUIDOR</option>
                                                        <option value="FABRICANTE">FABRICANTE</option>
                                                    </select>
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">Seleccione la actividad de la empresa que postula </p>
                                            </div>
                                            <div class='col-sm-6' id='grupo__distribuidor_postulante'>
                                                <div id="distribuidor_opciones" style="display:none;">
                                                    <br>
                                                    <label class="formulario__label"> </label>
                                                    <div class="radio">
                                                        <input type="radio" name="distribuidor_postulante" id="distribuidor_postulante1" value="AUTORIZADO">
                                                        <label for="distribuidor_postulante1"> AUTORIZADO </label>
                                                        <input type="radio" name="distribuidor_postulante" id="distribuidor_postulante2" value="EXCLUSIVO" >
                                                        <label for="distribuidor_postulante2"> EXCLUSIVO </label>
                                                        <input type="radio"  name="distribuidor_postulante" id="distribuidor_postulante3" value="N/A" checked>
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error">Seleccione una actividad </p>
                                                </div>
                                            </div>
                                        </div></br>
                                        <div class="row">
                                            <div class='col-sm-4' id='grupo__lista1'>
                                                <label class="formulario__label"> PAIS *</label>
                                                <div class='input-group date'>
                                                    <select class="formulario__input" style="text-transform:uppercase;" name="lista1" id="lista1" required>
                                                        <option value=" ">SELECCIONAR...</option>
                                                        <?php
                                                        include("../conexion/conexion.php");
                                                        $sqlpais = "SELECT * FROM pais ORDER BY nombre_pais";
                                                        $querypais = mysqli_query($conn_registro, $sqlpais);
                                                        while ($rowpais = mysqli_fetch_array($querypais)) {
                                                            $id_pais = $rowpais['id_pais'];
                                                            $nombre_pais = $rowpais['nombre_pais'];
                                                            $codtelefono_pais = $rowpais['codtelefono_pais'];
                                                        ?>
                                                            <option value="<?php echo $nombre_pais ?>"><?php echo $nombre_pais ?></option>
                                                        <?php }
                                                        ?>
                                                    </select>
                                                    <i class="formulario__validacion-estado-pais fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">Seleccione el país </p>
                                            </div>
                                            <div class='col-sm-4' id='grupo__provincia_postulante'>
                                                <label class="formulario__label"> PROVINCIA / ESTADO * </label>
                                                <div class='input-group date'>
                                                    <input type='text' class="formulario__input" minlength="4" maxlength="25" name="provincia_postulante" id="provincia_postulante" style="text-transform:uppercase;" onkeypress="return validaletras(event);" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error"> </p>
                                            </div>
                                            <div class='col-sm-4' id='grupo__ciudad_postulante'>
                                                <label class="formulario__label"> CIUDAD *</label>
                                                <div class='input-group date'>
                                                    <input type='text' class="formulario__input" minlength="6" maxlength="25" name="ciudad_postulante" id="ciudad_postulante" style="text-transform:uppercase;" onkeypress="return validaletras(event);" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error"> </p>
                                            </div>
                                        </div></br><br>
                                    </div></br>
                                </div>

                                <div id="direccion_origen" style="display:none;">
                                    <div class="x_panel"><br>
                                        <div class="container p-2 my-2 text-white" style="background-color:#0A307C">
                                            <font size=5> DIRECCION EN EL PAÍS DE ORIGEN *</font>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div><br><br>
                                        <div class="x_content" style="color:black">
                                            <div class="row">
                                                <div class='col-sm-5' id='grupo__direcPrinOrig_postulante'>
                                                    <label class="formulario__label"> CALLE PRINCIPAL *</label>
                                                    <div class='input-group date'>
                                                        <input type='text' class="formulario__input" minlength="6" name="direcPrinOrig_postulante" id="direcPrinOrig_postulante" style="text-transform:uppercase;" onkeypress="return validaciudad(event);" onkeyup="javascript:this.value=this.value.toUpperCase();" required />
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error"> </p>
                                                </div>
                                                <div class='col-sm-2' id='grupo__direcNumOrig_postulante'>
                                                    <label class="formulario__label"> NÚMERO *</label>
                                                    <div class='input-group date'>
                                                        <input type='text' class="formulario__input" minlength="2" name="direcNumOrig_postulante" id="direcNumOrig_postulante" style="text-transform:uppercase;" onkeypress="return validaciudad(event);" onkeyup="javascript:this.value=this.value.toUpperCase();" required />
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error"> </p>
                                                </div>
                                                <div class='col-sm-5' id='grupo__direcSecOrig_postulante'>
                                                    <label class="formulario__label"> CALLE SECUNDARIA *</label>
                                                    <div class='input-group date'>
                                                        <input type='text' class="formulario__input" minlength="6" name="direcSecOrig_postulante" id="direcSecOrig_postulante" style="text-transform:uppercase;" onkeypress="return validaciudad(event);" onkeyup="javascript:this.value=this.value.toUpperCase();" required />
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error"> </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class='col-sm-6' id='grupo__direcPisoOrig_postulante'>
                                                    <label class="formulario__label"> NOMBRE DEL EDIFICIO / No. PISO / No. OFICINA * </label>
                                                    <div class='input-group date'>
                                                        <input type='text' class="formulario__input" minlength="4" name="direcPisoOrig_postulante" id="direcPisoOrig_postulante" style="text-transform:uppercase;" onkeypress="return validaciudad(event);" onkeyup="javascript:this.value=this.value.toUpperCase();" required />
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error">Digite la información en el orden indicado </p>
                                                </div>
                                                <div class='col-sm-2'>
                                                    <label class="formulario__label"> CODIGO ÁREA </label>
                                                    <div class='input-group date'>
                                                        <div name="codtelefono_pais" id="codtelefono_pais"></div>
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error"> </p>
                                                </div>
                                                <div class='col-sm-2' id='grupo__teleforig_postulante'>
                                                    <label class="formulario__label"> TEL FIJO O MOVIL *</label>
                                                    <div class='input-group date'>
                                                        <input type='tel' class="formulario__input" name="teleforig_postulante" id="teleforig_postulante" onkeypress="return numeros(event)" maxlength="13" required /> <!--onkeyup="telefono(event, this)" para llamar al evento del telefono -->
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error"> Digite numero fijo o movil</p>
                                                </div>
                                                <div class='col-sm-2' id='grupo__extorig_postulante'>
                                                    <label class="formulario__label"> EXTENSIÓN * </label>
                                                    <div class='input-group date'>
                                                        <input type='text' class="formulario__input" name="extorig_postulante" id="extorig_postulante" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return  valideExtension(event)" required />
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error"> En el caso de no poseer extensión digitar N/A</p>
                                                </div>
                                            </div></br><br>
                                        </div></br>
                                    </div>
                                </div>


                                <div id="direccion_ecuador" style="display:none;">
                                    <div class="x_panel"><br>
                                        <div class="container p-2 my-2 text-white" style="background-color:#0A307C">
                                            <font size=5> DIRECCION EN EL ECUADOR *</font>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div><br><br>
                                        <div class="x_content" style="color:black">
                                            <div class="row">
                                                <div class='col-sm-5' id='grupo__direcPrinEcu_postulante'>
                                                    <label class="formulario__label"> CALLE PRINCIPAL * </label>
                                                    <div class='input-group date'>
                                                        <input type='text' class="formulario__input" name="direcPrinEcu_postulante" id="direcPrinEcu_postulante" onkeypress="return validaciudad(event)" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required />
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error"> </p>
                                                </div>
                                                <div class='col-sm-2' id='grupo__direcNumEcu_postulante'>
                                                    <label class="formulario__label"> NÚMERO * </label>
                                                    <div class='input-group date'>
                                                        <input type='text' class="formulario__input" name="direcNumEcu_postulante" id="direcNumEcu_postulante" minlength="2" onkeypress="return validaciudad(event)" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required />
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error"> </p>
                                                </div>
                                                <div class='col-sm-5' id='grupo__direcSecEcu_postulante'>
                                                    <label class="formulario__label"> CALLE SECUNDARIA * </label>
                                                    <div class='input-group date'>
                                                        <input type='text' class="formulario__input" name="direcSecEcu_postulante" id="direcSecEcu_postulante" style="text-transform:uppercase;" onkeypress="return validaciudad(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" required />
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error"> </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class='col-sm-7' id='grupo__direcPisoEcu_postulante'>
                                                    <label class="formulario__label"> NOMBRE DEL EDIFICIO / No. PISO / No. OFICINA * </label>
                                                    <div class='input-group date'>
                                                        <input type='text' class="formulario__input" name="direcPisoEcu_postulante" id="direcPisoEcu_postulante" minlength="1" onkeypress="return validaciudad(event);" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required />
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error">Digite la información en el orden indicado </p>
                                                </div>
                                                <div class='col-sm-3' id='grupo__telefecu_postulante'>
                                                    <label class="formulario__label"> TEL FIJO / MOVIL *</label>
                                                    <div class='input-group date' id="field_wrapper">
                                                        <input type='text' class="formulario__input_tel mr-2" name="telefecu_postulante[]" id="telefecu_postulante[]" onkeypress="return numeros(event)" required /><a href="javascript:void(0);" class="btn btn-info" id="add_button"><i class="fas fa-plus"></i></a>
                                                        <!--<i class="formulario__validacion-estado fas fa-times-circle"></i>-->
                                                    </div>
                                                    <p class="formulario__input-error"> Digite numero fijo o movil</p>
                                                </div>
                                                <div class='col-sm-2' id='grupo__extecu_postulante'>
                                                    <label class="formulario__label"> EXTENSIÓN * </label>
                                                    <div class='input-group date'>
                                                        <input type='text' class="formulario__input" name="extecu_postulante" id="extecu_postulante" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return  valideExtension(event)" required />
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error"> En el caso de no poseer extensión digitar N/A</p>
                                                </div>
                                            </div></br>
                                            <div class="row">
                                                <div class='col-sm-6'>
                                                    <label class="formulario__label"> CORREO </label>
                                                    <div class='input-group date'>
                                                        <input type='email' style="background-color:#E0F3E7" class="formulario__input" style="text-transform:lowercase" name="correo_postulante" id="correo_postulante" value="<?php echo  $row['correo_usuario']; ?>" disabled />
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error"> </p>
                                                </div>
                                                <div class='col-sm-6' id='grupo__paginaweb_postulante'>
                                                    <label class="formulario__label"> PAGINA WEB </label>
                                                    <div class='input-group date'>
                                                        <input type='text' name="paginaweb_postulante" class="formulario__input" style="text-transform:lowercase" id="pagina_postulante" placeholder="https://www.corporacionfavorita.com" />
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error"> En el caso de no poseer pagina dejar el campo en blanco</p>
                                                </div>
                                            </div>
                                        </div></br>
                                    </div>
                                </div>



                                <div id="representante_legal" style="display:none;">
                                    <div class="x_panel"><br>
                                        <div class="container p-2 my-2 text-white" style="background-color:#0A307C">
                                            <font size=5> REPRESENTANTE LEGAL </font>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div><br>
                                        <div class="x_content" style="color:black"><br><br>
                                            <div class="row">
                                                <div class='col-sm-6' id='grupo__nombre_legal'>
                                                    <label class="formulario__label"> NOMBRES Y APELLIDOS * </label>
                                                    <div class='input-group date'>
                                                        <input type='text' class="formulario__input" name="nombre_legal" id="nombre_legal" onkeypress="return soloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" required />
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error"> Digite dos nombres y dos apellidos</p>
                                                </div>
                                                <div class="col-sm-6" id='grupo__vigencia_legal'>
                                                    <label class="formulario__label"> VIGENCIA * </label>
                                                    <div class='input-group date'>
                                                        <input type="text" class="formulario__input" name="vigencia_legal" id="vigencia_legal" placeholder='DD/MM/AAAA' onchange="vigenciaLegal()" onkeyup="fecha(event, this)" maxlength="10" required>
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error"> Verifique que el nombramiento este vigente</p>
                                                </div>
                                            </div></br>
                                            <div class="row">
                                                <div class='col-sm-3' id='grupo__pais_legal'>
                                                    <label class="formulario__label"> PAIS * </label>
                                                    <div class='input-group date'>
                                                        <select class="formulario__input" style="text-transform:uppercase;" name="pais_legal" id="pais_legal" required>
                                                            <option value="NINGUNO">SELECCIONAR......</option>
                                                            <?php
                                                            include("../conexion/conexion.php");
                                                            $sqlpais = "SELECT * FROM pais ORDER BY nombre_pais";
                                                            $querypais = mysqli_query($conn_registro, $sqlpais);
                                                            while ($rowpais = mysqli_fetch_array($querypais)) {
                                                                $id_pais = $rowpais['id_pais'];
                                                                $nombre_pais = $rowpais['nombre_pais'];
                                                            ?>
                                                                <option value="<?php echo $nombre_pais ?>"><?php echo $nombre_pais ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error"> </p>
                                                </div>
                                                <div class='col-sm-6' id='grupo__direccion_legal'>
                                                    <label class="formulario__label"> DIRECCION * </label>
                                                    <div class='input-group date'>
                                                        <input type='text' class="formulario__input" name="direccion_legal" id="direccion_legal" onkeypress="return validaciudad(event);" onkeyup="javascript:this.value=this.value.toUpperCase();" required />
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error"> </p>
                                                </div>
                                                <div class='col-sm-3' id='grupo__ciudad_legal'>
                                                    <label class="formulario__label"> CIUDAD * </label>
                                                    <div class='input-group date'>
                                                        <input type="text" class="formulario__input" name="ciudad_legal" id="ciudad_legal" onkeypress="return soloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error"> </p>
                                                </div>
                                            </div></br>
                                            <div class="row">
                                                <div class='col-sm-3'>
                                                    <label class="formulario__label"> CÓDIGO ÁREA </label>
                                                    <div class='input-group date'>
                                                        <div name='codtelefono_legal' id='codtelefono_legal'></div>
                                                        <!--<input type='text' class="formulario__input" name="codtelefono_legal" id="codtelefono_legal" onkeypress="return numeros(event)" maxlength="10" required disabled />-->
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error"> </p>
                                                </div>
                                                <div class='col-sm-3' id='grupo__telefono_legal'>
                                                    <label class="formulario__label"> TELÉFONO FIJO O MOVIL * </label>
                                                    <div class='input-group date'>
                                                        <input type='text' class="formulario__input" name="telefono_legal" id="telefono_legal" maxlength="13" onkeypress="return numeros(event)" required />
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error"> </p>
                                                </div>
                                                <div class='col-sm-6' id='grupo__correo_legal'>
                                                    <label class="formulario__label"> CORREO * </label>
                                                    <div class='input-group date'>
                                                        <input type='email' class="formulario__input" name="correo_legal" id="correo_legal" style="text-transform:lowercase" ; onkeypress="return valideKeyEmail(event);" required />
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error"> Digite su correo personal o corporativo, no ingrese tildes ni ñ </p>
                                                </div>
                                            </div></br>
                                        </div>
                                    </div>
                                </div>

                                <div id="posee_apoderado" class="container p-2 my-2 " style="display:none;">
                                    <div class="radio">
                                        <font size=5 style="color:black"> DISPONE DE APODERADO ? </font>
                                        <input type="radio" name="opcion_apoderado" id="opcion_apoderadoSi" value="SI" onchange="postulante(this.value);">
                                        <label for="opcion_apoderadoSi"> SI </label>
                                        <input type="radio" name="opcion_apoderado" id="opcion_apoderadoNo" value="NO" onchange="postulante(this.value);" >
                                        <label for="opcion_apoderadoNo"> NO </label>
                                    </div>
                                </div>
                                <div class="x_panel">
                                    <div id="titulo_apoderado" style="display:none;">
                                        <div class="container p-2 my-2 text-white" style="background-color:#0A307C">
                                            <font size=5> APODERADO </font>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content" style="color:black"><br><br>
                                            <div class="row">
                                                <div class='col-sm-6' id='grupo__nombre_apoderado'>
                                                    <label class="formulario__label"> NOMBRES Y APELLIDOS * </label>
                                                    <div class='input-group date'>
                                                        <input type='text' class="formulario__input" name="nombre_apoderado" id="nombre_apoderado" onkeypress="return soloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" required/>
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error"> Digite dos nombres y dos apellidos</p>
                                                </div>
                                                <div class="col-sm-6" id='grupo__vigencia_apoderado'>
                                                    <label class="formulario__label"> VIGENCIA * </label>
                                                    <div class='input-group date'>
                                                        <input type="text" class="formulario__input" id="vigencia_apoderado" name="vigencia_apoderado" placeholder='DD/MM/AAAA' onchange="vigenciaApoderado()" onkeyup="fecha(event, this)" maxlength="10" required>
                                                        <!--<input type="date" class="formulario__input" id="vigencia_apoderado" name="vigencia_apoderado" min="01-01-2018" max="31-12-2025" required>-->
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error"> </p>
                                                </div>
                                            </div></br>
                                            <div class="row">
                                                <div class='col-sm-6' id='grupo__direccion_apoderado'>
                                                    <label class="formulario__label"> DIRECCIÓN * </label>
                                                    <div class='input-group date'>
                                                        <input type='text' class="formulario__input" name="direccion_apoderado" id="direccion_apoderado" style="text-transform:uppercase;" onkeypress="return validaciudad(event);" onkeyup="javascript:this.value=this.value.toUpperCase();" required />
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                        <!--<span class="input-group-addon">
                                                            <span class="fas fa-street-view	"></span>
                                                        </span>-->
                                                    </div>
                                                    <p class="formulario__input-error"> </p>
                                                </div>
                                                <div class='col-sm-6' id='grupo__ciudad_apoderado'>
                                                    <label class="formulario__label"> CIUDAD * </label>
                                                    <div class='input-group date'>
                                                        <input type='text' class="formulario__input" name="ciudad_apoderado" id="ciudad_apoderado" onkeypress="return soloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" required/>
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                        <!--<span class="input-group-addon">
                                                            <span class="fas fa-building"></span>
                                                        </span>-->
                                                    </div>
                                                    <p class="formulario__input-error"> </p>
                                                </div>
                                            </div></br>
                                            <div class="row">
                                                <div class='col-sm-3' id='grupo__telefono_apoderado'>
                                                    <label class="formulario__label"> TELÉFONO FIJO O MOVIL * </label>
                                                    <div class='input-group date'>
                                                        <input type='text' class="formulario__input" name="telefono_apoderado" id="telefono_apoderado" onkeypress="return numeros(event)" maxlength="13" required />
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                        <!--<span class="input-group-addon">
                                                                    <span class="fas fa-phone"></span>
                                                                    </span>-->
                                                    </div>
                                                    <p class="formulario__input-error"> </p>
                                                </div>
                                                <div class='col-sm-6' id='grupo__correo_apoderado'>
                                                    <label class="formulario__label"> CORREO * </label>
                                                    <div class='input-group date'>
                                                        <input type='email' class="formulario__input" style="text-transform:lowercase" name="correo_apoderado" id="correo_apoderado" required/>
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                        <!--<span class="input-group-addon">
                                                                    <span class="fas fa-envelope-open"></span>
                                                                    </span>-->
                                                    </div>
                                                    <p class="formulario__input-error"> Digite su correo personal o corporativo, no ingrese tildes ni ñ</p>
                                                </div>
                                            </div></br>
                                        </div>
                                    </div>
                                </div>

                                <div class="x_panel"><br>
                                    <div class="container p-2 my-2 text-white" style="background-color:#0A307C">
                                        <font size=5> CONSTITUCIÓN DEL CAPITAL </font>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div><br>
                                    <div class="x_content" style="color:black">
                                        <div class='col-sm-6' id='grupo__constitucionCapital_postulante'>
                                            <div id="contituciónCapital_opciones">
                                                <label> </label>
                                                <div class="radio">
                                                    <input type="radio" name="constitucion_capital" id="constitucion_capital1" value="PRIVADO">
                                                    <label for="constitucion_capital1"> PRIVADO </label>
                                                    <input type="radio" name="constitucion_capital" id="constitucion_capital2" value="MIXTO">
                                                    <label for="constitucion_capital2"> MIXTO </label>
                                                    <input type="radio" name="constitucion_capital" id="constitucion_capital3" value="ESTATAL">
                                                    <label for="constitucion_capital3"> ESTATAL </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="x_panel"><br>
                                    <div class="container p-2 my-2 text-white" style="background-color:#0A307C">
                                        <font size=5> ESTADOS FINANCIEROS * </font>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div><br>
                                    <div class="x_content" style="color:black">
                                        <div class='col-sm-4' id='grupo__estado_decurrente' style="display:none;">
                                            <label class="formulario__label"> AÑO ESTADOS FINANCIEROS * </label>
                                            <div class='input-group date'>
                                                <input type="text" class="formulario__input" name="estado_decurrente" id="estado_decurrente" onchange="ano()" onkeypress="return numeros(event)" minlength="4" maxlength="4" required>
                                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                            </div>
                                            <p class="formulario__input-error"> El año de los estados financieros debe ser del año inmediato anterior </p>
                                        </div>
                                        <div class='col-sm-4' id='grupo__estado_decurrente_ano' style="display:none;">
                                            <label class="formulario__label"> AÑO ESTADOS FINANCIEROS * </label>
                                            <div class='input-group date'>
                                                <input type='text' class="formulario__input" name="estado_decurrente_ano" id="estado_decurrente_ano" onchange="ano1()" onkeypress="return numeros(event)" minlength="4" maxlength="4" required>
                                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                            </div>
                                            <p class="formulario__input-error"> El año de los estados financieros debe ser de hasta dos años inmediatos anteriores al actual </p>
                                        </div>

                                        <div class='col-sm-5' id='grupo__estado_balance'>
                                            <label class="formulario__label"> BALANCE * </label>
                                            <div class='input-group date'>
                                                <select class="formulario__input" name="estado_balance" id="estado_balance" required>
                                                    <option value="">SELECCIONAR...</option>
                                                    <option value="ENERO">ENERO</option>
                                                    <option value="FEBRERO">FEBRERO</option>
                                                    <option value="MARZO">MARZO</option>
                                                    <option value="ABRIL">ABRIL</option>
                                                    <option value="MAYO">MAYO</option>
                                                    <option value="JUNIO">JUNIO</option>
                                                    <option value="JULIO">JULIO</option>
                                                    <option value="AGOSTO">AGOSTO</option>
                                                    <option value="SEPTIEMBRE">SEPTIEMBRE</option>
                                                    <option value="OCTUBRE">OCTUBRE</option>
                                                    <option value="NOVIEMBRE">NOVIEMBRE</option>
                                                    <option value="DICIEMBRE">DICIEMBRE</option>
                                                </select>
                                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                            </div>
                                            <p class="formulario__input-error"> </p>
                                        </div>
                                    </div>
                                </div>

                                <div class='col-lg-12'><br>
                                    <div class="x_panel"><br>
                                        <h1 style="color:black;">Documentos Generales</h1>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                        </ul>
                                        <div class="clearfix"></div>
                                        <div class="alert alert-warning">
                                            <h2>Aviso!</h2>
                                            <h2> El formato de nombre de archivo debe ser deacuerdo a los literales. El tamaño de los archivos debe ser no mayor a 20 mb <a class="alert-link"> "Ejemplo"</a>.</h2><br>
                                            <img src="../images/aviso.png" class="img-thumbnail" alt="Cinque Terre" width="100%" height="500">
                                        </div>
                                        <div class="x_content">
                                            <div>
                                                <div class='col-sm-12'>
                                                    <div class="alert alert-primary">1.1 Solicitud de calificación de bienes estratégicos y/o prestación de servicios conexos. En el caso de persona jurídica nacional o extranjera la solicitud deberá estar
                                                        firmada por quien ejerza la representación legal o apoderado del fabricante y/o distribuidor autorizado;</div>
                                                    <i id="errorI" hidden class="fas fa-exclamation-triangle text-span"><span class="text-span" id="archivo-error"></span></i>
                                                    <input class="fancy-file" accept="application/pdf" type="file" name="archivo" id="archivo" required>
                                                </div>
                                            </div>
                                            <div class='col-sm-12'>
                                                <br>
                                                <div class="alert alert-primary">1.2 Formulario de datos generales del proveedor y de los bienes y servicios que estén en capacidad de proveer;</div>
                                                <i id="error1" hidden class="fas fa-exclamation-triangle text-span"><span class="text-span" id="archivo1-error"></span></i>
                                                <input class="fancy-file" accept="application/pdf" type="file" name="archivo1" id="archivo1" required><br>
                                            </div>
                                            <div class='col-sm-12'>
                                                <br>
                                                <div class="alert alert-primary"> 1.3 El proveedor (fabricante o distribuidor) de bienes estratégicos y/o prestación de servicios conexos, presentará los documentos que acrediten la capacidad y experiencia en su fabricación, distribución y/o comercialización.
                                                    Para la capacidad presentará certificaciones MILlTARY STANDARD: (MIL STD), Standardization Agreement (STANAG), ISO, etc. u otros documentos del bien y/o prestación de! servicio conexo de acuerdo a la naturaleza del
                                                    bien ofertado. Para la experiencia presentará documentos respecto de la comercialización y/o certificaciones emitidas por los clientes a quienes ha proveído. El distribuidor, además, presentará una carta de autorización como distribuidor;</div>
                                                <i id="error2" hidden class="fas fa-exclamation-triangle text-span"><span class="text-span" id="archivo2-error"></span></i>
                                                <input class="fancy-file" accept="application/pdf" type="file" name="archivo2" id="archivo2" required><br>
                                            </div>
                                            <div class='col-sm-12'>
                                                <br>
                                                <div class="alert alert-primary">1.4 El distribuidor nacional o extranjero que por su reciente creación o autorización de distribución (no mayor a 1 año), no pueda presentar los documentos que acrediten su capacidad y experiencia,
                                                    podrá presentar los documentos del fabricante del bien y/o servicio conexo que oferta;</div>
                                                <i id="error3" hidden class="fas fa-exclamation-triangle text-span"><span class="text-span" id="archivo3-error"></span></i>
                                                <input class="fancy-file" accept="application/pdf" type="file" name="archivo3" id="archivo3" required><br>
                                            </div>
                                            <div class='col-sm-12'>
                                                <br>
                                                <div class="alert alert-primary"> 1.5 Declaración juramentada otorgada ante Notario Público, a través de la cual la persona natural o el representante legal de la persona jurídica nacional o extranjera establezca:<br>
                                                    1.5.1 El domicilio de la persona natural o jurídica, nacional o extranjera;
                                                    y de, su representante legal o apoderado;<br>
                                                    1.5.2Acuerdo de responsabilidad del compromiso de confidencialidad y reserva de información; y,<br>
                                                    1.5.3 Declaración de que toda la documentación presentada es auténtica y fidedigna.</div>
                                                <i id="error4" hidden class="fas fa-exclamation-triangle text-span"><span class="text-span" id="archivo4-error"></span></i>
                                                <input class="fancy-file" accept="application/pdf" type="file" name="archivo4" id="archivo4" required><br>
                                            </div>
                                            <div class='col-sm-12'>
                                                <br>
                                                <div class="alert alert-primary"> 1.6 Estados de situación financiera del año inmediato anterior que muestre indicadores de la situación económica, de la persona natural o jurídica, nacional o extrajera que actúen como fabricante y/o distribuidor autorizado;</div>
                                                <i id="error5" hidden class="fas fa-exclamation-triangle text-span"><span class="text-span" id="archivo5-error"></span></i>
                                                <input class="fancy-file" accept="application/pdf" type="file" name="archivo5" id="archivo5" required><br>
                                            </div>
                                            <div class='col-sm-12'>
                                                <br>
                                                <div class="alert alert-primary"> 1.7 Poder para realizar los trámites administrativos y legales como apoderado o simplemente para el proceso de calificación de la persona natural o jurídica, nacional o extranjera.</div>
                                                <i id="error6" hidden class="fas fa-exclamation-triangle text-span"><span class="text-span" id="archivo6-error"></span></i>
                                                <input class="fancy-file" accept="application/pdf" type="file" name="archivo6" id="archivo6" required></br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class='col-lg-12'><br>
                                    <div class="x_panel"><br>
                                        <h1 style="color:black;">Documentos Específicos</h1><br>
                                        <div class="alert alert-warning">
                                            <h2>Aviso!</h2>
                                            <h2> Ingresar todos los campos de archivos solictados , El formato de nombre de archivo debe ser deacuerdo a los literales. <a class="alert-link"> "Ejemplo"</a>.</h2><br>
                                            <img src="../images/aviso.png" class="img-thumbnail" alt="Cinque Terre" width="100%" height="500">
                                        </div>
                                    </div>
                                    <div id="persona_natural" style="display:none;">
                                        <div class="x_panel"><br>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                            <div class="x_content">
                                                <div class='col-sm-12'>
                                                    <br>
                                                    <div class="alert alert-primary"> 2.1.1. Estar al día en las obligaciones tributarias con el Servicio de Rentas Internas (SRI); </div>
                                                    <i id="natural1" hidden class="fas fa-exclamation-triangle text-span"><span class="text-span" id="natural1-error"></span></i>
                                                    <input class="fancy-file" accept="application/pdf" type="file" name="persona_natural1" id="persona_natural1"></br>
                                                </div>
                                                <div class='col-sm-12'>
                                                    <br>
                                                    <div class="alert alert-primary"> 2.1.2. Original o copia certificada del Registro Único de Contribuyentes (RUC); y,</div>
                                                    <i id="natural2" hidden class="fas fa-exclamation-triangle text-span"><span class="text-span" id="natural2-error"></span></i>
                                                    <input class="fancy-file" accept="application/pdf" type="file" name="persona_natural2" id="persona_natural2"> </br>
                                                </div>
                                                <div class='col-sm-12'>
                                                    <br>
                                                    <div class="alert alert-primary"> 2.1.3. Si es empleador, deberá estar al día en las obligaciones patronales en el Instituto Ecuatoriano de Seguridad Social (IESS);</div>
                                                    <i id="natural3" hidden class="fas fa-exclamation-triangle text-span"><span class="text-span" id="natural3-error"></span></i>
                                                    <input class="fancy-file" accept="application/pdf" type="file" name="persona_natural3" id="persona_natural3"> </br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="persona_juridica_nacional_extranjera" style="display:none;">
                                        <div class="x_panel"><br>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                            <div class="x_content">
                                                <div class='col-sm-12'>
                                                    <br>
                                                    <div class="alert alert-primary"> 2.2.1. Original o copia certificada de las escrituras de constitución de la compañía, estatutos y sus reformas de ser el caso; </div>
                                                    <i id="juridica1" hidden class="fas fa-exclamation-triangle text-span"><span class="text-span" id="juridica1-error"></span></i>
                                                    <input class="fancy-file" accept="application/pdf" type="file" name="persona_juridica1" id="persona_juridica1"></br>
                                                </div>
                                                <div class='col-sm-12'>
                                                    <br>
                                                    <div class="alert alert-primary"> 2.2.2. Original o copia certificada del nombramiento del representante legal, inscrito en el Registro Mercantil, vigente a la fecha de presentación;</div>
                                                    <i id="juridica2" hidden class="fas fa-exclamation-triangle text-span"><span class="text-span" id="juridica2-error"></span></i>
                                                    <input class="fancy-file" accept="application/pdf" type="file" name="persona_juridica2" id="persona_juridica2"> </br>
                                                </div>
                                                <div class='col-sm-12'>
                                                    <br>
                                                    <div class="alert alert-primary"> 2.2.3. Estar al día en las obligaciones tributarias administradas por el SRI;</div>
                                                    <i id="juridica3" hidden class="fas fa-exclamation-triangle text-span"><span class="text-span" id="juridica3-error"></span></i>
                                                    <input class="fancy-file" accept="application/pdf" type="file" name="persona_juridica3" id="persona_juridica3"></br>
                                                </div>
                                                <div class='col-sm-12'>
                                                    <br>
                                                    <div class="alert alert-primary"> 2.2.4. Estar al día en las obligaciones patronales con el IESS;</div>
                                                    <i id="juridica4" hidden class="fas fa-exclamation-triangle text-span"><span class="text-span" id="juridica4-error"></span></i>
                                                    <input class="fancy-file" accept="application/pdf" type="file" name="persona_juridica4" id="persona_juridica4"></br>
                                                </div>
                                                <div class='col-sm-12'>
                                                    <br>
                                                    <div class="alert alert-primary"> 2.2.5. Original o copia certificada del RUC; y,</div>
                                                    <i id="juridica5" hidden class="fas fa-exclamation-triangle text-span"><span class="text-span" id="juridica5-error"></span></i>
                                                    <input class="fancy-file" accept="application/pdf" type="file" name="persona_juridica5" id="persona_juridica5"></br>
                                                </div>
                                                <div class='col-sm-12'>
                                                    <br>
                                                    <div class="alert alert-primary"> 2.2.6. No constar como contratista incumplido y adjudicatario fallido en el Servicio Nacional de Contratación Pública (SERCOP) referente al Registro de Contratista,</div>
                                                    <i id="juridica6" hidden class="fas fa-exclamation-triangle text-span"><span class="text-span" id="juridica6-error"></span></i>
                                                    <input class="fancy-file" accept="application/pdf" type="file" name="persona_juridica6" id="persona_juridica6"></br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="persona_juridica_extranjera" style="display:none;">
                                        <div class="x_panel"><br>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                            <div class="x_content">
                                                <div class='col-sm-12'>
                                                    <br>
                                                    <div class="alert alert-primary"> 2.3.1. Original a copia certificada de las escrituras de constitución de la compañía, estatutos y sus reformas de ser el caso; </div>
                                                    <i id="noDomic1" hidden class="fas fa-exclamation-triangle text-span"><span class="text-span" id="noDomic1-error"></span></i>
                                                    <input class="fancy-file" accept="application/pdf" type="file" name="persona_no_domic1" id="persona_no_domic1"></br>
                                                </div>
                                                <div class='col-sm-12'>
                                                    <br>
                                                    <div class="alert alert-primary"> 2.3.2. Original o copia certificada del nombramiento del representante legal, inscrito en el Registro Mercantil, vigente a la fecha de presentación; y,</div>
                                                    <i id="noDomic2" hidden class="fas fa-exclamation-triangle text-span"><span class="text-span" id="noDomic2-error"></span></i>
                                                    <input class="fancy-file" accept="application/pdf" type="file" name="persona_no_domic2" id="persona_no_domic2"> </br>
                                                </div>
                                                <div class='col-sm-12'>
                                                    <br>
                                                    <div class="alert alert-primary"> 2.3.3. Original o copia certificada del documento emitido por la autoridad tributaria o similar del país de origen.</div>
                                                    <i id="noDomic3" hidden class="fas fa-exclamation-triangle text-span"><span class="text-span" id="noDomic3-error"></span></i>
                                                    <input class="fancy-file" accept="application/pdf" type="file" name="persona_no_domic3" id="persona_no_domic3"></br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="ln_solid"></div>
                                    <div class="col-md-9 col-sm-9  offset-md-3"><br><br><br><br>
                                        <button type="submit" id="mostrar1" name="guardacalificacion" class="boton btn btn-primary" style="background-color:#0A307C" onclick="mensajeError()"> GUARDAR </button>
                                        <a type="button" href="postulante_principal.php" class="boton btn btn-primary" style="background-color:#0A307C">CANCELAR</a>
                                    </div>
                                </div>
                            </form>
                        </font>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SEGURIDAD -->
    <script src="../js/formularios/seguridad.js"></script>
    <!-- footer content -->
    <?php include('../cabeceras/pie_pagina.php'); ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- /footer content -->
    <!-- <Validación de Formulario con Javascript>-->
    <script src="../js/formularios/formulario_postulante.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
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