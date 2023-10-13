const boton = document.querySelector('#nueva_contrasena');
boton.addEventListener('submit', aplicar);

function aplicar(e) {
    e.preventdefault();
    const valor = Document.querySelector('#new_password').value;
    const valor1 = Document.querySelector('#newv_password').value;
    if (valor === valor1) {
        Swal.fire({
            title: '${valor}',
            text: 'Contraseña actualizada',
            icon: 'Cambio de Contraseña',
            confirmbuttontext: 'CORRECTO'
        })
    } else {
        swal.fire({
            title: '${valor1}',
            text: 'Contraseña incorrecta',
            icon: 'Cambio de Contraseñas',
            confirmbuttontext: 'ERROR'
        })
    }
}


$("#salir").click(function(){
    alert ("desea salir?");
});