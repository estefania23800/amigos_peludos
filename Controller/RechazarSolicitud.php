<?php
include "../Model/Animal.php";
include "../Model/Usuarios.php";
if(!isset($_SESSION['session'])){
    session_start();
}

$Animal=new Animal($_POST['ID'],$_POST['Nombre'], $_POST['Edad'],$_POST['Tiempo'], $_POST['Sexo'],$_POST['Tamaño'] ,$_POST['Tipo'],null,$_POST['Protectora'],$_POST['Usuario'],$_POST['Estado'],$_SESSION['session']->getLocalidad());
$Animal->RechazarSolicitud();

include "Solicitudes.php";

?>