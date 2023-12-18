<?php
include "../Model/Usuarios.php";
include "../Model/SesionUsuario.php";

$usuario = Usuario::select_usuario_clave($_POST['usuario'], $_POST['clave']);

if ($usuario == null) {
?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Usuario o Contraseña incorrecta</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php
  include "index.php";
} else {
  $userSession = new SesionUsuario();
  $userSession->setCurrentUser($usuario);
  include "../Controller/MisMascotas.php";
}
