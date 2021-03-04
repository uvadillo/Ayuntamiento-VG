"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
var $ = require("jquery");
$(document).ready(function () {
});
// Validaciones
function validarNombre(nombre) {
    var regex = new RegExp("^(([a-zA-Z ])?[a-zA-Z]*){1,3}$");
    if (!regex.test(nombre)) {
        throw "El nombre tiene un formato incorrecto";
    }
    else {
        return true;
    }
}
function validarApellido(apellido) {
    var regex = new RegExp("^(([a-zA-Z ])?[a-zA-Z]*){1,4}$");
    if (!regex.test(apellido)) {
        throw "El apellido tiene un formato incorrecto";
    }
    else {
        return true;
    }
}
function validarEmail(email) {
    var regex = new RegExp("^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$");
    if (!regex.test(email)) {
        throw "El email tiene un formato incorrecto";
    }
    else {
        return true;
    }
}
function validarDNI(dni) {
    var regex = new RegExp("^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]{1}$");
    var letrasValidas = 'TRWAGMYFPDXBNJZSQVHLCKET';
    var charIndex = parseInt(dni.substr(0, 8)) % 23;
    var letra = dni.toString().toUpperCase().substr(-1);
    if (dni.length != 9) {
        throw "El dni tiene que tener 9 valores";
    }
    else if (!regex.test(dni)) {
        throw "El dni tiene un formato incorrecto";
    }
    else if (letrasValidas.charAt(charIndex) != letra) {
        throw "La dni introducido no es valido";
    }
    else {
        return true;
    }
}
function validarContraseña(contraseña, contraseña2) {
    var regex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%&?¿!¡._-]).{8,64}$");
    if (regex.test(contraseña)) {
        if (contraseña != contraseña2) {
            throw "Las contraseñas no coinciden";
        }
        else {
            return true;
        }
    }
    else {
        throw "La contraseña debe contener 8 caracteres, una mayuscula, una minuscula, un numero y un caracter especial (@#$%&?¿!¡._-)";
    }
}
function validarForm() {
    try {
        //signUp
        //llamamos a los metodos que validan los campos
        validarDNI($(".dni").val());
        validarContraseña($(".password").eq(1).val(), $("#password2").val());
        validarNombre($("#nombre").val());
        validarApellido($("#apellido").val());
        validarEmail($("#email").val());
        return true;
    }
    catch (error) {
        alert(error);
        return false;
    }
}
