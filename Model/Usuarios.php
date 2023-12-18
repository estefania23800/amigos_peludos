<?php
require_once 'railwayDB.php';

class Usuario
{
    private $id_usuario;
    private $nombre_usuario;
    private $email;
    private $clave;
    private $telefono;
    private $localidad;
    private $rol;

    public function __construct($id_usuario, $nombre_usuario, $email, $clave, $telefono, $localidad, $rol)
    {
        $this->id_usuario = $id_usuario;
        $this->nombre_usuario = $nombre_usuario;
        $this->email = $email;
        $this->clave = $clave;
        $this->telefono = $telefono;
        $this->localidad = $localidad;
        $this->rol = $rol;
    }

    // Getters
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function getNombreUsuario()
    {
        return $this->nombre_usuario;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getLocalidad()
    {
        return $this->localidad;
    }

    public function getRol()
    {
        return $this->rol;
    }

    // Setters
    public function setNombreUsuario($nombre_usuario)
    {
        $this->nombre_usuario = $nombre_usuario;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setClave($clave)
    {
        $this->clave = $clave;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    public function insert()
    {
        $conexion = railwayDB::connectDB();

        $seleccion = "SELECT id_usuario, nombre_usuario, email, clave, telefono, localidad, rol from usuarios where nombre_usuario='$this->nombre_usuario'";
        $consulta = $conexion->query($seleccion);
        if($consulta->rowCount() == 0){
            $insercion = "INSERT INTO usuarios (nombre_usuario, email, clave, telefono, localidad, rol) VALUES ('$this->nombre_usuario','$this->email','$this->clave','$this->telefono','$this->localidad',$this->rol)";
            $conexion->exec($insercion);
            return true;
        }else{
            return false;
        }

    }

    public function delete()
    {
        $conexion = railwayDB::connectDB();
        $borrado = "DELETE FROM usuarios WHERE id_usuario=$this->id_usuario";
        $conexion->exec($borrado);
    }

    public function update()
    {
        $conexion = railwayDB::connectDB();
        $actualiza = "UPDATE usuarios SET nombre_usuario='$this->nombre_usuario', email='$this->email', clave='$this->clave', telefono='$this->telefono', localidad='$this->localidad', rol=$this->rol WHERE id_usuario=$this->id_usuario";
        $conexion->exec($actualiza);
    }

    public function getanimales()
    {
        $conexion = railwayDB::connectDB();
        $actualiza = "UPDATE usuarios SET nombre_usuario='$this->nombre_usuario', email='$this->email', clave='$this->clave', telefono='$this->telefono', localidad='$this->localidad', rol=$this->rol WHERE id_usuario=$this->id_usuario";
        $conexion->exec($actualiza);
    }

    public static function getUsuarios()
    {
        $conexion = railwayDB::connectDB();
        $seleccion = "SELECT * FROM usuarios";
        $consulta = $conexion->query($seleccion);
        $usuarios = [];

        while ($registro = $consulta->fetchObject()) {
            $usuario = new Usuario($registro->id_usuario, $registro->nombre_usuario, $registro->email, $registro->contraseña, $registro->telefono, $registro->localidad, $registro->rol);
            $usuarios[] = $usuario;
        }

        return $usuarios;
    }

    public static function getUsuariosByNombre($nombre_usuario)
    {
        $conexion = railwayDB::connectDB();
        $seleccion = "SELECT id_usuario, nombre_usuario, email, clave, telefono, localidad, rol from usuarios where nombre_usuario='$nombre_usuario'";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
    
        if ($registro !== false) {
            $usuario = new Usuario($registro->id_usuario, $registro->nombre_usuario, $registro->email, null, $registro->telefono, $registro->localidad, $registro->rol);
            return $usuario;
        } else {
            return null;
        }
    }

    public static function select_usuario_clave($nombre_usuario,$clave) {
        $conexion = railwayDB::connectDB();
        $seleccion = "SELECT id_usuario, nombre_usuario, email, clave, telefono, localidad, rol from usuarios where nombre_usuario='$nombre_usuario' and clave='$clave'";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        if ($registro !== false) {
            $Usuario = new Usuario($registro->id_usuario, $registro->nombre_usuario, $registro->email, null, $registro->telefono, $registro->localidad, $registro->rol);
            return $Usuario;
        } else {
            return null;
        }
    }

}
