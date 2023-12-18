<?php

class SesionUsuario{

    public function __construct(){
        session_start();
    }

    public function setCurrentUser($usuario){
        $_SESSION['session']=$usuario;
    }

    public static function getCurrentUser(){
        $usuario=$_SESSION['session'];
    }

    public static function closeSession(){
        session_unset();
        session_destroy();
    }

}

?>


