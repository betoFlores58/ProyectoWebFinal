<?php
include_once ("conexion.php");

$email = $_POST["email"];
$username = $_POST["username"];
$pwd = $_POST["pwd"];

$insertar = "INSERT INTO users(email,username,pwd,privilegio) VALUES ('$email','$username','$pwd',2)";

$resultado = mysqli_query($conexion,$insertar);
if ($resultado) {
    echo "<script>alert('SE HA REGISTRADO EL USUARIO CON EXITO');
    window.location='Login_v3/login.php'</script>";
}else {
    echo "<script>alert('Error al registrar');</script>";
}
?>