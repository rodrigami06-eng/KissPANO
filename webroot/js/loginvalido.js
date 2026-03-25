
const correo = document.getElementById('email');
const contra =  document.getElementById('contrasenia');
const expresionEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-0.-]+\.[a-zA-Z]{2,5}$/;

correo.addEventListener('blur', function(e){
    console.log('Dejaste Correo');
    if(!expresionEmail.test(correo.value)){
        
        document.getElementById('msj-correo').innerHTML = 'Correo Invalido';
        
    } else {
        document.getElementById('msj-correo').innerHTML = '';
    }
});

contra.addEventListener('blur', function(){
    console.log('Dejaste Contraseña');
    if(contra.value == ''){
        document.getElementById('msj-contra').innerHTML = '*Campo Obligatorio'
    }
});

contra.addEventListener('keyup', function(e){
    document.getElementById('msj-contra').innerHTML = ''
});