<?php
require_once '../Model/Usuarios.php';
require_once '../Model/Animal.php';
if(!isset($_SESSION['session'])){
    session_start();
}
// CAMBIAR getAnimalesSolicitudesProtectora(string $protectora)
$data['animales'] = Animal::getAnimalesAdoptados();

include '../View/ProtectoraSolicitudes.php';