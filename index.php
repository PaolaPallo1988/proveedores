<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Inicio de Sessión</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="login/css/sourcesanspro-font.css">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="login/css/style.css" />
    <!-- jQuery library 
    <script type="text/javascript" src=" .scripts/ seguirdad.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.7.0/dist/sweetalert2.all.min.js"></script>
</head>

<body class="form-v8">
    <div class="page-content">
        <div class="form-v8-content">
            <div class="form-left">
                <img src="login/images/img.png" alt="form">
            </div>
            <div class="form-right">
                <?php
                include('login/valida_login.php');
                ?>
                <form class="form-detail" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                    <div class="tabcontent" id="sign-in">
                        <center>
                            <div class="container">
                                <div class="jumbotron">
                                    <h1>Inicio de Sesión</h1>
                                    <p>SISTEMA DE CALIFICACION DE PROVEEDORES.</p>
                                </div>
                            </div>
                        </center><br>
                        <div class="form-row">
                            <label class="form-row-inner">
                                <input type="text" name="cedula_usuario" id="cedula_usuario" onkeyup="javascript:this.value=this.value.toUpperCase()" ; maxlength="15" autofocus class="input-text" autocomplete="off" required>
                                <span class="label">RUC / CI </span>
                                <span class="border"></span>
                            </label>
                        </div>
                        <div class="form-row">
                            <label class="form-row-inner">
                                <input type="password" name="password_usuario" id="password_usuario" class="input-text" autocomplete="off" required>
                                <span class="label">Contraseña</span>
                                <span class="border"></span>
                                <div>
                                    <a style="color:#0B0B0B" ; text-align="left" href="olvidaste_contrasena.php">Olvidó su contraseña?</a>
                                </div><br>
                            </label>
                        </div>
                        <center>
                            <div class="form-row-last">
                                <button type="submit" name="login" id="login" class="register"><u>INICIAR SESIÓN</u></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="btn btn-default btn-lg"><a type="button" href="registro_postulante.php" class="register">REGISTRARSE</a></button>
                            </div>
                        </center>
                        <div>
                            <a style="color:#0B0B0B" ; href="vistas/desbloquear_cuenta.php">DESBLOQUEAR CUENTA</a>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                            <a text-align="left" ; style="color:#0B0B0B" ; href="vistas/contacto_ciudadano.php">CONTACTO CIUDADANO</a>
                        </div><br>
                        <div class="form-group">
                            <div class="alert alert-warning">
                                <center> Dirección de Tecnologias de la Información y Comunicación</center>
                                <center>Ministerio de Defensa Nacional-2022</center>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/formularios/formulario_ login.js"></script>
    <!-- SEGURIDAD -->
    <script src="js/formularios/seguridad.js"></script>
</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>