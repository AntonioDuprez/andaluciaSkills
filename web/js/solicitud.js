$(function(){
    $("#solicitud").click(function(){
        if($("#direccion").val().length > 0){
            $("#formularioSolicitud").css("display", "none");
            $("#solicitudEspera").css("display", "flex");
            
        }else{
            $("#direccion").css("border-color", "red");
        }
    });
});