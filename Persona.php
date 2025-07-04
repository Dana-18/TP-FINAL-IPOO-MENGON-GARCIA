<?php
class Persona
{
    private $nombre;
    private $apellido;
    private $documento;
    private $mensajeoperacion;

    public function __construct()
    {
        $this->nombre = "";
        $this->apellido = "";
        $this->documento = "";
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($value)
    {
        $this->nombre = $value;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($value)
    {
        $this->apellido = $value;
    }
    public function getDocumento()
    {
        return $this->documento;
    }

    public function setDocumento($value)
    {
        $this->documento = $value;
    }

    public function getMensajeoperacion()
    {
        return $this->mensajeoperacion;
    }

    public function setMensajeoperacion($mensaje)
    {
        $this->mensajeoperacion = $mensaje;
    }

    public function __toString()
    {
        return "Nombre: " . $this->getNombre() . "\n" .
            "Apellido: " . $this->getApellido() . "\n".
            "Documento: " . $this->getDocumento() . "\n";

    }

    public function cargar($pdocumento, $pnombre, $papellido)
    {
        $this->setNombre($pnombre);
        $this->setApellido($papellido);
        $this->setDocumento($pdocumento);
    }

    public function insertar()
    {
        $database = new BaseDatos;
        $persona = false;
        $consultaInsertar = "INSERT INTO persona(nombre, apellido ,documento) VALUES (
        '"  . $this->getNombre() . "',
        '" . $this->getApellido() . "',
        '" . $this->getDocumento() . "'
        )";

        if ($database->Iniciar()) {

            if ($database->Ejecutar($consultaInsertar)) {
                $persona =  true;
            } else {
                $this->setMensajeoperacion($database->getError());
            }
        } else {
            $this->setMensajeoperacion($database->getError());
        }
        return $persona;
    }

    public function buscar($documento)
    {
        $database = new BaseDatos;
        $consulta = "SELECT * FROM persona WHERE documento = '". $documento ."'";
        $rta = false;
        if ($database->Iniciar()) {
            if ($database->Ejecutar($consulta)) {
                if ($persona = $database->Registro()) {
                    $this->cargar(
                        $persona['documento'],
                        $persona['nombre'],
                        $persona['apellido']
                    );
                    $rta = true;
                }
            } else {
                $this->setMensajeoperacion($database->getError());
            }
        } else {
            $this->setMensajeoperacion($database->getError());
        }
        return $rta;
    }


    public function modificar()
    {
        $database = new BaseDatos;
        $consulta = "UPDATE persona SET 
                    nombre = '" . $this->getNombre() . "',
                    apellido = '" . $this->getApellido() . "' 
                    WHERE documento = '" . $this->getDocumento() . "'";
        $rta = false;
        if ($database->Iniciar()) {
            if ($database->Ejecutar($consulta)) {
                $rta = true;
            } else {
                $this->setMensajeoperacion($database->getError());
            }
        } else {
            $this->setMensajeoperacion($database->getError());
        }
        return $rta;
    }



    public function eliminar()
    {
        $database = new BaseDatos;
        $consulta = "DELETE FROM persona WHERE documento = " . $this->getDocumento() . " ";
        $rta = false;
        if ($database->Iniciar()) {
            if ($database->Ejecutar($consulta)) {
                $rta = true;
            } else {
                $this->setMensajeoperacion($database->getError());
            }
        } else {
            $this->setMensajeoperacion($database->getError());
        }
        return $rta;
    }

    public function listar($condicion = ""){
        $arregloPersona = null;
        $database = new BaseDatos;
        $consulta = "SELECT * FROM persona ";
        if ($condicion != ""){
            $consulta .= "WHERE $condicion ";
        }
        $consulta .= "ORDER BY apellido";

        if ($database->Iniciar()){
            if ($database->Ejecutar($consulta)){
                $arregloPersona = [];
                while ($personaEncontrada = $database->Registro()){
                    $persona = new self;
                    $persona->cargar(
                        $personaEncontrada["nombre"],
                        $personaEncontrada["apellido"],
                        $personaEncontrada["documento"]
                    );
                    array_push($arregloPersona, $persona);
                }
            } else {
                $this->setMensajeoperacion($database->getError());
            }
        } else {
            $this->setMensajeoperacion($database->getError());
        }

        return $arregloPersona;
    }
}