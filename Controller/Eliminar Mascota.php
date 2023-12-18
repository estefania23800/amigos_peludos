<?php
include "../Model/Usuarios.php";
include "../Model/Animal.php";
if(!isset($_SESSION['session'])){
    session_start();
}

$Mascota=new Animal($_POST['id'],null, null, null, null, null,null, null,null,null,null, null);
$Mascota->delete();

include "MisMascotas.php";
?>