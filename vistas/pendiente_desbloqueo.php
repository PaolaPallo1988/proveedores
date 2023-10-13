<?php include('../controlador/envia_correoDesbloqueo.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sistema de Calificación de Proveedores | MDN</title>

    <link rel="stylesheet" href="../login/css/estilos.css">
    <link rel="stylesheet" href="../login/css/font-awesome.css">
</head>

<body>

    <form class="login-form" action="login.php" method="post" style="text-align: center;">
        <section class="form_wrap">
            <section class="mensaje-exito">
                <p>
                    Enviamos un correo electrónico a <b><?php echo $_GET['email'] ?></b> para ayudarte a desbloquear tu cuenta. </p>
                <p>Inicie sesión en su cuenta de correo electrónico y haga clic en el enlace que le enviamos para restablecer su cuenta bloqueada, por seguridad se le solicitará el cambio de contraseña</p><br>
                <a href="../login/logout.php">Inicio Sesión</a>
            </section>

        </section>
    </form>

</body>

</html>