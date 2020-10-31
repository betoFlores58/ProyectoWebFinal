<?php

include ('usuarioDao.php');

class UsuarioControlador{
    public static function login($email,$pwd)
    {
        $obj_usuario=new Usuario();
        $obj_usuario->setEmail($email);
        $obj_usuario->setPwd($pwd);

        return UsuarioDao::login($obj_usuario);
    }

    public function getUsuario($email,$pwd)
    {
        $obj_usuario=new Usuario();
        $obj_usuario->setEmail($email);
        $obj_usuario->setPwd($pwd);

        return UsuarioDao::getUsuario($obj_usuario);
    }
}