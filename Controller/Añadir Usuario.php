<?php 
include "../Model/Usuarios.php";
include "../Model/SesionUsuario.php";
$usuario=new Usuario(null,$_POST['nombre'], $_POST['email'], $_POST['clave'], $_POST['telefono'], $_POST['localidad'], $_POST['rol']);
$resultado=$usuario->insert();
if($resultado){
    $userSession = new SesionUsuario();
    $userSession->setCurrentUser($usuario);
    include "../Controller/MisMascotas.php";
}else{
 ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Usuario ya en uso, introduzca otro</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
 <?php 
 include "index.php";
}

