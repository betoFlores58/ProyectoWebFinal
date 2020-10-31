<?php
session_start();

$mensaje="";

if (isset($_POST['btnAccion'])) {
    switch ($_POST['btnAccion']) {
        case 'Agregar':
            if (is_numeric(openssl_decrypt($_POST['id'],COD,KEY))) {
             $id= openssl_decrypt($_POST['id'], COD, KEY); 
             $mensaje.="Ok ID Correcto".$id."<br>";
            }else {
            $mensaje.= "Upps... ID Incorrecto". $id . "<br>";
            }
            if (is_string(openssl_decrypt($_POST['nombre'], COD, KEY))) {
                $nombre= openssl_decrypt($_POST['nombre'], COD, KEY);
                $mensaje .= "Ok Nombre Correcto" . $nombre . "<br>";
            } else { $mensaje.= "Upps... algo pasa con el nombre" . $nombre . "<br>"; break;}
            if (is_numeric(openssl_decrypt($_POST['cantidad'], COD, KEY))) {
                $cantidad = openssl_decrypt($_POST['cantidad'], COD, KEY);
                $mensaje .= "Ok Cantidad Correcto" . $cantidad . "<br>";
            } else { $mensaje.= "Upps... algo pasa con la cantidad" . $cantidad . "<br>"; break;}
            if (is_numeric(openssl_decrypt($_POST['precio'], COD, KEY))) {
                $precio = openssl_decrypt($_POST['precio'], COD, KEY);
                $mensaje.= "Ok Precio Correcto" . $precio . "<br>";
            } else {
                $mensaje.= "Upps... algo pasa con el precio" . $precio . "<br>";
            break;
            }
        if (!isset($_SESSION['carrito'])) {
            $producto=array(
                'id'=>$id,
                    'nombre' => $nombre,
                    'cantidad' => $cantidad,
                    'precio' => $precio
            );
            $_SESSION['carrito'][0]=$producto;
            $mensaje = "Producto agregado al carrito";

        }else {
            $idProductos=array_column($_SESSION['carrito'],"id");

            if (in_array($id,$idProductos)) {
                echo "<script>alert('El producto ya ha sido seleccionado');</script>";
                $mensaje="";
            }else {
                
            $numProductos=count($_SESSION['carrito']);
                $producto = array(
                    'id' => $id,
                    'nombre' => $nombre,
                    'cantidad' => $cantidad,
                    'precio' => $precio
                );
                $_SESSION['carrito'][$numProductos] = $producto;
                $mensaje = "Producto agregado al carrito";
        }
    }
            break;
        
        case "Eliminar":
            if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
                $id = openssl_decrypt($_POST['id'], COD, KEY);
                foreach ($_SESSION['carrito'] as $indice => $producto) {
                    if ($producto['id']==$id) {
                        unset($_SESSION['carrito'][$indice]);
                        echo "<script>alert('Elemento borrado...');</script>";
                    }
                }
            } else {
                $mensaje .= "Upps... ID Incorrecto" . $id . "<br>";
            }
        break;
    }
}
?>