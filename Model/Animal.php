<?php
require_once 'railwayDB.php';

class Animal
{
    private $id_animal;
    private $nombre;
    private $edad;
    private $tiempo;
    private $sexo;
    private $tamaño;
    private $tipo;
    private $imagen;
    private $protectora;
    private $usuario;
    private $estado;
    private $localizacion;

    public function __construct($id_animal, $nombre, $edad, $tiempo, $sexo, $tamaño, $tipo, $imagen, $protectora, $usuario, $estado, $localizacion)
    {
        $this->id_animal = $id_animal;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->tiempo = $tiempo;
        $this->sexo = $sexo;
        $this->tamaño = $tamaño;
        $this->tipo = $tipo;
        $this->imagen = $imagen;
        $this->protectora = $protectora;
        $this->usuario = $usuario;
        $this->estado = $estado;
        $this->localizacion = $localizacion;
    }

    // Getters
    public function getIdAnimal()
    {
        return $this->id_animal;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function getTiempo()
    {
        return $this->tiempo;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function getTamaño()
    {
        return $this->tamaño;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function getImagen()
    {
        return $this->imagen;
    }
    public function getProtectora()
    {
        return $this->protectora;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getEstado()
    {
        return $this->estado;
    }
    public function getLocalizacion()
    {
        return $this->localizacion;
    }

    // Setters
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;
    }

    public function setTiempo($tiempo)
    {
        $this->tiempo = $tiempo;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    public function setTamaño($tamaño)
    {
        $this->tamaño = $tamaño;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }
    public function setProtectora($protectora)
    {
        $this->protectora = $protectora;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    public function setLocalizacion($localizacion)
    {
        $this->localizacion = $localizacion;
    }


    public function insert()
    {
        $conexion = railwayDB::connectDB();
        $insercion = ("INSERT INTO animales (nombre, edad, tiempo, sexo, tamaño, tipo, imagen,protectora,estado,localizacion,usuario) VALUES ('$this->nombre','$this->edad','$this->tiempo','$this->sexo','$this->tamaño','$this->tipo','$this->imagen','$this->protectora','$this->estado','$this->localizacion','$this->usuario')");
        $conexion->exec($insercion);
    }

    public function delete()
    {
        $conexion = railwayDB::connectDB();
        $borrado = ("DELETE FROM animales WHERE id_animal = $this->id_animal");
        $conexion->query($borrado);
        
    }

    public function update()
    {
        $conexion = railwayDB::connectDB();
        $actualiza =("UPDATE animales SET nombre ='$this->nombre', edad = '$this->edad', tiempo = '$this->tiempo', sexo = '$this->sexo', tamaño ='$this->tamaño', tipo = '$this->tipo' WHERE id_animal = '$this->id_animal'");
        $conexion->query($actualiza);
    }

    public static function getAnimalesAdopcion()
    {
        $conexion = railwayDB::connectDB();
        $seleccion = "SELECT id_animal, nombre, edad, tiempo, sexo, tamaño, tipo, imagen, protectora, usuario, estado, localizacion FROM animales where estado like 'Adopcion'";
        $consulta = $conexion->query($seleccion);
        $animales = [];
        while ($registro = $consulta->fetchObject()) {
            $imagenBase64 = base64_encode($registro->imagen);
            $registro->imagen = 'data:image/jpeg;base64,' . $imagenBase64;
            $animales[] = new Animal($registro->id_animal, $registro->nombre, $registro->edad, $registro->tiempo, $registro->sexo, $registro->tamaño, $registro->tipo, $registro->imagen, $registro->protectora, $registro->usuario, $registro->estado, $registro->localizacion);
        }
        return $animales;
    }

    public static function getAnimalesAdoptados()
    {
        $conexion = railwayDB::connectDB();
        $seleccion = "SELECT id_animal, nombre, edad, tiempo, sexo, tamaño, tipo, imagen, protectora, usuario, estado, localizacion FROM animales where estado like 'Adoptado'";
        $consulta = $conexion->query($seleccion);
        $animales = [];
        while ($registro = $consulta->fetchObject()) {
            $imagenBase64 = base64_encode($registro->imagen);
            $registro->imagen = 'data:image/jpeg;base64,' . $imagenBase64;
            $animales[] = new Animal($registro->id_animal, $registro->nombre, $registro->edad, $registro->tiempo, $registro->sexo, $registro->tamaño, $registro->tipo, $registro->imagen, $registro->protectora, $registro->usuario, $registro->estado, $registro->localizacion);
        }
        return $animales;
    }

    public static function getAnimalesMisMascotasUsuario(string $usuario)
    {
        $conexion = railwayDB::connectDB();
        $seleccion = "SELECT id_animal, nombre, edad, tiempo, sexo, tamaño, tipo, imagen, protectora, usuario, estado, localizacion FROM animales where estado like 'Adoptado' and usuario like '$usuario'";
        $consulta = $conexion->query($seleccion);
        $animales = [];
        while ($registro = $consulta->fetchObject()) {
            $imagenBase64 = base64_encode($registro->imagen);
            $registro->imagen = 'data:image/jpeg;base64,' . $imagenBase64;
            $animales[] = new Animal($registro->id_animal, $registro->nombre, $registro->edad, $registro->tiempo, $registro->sexo, $registro->tamaño, $registro->tipo, $registro->imagen, $registro->protectora, $registro->usuario, $registro->estado, $registro->localizacion);
        }
        return $animales;
    }

    public static function getAnimalesMisMascotasProtectora(string $usuario)
    {
        $conexion = railwayDB::connectDB();
        $seleccion = "SELECT id_animal, nombre, edad, tiempo, sexo, tamaño, tipo, imagen, protectora, usuario, estado, localizacion FROM animales where (estado = 'Adopcion' OR estado = 'Solicitado') and protectora like '$usuario'";
        $consulta = $conexion->query($seleccion);
        $animales = [];
        while ($registro = $consulta->fetchObject()) {
            $imagenBase64 = base64_encode($registro->imagen);
            $registro->imagen = 'data:image/jpeg;base64,' . $imagenBase64;
            $animales[] = new Animal($registro->id_animal, $registro->nombre, $registro->edad, $registro->tiempo, $registro->sexo, $registro->tamaño, $registro->tipo, $registro->imagen, $registro->protectora, $registro->usuario, $registro->estado, $registro->localizacion);
        }
        return $animales;
    }

    public static function getAnimalesSolicitudesUsuario(string $usuario)
    {
        $conexion = railwayDB::connectDB();
        $seleccion = "SELECT id_animal, nombre, edad, tiempo, sexo, tamaño, tipo, imagen, protectora, usuario, estado, localizacion FROM animales where estado like 'Solicitado' and usuario like '$usuario'";
        $consulta = $conexion->query($seleccion);
        $animales = [];
        while ($registro = $consulta->fetchObject()) {
            $imagenBase64 = base64_encode($registro->imagen);
            $registro->imagen = 'data:image/jpeg;base64,' . $imagenBase64;
            $animales[] = new Animal($registro->id_animal, $registro->nombre, $registro->edad, $registro->tiempo, $registro->sexo, $registro->tamaño, $registro->tipo, $registro->imagen, $registro->protectora, $registro->usuario, $registro->estado, $registro->localizacion);
        }
        return $animales;
    }

    public static function getAnimalesSolicitudesProtectora(string $protectora)
    {
        $conexion = railwayDB::connectDB();
        $seleccion = "SELECT id_animal, nombre, edad, tiempo, sexo, tamaño, tipo, imagen, protectora, usuario, estado, localizacion FROM animales where estado like 'Solicitado' and protectora like '$protectora'";
        $consulta = $conexion->query($seleccion);
        $animales = [];
        while ($registro = $consulta->fetchObject()) {
            $imagenBase64 = base64_encode($registro->imagen);
            $registro->imagen = 'data:image/jpeg;base64,' . $imagenBase64;
            $animales[] = new Animal($registro->id_animal, $registro->nombre, $registro->edad, $registro->tiempo, $registro->sexo, $registro->tamaño, $registro->tipo, $registro->imagen, $registro->protectora, $registro->usuario, $registro->estado, $registro->localizacion);
        }

        return $animales;
    }

    public function SolictarAdopcion(string $usuario, string $localizacion)
    {
        $conexion = railwayDB::connectDB();
        $adoptar = "UPDATE animales SET estado='solicitado', usuario='$usuario' , localizacion='$localizacion' WHERE id_animal='$this->id_animal'";
        $conexion->query($adoptar);
    }

    public function AceptarSolicitud()
    {
        $conexion = railwayDB::connectDB();
        $adoptar = "UPDATE animales SET estado='adoptado', usuario='$this->usuario' , localizacion='$this->localizacion' WHERE id_animal='$this->id_animal'";
        $conexion->query($adoptar);
    }

    public function RechazarSolicitud()
    {
        $conexion = railwayDB::connectDB();
        $adoptar = "UPDATE animales SET estado='adopcion', usuario=null , localizacion='$this->localizacion' WHERE id_animal='$this->id_animal'";
        $conexion->query($adoptar);
    }

}
