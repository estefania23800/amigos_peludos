<?php
include "../Model/Animal.php";
include "../Model/Usuarios.php";
if(!isset($_SESSION['session'])){
    session_start();
}

$Animal=new Animal($_POST['ID'],$_POST['Nombre'], $_POST['Edad'],$_POST['Tiempo'], $_POST['Sexo'],$_POST['Tamaño'] ,$_POST['Tipo'],null, $_POST['Protectora'],null,$_POST['Estado'],$_POST['Protectora']);

$Animal->SolictarAdopcion($_SESSION['session']->getNombreUsuario(),$_SESSION['session']->getLocalidad());

include "Peludos.php";
?>