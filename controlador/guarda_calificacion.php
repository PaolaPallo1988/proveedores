
<?php

include "../conexion/conexion.php"; //CONEXION A LA BASE DE DATOS//


if (isset($_POST['guardacalificacion'])) {

    $id_razonsoc = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["razonsoc_postulante"], ENT_QUOTES)));
    $usuario_id = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["usuario_id"], ENT_QUOTES)));
    $siglas_postulante = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["siglas_postulante"], ENT_QUOTES)));
    $cedula_postulante = mysqli_real_escape_string($conn_registro, (strip_tags($row["cedula_usuario"], ENT_QUOTES)));
    $nombre_postulante = mysqli_real_escape_string($conn_registro, (strip_tags($row["nombre_usuario"], ENT_QUOTES)));
    $actividad_postulante = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["actividad_postulante"], ENT_QUOTES)));
    $distribuidor_postulante = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["distribuidor_postulante"] ?? NULL, ENT_QUOTES)));
    $pais_postulante = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["lista1"], ENT_QUOTES)));
    $provincia_postulante = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["provincia_postulante"], ENT_QUOTES)));
    $ciudad_postulante = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["ciudad_postulante"], ENT_QUOTES)));
    $codtelefono_pais = mysqli_real_escape_string($conn_registro, (strip_tags(isset($_POST["codtelefono_pais"]), ENT_QUOTES)));
    $direcPrinOrig_postulante = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["direcPrinOrig_postulante"], ENT_QUOTES)));
    $direcSecOrig_postulante = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["direcSecOrig_postulante"], ENT_QUOTES)));
    $direcNumOrig_postulante = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["direcNumOrig_postulante"], ENT_QUOTES)));
    $direcPisoOrig_postulante = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["direcPisoOrig_postulante"], ENT_QUOTES)));
    $teleforig_postulante = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["teleforig_postulante"], ENT_QUOTES)));
    $extorig_postulante = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["extorig_postulante"], ENT_QUOTES)));
    $direcPrinEcu_postulante = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["direcPrinEcu_postulante"], ENT_QUOTES)));
    $direcSecEcu_postulante = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["direcSecEcu_postulante"], ENT_QUOTES)));
    $direcNumEcu_postulante = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["direcNumEcu_postulante"], ENT_QUOTES)));
    $direcPisoEcu_postulante = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["direcPisoEcu_postulante"], ENT_QUOTES)));

    $contador = count($_POST["telefecu_postulante"] ?? []);
    $ProContador = 0;
    $queryValue = "";

    //$telefecu_postulante = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["telefecu_postulante"], ENT_QUOTES)));
    $extecu_postulante = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["extecu_postulante"], ENT_QUOTES)));
    $paginaweb_postulante = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["paginaweb_postulante"] ?? NULL, ENT_QUOTES)));

    $constitucion_capital = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["constitucion_capital"] ?? NULL, ENT_QUOTES)));
    // $capital_estatal = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["capital_estatal"] ?? NULL, ENT_QUOTES)));
    // $capital_mixto = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["capital_privado"] ?? NULL, ENT_QUOTES)));
    $estado_decurrente = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["estado_decurrente"], ENT_QUOTES)));
    $estado_balance = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["estado_balance"], ENT_QUOTES)));

    $nombre_legal = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["nombre_legal"] ?? NULL, ENT_QUOTES)));
    $vigencia_legal = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["vigencia_legal"] ?? NULL, ENT_QUOTES)));
    $pais_legal = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["pais_legal"], ENT_QUOTES)));
    $direccion_legal = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["direccion_legal"] ?? NULL, ENT_QUOTES)));
    $ciudad_legal = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["ciudad_legal"] ?? NULL, ENT_QUOTES)));
    $codtelefono_legal = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["codtelefono_legal"] ?? NULL, ENT_QUOTES)));
    $telefono_legal = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["telefono_legal"] ?? NULL, ENT_QUOTES)));
    $correo_legal = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["correo_legal"] ?? NULL, ENT_QUOTES)));

    $nombre_apoderado = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["nombre_apoderado"], ENT_QUOTES)));
    $vigencia_apoderado = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["vigencia_apoderado"], ENT_QUOTES)));
    $direccion_apoderado = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["direccion_apoderado"], ENT_QUOTES)));
    $ciudad_apoderado = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["ciudad_apoderado"], ENT_QUOTES)));
    $telefono_apoderado = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["telefono_apoderado"], ENT_QUOTES)));
    $correo_apoderado = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["correo_apoderado"], ENT_QUOTES)));

    $calificacion = "2";

    $sqlusuario = "SELECT * FROM postulante WHERE usuario_id='$usuario_id'";
    $result = mysqli_query($conn_registro, $sqlusuario);



    if (mysqli_num_rows($result) > 0) {
        // Si es mayor a cero imprimimos que ya existe la causa
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ya existe documentación de # $nombre_postulante!',
                footer: 'Ministerio de Defensa Nacional'
            }
                ).then(function() {
                    window.location = '../vistas/postulante_principal.php';
                });
            </script>";
    } else {


        // $directorio = ("C:/xampp/htdocs/php/Proveedores_2022_FT/Archivos/$nombre_postulante");

        $directorio =  ('../Archivos/'.$nombre_postulante.'/');
        //$directorio = ("../Archivos/$nombre_postulante");

        $permitidos = array("application/pdf");

        //Indicamos la ruta de destino, así como el nombre del archivo
        $nombre_archivo = $directorio . $nombre_postulante . "-" .  date("d-m-y") . "-" . "DOC_GENERALES" . "-" .  "SOLICITUD_CALIFICACIÓN" . ".PDF"; 
        $nombre_archivo1 = $directorio . $nombre_postulante . "-" .  date("d-m-y") . "-" . "DOC_GENERALES" . "-" .  "FORMULARIO_DATOS_GENERALES" . ".PDF";
        $nombre_archivo2 = $directorio . $nombre_postulante . "-" .  date("d-m-y") . "-" . "DOC_GENERALES" . "-" . "ACREEDITACIÓN_CAPACIDAD_EXPERIENCIA  " . ".PDF";
        $nombre_archivo3 = $directorio . $nombre_postulante . "-" .  date("d-m-y") . "-" . "DOC_GENERALES" . "-" .  "SERVICIOS_CONEXOS_OFERTA" . ".PDF";
        $nombre_archivo4 = $directorio . $nombre_postulante . "-" .  date("d-m-y") . "-" . "DOC_GENERALES" . "-" .  "DECLARACIÓN_JURAMENTADA_NOTARIO" . ".PDF";
        $nombre_archivo5 = $directorio . $nombre_postulante . "-" .  date("d-m-y") . "-" . "DOC_GENERALES" . "-" . "ESTADO_SITUACIÓN_FINANCIERA" . ".PDF";
        $nombre_archivo6 = $directorio . $nombre_postulante . "-" .  date("d-m-y") . "-" . "DOC_GENERALES" . "-" . "PODER_NOTARIZADO" . ".PDF";  // $nombre_archivo6 = $directorio . $usuario . "-" .  date("m-d-y") . "-" .  basename($_FILES["archivo6"]["name"]);

        $nombre_persona_natural1 = $directorio . $nombre_postulante . "-" .  date("d-m-y") . "-" . "DOC_ESPECIFICOS" . "-" .  "AL_DIA_OBLIGACIONES_SRI" . ".PDF";
        $nombre_persona_natural2 = $directorio . $nombre_postulante . "-" .  date("d-m-y") . "-" . "DOC_ESPECIFICOS" . "-" .  "ORIGINAL_COPIA_RUC" . ".PDF";
        $nombre_persona_natural3 = $directorio . $nombre_postulante . "-" .  date("d-m-y") . "-" . "DOC_ESPECIFICOS" . "-" .  "AL_DIA_OBLIGACIONES_IESS" . ".PDF";

        $nombre_persona_juridica1 = $directorio . $nombre_postulante . "-" .  date("d-m-y") . "-" . "DOC_ESPECIFICOS" . "-" .  "ESCRITURA_CONSTITUCION_CIA" . ".PDF";
        $nombre_persona_juridica2 = $directorio . $nombre_postulante . "-" .  date("d-m-y") . "-" . "DOC_ESPECIFICOS" . "-" .  "NOMBRAMIENTO_REPRESENTANTE_LEGAL" . ".PDF";
        $nombre_persona_juridica3 = $directorio . $nombre_postulante . "-" .  date("d-m-y") . "-" . "DOC_ESPECIFICOS" . "-" .  "AL_DIA_OBLIGACIONES_SRI" . ".PDF";
        $nombre_persona_juridica4 = $directorio . $nombre_postulante . "-" .  date("d-m-y") . "-" . "DOC_ESPECIFICOS" . "-" .  "AL_DIA_OBLIGACIONES_IESS" . ".PDF";
        $nombre_persona_juridica5 = $directorio . $nombre_postulante . "-" .  date("d-m-y") . "-" . "DOC_ESPECIFICOS" . "-" .  "ORIG_COPIA_CERTIFICADO_RUC" . ".PDF";
        $nombre_persona_juridica6 = $directorio . $nombre_postulante . "-" .  date("d-m-y") . "-" . "DOC_ESPECIFICOS" . "-" .  "NO_CONSTAR_CONTRATISTA_INCUMPLIDO" . ".PDF";

        $nombre_persona_domic1 = $directorio . $nombre_postulante . "-" .  date("d-m-y") . "-" . "DOC_ESPECIFICOS" . "-" .  "ESCRITURA_CONSTITUCION_CIA" . ".PDF";
        $nombre_persona_domic2 = $directorio . $nombre_postulante . "-" .  date("d-m-y") . "-" . "DOC_ESPECIFICOS" . "-" .  "NOMBRAMIENTO_REPRESENTANTE_LEGAL" . ".PDF";
        $nombre_persona_domic3 = $directorio . $nombre_postulante . "-" .  date("d-m-y") . "-" . "DOC_ESPECIFICOS" . "-" .  "DOC_EMITIDA_AUTORIDAD_TRIBUTARIA" . ".PDF";

        if (($id_razonsoc == '3') || ($id_razonsoc == '4')) {
            if ((!empty($_FILES["archivo"]["tmp_name"])) && !empty($_FILES["archivo1"]["tmp_name"]) && !empty($_FILES["archivo2"]["tmp_name"]) &&  !empty($_FILES["archivo3"]["tmp_name"]) &&  !empty($_FILES["archivo4"]["tmp_name"]) &&  !empty($_FILES["archivo5"]["tmp_name"]) &&  !empty($_FILES["archivo6"]["tmp_name"]) &&
                !empty($_FILES["persona_juridica1"]["tmp_name"]) && !empty($_FILES["persona_juridica2"]["tmp_name"]) && !empty($_FILES["persona_juridica3"]["tmp_name"]) && !empty($_FILES["persona_juridica4"]["tmp_name"]) && !empty($_FILES["persona_juridica5"]["tmp_name"]) && !empty($_FILES["persona_juridica6"]["tmp_name"])
            ) {
                //validando tamaño del archivo
                $size = $_FILES["archivo"]["size"];
                $size1 = $_FILES["archivo1"]["size"];
                $size2 = $_FILES["archivo2"]["size"];
                $size3 = $_FILES["archivo3"]["size"];
                $size4 = $_FILES["archivo4"]["size"];
                $size5 = $_FILES["archivo5"]["size"];
                $size6 = $_FILES["archivo6"]["size"];

                $sizejurid1 = $_FILES["persona_juridica1"]["size"];
                $sizejurid2 = $_FILES["persona_juridica2"]["size"];
                $sizejurid3 = $_FILES["persona_juridica3"]["size"];
                $sizejurid4 = $_FILES["persona_juridica4"]["size"];
                $sizejurid5 = $_FILES["persona_juridica5"]["size"];
                $sizejurid6 = $_FILES["persona_juridica6"]["size"];

                if (($size >= 69111362) && ($size1 >= 69111362) && ($size2 >= 69111362) && ($size3 >= 69111362) && ($size4 >= 69111362) && ($size5 >= 69111362) && ($size6 >= 69111362)
                    && ($sizejurid1 >= 69111362) && ($sizejurid2 >= 69111362) && ($sizejurid3 >= 69111362) && ($sizejurid4 >= 69111362) && ($sizejurid5 >= 69111362) && ($sizejurid6 >= 69111362)
                ) {
                    echo "<script>			
                        Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        title: 'El formato debe de ser 1024kb',
                        footer: 'Ministerio de Defensa Nacional'
                            }
                        ).then(function() {
                            window.location('../vistas/postulante_principal.php');
                        });
                            </script>";
                } else {
                    //validar tipo de archivo
                    if (
                        in_array($_FILES["archivo"]["type"], $permitidos) &&  in_array($_FILES["archivo1"]["type"], $permitidos) &&  in_array($_FILES["archivo2"]["type"], $permitidos) &&  in_array($_FILES["archivo3"]["type"], $permitidos) &&  in_array($_FILES["archivo4"]["type"], $permitidos) && in_array($_FILES["archivo5"]["type"], $permitidos) && in_array($_FILES["archivo6"]["type"], $permitidos) &&
                        in_array($_FILES["persona_juridica1"]["type"], $permitidos) && in_array($_FILES["persona_juridica2"]["type"], $permitidos) && in_array($_FILES["persona_juridica3"]["type"], $permitidos) && in_array($_FILES["persona_juridica4"]["type"], $permitidos) && in_array($_FILES["persona_juridica5"]["type"], $permitidos) && in_array($_FILES["persona_juridica6"]["type"], $permitidos)
                    ) {

                        if (!file_exists($directorio)) {
                            mkdir($directorio, 0777, true) ;
                            // or die("No se puede crear el directorio de extracci&oacute;n");  -->
                        } 
                        // se validó el archivo correctamente
                        if ((move_uploaded_file($_FILES["archivo"]["tmp_name"], $nombre_archivo)) && (move_uploaded_file($_FILES["archivo1"]["tmp_name"], $nombre_archivo1)) && (move_uploaded_file($_FILES["archivo2"]["tmp_name"], $nombre_archivo2)) && (move_uploaded_file($_FILES["archivo3"]["tmp_name"], $nombre_archivo3)) && (move_uploaded_file($_FILES["archivo4"]["tmp_name"], $nombre_archivo4)) && (move_uploaded_file($_FILES["archivo5"]["tmp_name"], $nombre_archivo5)) && (move_uploaded_file($_FILES["archivo6"]["tmp_name"], $nombre_archivo6))
                            && (move_uploaded_file($_FILES["persona_juridica1"]["tmp_name"], $nombre_persona_juridica1)) && (move_uploaded_file($_FILES["persona_juridica2"]["tmp_name"], $nombre_persona_juridica2) && (move_uploaded_file($_FILES["persona_juridica3"]["tmp_name"], $nombre_persona_juridica3)) && (move_uploaded_file($_FILES["persona_juridica4"]["tmp_name"], $nombre_persona_juridica4)) && (move_uploaded_file($_FILES["persona_juridica5"]["tmp_name"], $nombre_persona_juridica5)) && (move_uploaded_file($_FILES["persona_juridica6"]["tmp_name"], $nombre_persona_juridica6)))
                        ) {

                            $sqlactualizar = "UPDATE usuario SET estado_calificacion='$calificacion' WHERE cedula_usuario='$cedula_postulante'";
                            $sqlproducto_oferta = mysqli_query($conn_registro, $sqlactualizar);


                            $query = "INSERT INTO telefonos_ecuador (cedulaPostulante_ecuador, usuarioId_ecuador,telefono_ecuador) VALUES ";
                            for ($i = 0; $i < $contador; $i++) {
                                if (!empty($_POST["telefecu_postulante"][$i])) {
                                    $ProContador++;
                                    if ($queryValue != "") {
                                        $queryValue .= ",";
                                    }
                                    $queryValue .= "('" . $cedula_postulante . "','" . $usuario_id . "','" . $_POST["telefecu_postulante"][$i] . "')";
                                }
                            }
                            $sql = $query . $queryValue;

                            $sqlcalificacion = "INSERT INTO postulante (razonsoc_id, usuario_id,cedula_postulante, siglas_postulante, actividad_postulante, distribuidor_postulante, pais_postulante, provincia_postulante, ciudad_postulante, direcPrinOrig_postulante, direcSecOrig_postulante, direcNumOrig_postulante, direcPisoOrig_postulante, teleforig_postulante,extorig_postulante,direcPrinEcu_postulante,direcSecEcu_postulante,direcNumEcu_postulante,direcPisoEcu_postulante,extecu_postulante,paginaweb_postulante,
                                    constitucion_capital,estado_decurrente, estado_balance,
                                    nombre_legal,vigencia_legal,pais_legal,direccion_legal,ciudad_legal,telefono_legal,correo_legal,
                                    nombre_apoderado,vigencia_apoderado,direccion_apoderado,ciudad_apoderado,telefono_apoderado,correo_apoderado,
                                    ruta_solic_calif, tamaño_solic_calif, tipo_solic_calif,
                                    ruta_form_dat_gen,tamaño_form_dat_gen,tipo_form_dat_gen,
                                    ruta_acred_experiencia, tamaño_acred_experiencia, tipo_acred_experiencia,
                                    ruta_serv_conexos_oferta, tamaño_serv_conexos_oferta, tipo_serv_conexos_oferta,
                                    ruta_decla_juramentada, tamaño_decla_juramentada, tipo_decla_juramentada,
                                    ruta_est_situ_financiera, tamaño_est_situ_financiera, tipo_est_situ_financiera,
                                    ruta_poder_not, tamaño_poder_not, tipo_poder_not, 
                                    ruta_juridica1, tamaño_juridica1, 	tipo_juridica1,
                                    ruta_juridica2, tamaño_juridica2, 	tipo_juridica2,
                                    ruta_juridica3, tamaño_juridica3, tipo_juridica3,
                                    ruta_juridica4, tamaño_juridica4, tipo_juridica4,
                                    ruta_juridica5, tamaño_juridica5, tipo_juridica5,
                                    ruta_juridica6, tamaño_juridica6, tipo_juridica6) VALUES 
                                    ('" . $id_razonsoc . "','" . $usuario_id . "','" . $cedula_postulante . "','" . $siglas_postulante . "','" . $actividad_postulante . "','" . $distribuidor_postulante . "','" . $pais_postulante . "','" . $provincia_postulante . "','" . $ciudad_postulante . "','" . $direcPrinOrig_postulante . "','" . $direcSecOrig_postulante . "','" . $direcNumOrig_postulante . "','" . $direcPisoOrig_postulante . "','" . $teleforig_postulante . "','" . $extorig_postulante . "','" . $direcPrinEcu_postulante . "','" . $direcSecEcu_postulante . "','" . $direcNumEcu_postulante . "','" . $direcPisoEcu_postulante . "','" . $extecu_postulante . "','" . $paginaweb_postulante . "',
                                    '" . $constitucion_capital . "','" . $estado_decurrente . "','" . $estado_balance . "',
                                    '" . $nombre_legal . "','" . $vigencia_legal . "','" . $pais_legal . "','" . $direccion_legal . "','" . $ciudad_legal . "','" . $telefono_legal . "','" . $correo_legal . "',
                                    '" . $nombre_apoderado . "','" . $vigencia_apoderado . "','" . $direccion_apoderado . "','" . $ciudad_apoderado . "','" . $telefono_apoderado . "','" . $correo_apoderado . "',
                                    '" . $nombre_archivo . "','" . $_FILES['archivo']['size'] . "','" . $_FILES['archivo']['type'] . "',
                                    '" . $nombre_archivo1 . "','" . $_FILES['archivo1']['size'] . "','" . $_FILES['archivo1']['type'] . "',
                                    '" . $nombre_archivo2 . "','" . $_FILES['archivo2']['size'] . "','" . $_FILES['archivo2']['type'] . "',
                                    '" . $nombre_archivo3 . "','" . $_FILES['archivo3']['size'] . "','" . $_FILES['archivo3']['type'] . "',
                                    '" . $nombre_archivo4 . "','" . $_FILES['archivo4']['size'] . "','" . $_FILES['archivo4']['type'] . "',
                                    '" . $nombre_archivo5 . "','" . $_FILES['archivo5']['size'] . "','" . $_FILES['archivo5']['type'] . "',
                                    '" . $nombre_archivo6 . "','" . $_FILES['archivo6']['size'] . "','" . $_FILES['archivo6']['type'] . "',
                                    '" . $nombre_persona_juridica1 . "','" . $_FILES['persona_juridica1']['size'] . "','" . $_FILES['persona_juridica1']['type'] . "',
                                    '" . $nombre_persona_juridica2 . "','" . $_FILES['persona_juridica2']['size'] . "','" . $_FILES['persona_juridica2']['type'] . "',
                                    '" . $nombre_persona_juridica3 . "','" . $_FILES['persona_juridica3']['size'] . "','" . $_FILES['persona_juridica3']['type'] . "',
                                    '" . $nombre_persona_juridica4 . "','" . $_FILES['persona_juridica4']['size'] . "','" . $_FILES['persona_juridica4']['type'] . "',
                                    '" . $nombre_persona_juridica5 . "','" . $_FILES['persona_juridica5']['size'] . "','" . $_FILES['persona_juridica5']['type'] . "',
                                    '" . $nombre_persona_juridica6 . "','" . $_FILES['persona_juridica5']['size'] . "','" . $_FILES['persona_juridica6']['type'] . "')";

                            if ($ProContador != 0) {
                                if (mysqli_query($conn_registro, $sqlcalificacion)) {
                                    $resultadocon = mysqli_query($conn_registro, $sql);

                                    echo "<script>
                                            Swal.fire({
                                            icon:  'success',
                                            title: 'Bien...',
                                            text:  'Datos Ingresados Correctamente!',
                                            footer: 'Ministerio de Defensa Nacional'
                                        }
                                            ).then(function() {
                                                window.location = '../vistas/productos_oferta.php';
                                            });
                                        </script>";
                                } else {
                                    echo "Error: " . $sqlcalificacion . "<br>" . mysqli_error($conn_registro);
                                }
                            }
                        } else {
                            echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'No se cargo correctamente el archivo',
                                footer: 'Ministerio de Defensa Nacional'
                            }
                                ).then(function() {
                                    window.location = '../vistas/postulante_principal.php';
                                });
                            </script>";
                        }
                    } else {
                        echo "<script>			
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            title: 'Solo se admiten formatos PDF',
                            footer: 'Ministerio de Defensa Nacional'
                        }
                    ).then(function() {
                        window.location('../vistas/postulante_principal.php');
                    });
                        </script>";
                    }
                }
            } else {
                echo "<script>			
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    title: 'Documentos Específicos no han sido cargados, intente nuevamente',
                    footer: 'Ministerio de Defensa Nacional'
                    }
                    ).then(function() {
                        window.location('../vistas/postulante_principal.php');
                    });
                    </script>";
            }
        }

        if (($id_razonsoc == '1') || ($id_razonsoc == '2')) {
            if ((!empty($_FILES["archivo"]["tmp_name"])) && !empty($_FILES["archivo1"]["tmp_name"]) && !empty($_FILES["archivo2"]["tmp_name"]) &&  !empty($_FILES["archivo3"]["tmp_name"]) &&  !empty($_FILES["archivo4"]["tmp_name"]) &&  !empty($_FILES["archivo5"]["tmp_name"]) &&  !empty($_FILES["archivo6"]["tmp_name"]) &&
                !empty($_FILES["persona_natural1"]["tmp_name"]) && !empty($_FILES["persona_natural2"]["tmp_name"]) && !empty($_FILES["persona_natural3"]["tmp_name"])
            ) {
                //validando tamaño del archivo
                $size = $_FILES["archivo"]["size"];
                $size1 = $_FILES["archivo1"]["size"];
                $size2 = $_FILES["archivo2"]["size"];
                $size3 = $_FILES["archivo3"]["size"];
                $size4 = $_FILES["archivo4"]["size"];
                $size5 = $_FILES["archivo5"]["size"];
                $size6 = $_FILES["archivo6"]["size"];

                $sizenatural1 = $_FILES["persona_natural1"]["size"];
                $sizenatural2 = $_FILES["persona_natural2"]["size"];
                $sizenatural3 = $_FILES["persona_natural3"]["size"];

                if (($size >= 69111362) && ($size1 >= 69111362) && ($size2 >= 69111362) && ($size3 >= 69111362) && ($size4 >= 69111362) && ($size5 >= 69111362) && ($size6 >= 69111362)
                    && ($sizenatural1 >= 69111362) && ($sizenatural2 >= 69111362) && ($sizenatural3 >= 69111362)
                ) {
                    echo "<script>			
                        Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'El formato debe de ser 1024kb',
                        showConfirmButton: false,
                        width: '500px',
                        timer: 2000
                        footer: 'Ministerio de Defensa Nacional'
                        });
                            </script>";
                } else {
                    //validar tipo de archivo
                    if (
                        in_array($_FILES["archivo"]["type"], $permitidos) &&  in_array($_FILES["archivo1"]["type"], $permitidos) &&  in_array($_FILES["archivo2"]["type"], $permitidos) &&  in_array($_FILES["archivo3"]["type"], $permitidos) &&  in_array($_FILES["archivo4"]["type"], $permitidos) && in_array($_FILES["archivo5"]["type"], $permitidos) && in_array($_FILES["archivo6"]["type"], $permitidos) &&
                        in_array($_FILES["persona_natural1"]["type"], $permitidos) && in_array($_FILES["persona_natural2"]["type"], $permitidos) && in_array($_FILES["persona_natural3"]["type"], $permitidos)
                    ) {
                        if (!file_exists($directorio)) {
                            mkdir($directorio, 0777, true) ;
                            // or die("No se puede crear el directorio de extracci&oacute;n");  -->
                        } 
                        // $dir=opendir($directorio); //Abrimos el directorio de destino
                        // se validó el archivo correctamente
                        if ((move_uploaded_file($_FILES["archivo"]["tmp_name"], $nombre_archivo)) && (move_uploaded_file($_FILES["archivo1"]["tmp_name"], $nombre_archivo1)) && (move_uploaded_file($_FILES["archivo2"]["tmp_name"], $nombre_archivo2)) && (move_uploaded_file($_FILES["archivo3"]["tmp_name"], $nombre_archivo3)) && (move_uploaded_file($_FILES["archivo4"]["tmp_name"], $nombre_archivo4)) && (move_uploaded_file($_FILES["archivo5"]["tmp_name"], $nombre_archivo5)) && (move_uploaded_file($_FILES["archivo6"]["tmp_name"], $nombre_archivo6))
                            && (move_uploaded_file($_FILES["persona_natural1"]["tmp_name"], $nombre_persona_natural1)) && (move_uploaded_file($_FILES["persona_natural2"]["tmp_name"], $nombre_persona_natural2) && (move_uploaded_file($_FILES["persona_natural3"]["tmp_name"], $nombre_persona_natural3)))
                        ) {


                            $sqlactualizar = "UPDATE usuario SET estado_calificacion='$calificacion' WHERE cedula_usuario='$cedula_postulante'";
                            $sqlproducto_oferta = mysqli_query($conn_registro, $sqlactualizar);


                            $query = "INSERT INTO telefonos_ecuador (cedulaPostulante_ecuador, usuarioId_ecuador,telefono_ecuador) VALUES ";
                            for ($i = 0; $i < $contador; $i++) {
                                if (!empty($_POST["telefecu_postulante"][$i])) {
                                    $ProContador++;
                                    if ($queryValue != "") {
                                        $queryValue .= ",";
                                    }
                                    $queryValue .= "('" . $cedula_postulante . "','" . $usuario_id . "','" . $_POST["telefecu_postulante"][$i] . "')";
                                }
                            }
                            $sql = $query . $queryValue;

                            $sqlcalificacion = "INSERT INTO postulante  (razonsoc_id, usuario_id, cedula_postulante, siglas_postulante, actividad_postulante, distribuidor_postulante, pais_postulante, provincia_postulante, ciudad_postulante, direcPrinOrig_postulante, direcSecOrig_postulante, direcNumOrig_postulante, direcPisoOrig_postulante, teleforig_postulante,extorig_postulante,direcPrinEcu_postulante,direcSecEcu_postulante,direcNumEcu_postulante,direcPisoEcu_postulante,extecu_postulante,paginaweb_postulante,
                                        constitucion_capital,estado_decurrente,estado_balance,
                                        nombre_legal,vigencia_legal,pais_legal,direccion_legal,ciudad_legal,telefono_legal,correo_legal,
                                        nombre_apoderado,vigencia_apoderado,direccion_apoderado,ciudad_apoderado,telefono_apoderado,correo_apoderado,
                                        ruta_solic_calif, tamaño_solic_calif, tipo_solic_calif,
                                        ruta_form_dat_gen,tamaño_form_dat_gen,tipo_form_dat_gen,
                                        ruta_acred_experiencia, tamaño_acred_experiencia, tipo_acred_experiencia,
                                        ruta_serv_conexos_oferta, tamaño_serv_conexos_oferta, tipo_serv_conexos_oferta,
                                        ruta_decla_juramentada, tamaño_decla_juramentada, tipo_decla_juramentada,
                                        ruta_est_situ_financiera, tamaño_est_situ_financiera, tipo_est_situ_financiera,
                                        ruta_poder_not, tamaño_poder_not, tipo_poder_not, 
                                        ruta_natural1, tamaño_natural1, tipo_natural1,
                                        ruta_natural2, tamaño_natural2, tipo_natural2,
                                        ruta_natural3, tamaño_natural3, tipo_natural3) VALUES 
                                        ('" . $id_razonsoc . "','" . $usuario_id . "','" . $cedula_postulante . "','" . $siglas_postulante . "','" . $actividad_postulante . "','" . $distribuidor_postulante . "','" . $pais_postulante . "','" . $provincia_postulante . "','" . $ciudad_postulante . "','" . $direcPrinOrig_postulante . "','" . $direcSecOrig_postulante . "','" . $direcNumOrig_postulante . "','" . $direcPisoOrig_postulante . "','" . $teleforig_postulante . "','" . $extorig_postulante . "','" . $direcPrinEcu_postulante . "','" . $direcSecEcu_postulante . "','" . $direcNumEcu_postulante . "','" . $direcPisoEcu_postulante . "','" . $extecu_postulante . "','" . $paginaweb_postulante . "',
                                        '" . $constitucion_capital . "','" . $estado_decurrente . "','" . $estado_balance . "',
                                        '" . $nombre_legal . "','" . $vigencia_legal . "','" . $pais_legal . "','" . $direccion_legal . "','" . $ciudad_legal . "','" . $telefono_legal . "','" . $correo_legal . "',
                                        '" . $nombre_apoderado . "','" . $vigencia_apoderado . "','" . $direccion_apoderado . "','" . $ciudad_apoderado . "','" . $telefono_apoderado . "','" . $correo_apoderado . "',
                                        '" . $nombre_archivo . "','" . $_FILES['archivo']['size'] . "','" . $_FILES['archivo']['type'] . "',
                                        '" . $nombre_archivo1 . "','" . $_FILES['archivo1']['size'] . "','" . $_FILES['archivo1']['type'] . "',
                                        '" . $nombre_archivo2 . "','" . $_FILES['archivo2']['size'] . "','" . $_FILES['archivo2']['type'] . "',
                                        '" . $nombre_archivo3 . "','" . $_FILES['archivo3']['size'] . "','" . $_FILES['archivo3']['type'] . "',
                                        '" . $nombre_archivo4 . "','" . $_FILES['archivo4']['size'] . "','" . $_FILES['archivo4']['type'] . "',
                                        '" . $nombre_archivo5 . "','" . $_FILES['archivo5']['size'] . "','" . $_FILES['archivo5']['type'] . "',
                                        '" . $nombre_archivo6 . "','" . $_FILES['archivo6']['size'] . "','" . $_FILES['archivo6']['type'] . "',
                                        '" . $nombre_persona_natural1 . "','" . $_FILES['persona_natural1']['size'] . "','" . $_FILES['persona_natural1']['type'] . "',
                                        '" . $nombre_persona_natural2 . "','" . $_FILES['persona_natural2']['size'] . "','" . $_FILES['persona_natural2']['type'] . "',
                                        '" . $nombre_persona_natural3 . "','" . $_FILES['persona_natural3']['size'] . "','" . $_FILES['persona_natural3']['type'] . "')";
                            if ($ProContador != 0) {
                                if (mysqli_query($conn_registro, $sqlcalificacion)) {
                                    $resultadocon = mysqli_query($conn_registro, $sql);
                                    echo "<script>
                                        Swal.fire({
                                        icon:  'success',
                                        title: 'Bien...',
                                        text:  'Datos Ingresados Correctamente!',
                                        footer: 'Ministerio de Defensa Nacional'
                                      }
                                        ).then(function() {
                                            window.location = '../vistas/productos_oferta.php';
                                        });
                                    </script>";
                                } else {
                                    echo "Error: " . $sqlcalificacion . "<br>" . mysqli_error($conn_registro);
                                }
                            }
                        } else {
                            echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'No se cargo correctamente el archivo',
                                    footer: 'Ministerio de Defensa Nacional'
                                    });
                                </script>";
                        }
                    } else {
                        echo "<script>			
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    title: 'Solo se admiten formatos PDF',
                                    footer: 'Ministerio de Defensa Nacional'
                            });
                                </script>";
                    }
                }
            } else {
                echo "<script>			
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        title: 'Documentos Específicos no han sido cargados, intente nuevamente',
                        footer: 'Ministerio de Defensa Nacional'
                    });
                    </script>";
            }
        }

        if (($id_razonsoc == '5') || ($id_razonsoc == '6')) {
            if ((!empty($_FILES["archivo"]["tmp_name"])) && !empty($_FILES["archivo1"]["tmp_name"]) && !empty($_FILES["archivo2"]["tmp_name"]) &&  !empty($_FILES["archivo3"]["tmp_name"]) &&  !empty($_FILES["archivo4"]["tmp_name"]) &&  !empty($_FILES["archivo5"]["tmp_name"]) &&  !empty($_FILES["archivo6"]["tmp_name"]) &&
                !empty($_FILES["persona_no_domic1"]["tmp_name"]) && !empty($_FILES["persona_no_domic2"]["tmp_name"]) && !empty($_FILES["persona_no_domic3"]["tmp_name"])
            ) {
                //validando tamaño del archivo
                $size = $_FILES["archivo"]["size"];
                $size1 = $_FILES["archivo1"]["size"];
                $size2 = $_FILES["archivo2"]["size"];
                $size3 = $_FILES["archivo3"]["size"];
                $size4 = $_FILES["archivo4"]["size"];
                $size5 = $_FILES["archivo5"]["size"];
                $size6 = $_FILES["archivo6"]["size"];

                $sizedomic1 = $_FILES["persona_no_domic1"]["size"];
                $sizedomic2 = $_FILES["persona_no_domic2"]["size"];
                $sizedomic3 = $_FILES["persona_no_domic3"]["size"];

                if (($size >= 69111362) && ($size1 >= 69111362) && ($size2 >= 69111362) && ($size3 >= 69111362) && ($size4 >= 69111362) && ($size5 >= 69111362) && ($size6 >= 69111362)
                    && ($sizedomic1 >= 69111362) && ($sizedomic2 >= 69111362) && ($sizedomic3 >= 69111362)
                ) {
                    echo "<script>			
                        Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        title: 'El formato debe de ser 70MB',
                        footer: 'Ministerio de Defensa Nacional'
                            }
                            ).then(function() {
                            window.location('../vistas/postulante_principal.php');
                        });
                            </script>";
                } else {
                    //validar tipo de archivo
                    if (
                        in_array($_FILES["archivo"]["type"], $permitidos) &&  in_array($_FILES["archivo1"]["type"], $permitidos) &&  in_array($_FILES["archivo2"]["type"], $permitidos) &&  in_array($_FILES["archivo3"]["type"], $permitidos) &&  in_array($_FILES["archivo4"]["type"], $permitidos) && in_array($_FILES["archivo5"]["type"], $permitidos) && in_array($_FILES["archivo6"]["type"], $permitidos) &&
                        in_array($_FILES["persona_no_domic1"]["type"], $permitidos) && in_array($_FILES["persona_no_domic2"]["type"], $permitidos) && in_array($_FILES["persona_no_domic3"]["type"], $permitidos)
                    ) {
                        if (!file_exists($directorio)) {
                            mkdir($directorio, 0777, true);
                        }
                        // se validó el archivo correctamente
                        if ((move_uploaded_file($_FILES["archivo"]["tmp_name"], $nombre_archivo)) && (move_uploaded_file($_FILES["archivo1"]["tmp_name"], $nombre_archivo1)) && (move_uploaded_file($_FILES["archivo2"]["tmp_name"], $nombre_archivo2)) && (move_uploaded_file($_FILES["archivo3"]["tmp_name"], $nombre_archivo3)) && (move_uploaded_file($_FILES["archivo4"]["tmp_name"], $nombre_archivo4)) && (move_uploaded_file($_FILES["archivo5"]["tmp_name"], $nombre_archivo5)) && (move_uploaded_file($_FILES["archivo6"]["tmp_name"], $nombre_archivo6))
                            && (move_uploaded_file($_FILES["persona_no_domic1"]["tmp_name"], $nombre_persona_domic1)) && (move_uploaded_file($_FILES["persona_no_domic2"]["tmp_name"], $nombre_persona_domic2) && (move_uploaded_file($_FILES["persona_no_domic3"]["tmp_name"], $nombre_persona_domic3)))
                        ) {

                            $sqlactualizar = "UPDATE usuario SET estado_calificacion='$calificacion' WHERE cedula_usuario='$cedula_postulante'";
                            $sqlproducto_oferta = mysqli_query($conn_registro, $sqlactualizar);

                            $query = "INSERT INTO telefonos_ecuador (cedulaPostulante_ecuador, usuarioId_ecuador,telefono_ecuador) VALUES ";
                            for ($i = 0; $i < $contador; $i++) {
                                if (!empty($_POST["telefecu_postulante"][$i])) {
                                    $ProContador++;
                                    if ($queryValue != "") {
                                        $queryValue .= ",";
                                    }
                                    $queryValue .= "('" . $cedula_postulante . "','" . $usuario_id . "','" . $_POST["telefecu_postulante"][$i] . "')";
                                }
                            }
                            $sql = $query . $queryValue;

                            $sqlcalificacion = "INSERT INTO postulante  (razonsoc_id, usuario_id,cedula_postulante, siglas_postulante, actividad_postulante, distribuidor_postulante, pais_postulante, provincia_postulante, ciudad_postulante, direcPrinOrig_postulante,direcSecOrig_postulante,direcNumOrig_postulante,direcPisoOrig_postulante, teleforig_postulante,extorig_postulante,direcPrinEcu_postulante,direcSecEcu_postulante,direcNumEcu_postulante,direcPisoEcu_postulante,extecu_postulante,paginaweb_postulante,
                                constitucion_capital,estado_decurrente,estado_balance,
                                nombre_legal,vigencia_legal,pais_legal,direccion_legal,ciudad_legal,telefono_legal,correo_legal,
                                nombre_apoderado,vigencia_apoderado,direccion_apoderado,ciudad_apoderado,telefono_apoderado,correo_apoderado,
                                ruta_solic_calif, tamaño_solic_calif, tipo_solic_calif,
                                ruta_form_dat_gen,tamaño_form_dat_gen,tipo_form_dat_gen,
                                ruta_acred_experiencia, tamaño_acred_experiencia, tipo_acred_experiencia,
                                ruta_serv_conexos_oferta, tamaño_serv_conexos_oferta, tipo_serv_conexos_oferta,
                                ruta_decla_juramentada, tamaño_decla_juramentada, tipo_decla_juramentada,
                                ruta_est_situ_financiera, tamaño_est_situ_financiera, tipo_est_situ_financiera,
                                ruta_poder_not, tamaño_poder_not, tipo_poder_not, 
                                ruta_domic1, tamaño_domic1, tipo_domic1,
                                ruta_domic2, tamaño_domic2, tipo_domic2,
                                ruta_domic3, tamaño_domic3, tipo_domic3) VALUES 
                                ('" . $id_razonsoc . "','" . $usuario_id . "','" . $cedula_postulante . "','" . $siglas_postulante . "','" . $actividad_postulante . "','" . $distribuidor_postulante . "','" . $pais_postulante . "','" . $provincia_postulante . "','" . $ciudad_postulante . "','" . $direcPrinOrig_postulante . "','" . $direcSecOrig_postulante . "','" . $direcNumOrig_postulante . "','" . $direcPisoOrig_postulante . "','" . $teleforig_postulante . "','" . $extorig_postulante . "','" . $direcPrinEcu_postulante . "','" . $direcSecEcu_postulante . "','" . $direcNumEcu_postulante . "','" . $direcPisoEcu_postulante . "','" . $extecu_postulante . "','" . $paginaweb_postulante . "',
                                '" . $constitucion_capital . "','" . $estado_decurrente . "','" . $estado_balance . "',
                                '" . $nombre_legal . "','" . $vigencia_legal . "','" . $pais_legal . "','" . $direccion_legal . "','" . $ciudad_legal . "','" . $telefono_legal . "','" . $correo_legal . "',
                                '" . $nombre_apoderado . "','" . $vigencia_apoderado . "','" . $direccion_apoderado . "','" . $ciudad_apoderado . "','" . $telefono_apoderado . "','" . $correo_apoderado . "',
                                '" . $nombre_archivo . "','" . $_FILES['archivo']['size'] . "','" . $_FILES['archivo']['type'] . "',
                                '" . $nombre_archivo1 . "','" . $_FILES['archivo1']['size'] . "','" . $_FILES['archivo1']['type'] . "',
                                '" . $nombre_archivo2 . "','" . $_FILES['archivo2']['size'] . "','" . $_FILES['archivo2']['type'] . "',
                                '" . $nombre_archivo3 . "','" . $_FILES['archivo3']['size'] . "','" . $_FILES['archivo3']['type'] . "',
                                '" . $nombre_archivo4 . "','" . $_FILES['archivo4']['size'] . "','" . $_FILES['archivo4']['type'] . "',
                                '" . $nombre_archivo5 . "','" . $_FILES['archivo5']['size'] . "','" . $_FILES['archivo5']['type'] . "',
                                '" . $nombre_archivo6 . "','" . $_FILES['archivo6']['size'] . "','" . $_FILES['archivo6']['type'] . "',
                                '" . $nombre_persona_domic1 . "','" . $_FILES['persona_no_domic1']['size'] . "','" . $_FILES['persona_no_domic1']['type'] . "',
                                '" . $nombre_persona_domic2 . "','" . $_FILES['persona_no_domic2']['size'] . "','" . $_FILES['persona_no_domic2']['type'] . "',
                                '" . $nombre_persona_domic3 . "','" . $_FILES['persona_no_domic3']['size'] . "','" . $_FILES['persona_no_domic3']['type'] . "')";
                            if ($ProContador != 0) {
                                if (mysqli_query($conn_registro, $sqlcalificacion)) {
                                    $resultadocon = mysqli_query($conn_registro, $sql);
                                    echo "<script>
                                        Swal.fire({
                                        icon:  'success',
                                        title: 'Bien...',
                                        text:  'Datos Ingresados Correctamente!',
                                        footer: 'Ministerio de Defensa Nacional'
                                    }
                                        ).then(function() {
                                            window.location = '../vistas/productos_oferta.php';
                                        });
                                    </script>";
                                } else {
                                    echo "Error: " . $sqlcalificacion . "<br>" . mysqli_error($conn_registro);
                                }
                            }
                        } else {
                            echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'No se cargo correctamente el archivo',
                                    footer: 'Ministerio de Defensa Nacional'
                                    });
                                </script>";
                        }
                    } else {
                        echo "<script>			
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    title: 'Solo se admiten formatos PDF',
                                    footer: 'Ministerio de Defensa Nacional'
                            });
                                </script>";
                    }
                }
            } else {
                echo "<script>			
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    title: 'Documentos Específicos no han sido cargados, intente nuevamente',
                    footer: 'Ministerio de Defensa Nacional'
                    });
                    </script>";
            }
        }
    }
}




// Cerramos la conexi�n
$conn_registro->close();
