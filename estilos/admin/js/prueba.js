//cargando los doctores al cargar por completo la pagina
document.addEventListener("DOMContenLoaded",function(e){
    e.preventDefault();
    //div donde se imprimiran los doctores
    var div = document.getElementById("mostrardocs");
    //variable con los doctores
    //tomando los doctores desde la base de datos
    fetch("<?php echo base_url() ?>doctores")
    .then(res=> res.json())
    .then(doctores=>{
        console.log(doctores);
        var docs=`<div class="row mb-3">`;
        for(i=0; i<doctores.length; i++){
            docs+=`<div class="col-lg-4">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
            <div class="card-header">${doctores[i].especialidad}</div>
            <div class="card-body">
            <h5 class="card-title">${doctores[i].nombre}</h5>
            <h5 class="card-title">${doctores[i].apellido}</h5>
           </div></div>
           </div></div>
            `;
        }
        docs+=`</div>`;
        div.innerHTML=docs;
    })
});
