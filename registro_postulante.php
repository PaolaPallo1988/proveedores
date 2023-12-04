<?php
include('conexion/conexion.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />
	<title>REGISTRO | POSTULANTE </title>
	<!-- <Validación de Formulario con Javascript>-->
	<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/estilos.css">
	<!-- Bootstrap -->
	<link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- iCheck -->
	<link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	<!-- bootstrap-wysiwyg -->
	<link href="vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
	<!-- Select2 -->
	<link href="vendors/select2/dist/css/select2.min.css" rel="stylesheet">
	<!-- Switchery -->
	<link href="vendors/switchery/dist/switchery.min.css" rel="stylesheet">
	<!-- starrr -->
	<link href="vendors/starrr/dist/starrr.css" rel="stylesheet">
	<!-- bootstrap-daterangepicker -->
	<link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
	<!-- Custom Theme Style -->
	<link href="build/css/custom.min.css" rel="stylesheet">
	<!-- Cargar el captcha -->
	<script src="https://www.google.com/recaptcha/api.js"></script>
	<!-- Datatables -->
	<link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
	<link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
	<link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
	<link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
	<!-- Sweetalert2 -->
	<script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>
	<!--- FORMATO DE BOTONES --->
	<link href="css/botones.css" rel="stylesheet">
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view"><br>
					<div class="navbar nav_title" style="border: 0;">
						<a href="index.php" class="site_title"><i class="fa fa-desktop"></i><span>Nuevo Registro</span></a>
					</div>
					<div class="clearfix"></div>
					<!-- menu profile quick info -->
					<div class="profile clearfix">
						<div class="profile_pic">
							<img src="images/Min.png" alt="..." class="img-circle profile_img">
						</div>
						<div class="profile_info">
							<span>Bienvenido,</span>
							<h2>Nuevo Postulante</h2>
						</div>
					</div>
					<!-- /menu profile quick info -->
					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu"><br>
						<font size="3" face="arial">
							<div class="menu_section"><br><br>
								<h3>
									<FONT SIZE=4 FACE="verdana">General</FONT>
								</h3><br>
								<ul class="nav side-menu">
									<li><a><i class="fa fa-home"></i> Inicio <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu">
											<li><a href="index.php">Inicio de Sessión</a></li>
										</ul>
									</li>
								</ul>
							</div>
						</font>
					</div>
					<!-- /sidebar menu -->

					<!-- /menu footer buttons -->
					<div class="sidebar-footer hidden-small">
						<a data-toggle="tooltip" data-placement="top" title="Settings">
							<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="FullScreen">
							<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Lock">
							<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Logout" href="index.php">
							<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
						</a>
					</div>
					<!-- /menu footer buttons -->
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
								<a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
									<img src="images/Min.png" alt="">Nuevo Postulante
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<!-- /top navigation -->

			<!-- page content -->
			<div class="right_col" role="main">
				<div class="clearfix"></div><br><br>
				<div class="row">
					<div class="col-md-12 col-sm-12 ">
						<div class="x_panel">
							<div class="x_title"><br>
								<h2 style="color:black">
									<FONT SIZE=5><b>REGISTRO NUEVO POSTULANTE</b></FONT>
								</h2>
								<div class="clearfix"></div><br>
							</div>
							<div class="x_content"><br>
								<br />
								<form class="form-label-left input_mask" method="POST" id="registro_postulante" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
									<font size="3" face="arial">
										<?php include("controlador/registro_postulante_guarda.php"); ?>
										<input type='hidden' class="form-control" required name="estado_id" id="estado_id" value="1" readonly />
										<input type='hidden' class="form-control" required name="perfil_id" id="perfil_id" value="4" readonly />
										<!--<input type='hidden' class="form-control" required name="estado_solicitud" id="estado_solicitud" value="1" readonly />-->
										<input type='hidden' class="form-control" required name="estado_calificacion" id="estado_calificacion" value="1" readonly />
										<input type='hidden' class="form-control" required name="estado_productosOferta" id="estado_productosOferta" value="1" readonly />
										<input type='hidden' class="form-control" required name="proceso_id" id="proceso_id" value="1" />

										<div class="container" style="color:#060505;">
											<div class="row">
												<div class='col-sm-6' id="grupo__nombre_postulante">
													<label class="formulario__label">RAZÓN SOCIAL *</label>
													<div class="form-group">
														<div class='input-group date'>
															<input type='text' class="formulario__input" autocomplete="off" name="nombre_postulante" id="nombre_postulante" value="<?php if (isset($razonsoc_postulante)) echo $razonsoc_postulante ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return valideKeyNombre(event);" value="<?php if (isset($nombre_postulante)) echo $nombre_postulante ?>" required />
															<i class="formulario__validacion-estado fas fa-times-circle"></i>
														</div>
														<p class="formulario__input-error">La Razón Social tiene que ser de 4 a 70 dígitos y solo puede contener numeros y letras</p>
													</div>
												</div>

												<div class='col-sm-6' id="grupo__ruc_postulante">
													<label class="formulario__label">RUC / CI *</label>
													<div class="form-group">
														<div class='input-group date'>
															<input type='text' class="formulario__input" autocomplete="off" name="ruc_postulante" id="ruc_postulante" style="text-transform:uppercase;" onkeypress="return valideKey(event);" minlength="4" maxlength="14" value="<?php if (isset($ruc_postulante)) echo $ruc_postulante ?>" title="El RUC solo debe contener numeros y letras" required />
															<i class="formulario__validacion-estado fas fa-times-circle"></i>
														</div>
														<p class="formulario__input-error">El RUC y/o C.I puede contener numeros y/o letras de acuerdo a cada país.</p>
													</div>
												</div>
											</div>

											<div class="row">
												<div class='col-sm-6' id="grupo__correo_postulante"><br>
													<label class="formulario__label">INGRESE EL CORREO *</label>
													<div class="form-group">
														<div class='input-group date'>
															<input type='text' class="formulario__input" autocomplete="off" name="correo_postulante" id="correo_postulante" style="text-transform:lowercase;" onkeyup="javascript:this.value=this.value.toLowerCase();" onkeypress="return valideKeyEmail(event);" value="<?php if (isset($correo_postulante)) echo $correo_postulante ?>" required />
															<i class="formulario__validacion-estado fas fa-times-circle"></i>
														</div>
														<p class="formulario__input-error">El correo ingresado debe ser de la empresa que postula </p>
													</div>
												</div>
											</div>
											<div class="row">
												<div class='col-sm-6' id='grupo__password_postulante'><br>
													<label class="formulario__label"> CONTRASEÑA *</label>
													<div class="form-group">
														<div class='input-group date'>
															<input type='password' class="formulario__input" autocomplete="off" name="password_postulante" id="password_postulante" minlength="8" maxlength="16" placeholder="Oculte su contraseña al guardar registro" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" title="La contraseña debe tener 8 caracteres, incluida 1 letra mayúscula, y caracteres numéricos" />
															<i class="formulario__validacion-estado fa fa-eye-slash icon" onclick="mostrarPassword()"></i>
														</div>
														<p class="formulario__input-error">La contraseña debe contener minimo 8 máximo 16 caracteres, mayúsculas, número y caracteres especiales </p>
													</div>
												</div>

												<div class='col-sm-6' id='grupo__vpassword_postulante'><br>
													<label class="formulario__label"> REPITA CONTRASEÑA *</label>
													<div class="form-group">
														<div class='input-group date'>
															<input type='password' class="formulario__input" autocomplete="off" name="vpassword_postulante" id="vpassword_postulante" placeholder="Oculte su contraseña al guardar registro" required>
															<i class="formulario__validacion-estado fas fa-times-circle"></i>
														</div>
														<p class="formulario__input-error">Ambas contraseñas deben ser iguales </p>
													</div>
												</div>
											</div>

											<div class="row">
												<div class='col-sm-12' id='grupo__imagen'><br>
													<label class="formulario__label"> LOGO DE LA EMPRESA (opcional) </label>
													<div class="form-group">
														<div class='input-group date'>
															<h6> <input accept="image/*" class="fancy-file" type="file" name="imagen" id="imagen"></br>
															</h6>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class='col-sm-6'><br>
													<div class="g-recaptcha" data-sitekey="6Lc44LMlAAAAAC6aSOeGG7M1Xn4khY1HuF2KpVm1"></div>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-9 col-sm-9  offset-md-3"><br><br>
													<input type="submit" name="guardapostulante" id="guardapostulante" class="boton btn btn-primary" value="REGISTRAR">
													<a type="button" href="registro_postulante.php" class="boton btn btn-primary">CANCELAR</a>
												</div>
											</div>
										</div>
									</font>
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
	<!-- SEGURIDAD -->
	<script src="js/formularios/seguridad.js"></script>
	<!-- <Validación de Formulario con Javascript>-->
	<script src="js/formularios/registro_postulante.js"></script>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="vendors/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<!-- FastClick -->
	<script src="vendors/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
	<script src="vendors/nprogress/nprogress.js"></script>
	<!-- bootstrap-progressbar -->
	<script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
	<!-- iCheck -->
	<script src="vendors/iCheck/icheck.min.js"></script>
	<!-- bootstrap-daterangepicker -->
	<script src="vendors/moment/min/moment.min.js"></script>
	<script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- bootstrap-wysiwyg -->
	<script src="vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
	<script src="vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
	<script src="vendors/google-code-prettify/src/prettify.js"></script>
	<!-- jQuery Tags Input -->
	<script src="vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
	<!-- Switchery -->
	<script src="vendors/switchery/dist/switchery.min.js"></script>
	<!-- Select2 -->
	<script src="vendors/select2/dist/js/select2.full.min.js"></script>
	<!-- Parsley -->
	<script src="vendors/parsleyjs/dist/parsley.min.js"></script>
	<!-- Autosize -->
	<script src="vendors/autosize/dist/autosize.min.js"></script>
	<!-- jQuery autocomplete -->
	<script src="vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
	<!-- starrr -->
	<script src="vendors/starrr/dist/starrr.js"></script>
	<!-- Custom Theme Scripts -->
	<script src="build/js/custom.min.js"></script>
</body>

</html>