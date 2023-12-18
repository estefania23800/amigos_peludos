<?php
require_once '../Model/Usuarios.php';
require_once '../Model/Animal.php';

if (!isset($_SESSION['session'])) {
    session_start();
}
$rol =  $_SESSION['session']->getRol();
$usuario = $_SESSION['session']->getNombreUsuario();
//Rol 1 Usuario
if ($rol == 1) {
    $data['animales'] = Animal::getAnimalesMisMascotasUsuario($usuario);
} else {
    $data['animales'] = Animal::getAnimalesMisMascotasProtectora($usuario);
}

include '../View/MisMascotas.php';
