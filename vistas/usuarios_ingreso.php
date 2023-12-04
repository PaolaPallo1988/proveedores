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
    <title>Sistema de Calificación de Proveedores | MDN </title>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
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
    <!-- Sweetalert2 -->
    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>
    <!-- buscar en la tabla postulante -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--- FORMATO DE BOTONES --->
    <link href="../css/botones.css" rel="stylesheet">

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view"><br>
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="principal.php" class="site_title"><i class="fa fa-desktop"></i> <span>PROVEEDORES</span></a>
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
                    <!-- sidebar menu --> <!-- /menu footer buttons -->
                    <br><br><br>
                    <?php include("../cabeceras/menu_lateral_administrador.php"); ?>
                    <!-- /sidebar menu --> <!-- /menu footer buttons -->
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
                <div class="clearfix"></div><br>
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel"><br />
                            <form class="form-label-left input_mask" method="POST" action="usuarios_ingreso.php" enctype="multipart/form-data">
                                <?php include("../controlador/usuarios_ingreso_guarda.php"); ?>
                                <input type='hidden' class="form-control" required name="estado_id" id="estado_id" value="1" readonly />
                                <input type='hidden' class="form-control" required name="usuario_creacion_resp" id="usuario_creacion_resp" value="<?php echo  $row['nombre_usuario'] . " " . $row['apellido_usuario']; ?>" readonly />
                                <div class="x_title"><br>
                                    <h2 style="color:black">
                                        <FONT SIZE=5><b>REGISTRO DE PERSONAL ADMINISTRATIVO</b></FONT>
                                    </h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="container"><br><br>
                                    <font size="3" face="arial">
                                        <div class="row">
                                            <div class='col-sm-6'>
                                                <FONT style="color:black" size=4><b>NOMBRES *</b></FONT>
                                                <div class="form-group">
                                                    <div class='input-group date' id='myDatepicker'>
                                                        <input type='text' autocomplete="off" class="form-control" required name="nombre_usuario" id="nombre_usuario" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return valideKeyLetras(event);" />
                                                        <span class="input-group-addon">
                                                            <span class="fa fa-user"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class='col-sm-6'>
                                                <FONT style="color:black" size=4><b>APELLIDOS *</b></FONT>
                                                <div class="form-group">
                                                    <div class='input-group date'>
                                                        <input type='text' autocomplete="off" class="form-control" required name="apellido_usuario" id="apellido_usuario" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return valideKeyLetras(event);" />
                                                        <span class="input-group-addon">
                                                            <span class="fa fa-user"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class='col-sm-6'><br>
                                                <FONT style="color:black" size=4><b>CORREO *</b></FONT>
                                                <div class="form-group">
                                                    <div class='input-group date'>
                                                        <input type='text' autocomplete="off" class="form-control" required name="correo_usuario" id="correo_usuario" style="text-transform:lowercase;" onkeyup="javascript:this.value=this.value.toLowerCase();" onkeypress="return valideKeyEmail(event);" />
                                                        <span class="input-group-addon">
                                                            <span class="fa fa-envelope-o"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class='col-sm-6'><br>
                                                <FONT style="color:black" size=4><b>CÉDULA *</b></FONT>
                                                <div class="form-group">
                                                    <div class='input-group date'>
                                                        <input type='text' autocomplete="off" class="form-control" required name="cedula_usuario" id="cedula_usuario" onkeypress="return valideKey(event);" minlength="10" maxlength="10" />
                                                        <span class="input-group-addon">
                                                            <span class="fa fa-credit-card"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class='col-sm-6'><br>
                                                <FONT style="color:black" size=4><b>PASSWORD *</b></FONT>
                                                <div class="form-group">
                                                    <div class='input-group date'>
                                                        <input type='password' autocomplete="off" class="form-control" name="password_usuario" id="password_usuario" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="La contraseña debe tener 8 caracteres, incluida 1 letra mayúscula, y caracteres numéricos" />
                                                        <span class="input-group-addon">
                                                            <span class="fa fa-eye-slash icon" onclick="mostrarPassword()"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='col-sm-6'><br>
                                                <FONT style="color:black" size=4><b>PERFIL USUARIO *</b></FONT>
                                                <div class="form-group">
                                                    <select class="form-control" required name="perfil_id" id="perfil_id">
                                                        <option value="0">SELECCIONAR...</option>
                                                        <option value="1">ADMINISTRADOR</option>
                                                        <option value="2">SECRETARIO</option>
                                                        <option value="3">ANALISTA</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class='col-sm-12'><br>
                                                    <FONT style="color:black" size=4><b>FOTO PERSONAL ADMINISTRATIVO * </b></FONT>
                                                    <div class="form-group">
                                                        <div class='input-group date'>
                                                            <h6> <input class='form-control' type="file" name="imagen" accept="image/*" id="imagen" required></br>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </font>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group row">
                                    <div class="col-md-9 col-sm-9  offset-md-3">
                                        <button style="background-color:#0A307C" type="submit" id="guardausuario" name="guardausuario" class="boton btn btn-primary">GUARDAR</button>
                                        <a style="background-color:#0A307C" type="button" href="usuarios_ingreso.php" class="boton btn btn-primary">CANCELAR</a>
                                    </div>
                                </div>
                            </form>

                            <!------------------------------------------- CONSULTA DE ADMINISTRATIVOS INGRESADOS --------------------------------------------->
                            <div class="col-md-12 col-sm-12 "><br>
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>
                                            <FONT SIZE=4 style="color:black"><b>ADMINISTRATIVOS </font></b>
                                        </h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content"><br><br>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-box table-responsive">
                                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>NOMBRES</th>
                                                                <th>APELLLIDOS</th>
                                                                <th>CÉDULA</th>
                                                                <th>CORREO</th>
                                                                <th>PERFIL</th>
                                                                <th>ESTADO</th>
                                                                <th>ACCIONES</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            include("../conexion/conexion.php");
                                                            $sqlusuario = "SELECT * FROM usuario INNER JOIN perfil ON usuario.perfil_id = perfil.id_perfil";
                                                            $mysqli = mysqli_query($conn_registro, $sqlusuario);

                                                            while ($usuarios = mysqli_fetch_array($mysqli)) {
                                                                if (($usuarios['perfil_id'] == '1') || ($usuarios['perfil_id'] == '2') || ($usuarios['perfil_id'] == '3')) {
                                                            ?>

                                                                    <tr>
                                                                        <td>
                                                                            <?php echo $usuarios['id_usuario'] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $usuarios['nombre_usuario'] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $usuarios['apellido_usuario'] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $usuarios['cedula_usuario'] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $usuarios['correo_usuario'] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $usuarios['nombre_perfil'] ?>
                                                                        </td>
                                                                        <td style="text-align: center;">
                                                                            <?php if ($usuarios['estado_id'] == '1') {  // campo igual 1 true 
                                                                            ?>
                                                                                <span class="badge badge-pill badge-success">ACTIVO</span>

                                                                            <?php } elseif ($usuarios['estado_id'] == '2') { //Si no es uno
                                                                            ?>
                                                                                <span class="badge badge-pill badge-info">INACTIVO</span>

                                                                            <?php } else { //Si no es uno
                                                                            ?>

                                                                            <?php } ?>
                                                                        </td>
                                                                        <td>
                                                                            <div class="btn-group">
                                                                                <!--<a class="btn btn-app" href="usuario_ver.php?id_usuario=<?php //echo $usuarios['id_usuario']; 
                                                                                                                                            ?>"><i class="fa fa-eye" aria-hidden="true"></i> Ver</a> -->
                                                                                <a class="btn btn-app" href="usuario_edita.php?id_usuario_ingreso=<?php echo $usuarios['id_usuario']; ?> "><i class='fa fa-user-plus' aria-hidden='true'></i> Editar</a>
                                                                                <a class="btn btn-app" href="usuario_desactiva.php?id_usuario_desactiva=<?php echo $usuarios['id_usuario']; ?>"><i class='fa fa-user-times' aria-hidden='true'></i> Desactivar / Activar</a>
                                                                                <!-- https://fontawesome.com/v4/icon/user-times -->
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                            <?php
                                                                }
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
                            </div>

                            <!------------------------------------------- CONSULTA DE POSTULANTES INGRESADOS --------------------------------------------->
                            <div class="col-md-12 col-sm-12 ">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>
                                            <FONT SIZE=4 style="color:black"><b>POSTULANTES </font></b>
                                        </h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>

                                    <!--------------------- BUSCAR EN A TABLA  ---------------------------------------->
                                    <div class="x_content">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-box table-responsive">
                                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>RAZÓN SOCIAL</th>
                                                                <th>RUC /C.I</th>
                                                                <th>CORREO</th>
                                                                <th>ESTADO</th>
                                                                <th>ACCIONES</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            include("../conexion/conexion.php");
                                                            $sqlusuario = "SELECT * FROM usuario WHERE perfil_id = '4' ";
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
                                                                        <?php echo $usuarios['cedula_usuario'] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $usuarios['correo_usuario'] ?>
                                                                    </td>
                                                                    <td style="text-align: center;">
                                                                        <?php if ($usuarios['estado_id'] == '1') {  // campo igual 1 true 
                                                                        ?>
                                                                            <span class="badge badge-pill badge-success">ACTIVO</span>

                                                                        <?php } elseif ($usuarios['estado_id'] == '2') { //Si no es uno
                                                                        ?>
                                                                            <span class="badge badge-pill badge-info">DESACTIVADO</span>

                                                                        <?php } else { //Si no es uno
                                                                        ?>

                                                                        <?php } ?>
                                                                    </td>
                                                                    <td>
                                                                        <div class="btn-group">
                                                                            <!--<a class="btn btn-app" href="usuario_ver.php?id_usuario=<?php //echo $usuarios['id_usuario']; 
                                                                                                                                        ?>"><i class="fa fa-eye" aria-hidden="true"></i> Ver</a>  -->
                                                                            <a class="btn btn-app" href="postulante_edita.php?id_postulante_ingreso=<?php echo $usuarios['id_usuario']; ?> "><i class='fa fa-user-plus' aria-hidden='true'></i> Editar</a>
                                                                            <a class="btn btn-app" href="postulante_desactiva.php?id_postulante_desactiva=<?php echo $usuarios['id_usuario']; ?>"><i class='fa fa-user-times' aria-hidden='true'></i> Desactivar / Activar</a>
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
                                                    <!------------------------------------------- CONSULTA DE POSTULANTES INGRESADOS --------------------------------------------->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include('../cabeceras/pie_pagina.php'); ?>
        <!-- /footer content -->
    </div>
    </div>
    <!--- FUNCIONES DE FORMATO--->
    <script src="../js/formularios/seguridad.js"></script>
    <!--- FUNCIONES DE FORMATO--->
    <script src="../js/formularios/usuarios_ingreso.js"></script>
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