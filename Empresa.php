<?php

Class Empresa {
    //Definimos los atributos
    private $idEmpresa;
    private $nombre;
    private $direccion;
    private $mensajeOperacion;

    //Redefinimos el metodo __construct
    public function __construct() {
        $this->nombre = "";
        $this->direccion = "";
    }

    //Redefinimos el metodo __toString
    public function __toString() {
        return 
        "Nombre: " . $this->getNombre() . "\n" . 
        "Direccion: " . $this->getDireccion() . "\n" . 
        "ID Empresa: " . $this->getIdEmpresa() . "\n";
    }

    //Definimos el metodo de carga
    public function cargar(string $nombre, string $direccion) {
        $this->setNombre($nombre);
        $this->setDireccion($direccion);
    }

    //Definimos los metodos get y set
    public function getNombre() {
        return $this->nombre;
    }
    public function getDireccion() {
        return $this->direccion;
    }
    public function getIdEmpresa() {
        return $this->idEmpresa;
    }
    public function getMensajeOperacion() {
        return $this->mensajeOperacion;
    }

    public function setNombre($value) {
        $this->nombre = $value;
    }
    public function setDireccion($value) {
        $this->direccion = $value;
    }
    public function setIdEmpresa($value) {
        $this->idEmpresa = $value;
    }
    public function setMensajeOperacion($value) {
        $this->mensajeOperacion = $value;
    }

    //Definimos los metodos necesarios para la base de datos
    //Primero realizamos el metodo para insertar informacion a la tabla de empresa
    public function insertar() {
        $base = new BaseDatos();
        $resp = false;
        $consultaInsertar = "INSERT INTO empresa(enombre, edireccion) VALUES ('". $this->getNombre() ."', '".$this->getDireccion()."')";
        if ($base->Iniciar()) {

            if ($id = $base->devuelveIDInsercion($consultaInsertar)) {
                $this->setIdEmpresa($id);
                $resp = true;
            } else {
                $this->setMensajeOperacion($base->getError());
            }
        } else {
            $this->setMensajeOperacion($base->getError());
        }
        return $resp;
    }

    //Definimos la funcion que nos ayuda a buscar la empresa por su ID
    public function buscar(int $idEmpresa) {
        $base = new BaseDatos();
        $consultaPersona = "SELECT * FROM empresa WHERE idEmpresa='" . $idEmpresa . "'";
        $rta = false;
        if ($base->Iniciar()) {
            if($base->Ejecutar($consultaPersona)) {
                if($empresa = $base->registro()) {
                    $this->cargar($empresa['enombre'], $empresa['edireccion']);
                    $this->setIdEmpresa($empresa['idempresa']);
                    $rta = true;
                } 
            } else {
                $this->setMensajeOperacion($base->getError());
            }
        } else {
            $this->setMensajeOperacion($base->getError());
        }
        return $rta;
    }

    //Definimos el metodo para modificar los datos de una empresa
    public function modificar() {
        $base = new BaseDatos();
        $consulta = "UPDATE empresa SET enombre = '" .$this->getNombre() . "', edireccion = '". $this->getDireccion() . "' WHERE idempresa = " . $this->getIdEmpresa();
        $rta = false;

        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                $rta = true;
            } else {
                $this->setMensajeOperacion($base->getError());
            }
        } else {
            $this->setMensajeOperacion($base->getError());
        }
        return $rta;
    }

    //Definimos el metodo para eliminar la empresa
    public function eliminar() {
        $base = new BaseDatos();
        $consulta = "DELETE FROM empresa WHERE idempresa = " . $this->getIdEmpresa();
        $rta = false;
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
            $rta =true;
            } else {
                $this->setMensajeOperacion($base->getError());
            }
        } else {
            $this->setMensajeOperacion($base->getError());
        }
        return $rta;
    }

    //Definimos un metodo para listar todas las tablas de la empresa con o sin condicion
    public function listar($condicion = "") {
        $arregloEmpresa = null;
        $base = new BaseDatos();
        $consulta = "SELECT * FROM empresa ";
        if ($condicion != "") {
            $consulta .= "WHERE $condicion ";
        }
        $consulta.= "ORDER BY enombre";

        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                $arregloEmpresa = [];
                while ($empresaEncontrada = $base->Registro()) {
                    $empresa = new Empresa();
                    $empresa->cargar(
                        $empresaEncontrada["enombre"],
                        $empresaEncontrada["edireccion"]
                    );
                    $empresa->setIdEmpresa($empresaEncontrada["idempresa"]);
                    array_push($arregloEmpresa, $empresa);
                }
            } else {
                $this->setMensajeOperacion($base->getError());
            }
        } else {
            $this->setMensajeOperacion($base->getError());
        }
        return $arregloEmpresa;
    }
 }