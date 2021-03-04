
$(document).ready(function () {
    //validacion trabajadores
    $( "#dni" )
        .focusout(function() {
            let dni: string = $("#dni").val().toString();
            validarDNI(dni);
        })

    $( "#nombre" )
        .focusout(function() {
            let nombre: string = $("#nombre").val().toString();
            if (nombre == "") {
                $("#nombre").css("border-color", "red");
            } else if (validarNoBlanco(nombre)) {
                $("#nombre").css("border-color", "red");
            } else {
                validarNombre(nombre);
            }
        })

    $( "#apellido" )
        .focusout(function() {
            let apellido: string = $("#apellido").val().toString();
            if (apellido == "") {
                $("#apellido").css("border-color", "red");
            }else if (validarNoBlanco(apellido)){
                $("#apellido").css("border-color", "red");

            }else{
                validarApellido(apellido);
            }
        })
    $( "#password")
        .focusout(function() {
            let password: string = $("#password").val().toString();
            if (password == "" ) {
                $("#password").css("border-color", "red");
            } else if (validarNoBlanco(password)) {
                $("#password").css("border-color", "red");
            } else {
                validarContraseña(password);
            }
        })
    $( "#tipoUsuario" )
        .focusout(function() {
            let tipoUsuario: string = $("#tipoUsuario").val().toString();
            if (tipoUsuario==null){
                $("#tipoUsuario").css("border-color", "red");
            }else{
                $("#tipoUsuario").css("border-color", "green");
            }
        })
    //validaciones obra
    $( "#address-input" )
        .focusout(function() {
            let direccion: string = $("#address-input").val().toString();
            if (direccion==""){
                $("#address-input").css("border-color", "red");
            }else{
                $("#address-input").css("border-color", "green");
            }
        })
    $( "#num" )
        .focusout(function() {
            let portal: string = $("#num").val().toString();
            validarPortal(portal);
        })
    $( "#piso" )
        .focusout(function() {
            let piso: string = $("#piso").val().toString();
            validarPiso(piso);
        })
    $( "#mano" )
        .focusout(function() {
            let mano: string = $("#mano").val().toString();
            if (mano==null){
                $("#mano").css("border-color", "red");
            }else{
                $("#mano").css("border-color", "green");
            }
        })
    $( "#tipoEdificio" )
        .focusout(function() {
            let tipoEdificio: string = $("#tipoEdificio").val().toString();
            if (tipoEdificio==null){
                $("#tipoEdificio").css("border-color", "red");
            }else{
                $("#tipoEdificio").css("border-color", "green");
            }
        })
    $( "#tipoObra" )
        .focusout(function() {
            let tipoObra: string = $("#tipoObra").val().toString();
            if (tipoObra==null){
                $("#tipoObra").css("border-color", "red");
            }else{
                $("#tipoObra").css("border-color", "green");
            }
        })


});
// Validaciones Regex
function validarNombre(nombre:string):boolean{
    var regex = new RegExp("^(([a-zA-Z ])?[a-zA-Z]*){1,3}$");
    if(!regex.test(nombre)){
        $("#nombre").css("border-color", "red");
    }else{
        $("#nombre").css("border-color", "green");
        return true;
    }
}
function validarApellido(apellido:string):boolean{
    var regex = new RegExp("^(([a-zA-Z ])?[a-zA-Z]*){1,4}$");
    if(!regex.test(apellido)){
        $("#apellido").css("border-color", "red");
    }else{
        $("#apellido").css("border-color", "green");
        return true;
    }
}

function validarDNI(dni:string):boolean{
    var regex= new RegExp("^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]{1}$");
    var letrasValidas:string = 'TRWAGMYFPDXBNJZSQVHLCKET';
    var charIndex:number= parseInt(dni.substr(0, 8)) % 23;
    var letra = dni.toString().toUpperCase().substr(-1);

    if(dni.length!=9){
        $("#dni").css("border-color", "red");
    }else if (!regex.test(dni)){
        $("#dni").css("border-color", "red");
    }else if(letrasValidas.charAt(charIndex) != letra) {
        $("#dni").css("border-color", "red");
    }else{
        $("#dni").css("border-color", "green");
        return true;
    }
}
function validarContraseña(contraseña):boolean{
    var regex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%&?¿!¡._-]).{8,64}$");
    if (regex.test(contraseña)) {
        $("#password").css("border-color", "green");
        return true;
    } else {
            $("#password").css("border-color", "red");
    }
}

function validarPortal(texto:string):boolean{
    var regex = new RegExp("^(([0-9]){1,2}[a-zA-Z]?)$");
    if (!regex.test(texto)){
        $("#num").css("border-color", "red");
    }else{
        $("#num").css("border-color", "green");
        return true;
    }
}
function validarPiso(texto:string):boolean{
    var regex = new RegExp("^([0-9]){1,3}$");
    if (!regex.test(texto)){
        $("#piso").css("border-color", "red");
    }else{
        $("#piso").css("border-color", "green");
        return true;
    }
}

function validarNoBlanco(texto:string):boolean {
    if(/^\s+|\s+$/.test(texto)) {
        return true;
    } else {
        return false;
    }
}
