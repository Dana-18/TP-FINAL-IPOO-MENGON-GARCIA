<?php
include_once 'BaseDatos.php';
include_once 'Viaje.php';
include_once 'Pasajero.php';

class ViajePasajero {
    // Atributos que corresponden a las claves foráneas de la tabla intermedia
    private $objViaje;
    private $objPasajero;
    private $mensajeOperacion;

    public function __construct() {
        $this->objViaje = null;
        $this->objPasajero = null;
    }

    // Métodos GET
    public function getObjViaje() {
        return $this->objViaje;
    }

    public function getObjPasajero() {
        return $this->objPasajero;
    }

    public function getMensajeOperacion() {
        return $this->mensajeOperacion;
    }

    // Métodos SET
    public function setObjViaje($objViaje) {
        $this->objViaje = $objViaje;
    }

    public function setObjPasajero($doc) {
        $this->objPasajero = $doc;
    }

    public function setMensajeOperacion($mensajeOperacion) {
        $this->mensajeOperacion = $mensajeOperacion;
    }

    public function cargar($objViaje, $objPasajero) {
        $this->setObjViaje($objViaje);
        $this->setObjPasajero($objPasajero);
    }

    public function insertar() {
        $baseDatos = new BaseDatos();
        $resp = false;
        $consultaInsertar = "INSERT INTO viaje_pasajeros(idviaje, vpdocumento)
                             VALUES(" . $this->getObjViaje()->getIdViaje() . ", '" . $this->getObjPasajero()->getDocumento() . "')";

        if ($baseDatos->iniciar()) {
            if ($baseDatos->ejecutar($consultaInsertar)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion($baseDatos->getError());
            }
        } else {
            $this->setMensajeOperacion($baseDatos->getError());
        }
        return $resp;
    }
    public function modificar($idViaje) {
        $base = new BaseDatos();
        $consulta = "UPDATE viaje_pasajeros SET vpdocumento = '" .$this->getObjPasajero()->getDocumento() . "', idviaje = '". $this->getObjViaje()->getIdViaje() . "' WHERE vpdocumento = " 
            . $this->getObjPasajero()->getDocumento() . " AND idviaje= " . $idViaje;
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
    
    public function eliminar() {
        $baseDatos = new BaseDatos();
        $resp = false;
        $consultaEliminar = "DELETE FROM viaje_pasajeros
                             WHERE idviaje = " . $this->getObjViaje()->getIdViaje() . "
                             AND vpdocumento = '" . $this->getObjPasajero()->getDocumento() . "'";

        if ($baseDatos->iniciar()) {
            if ($baseDatos->ejecutar($consultaEliminar)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion($baseDatos->getError());
            }
        } else {
            $this->setMensajeOperacion($baseDatos->getError());
        }
        return $resp;
    }

    public function buscar($condicion = "") {
        $baseDatos = new BaseDatos();
        $consulta = "SELECT * FROM viaje_pasajeros ";
        $resp = false;
        if ($condicion != "") {
            $consulta .= "WHERE $condicion";
        }
        if ($baseDatos->iniciar()) {
            if ($baseDatos->ejecutar($consulta)) {
                if ($registro = $baseDatos->registro()) {
                    $viaje = new Viaje;
                    $pasajero = new Pasajero;
                    $pasajero->buscar($registro['vpdocumento']);
                    $viaje->buscar($registro['idviaje']);
                    $this->cargar($viaje, $pasajero);
                    $resp = true;
                }
            } else {
                $this->setMensajeOperacion($baseDatos->getError());
            }
        } else {
            $this->setMensajeOperacion($baseDatos->getError());
        }
        return $resp;
    }

    
    public function listar($condicion = "") {
        $arregloRelaciones = null;
        $baseDatos = new BaseDatos();
        $consulta = "SELECT * FROM viaje_pasajeros ";
        if ($condicion != "") {
            $consulta .= " WHERE " . $condicion;
        }

        if ($baseDatos->iniciar()) {
            if ($baseDatos->ejecutar($consulta)) {
                $arregloRelaciones = [];
                while ($registro = $baseDatos->registro()) {
                    $relacion = new ViajePasajero();
                    $viaje = new Viaje;
                    $pasajero = new Pasajero;
                    $pasajero->buscar($registro['vpdocumento']);
                    $viaje->buscar($registro['idviaje']);
                    $relacion->cargar($viaje, $pasajero);
                    array_push($arregloRelaciones, $relacion);
                }
            } else {
                $this->setMensajeOperacion($baseDatos->getError());
            }
        } else {
            $this->setMensajeOperacion($baseDatos->getError());
        }
        return $arregloRelaciones;
    }

    public function __toString() {
        return "\nID Viaje: " . $this->getObjViaje()->getIdViaje() . ", Documento Pasajero: " . $this->getObjPasajero()->getDocumento() . "]\n";
    }
}
