function procesarDatosFormulario() {
    // Parar el comportamiento normal de submit
    event.preventDefault();

    // Enviar datos a submitform.php
    const datos = enviarDatosFormulario();

    // mostrarlos en pantalla
    mostrarDatos(datos);
}

function enviarDatosFormulario(){
    // tomar los datos en forma de objeto y enviarlos a través del ajax
    const myForm = document.getElementById('myForm');
    const formData = new FormData(myForm);
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "submitform.php");
    xhr.send(formData);
    return xhr;
}

function mostrarDatos(xhr){
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            const response = JSON.parse(xhr.response);
            const datosRecogidos = document.getElementById('datosRecogidos');
            datosRecogidos.innerHTML = response.username + '<br/>'+response.useracc;
        }
    }
}
