



//FUNCIONES VALIDAR SLO NUMEROS Y LETRAS
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

// FUNCIONES VALIDAR LETRAS Y CARACTERES ESPECIALES
		function valideKeyNombre(evt) {
			// el código es la representación ASCII decimal de la tecla presionada.
			var code = (evt.which) ? evt.which : evt.keyCode;
			if ((code == 32)) { // backspace.
				return true;
			} else if ((code >= 48 && code <= 57) || (code >= 97 && code <= 122) || (code >= 65 && code <= 90)) { // is a number.
				return true;
			} else { // other keys.
				return false;
			}

		}

// FUNCIONES VALIDAR EMAIL 
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

// PONER EL OJITO DE CERRAR EN EL PASSWORD PARA VER LA CONTRASEÑA
			function mostrarPassword() {
				var cambio = document.getElementById("password_postulante");
				if (cambio.type == "password") {
					cambio.type = "text";
					$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
					sleep(2);
				} else {
					cambio.type = "password";
					$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
				}
	
			}
			function mostrarPasswordv() {
				var cambio = document.getElementById("vpassword_postulante");
				if (cambio.type == "password") {
					cambio.type = "text";
					$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
				} else {
					cambio.type = "password";
					$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
				}
			}
	
// VALIDAR RECAPTCHA
			grecaptcha.ready(function() {
				grecaptcha.execute('6Lebs4khAAAAADag0NOZim3fdOBwzHs1izzlTaD2', {
						action: 'ejemplo'
					})
					.then(function(token) {
						var recaptchaResponse = document.getElementById('recaptchaResponse');
						recaptchaResponse.value = token;
					});
			});

		

const formulario = document.getElementById('registro_postulante');
const inputs = document.querySelectorAll('#registro_postulante input');

const expresiones = {
	nombre_postulante: /^[a-zA-Z0-9- ]{4,100}$/, // Letras, numeros, guion y guion_bajo
	ruc_postulante: /^[a-zA-Z0-9]{4,14}$/, // Letras y numeros.
	password_postulante: /^[a-zA-Z0-9_.+-]{8,16}$/, // 4 a 12 digitos.
	correo_postulante: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	//telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}

const campos = {
	nombre_postulante: false,
	ruc_postulante: false,
	password_postulante: false,
	correo_postulante: false,
	vpassword_postulante: false
	//telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}

const validarformulario = (e) =>{
	switch 	(e.target.name){
		case "nombre_postulante":
			validarcampo(expresiones.nombre_postulante, e.target, 'nombre_postulante');
		break;
		case "ruc_postulante":
			validarcampo(expresiones.ruc_postulante, e.target, 'ruc_postulante');	
		break;
		case "correo_postulante":
			validarcampo(expresiones.correo_postulante, e.target, 'correo_postulante');
		break;
		case "password_postulante":
			validarcampo(expresiones.password_postulante, e.target, 'password_postulante');
			validarVpassword();
		break;
		case "vpassword_postulante":
			validarVpassword();
		break;
	}
	
}

const validarcampo = (expresion, input, campo) => {
	if (expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i` ).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} i` ).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo]=true;
	}else{
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i` ).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} i` ).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo]=false;
	}
}


const validarVpassword = () =>{
	const inputPassword = document.getElementById('password_postulante');
	const inputVpassword = document.getElementById('vpassword_postulante');
	if( inputPassword.value !== inputVpassword.value){
		document.getElementById('grupo__vpassword_postulante').classList.add('formulario__grupo-incorrecto');
		document.getElementById('grupo__vpassword_postulante').classList.remove('formulario__grupo-correcto');
		document.querySelector('#grupo__vpassword_postulante i').classList.remove('fa-check-circle');
		document.querySelector('#grupo__vpassword_postulante i' ).classList.add('fa-times-circle');
		document.querySelector('#grupo__vpassword_postulante .formulario__input-error').classList.add('formulario__input-error-activo');
		campos['Password']=false;
	}else{
		document.getElementById('grupo__vpassword_postulante').classList.remove('formulario__grupo-incorrecto');
		document.getElementById('grupo__vpassword_postulante').classList.add('formulario__grupo-correcto');
		document.querySelector('#grupo__vpassword_postulante i' ).classList.remove('fa-times-circle');
		document.querySelector('#grupo__vpassword_postulante i' ).classList.add('fa-check-circle');
		document.querySelector('#grupo__vpassword_postulante .formulario__input-error').classList.remove('formulario__input-error-activo');
		campos['vPassword']= true;
	}

}


inputs.forEach((input)=>{
	input.addEventListener('keyup',validarformulario);
	input.addEventListener('blur',validarformulario);


});

///  INPUT TIPO FILE
const create = str => document.createElement(str);
const files = document.querySelectorAll('.fancy-file');
Array.from(files).forEach(
    f => {
        const label = create('label');
        const span_text = create('span');
        const span_name =create('span');
        const span_button = create('span');

        label.htmlFor = f.id;

        span_text.className = 'fancy-file__fancy-file-name';
        span_button.className = 'fancy-file__fancy-file-button';

        span_name.innerHTML = f.dataset.empty || 'Ningun archivo seleccionado';
        span_button.innerHTML = f.dataset.button || 'Buscar';

        label.appendChild(span_text);
        label.appendChild(span_button);
        span_text.appendChild(span_name);
        f.parentNode.appendChild(label);

        span_name.style.width = (span_text.clientWidth - 20)+'px';

        f.addEventListener('change', e => {
            if( f.files.length == 0 ){
                span_name.innerHTML = f.dataset.empty ||'Ningún archivo seleccionado';
            }else if( f.files.length > 1 ){
                span_name.innerHTML = f.files.length + ' archivos seleccionados';
            }else{
                span_name.innerHTML = f.files[0].name;
            }
        } );   
    }
);






