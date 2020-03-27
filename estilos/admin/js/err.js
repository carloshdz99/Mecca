//validando errores
var form = document.getElementById('form');
//evento que validara que halla errores
form.addEventListener('submit',tomandoErrores);
function tomandoErrores(e){
    var form = document.getElementById('form');
    //tomando datos del formularo
    var data = new FormData(form);
    console.log(data.get('nom'));
    //fetch api para recibir los errores
    fetch("Usuarios/Registrar",{
        method: 'POST',
        body: data
     }).then(res=>res.json())
     .then(dat=>{
         console.log(dat);
     })

    e.preventDefault();
}