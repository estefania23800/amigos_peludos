<?php
require_once '../Model/Usuarios.php';
require_once '../Model/Animal.php';
if(!isset($_SESSION['session'])){
    session_start();
}
$usuario = $_SESSION['session']->getNombreUsuario();

if($_SESSION['session']->getRol()==1){
    $data['animales'] = Animal::getAnimalesSolicitudesUsuario($usuario);
    include '../View/AdoptanteSolicitudes.php';
}else if($_SESSION['session']->getRol()==2){



//
$data['animales'] = Animal::getAnimalesSolicitudesProtectora($usuario);
$animales = $data['animales'];

$arrayBidimensional = [];

foreach ($animales as $animal) {
    $usuarioAnimal = $animal->getUsuario();
    $usuario = Usuario::getUsuariosByNombre($usuarioAnimal); // Cambiado el nombre de la función

    $arrayBidimensional[] = [
        'animal' => $animal,
        'usuario' => $usuario, // Cambiado el nombre del índice
    ];
}

$data['arrayBidimensional'] = $arrayBidimensional;

    include '../View/ProtectoraSolicitudes.php';
//}else{
 //   $data['animales'] = null;
 //   include '../View/AdoptanteSolicitudes.php';
}