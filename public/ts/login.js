$(document).ready(function () {
    $("#dni")
        .focusout(function () {
        var dni = $("#dni").val().toString();
        validarDNI(dni);
    });
    $("#email")
        .focusout(function () {
        var email = $("#email").val().toString();
        validarEmail(email);
    });
    $("#nombre")
        .focusout(function () {
        var nombre = $("#nombre").val().toString();
        if (nombre == "") {
            $("#nombre").css("border-color", "red");
        }
        else if (validarNoBlanco(nombre)) {
            $("#nombre").css("border-color", "red");
        }
        else {
            validarNombre(nombre);
        }
    });
    $("#apellido")
        .focusout(function () {
        var apellido = $("#apellido").val().toString();
        if (apellido == "") {
            $("#apellido").css("border-color", "red");
        }
        else if (validarNoBlanco(apellido)) {
            $("#apellido").css("border-color", "red");
        }
        else {
            validarApellido(apellido);
        }
    });
    $("#password")
        .focusout(function () {
        var password = $("#password").val().toString();
        if (password == "") {
            $("#password").css("border-color", "red");
        }
        else if (validarNoBlanco(password)) {
            $("#password").css("border-color", "red");
        }
        else {
            validarContrasena(password);
        }
    });
    $("#password2")
        .focusout(function () {
        var password = $("#password").val().toString();
        var password2 = $("#password2").val().toString();
        if (password2 == "") {
            $("#password2").css("border-color", "red");
        }
        else if (validarNoBlanco(password2)) {
            $("#password2").css("border-color", "red");
        }
        else {
            validarRepetirContrasena(password, password2);
        }
    });
    $("#form-address")
        .focusout(function () {
        var direccion = $("#form-address").val().toString();
        if (direccion == "") {
            $("#form-address").css("border-color", "red");
        }
        else {
            $("#form-address").css("border-color", "green");
        }
    });
    $("#portal")
        .focusout(function () {
        var portal = $("#portal").val().toString();
        validarPortal(portal);
    });
    $("#piso")
        .focusout(function () {
        var piso = $("#piso").val().toString();
        validarPiso(piso);
    });
    $("#mano")
        .focusout(function () {
        var mano = $("#mano").val().toString();
        if (mano == null) {
            $("#mano").css("border-color", "red");
        }
        else {
            $("#mano").css("border-color", "green");
        }
    });
    $("#ntel")
        .focusout(function () {
        var tlf = $("#ntel").val().toString();
        validarTlf(tlf);
    });
});
// Validaciones
function validarNombre(nombre) {
    var regex = new RegExp("^(([a-zA-Z ])?[a-zA-Z]*){1,3}$");
    if (!regex.test(nombre)) {
        $("#nombre").css("border-color", "red");
    }
    else {
        $("#nombre").css("border-color", "green");
        return true;
    }
}
function validarApellido(apellido) {
    var regex = new RegExp("^(([a-zA-Z ])?[a-zA-Z]*){1,4}$");
    if (!regex.test(apellido)) {
        $("#apellido").css("border-color", "red");
    }
    else {
        $("#apellido").css("border-color", "green");
        return true;
    }
}
function validarEmail(email) {
    var regex = new RegExp("^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$");
    if (!regex.test(email)) {
        $("#email").css("border-color", "red");
    }
    else {
        $("#email").css("border-color", "green");
        return true;
    }
}
function validarDNI(dni) {
    var regex = new RegExp("^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]{1}$");
    var letrasValidas = 'TRWAGMYFPDXBNJZSQVHLCKET';
    var charIndex = parseInt(dni.substr(0, 8)) % 23;
    var letra = dni.toString().toUpperCase().substr(-1);
    if (dni.length != 9) {
        $("#dni").css("border-color", "red");
    }
    else if (!regex.test(dni)) {
        $("#dni").css("border-color", "red");
    }
    else if (letrasValidas.charAt(charIndex) != letra) {
        $("#dni").css("border-color", "red");
    }
    else {
        $("#dni").css("border-color", "green");
        return true;
    }
}
function validarContrasena(contrasena) {
    var regex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%&?¿!¡._-]).{8,64}$");
    if (regex.test(contrasena)) {
        $("#password").css("border-color", "green");
        return true;
    }
    else {
        throw "La contraseña debe contener 8 o más caracteres, una mayuscula, una minuscula, un numero y un caracter especial (@#$%&?¿!¡._-)";
        $("#password").css("border-color", "red");
    }
}
function validarRepetirContrasena(contraseña, contraseña2) {
    if (contraseña != contraseña2) {
        $("#password2").css("border-color", "red");
        throw "Las contraseñas no coinciden";
    }
    else {
        $("#password2").css("border-color", "green");
        return true;
    }
}
function validarPortal(texto) {
    var regex = new RegExp("^(([0-9]){1,2}[a-zA-Z]?)$");
    if (!regex.test(texto)) {
        $("#portal").css("border-color", "red");
    }
    else {
        $("#portal").css("border-color", "green");
        return true;
    }
}
function validarPiso(texto) {
    var regex = new RegExp("^([0-9]){1,3}$");
    if (!regex.test(texto)) {
        $("#piso").css("border-color", "red");
    }
    else {
        $("#piso").css("border-color", "green");
        return true;
    }
}
function validarTlf(tlf) {
    var regex = new RegExp("^((6|7|8|9)[-]*([0-9][-]*){8})$");
    if (!regex.test(String(tlf))) {
        $("#ntel").css("border-color", "red");
    }
    else {
        $("#ntel").css("border-color", "green");
        return true;
    }
}
function validarNoBlanco(texto) {
    if (/^\s+|\s+$/.test(texto)) {
        return true;
    }
    else {
        return false;
    }
}
//Registrarse
function validarForm() {
    try {
        //Recogemos los datos introducidos por el usuario
        var nombre = $("#nombre").val().toString();
        var apellido = $("#apellido").val().toString();
        var dni = $("#dni").val().toString();
        var email = $("#email").val().toString();
        var password1 = $("#password").val().toString();
        var password2 = $("#password2").val().toString();
        var portal = $("#portal").val().toString();
        var piso = $("#piso").val().toString();
        //llamamos a los metodos que validan los campos
        validarDNI(dni);
        validarEmail(email);
        validarNombre(nombre);
        validarApellido(apellido);
        validarRepetirContrasena(password1, password2);
        validarPortal(portal);
        validarPiso(piso);
        return true;
    }
    catch (error) {
        alert(error);
        return false;
    }
}
