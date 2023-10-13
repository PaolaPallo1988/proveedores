<?php
require('../conexion/conexion.php');

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Sistema de Calificación de Proveedores | MDN</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="../login/css/sourcesanspro-font.css">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="../login/css/style.css" />
    <!-- jQuery library 
    <script type="text/javascript" src="scripts/seguirdad.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.7.0/dist/sweetalert2.all.min.js"></script>
</head>

<body class="form-v8">
    <div class="page-content">
        <div class="form-v8-content">
            <div class="form-left">
                <img src="../login/images/desbloquear_cuenta.png" alt="form">
            </div>
            <div class="form-right">
                <?php
                include('../controlador/envia_correoDesbloqueo.php');
                ?>
                <form class="form-detail" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                    <div class="tabcontent" id="sign-in">
                        <center>
                            <div class="container">
                                <div class="jumbotron">
                                    <h1>Ingrese el correo electrónico para desbloquear su cuenta</h1><br>
                                    <p>SISTEMA DE CALIFICACION DE PROVEEDORES</p>
                                    <p>Por seguridad se solicitará el cambio de contraseña</p><br>
                                    <?php include('../controlador/mensajes.php'); ?>
                                </div>
                            </div>
                        </center><br>
                        <div class="form-row">
                            <label class="form-row-inner">
                                <input type="email" name="email" id="email" class="input-text" autocomplete="off" required>
                                <span class="label">Correo</span>
                                <span class="border"></span>
                            </label>
                        </div>
                        <center>
                            <div class="form-row-last">
                                <button type="submit" name="desbloquear_cuenta" style="color:#060505;" id="desbloquear_cuenta" class="register"><u>ENVIAR</u></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="register"><a type="button" style="color:#060505;" href="../index.php">CANCELAR</a></button>
                            </div>
                        </center>
                        <div class="form-group">
                            <div class="alert alert-warning">
                                <center> Dirección de Tecnologias de la Información y Comunicación</center>
                                <center>Ministerio de Defensa Nacional-2022</center><br>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- SEGURIDAD QUE LA PAGINA SE CIERRE EN 20 MINUTOS -->
    <script src="../js/formularios/seguridad.js"></script>
</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>