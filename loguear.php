
<?php
ob_start();
?>
<?php
require ('conexion.php');
//session_start();

$username = $_POST['username'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$admin = $_POST['admin'];

$q = "SELECT COUNT(*) as contar from users where ((email = '$email') and (pwd = '$pwd')) ";
$ad = "SELECT COUNT(*) as ad from users where admin = '$admin'";
$consulta = mysqli_query($conexion,$q);
$consulta1 = mysqli_query($conexion,$ad);
$array = mysqli_fetch_array($consulta);
$adm = mysqli_fetch_array($consulta1);


if ($array['contar']<0 && 'admin'==1) {
    $_SESSION['email']=$email;
    header("location: admin.php");
    session_start();

}else if ($array['contar']>0 ) {
    $_SESSION['email']=$email;
    header("location: Slider Jquery/index.php");
    session_start();

}else {
    echo "DATOS ERRONEOS";
}

/*
switch ($array['contar']) {
    case 1:
    if ($array['contar']>0 && $admin === 1) {
    $_SESSION['username']=$username;
    header("location: admin.php");
}
        break;
    case 2:
    if ($array['contar']>0) {
    $_SESSION['username']=$username;
    header("location: Slider%Jquery/index.php");
}
        break;
    default:
        echo "DATOS ERRONEOS";
        break;
}
*/

?>
<?php
ob_end_flush();
?>