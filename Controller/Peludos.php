<?php
require_once '../Model/Usuarios.php';
require_once '../Model/Animal.php';
if(!isset($_SESSION['session'])){
    session_start();
}
$data['animales'] = Animal::getAnimalesAdopcion();

include '../View/Peludos.php';