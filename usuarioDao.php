<?php

include ('conexion.php');
include ('usuario.php');

class UsuarioDao extends Conexion{

    protected static $cnx;
    public static function getConexion()
    {
        self::$cnx=Conexion::conectar();
    }
    public static function desconectar()
    {
        self::$cnx=null;
    }
    public static function login($usuario)
    {
        $query="SELECT * from users WHERE email = :email AND pwd = :pwd";

        self::getConexion();

        $usuarioo=$usuario->getEmail();
        $pass=$usuario->getPwd();

        $resul=self::$cnx->prepare($query);
        $resul->bindParam(":email",$usuarioo);
        $resul->bindParam(":pwd",$pass);

        $resul->execute();

        if ($resul->rowCount()>0) {
            $filas=$resul->fetch();
            if ($filas['email']==$usuario->getEmail() && $filas['pwd']==$usuario->getPwd()){
            return true;
            }
        }
    return false;

    }

    public static function getUsuario($usuario)
    {
        $query="SELECT id,email,username,privilegio from users WHERE email = :email AND pwd = :pwd";

        self::getConexion();

        $usuarioo=$usuario->getEmail();
        $pass=$usuario->getPwd();

        $resul=self::$cnx->prepare($query);
        $resul->bindParam(":email",$usuarioo);
        $resul->bindParam(":pwd",$pass);

        $resul->execute();
        $filas=$resul->fetch();

        $usuario=new Usuario();
        $usuario->setId($filas["id"]);
        $usuario->setEmail($filas["email"]);
        $usuario->setUsername($filas["username"]);
        $usuario->setPrivilegio($filas["privilegio"]);


        return $usuario;
    }
}