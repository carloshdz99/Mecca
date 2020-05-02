//quitando alertas generadas
function quitar(){
    setTimeout(function(e){
        document.querySelector('.alert').remove();
        e.preventDefault();
    },3000)
}
quitar();

