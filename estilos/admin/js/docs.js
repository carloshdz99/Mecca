//quitando las alertas pasado 3 minutos despues de cargar toda la pagina
document.addEventListener('DOMContentLoaded',quitar);
function quitar(){
    setTimeout(function(){
        document.querySelector('.alert').remove();
    },3000)
}
