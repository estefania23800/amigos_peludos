<?php
require_once '../Model/Usuarios.php';
require_once '../Model/Animal.php';


if(!isset($_SESSION['session'])){
    session_start();
}
$Mascota=new Animal($_POST['id'],$_POST['nombre'], $_POST['edad'], $_POST['tiempo'], $_POST['sexo'], $_POST['tamaño'], $_POST['tipo'], null, null,null,null, null);
$Mascota->update();

include 'MisMascotas.php';