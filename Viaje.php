<?php

Class Viaje {
    //Definimos los atributos de la clase
    private $idviaje;
    private $pasajeros;
    private $origen;
    private $vdestino;
    private $fecha;
    private $objEmpresa;
    private $vimporte;
    private $vCantMaxPasajeros;
    private $mensajeOperacion;
    private $objResponsableV;
    private $objPasajeros;

    //Redefinimos el __construct
    public function __construct() {
        $this->idviaje = "";
        $this->vdestino = "";
        $this->vCantMaxPasajeros = 0;
        $this->objResponsableV = null;
        $this->objEmpresa = null;
        $this->vimporte = 0;
        $this->objPasajeros = null;
    }

    //Definimos el metodo cargar
    public function cargar(string $vdestino, int $vCantMaxPasajeros, array $objPasajeros, ResponsableV $objResponsableV, float $vimporte, Empresa $objEmpresa) {
        $this->setvDestino($vdestino);
        $this->setvCantMaxPasajeros($vCantMaxPasajeros);
        $this->setObjResponsableV($objResponsableV);
        $this->setvImporte($vimporte);
        $this->setObjEmpresa($objEmpresa);
        $this->setObjPasajeros($objPasajeros);
    }


    //Redefinimos el metodo __toString
    public function __toString() {
        $cadena ="ID del viaje: " . $this->getIdViaje() . "\n";  
        $cadena .= "Destino: " . $this->getvDestino() . "\n"; 
        $cadena .="Costo del viaje: " . $this->getvImporte() . "\n";
        $cadena .="Cantidad maxima de pasajeros: " . $this->getvCantMaxPasajeros() . "\n";
        $cadena.="-------------------------------------------\n". "Responsable: \n" .
        $this->getObjResponsableV();
        $arrayPasajeros = $this->getobjPasajeros();
        if (count($arrayPasajeros) !=0) {
            $cadena .= "-------------------------------------------\n";
            $cadena .= "Pasajeros: \n";
            for ($i=0; $i <count($arrayPasajeros); $i++) {
                $unPasajero = $arrayPasajeros[$i];
                $cadena .= $unPasajero ."\n";
            }
        } else {
            $cadena .= "-------------------------------------------\n";
            $cadena .= "No hay Pasajeros.\n";
        }
        return $cadena;
    }

    //Definimos los metodos get y set
    public function getIdViaje() {
        return $this->idviaje;
    }
    public function getObjPasajeros() {
        return $this->objPasajeros;
    }
    public function getOrigen() {
        return $this->origen;
    }
    public function getvDestino() {
        return $this->vdestino;
    }
    public function getvCantMaxPasajeros() {
        return $this->vCantMaxPasajeros;
    }
    public function getvImporte() {
        return $this->vimporte;
    }
    public function getObjResponsableV() {
        return $this->objResponsableV;
    }
    public function getMensajeOperacion() {
        return $this->mensajeOperacion;
    }
    public function getObjEmpresa() {
        return $this->objEmpresa;
    }

    public function setIdViaje($value)  {
        $this->idviaje = $value;    
    }
    public function setObjPasajeros($value) {
        $this->objPasajeros = $value;
    }
    public function setOrigen($value) {
        $this->origen = $value;
    }
    public function setvDestino($value) {
        $this->vdestino = $value;
    }
    public function setObjResponsableV($value) {
        $this->objResponsableV = $value;
    }
    public function setvCantMaxPasajeros($value) {
        $this->vCantMaxPasajeros = $value;
    }
    public function setvImporte($value) {
        $this->vimporte = $value; 
    }
    public function setMensajeOperacion($value) {
        $this->mensajeOperacion = $value;
    }
    public function setObjEmpresa($value) {
        $this->objEmpresa = $value;
    }

    //Definimos los metodos necesarios para la base de datos
    //Primero realizamos el metodo para insertar informacion a la base sobre viajes
    public function insertar() {
        $base = new BaseDatos();
        $resp = false;
        $consultaInsertar = "INSERT INTO viaje(vdestino, vcantmaxpasajeros, idempresa, rnumeroempleado, vimporte) VALUES
         ('" . $this->getvDestino() . "','" . $this->getvCantMaxPasajeros() . "','" . $this->getObjEmpresa()->getIdEmpresa() . "','" . 
         $this->getObjResponsableV()->getRnumeroEmpleado() . "','" . $this->getvImporte() . "')";

         if ($base->Iniciar()) {
            if ($id = $base->devuelveIDInsercion($consultaInsertar)) {
                $this->setIdViaje($id);
                $resp = true;
            } else {
                $this->setMensajeOperacion($base->getError());
            }
         } else {
            $this->setMensajeOperacion($base->getError());
         }
         return $resp;
    }

    //Definimos la funcion buscar que nos ayuda a ubicar el viaje por su id !!!!!!!!!!
    public function buscar(int $idviaje) {
        $base = new BaseDatos();
        $rta = false;
        $consulta = "SELECT * FROM viaje WHERE idviaje = " . $idviaje;
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                if ($viaje = $base->Registro()) {
                    $pasajero = new Pasajero();
                    $this->setIdViaje($idviaje);
                    $empresa = new Empresa();
                    $empresa->setIdEmpresa($viaje['idempresa']);
                    $empleado = new ResponsableV();
                    $empleado->setRnumeroEmpleado($viaje['rnumeroempleado']);
                    $empleado->buscar($viaje['rnumeroempleado']);
                    $this->cargar(
                        $viaje['vdestino'],
                        $viaje['vcantmaxpasajeros'],
                        [],
                        $empleado,
                        $viaje['vimporte'],
                        $empresa,
                    );
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

    //Definimos el metodo de modificar para cambiar la informacion de un viaje
    public function modificar() {
        $base = new BaseDatos();

        $consulta = "UPDATE viaje SET 
        vdestino='" . $this->getvDestino() . "',
        vcantmaxpasajeros= '" . $this->getvCantMaxPasajeros() . "',
        idempresa= '" . $this->getObjEmpresa()->getIdEmpresa() . "',
        rnumeroempleado= '" . $this->getObjResponsableV()->getRnumeroEmpleado() . "',
        vimporte= '" . $this->getvImporte() . "'
        WHERE idviaje= " . $this->getIdViaje();
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

    //Definimos el metodo para eliminar, el mismo elimina un viaje de la base de datos
    public function eliminar() {
        $base = new BaseDatos();
        $rta = false;
        $consulta = "DELETE FROM viaje WHERE idviaje = '" . $this->getIdViaje() . "'";

        if ($base->Iniciar()) {
            if($base->Ejecutar($consulta)) {
                $rta = true;
            } else {
                $this->setMensajeOperacion($base->getError());
            }
        } else {
            $this->setMensajeOperacion($base->getError());
        }
        return $rta;
    }

    //Definimos el metodo de listar, el cual nos lista los viajes
    public function listar($condicion = "") {
        $arrayViaje = null;
        $base = new BaseDatos();
        $consulta = "SELECT * FROM viaje ";
        //Si la condicion es diferente de vacio, concatenamos la condicion
        if ($condicion != "") {
            $consulta .= "WHERE $condicion ";
        }
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                $arrayViaje = [];
                while ($viajeEncontrado = $base->Registro()) {
                    $pasajero = new Pasajero();
                    $responsable = new ResponsableV();
                    $responsable->buscar($viajeEncontrado['rnumeroempleado']);
                    $empresa = new Empresa();
                    $empresa->buscar($viajeEncontrado['idempresa']);                    
                    $viaje = new Viaje();
                    $viaje->setIdViaje($viajeEncontrado['idviaje']);
                    $listaPasajeros = $pasajero->listar("idviaje= ".$viaje->getIdViaje());
                    $viaje->cargar(
                        $viajeEncontrado['vdestino'],
                        $viajeEncontrado['vcantmaxpasajeros'],
                        $listaPasajeros,
                        $responsable,
                        $viajeEncontrado['vimporte'],
                        $empresa
                        );
                    array_push($arrayViaje, $viaje);
                }
            } else {
                $this->setMensajeOperacion($base->getError());
            }
        } else {
            $this->setMensajeOperacion($base->getError());
        }
        return $arrayViaje;
    }
}