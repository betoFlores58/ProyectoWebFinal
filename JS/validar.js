function validar() {
    var username, email, pwd;
    username = document.getElementById("username").value;
    email = document.getElementById("email").value;
    pwd = document.getElementById("pwd").value;

    var expresionCorreo = /\w+@\w+\.+[a-z]/;
    var expresionTel = /[\(]?[\+]?(\d{2}|\d{3})[\)]?[\s]?((\d{6}|\d{8})|(\d{3}[\*\.\-\s]){3}|(\d{2}[\*\.\-\s]){4}|(\d{4}[\*\.\-\s]){2})|\d{8}|\d{10}|\d{12}/;

    if (username === "") {
        alert("CAMPO UserName ESTA VACÍO");
        return false;
    } else if (email === "") {
        alert("CAMPO Email ESTA VACÍO");
        return false;
    } else if (pwd === "") {
        alert("CAMPO Password ESTA VACÍO");
        return false;
    } else if (username.lenght > 16) {
        alert("Nombre de usuario muy largo");
        return false;
    } else if (email.lenght > 50) {
        alert("Correo es muy largo");
        return false;
    } else if (!expresionCorreo.test(email)) {
        alert("El correo ingresado no es valido");
        return false;
    }
};
function validar1() {
    
    var email, pwd;
    email = document.getElementById("email").value;
    pwd = document.getElementById("pwd").value;

    var expresionCorreo = /\w+@\w+\.+[a-z]/;
    var expresionTel = /[\(]?[\+]?(\d{2}|\d{3})[\)]?[\s]?((\d{6}|\d{8})|(\d{3}[\*\.\-\s]){3}|(\d{2}[\*\.\-\s]){4}|(\d{4}[\*\.\-\s]){2})|\d{8}|\d{10}|\d{12}/;

    if (email === "") {
        alert("CAMPO Email ESTA VACÍO");
        return false;
    } else if (pwd === "") {
        alert("CAMPO Password ESTA VACÍO");
        return false;
    } else if (email.lenght > 50) {
        alert("Correo es muy largo");
        return false;
    } else if (!expresionCorreo.test(email)) {
        alert("El correo ingresado no es valido");
        return false;
    }
};
