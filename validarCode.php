<?php
ob_start();
?>
<?php

include ('usuarioControlador.php');

session_start();

header('Content-type: application/json');

$resul = array();

if (isset($_POST["email"]) && isset($_POST["pwd"])) {

    $txtEmail=$_POST["email"];
    $txtPwd=$_POST["pwd"];

    $resul=array("estado"=>"true");

 if(UsuarioControlador::login($txtEmail,$txtPwd)){
    $usuario = UsuarioControlador::getUsuario($txtEmail,$txtPwd);
    $_SESSION["usuario"] = array(
        "id"=>$usuario->getId(),
        "username"=>$usuario->getUsername(),
        "email"=>$usuario->getEmail(),
        "privilegio"=>$usuario->getPrivilegio());
        
        return print(json_encode($resul));
 }
}

$resul=array("estado"=>"false");
return print(json_encode($resul));
?>


<?php
ob_end_flush();
?>