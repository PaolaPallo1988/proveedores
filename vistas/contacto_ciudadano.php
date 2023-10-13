<?php
include "../conexion/conexion.php";
?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>Sistema de Calificación de Proveedores | MDN</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/nicepage.css" media="screen">
  <link rel="stylesheet" href="../css/Casa.css" media="screen">
  <script type="text/javascript" src="../js/nicepage.js"></script>
  <!-- Sweetalert2 -->
  <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>
  <script src='https://www.google.com/recaptcha/api.js?render=6Lebs4khAAAAADag0NOZim3fdOBwzHs1izzlTaD2'></script>

  <!-- FUNCIONES VALIDAR LETRAS Y CARACTERES ESPECIALES -->
  <script type="text/javascript">
    function valideKeyNombre(evt) {
      // el código es la representación ASCII decimal de la tecla presionada.
      var code = (evt.which) ? evt.which : evt.keyCode;
      if ((code == 32) || (code == 46)) { // backspace.
        return true;
      } else if ((code >= 48 && code <= 57) || (code >= 97 && code <= 122) || (code >= 65 && code <= 90)) { // is a number.
        return true;
      } else { // other keys.
        return false;
      }
    }
  </script>
  <!-- FUNCIONES VALIDAR SLO NUMEROS Y LETRAS -->
  <script type="text/javascript">
    function valideKey(evt) {
      // el código es la representación ASCII decimal de la tecla presionada.
      var code = (evt.which) ? evt.which : evt.keyCode;
      if (code == 8) { // backspace.
        return true;
      } else if ((code >= 48 && code <= 57) || (code >= 97 && code <= 122) || (code >= 65 && code <= 90)) { // is a number.
        return true;
      } else { // other keys.
        return false;
      }
    }
  </script>
</head>

<body class="u-body u-xl-mode" data-lang="es">
  <section class="u-clearfix u-image u-section-1" id="carousel_e520">
    <div class="u-clearfix u-sheet u-sheet-1">
      <div class="u-list u-list-1">
        <div class="u-repeater u-repeater-1">
          <div class="u-align-center u-container-style u-custom-color-1 u-list-item u-repeater-item u-list-item-1">
            <div class="u-container-layout u-similar-container u-container-layout-1"><span class="u-icon u-icon-circle u-text-black u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 52 52">
                  <use xlink:href="#svg-077e"></use>
                </svg><svg class="u-svg-content" viewBox="0 0 52 52" x="0px" y="0px" id="svg-077e" style="enable-background:new 0 0 52 52;">
                  <path style="fill:currentColor;" d="M38.853,5.324L38.853,5.324c-7.098-7.098-18.607-7.098-25.706,0h0
                  C6.751,11.72,6.031,23.763,11.459,31L26,52l14.541-21C45.969,23.763,45.249,11.72,38.853,5.324z M26.177,24c-3.314,0-6-2.686-6-6
                  s2.686-6,6-6s6,2.686,6,6S29.491,24,26.177,24z"></path>
                </svg></span>
              <h5 class="u-text u-text-black u-text-1">NUESTRAS OFICINAS</h5>
              <p class="u-text u-text-black u-text-2">
                <br>Calle la Exposición S4-71 y Benigno Vela
              </p>
            </div>
          </div>
          <div class="u-align-center u-container-style u-custom-color-1 u-list-item u-repeater-item u-list-item-2">
            <div class="u-container-layout u-similar-container u-container-layout-2"><span class="u-icon u-icon-circle u-text-black u-icon-2"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 513.64 513.64">
                  <use xlink:href="#svg-9786"></use>
                </svg><svg class="u-svg-content" viewBox="0 0 513.64 513.64" x="0px" y="0px" id="svg-9786" style="enable-background:new 0 0 513.64 513.64;">
                  <g>
                    <g>
                      <path d="M499.66,376.96l-71.68-71.68c-25.6-25.6-69.12-15.359-79.36,17.92c-7.68,23.041-33.28,35.841-56.32,30.72    c-51.2-12.8-120.32-79.36-133.12-133.12c-7.68-23.041,7.68-48.641,30.72-56.32c33.28-10.24,43.52-53.76,17.92-79.36l-71.68-71.68    c-20.48-17.92-51.2-17.92-69.12,0l-48.64,48.64c-48.64,51.2,5.12,186.88,125.44,307.2c120.32,120.32,256,176.641,307.2,125.44    l48.64-48.64C517.581,425.6,517.581,394.88,499.66,376.96z"></path>
                    </g>
                  </g>
                </svg></span>
              <h5 class="u-text u-text-black u-text-3">NÚMERO DE TELÉFONO</h5>
              <p class="u-text u-text-black u-text-4">Código Postal: 170403&nbsp;<br>&nbsp;Quito - Ecuador <br>593-2 298-3200 / 593-2 295-1951
              </p>
            </div>
          </div>
          <div class="u-align-center u-container-style u-custom-color-1 u-list-item u-repeater-item u-list-item-3">
            <div class="u-container-layout u-similar-container u-container-layout-3"><span class="u-icon u-icon-circle u-text-black u-icon-3"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 512 512">
                  <use xlink:href="#svg-9f82"></use>
                </svg><svg class="u-svg-content" viewBox="0 0 512 512" x="0px" y="0px" id="svg-9f82" style="enable-background:new 0 0 512 512;">
                  <g>
                    <g>
                      <path d="M507.49,101.721L352.211,256L507.49,410.279c2.807-5.867,4.51-12.353,4.51-19.279V121    C512,114.073,510.297,107.588,507.49,101.721z"></path>
                    </g>
                  </g>
                  <g>
                    <g>
                      <path d="M467,76H45c-6.927,0-13.412,1.703-19.279,4.51l198.463,197.463c17.548,17.548,46.084,17.548,63.632,0L486.279,80.51    C480.412,77.703,473.927,76,467,76z"></path>
                    </g>
                  </g>
                  <g>
                    <g>
                      <path d="M4.51,101.721C1.703,107.588,0,114.073,0,121v270c0,6.927,1.703,13.413,4.51,19.279L159.789,256L4.51,101.721z"></path>
                    </g>
                  </g>
                  <g>
                    <g>
                      <path d="M331,277.211l-21.973,21.973c-29.239,29.239-76.816,29.239-106.055,0L181,277.211L25.721,431.49    C31.588,434.297,38.073,436,45,436h422c6.927,0,13.412-1.703,19.279-4.51L331,277.211z"></path>
                    </g>
                  </g>
                </svg></span>
              <h5 class="u-text u-text-black u-text-5">Email</h5>
              <p class="u-text u-text-black u-text-6">
                <br>infoproveedores@midena.gob.ec
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
        <div class="u-layout">
          <div class="u-layout-row">
            <div class="u-align-left u-container-style u-custom-color-1 u-layout-cell u-left-cell u-size-30 u-layout-cell-1">
              <div class="u-container-layout u-container-layout-4">
                <h3 class="u-text u-text-body-color u-text-default u-text-7">Contáctanos</h3>
                <div class="u-form u-form-1">
                  <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="u-clearfix u-form-spacing-30 u-form-vertical u-inner-form">
                    <?php include("../controlador/guarda_contactoCiudadano.php");
                    ?>
                    <div class="u-form-group u-form-name">
                      <label class="u-label u-text-body-alt-color u-label-1">NOMBRE / RAZÓN SOCIAL</label>
                      <input type="text" placeholder="Nombre o la Razón Social" autocomplete="off" id="nombre_contactoCiudadano" name="nombre_contactoCiudadano" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-text-white u-input-4" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return valideKeyNombre(event);" style="text-transform:uppercase;" required>
                    </div>
                    <div class="u-form-group u-form-group-2">
                      <label class="u-label u-text-body-alt-color u-label-2">RUC / CÉDULA</label>
                      <input type="text" placeholder="Cédula o RUC" autocomplete="off" id="cedula_contactoCiudadano" name="cedula_contactoCiudadano" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-text-white u-input-4" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return valideKey(event);" style="text-transform:uppercase;" minlength="10" maxlength="13" required>
                    </div>
                    <div class="u-form-email u-form-group">
                      <label class="u-label u-text-body-alt-color u-label-3">CORREO ELECTRÓNICO</label>
                      <input type="email" placeholder="correo electrónico " autocomplete="off" id="correo_contactoCiudadano" name="correo_contactoCiudadano" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-text-white u-input-4" onkeyup="javascript:this.value=this.value.toLowerCase();" style="text-transform:lowercase;" maxlength="40" required>
                    </div>
                    <div class="u-form-group u-form-name">
                      <label class="u-label u-text-body-alt-color u-label-3">REQUERIMIENTO</label>
                      <select class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-text-white u-input-4" name="tipo_contactoCiudadano" id="tipo_contactoCiudadano" required>
                        <option style="background-color:#0B305F;" value="0"> SELECCIONAR...</option>
                        <option style="background-color:#0B305F;" value="PREGUNTA">PREGUNTA</option>
                        <option style="background-color:#0B305F;" value="QUEJA">QUEJA</option>
                        <option style="background-color:#0B305F;" value="SUGERENCIA">SUGERENCIA</option>
                        <option style="background-color:#0B305F;" value="SOLICITUD DE INFORMACIÓN">SOLICITUD DE INFORMACIÓN</option>
                        <option style="background-color:#0B305F;" value="FELICITACIÓN">FELICITACIÓN</option>
                      </select>
                    </div>
                    <div class="u-form-group u-form-name">
                      <label class="u-label u-text-body-alt-color u-label-4">DESCRIPCIÓN REQUERIMIENTO CIUDADANO</label>
                      <textarea placeholder="Descripción de requerimiento ciudadano" autocomplete="off" rows="6" cols="50" id="requerimiento_contactoCiudadano" name="requerimiento_contactoCiudadano" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-text-white u-input-4" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return valideKeyNombre(event);" required></textarea>
                    </div>
                    <div class="u-form-group u-form-name">
                      <center>
                        <p>
                          <button type="submit" id="guardaContactoCiudadano" name="guardaContactoCiudadano" class="u-btn u-btn-submit u-button-style u-white ">ENVIAR &nbsp;&nbsp;</button>&nbsp;&nbsp;&nbsp;
                          <a style="color:#060505;" href="../login/logout.php"><button type="button" class="u-btn u-btn-submit u-button-style u-white">INICIO SESIÓN</a></button>
                        </p>
                      </center>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="u-black u-container-style u-layout-cell u-right-cell u-size-30 u-layout-cell-2">
              <div class="u-container-layout u-container-layout-5">
                <div class="u-expanded u-grey-light-2 u-map">
                  <div class="embed-responsive">
                    <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d498.72324319530406!2d-78.5125257!3d-0.2308154!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb839bda8c40c8ba1!2sMinisterio%20de%20Defensa%20Nacional!5e0!3m2!1ses!2sec!4v1582906294900!5m2!1ses!2sec" width="59%" height="250" frameborder="0" allowfullscreen="allowfullscreen" data-map="JTdCJTIycG9zaXRpb25UeXBlJTIyJTNBJTIybWFwLWFkZHJlc3MlMjIlMkMlMjJhZGRyZXNzJTIyJTNBJTIyUUY5USUyQkozUiUyQyUyMEouQi5WZWxhJTJDJTIwUXVpdG8lMjBEQyUyMDE3MDEyMSUyMiUyQyUyMnpvb20lMjIlM0ExMCUyQyUyMnR5cGVJZCUyMiUzQSUyMnJvYWQlMjIlMkMlMjJsYW5nJTIyJTNBbnVsbCUyQyUyMmFwaUtleSUyMiUzQW51bGwlMkMlMjJtYXJrZXJzJTIyJTNBJTVCJTVEJTdE"></iframe>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- footer content -->
    <?php include('../cabeceras/pie_pagina.php'); ?>
    <!-- /footer content -->
  </section>
      <!-- SEGURIDAD -->
      <script src="../js/formularios/seguridad.js"></script>
</body>
</html>