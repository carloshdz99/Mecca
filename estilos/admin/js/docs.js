var form = document.getElementById('form');
form.addEventListener('submit',validar);

function validar(e){
    datos = new FormData(form);
    console.log(datos.get('nom'));
    fetch('Doctores/Registrar',{
        method: 'post',
        body: datos
    })
    .then(res=> res.json())
    .then(res=>{
        console.log(res);
    })
    e.preventDefault();
}