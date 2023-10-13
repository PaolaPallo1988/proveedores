
        function valideKey(evt) {
            // code is the decimal ASCII representation of the pressed key.
            var code = (evt.which) ? evt.which : evt.keyCode;
            if (code == 8) { // backspace.
                return true;
            } else if (code >= 48 && code <= 57) { // is a number.
                return true;
            } else { // other keys.
                return false;
            }
        }

 // FUNCIONES VALIDAR SLO NUMEROS Y LETRAS -->
        function valideKeyLetras(evt) {
            // el código es la representación ASCII decimal de la tecla presionada.
            var code = (evt.which) ? evt.which : evt.keyCode;
            if (code == 32) { // backspace.
                return true;
            } else if ((code >= 65 && code <= 90) || (code >= 97 && code <= 122)) { // is a number.
                return true;
            } else { // other keys.
                return false;
            }
        }

   // FUNCIONES VALIDAR EMAIL -->

        function valideKeyEmail(evt) {
            // el código es la representación ASCII decimal de la tecla presionada.
            var code = (evt.which) ? evt.which : evt.keyCode;
            if ((code == 46) || (code == 64) || (code == 95) || (code == 45)) { // backspace.
                return true;
            } else if ((code >= 48 && code <= 57) || (code >= 97 && code <= 122) || (code >= 65 && code <= 90)) { // is a number.
                return true;
            } else { // other keys.
                return false;
            }
        }

 // VER EL PASSWORD OCULTO -->
        function mostrarPassword() {
            var cambio = document.getElementById("password_usuario");
            if (cambio.type == "password") {
                cambio.type = "text";
                $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            } else {
                cambio.type = "password";
                $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }
        }
 // BUSCAR EN UN TABLA DE JQUERY DATABASE -->
        $(document).ready(function() {
            var table = $('#example').DataTable();
            // $('#example tbody').on('click', 'tr', function() {
                var data = table.row(this).data();
                // alert('You clicked on ' + data[0] + "'s row");
            // });
        });

