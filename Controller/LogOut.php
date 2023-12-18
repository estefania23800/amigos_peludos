<?php
include "../Model/SesionUsuario.php";
session_start();
SesionUsuario::closeSession();
include "../Controller/index.php";
?>