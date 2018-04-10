$(function(){
    $("#buscar").click(function(evento){
        var ok1 = true;
        var ok2 = true;
        if($("#nombreCliente").val() < 1){
            $("#nombreCliente").css("border-color", "red");
            ok1 = false;
        }else{
            $("#nombreCliente").css("border-color", "green");
        }
        if($("#dni").val().length >= 9){
            ok2 = false;
            var cadena = "TRWAGMYFPDXBNJZSQVHLCKE";
            var numeros = parseInt($("#dni").val().substr(0, 8));
            var letraCorrecta = cadena.charAt(numeros % 23).toString();
            var letra = $("#dni").val().substr(8, 9);
            if(letraCorrecta == letra){
                ok2 = true;
                $("#nombreCliente").css("border-color", "green");
            }else{
                alert("Tu dni no es correcto, vuelve a intentarlo");
                $("#dni").css("border-color", "red");
            }
            
        }else{
            $("#dni").css("border-color", "red");
        }
        if(ok1 && ok2){
            $("#formularioCliente").submit();
        }else{
            evento.preventDefault();
        }
    });
});