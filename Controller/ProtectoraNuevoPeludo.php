<?php
require_once '../Model/Usuarios.php';
require_once '../Model/Animal.php';
if(!isset($_SESSION['session'])){
    session_start();
}
// $data['animales'] = Animal::getAnimalesAdoptados();

include '../View/ProtectoraNuevoPeludo.php';