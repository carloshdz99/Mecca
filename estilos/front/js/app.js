$(function(){
prueba();
    function prueba(){
        $.ajax({
            url:'<?php echo base_url() ?>webfront/doctores',
            async: false,
            datatype: 'json',
            type='post',
            success:function(data){
                console.log(data);
            },
            error: function(){
                alert("no se ha recibido respuesta");
            }
        })
    }
})