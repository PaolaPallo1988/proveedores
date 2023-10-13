<?php
//Inicia una nueva sesión o reanuda la existente 
session_start();
//Destruye toda la información registrada de una sesión
session_destroy();
//liberatodas las variables de sesion
session_unset();
//Redirecciona a la página de login
header('location: ../index.php');
