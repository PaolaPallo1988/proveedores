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
    <!-- FORMATO BOTONES -->
    <link href="../css/botones.css" rel="stylesheet" />
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view"><br>
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="principal.php" class="site_title"><i class="fa fa-desktop"></i> <span>PROVEEDORES</span></a>
                    </div>
                    <div class="clearfix"></div><br>
                    <!-------- menu profile quick info -------->
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
                                <font size='3' face="arial"><?php echo $row['nombre_usuario'] . " " . $row['apellido_usuario']; ?></font><br>
                                <font size='3' face="arial"><?php echo $row['nombre_perfil']; ?></font><br><br>
                            </figcaption>
                        </figure>
                    </div>
                    <!-------- /menu profile quick info -------->
                    <!-- /menu profile quick info -->
                    <!-- sidebar menu --><!-- /menu footer buttons -->
                    <br><br><br>
                    <?php include("../cabeceras/menu_lateral_administrador.php"); ?>
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
                                    <a class="dropdown-item" href="javascript:;"> Perfiles</a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Ajustes</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">Ayuda</a>
                                    <a class="dropdown-item" id="salir" href="../login/logout.php"><i class="fa fa-sign-out pull-right"></i> Salir</a>
                                </div>
                            </li>
                            <li role="presentation" class="nav-item dropdown open">
                                <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">6</span>
                                </a>
                                <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span class="image"><img src="../Fotos_Perfil/<?php echo $row['nombre_usuario'] ?>/<?php echo $row['nombre_usuario']; ?>.JPG" alt="Profile Image" /></span>
                                            <span>
                                                <span><?php echo  $row['nombre_usuario'] . " " . $row['apellido_usuario']; ?></span>
                                                <span class="time"> </span>
                                            </span>
                                            <span class="message">
                                                No esta configurado...
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <div class="text-center">
                                            <a class="dropdown-item">
                                                <strong>Ver todas las alertas</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel"><br />
                            <form class="form-label-left input_mask" method="POST" action="postulante_desactiva.php">
                                <div class="x_title"><br>
                                    <h2 style="color:black">
                                        <FONT SIZE=5><b>ACTIVAR / DESACTIVAR POSTULANTE</b></FONT>
                                    </h2>
                                    <div class="clearfix"></div>
                                </div><br>
                                <?php
                                include('../controlador/inactiva_postulante.php');
                                //Primero tienes que validar que llegue un dato, lo hice con una condición ternaria
                                $id_postulante_desactiva = !empty($_GET['id_postulante_desactiva']) ? $_GET['id_postulante_desactiva'] : null;
                                $id_usuario = !empty($registrousu['id_usuario']) ? $registrousu['id_usuario'] : null;
                                $nombre_usuario = !empty($registrousu['nombre_usuario']) ? $registrousu['nombre_usuario'] : null;
                                $correo_usuario = !empty($registrousu['correo_usuario']) ? $registrousu['correo_usuario'] : null;
                                $cedula_usuario = !empty($registrousu['cedula_usuario']) ? $registrousu['cedula_usuario'] : null;
                                $password_usuario = !empty($registrousu['password_usuario']) ? $registrousu['password_usuario'] : null;
                                $estado_id = !empty($registrousu['estado_id']) ? $registrousu['estado_id'] : null;
                                $nombre_estado = !empty($registrousu['id_perfil']) ? $registrousu['id_perfil'] : null;
                                //$sql="SELECT id_usuario, nombre_usuario, apellido_usuario, cedula_usuario, perfil_id, correo_usuario, password_usuario FROM usuario WHERE id_usuario= $id_usuario_ingreso";
                                $sql = "SELECT * FROM usuario u INNER JOIN estado e ON e.id_estado=u.estado_id AND u.id_usuario='" . $id_postulante_desactiva . "'";
                                $mysqli = mysqli_query($conn_registro, $sql);
                                while ($registrousu = mysqli_fetch_array($mysqli)) {
                                    $datosusu = $registrousu[0] . "||" . //ID
                                        $registrousu[1] . "||" .
                                        $registrousu[2] . "||" .
                                        $registrousu[3] . "||" .
                                        $registrousu[4] . "||" .
                                        $registrousu[5] . "||" .
                                        $registrousu[6];

                                    $id_usuario = !empty($registrousu['id_usuario']) ? $registrousu['id_usuario'] : null;
                                    $nombre_usuario = !empty($registrousu['nombre_usuario']) ? $registrousu['nombre_usuario'] : null;
                                    $correo_usuario = !empty($registrousu['correo_usuario']) ? $registrousu['correo_usuario'] : null;
                                    $cedula_usuario = !empty($registrousu['cedula_usuario']) ? $registrousu['cedula_usuario'] : null;
                                    $password_usuario = !empty($registrousu['password_usuario']) ? $registrousu['password_usuario'] : null;
                                    $estado_id = !empty($registrousu['estado_id']) ? $registrousu['estado_id'] : null;
                                    $nombre_estado = !empty($registrousu['nombre_estado']) ? $registrousu['nombre_estado'] : null;
                                }
                                ?>
                                <input type='hidden' class="form-control" required name="id_usuario" name="id_usuario" value="<?php echo $id_usuario ?>" />
                                <div class="container">
                                    <font size="3" face="arial">
                                        <br>
                                        <div class="row">
                                            <div class='col-sm-6'>
                                                <FONT style="color:black" size=4><b> RAZÓN SOCIAL </b></FONT>
                                                <div class="form-group">
                                                    <div class='input-group date' id='myDatepicker'>
                                                        <input type='text' class="form-control" required name="nombre_usuario" id="nombre_usuario" value="<?php echo $nombre_usuario ?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" disabled />
                                                        <span class="input-group-addon">
                                                            <span class="fa fa-user"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='col-sm-6'>
                                                <FONT style="color:black" size=4><b> RUC O C.I </b></FONT>
                                                <div class="form-group">
                                                    <div class='input-group date' id='datetimepicker6'>
                                                        <input type='text' class="form-control" required name="cedula_usuario" id="cedula_usuario" onkeypress="return valideKey(event);" maxlength="10" value="<?php echo $cedula_usuario ?>" disabled />
                                                        <span class="input-group-addon">
                                                            <span class="fa fa-credit-card"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class='col-sm-6'><br>
                                                <FONT style="color:black" size=4><b> CORREO </b></FONT>
                                                <div class="form-group">
                                                    <div class='input-group date' id='myDatepicker4'>
                                                        <input type='text' class="form-control" required name="correo_usuario" id="correo_usuario" value="<?php echo $correo_usuario ?>" disabled />
                                                        <span class="input-group-addon">
                                                            <span class="fa fa-envelope-o"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class='col-sm-6'><br>
                                                <FONT style="color:black" size=4><b> PASSWORD </b></FONT>
                                                <div class="form-group">
                                                    <div class='input-group date' id='myDatepicker4'>
                                                        <input type='password' class="form-control" name="password_usuario" id="password_usuario" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="La contraseña debe tener 8 caracteres, incluida 1 letra mayúscula, y caracteres numéricos" value="<?php echo $password_usuario ?>" disabled />
                                                        <span class="input-group-addon">
                                                            <span class="fa fa-key"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='col-sm-6'><br>
                                                <FONT style="color:black" size=4><b> ESTADO </b></FONT>
                                                <div class="form-group">
                                                    <select id="heard" class="form-control" name="estado_id" id="estado_id">
                                                        <option value="<?php echo $estado_id ?>" id="estado"><?php echo $nombre_estado ?></option>
                                                        <option value="1">ACTIVO</option>
                                                        <option value="2">INACTIVO</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </font>
                                </div><br><br><br>
                                <div class="ln_solid"></div>
                                <div class="form-group row">
                                    <div class="col-md-9 col-sm-9  offset-md-3"><br>
                                        <button style="background-color:#0A307C" type="submit" id="inactivapostulante" name="inactivapostulante" class="boton  btn btn-primary">ACTUALIZAR</button>
                                        <a style="background-color:#0A307C" href="usuarios_ingreso.php" class="boton btn btn-primary">CANCELAR</a>
                                    </div>
                                </div>
                            </form>
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