<?php 
include "../Model/Usuarios.php";
include "../Model/Animal.php";
if(!isset($_SESSION['session'])){
    session_start();
}

$protectora =  $_SESSION['session']->getNombreUsuario();
$localizacion = $_SESSION['session']->getLocalidad();
$image = $_FILES['imagen']['tmp_name'];
$imgContenido = addslashes(file_get_contents($image));

$Mascota=new Animal(null,$_POST['nombre'], $_POST['edad'], $_POST['tiempo'], $_POST['sexo'], $_POST['tamaño'], $_POST['tipo'], $imgContenido, $protectora,null,'Adopcion', $localizacion);
$Mascota->insert();

//header("location:MisMascotas.php");
include "MisMascotas.php";