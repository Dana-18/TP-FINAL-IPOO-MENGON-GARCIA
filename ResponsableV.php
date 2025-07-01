<?php
include_once "Persona.php";

    class ResponsableV extends Persona {
        //Definimos los atributos de la clase
        private $rnumeroEmpleado;
        private $rnumeroLicencia;
        private $mensajeOperacion;
        
        //Agregamos los atributos al constructor
        public function __construct () {
            parent::__construct();
            $this -> rnumeroLicencia = 0;

        }

        //Definimos los metodos get y set
        public function getRnumeroEmpleado () {
            return $this -> rnumeroEmpleado;
        }
        public function getRnumeroLicencia () {
            return $this -> rnumeroLicencia;
        }
        public function getMensajeOperacion () {
            return $this -> mensajeOperacion;
        }

        public function setRnumeroEmpleado ($value) {
            $this -> rnumeroEmpleado = $value;
        }
        public function setRnumeroLicencia ($value) {
            $this -> rnumeroLicencia = $value;
        }
        public function setMensajeOperacion ($value) {
            $this -> mensajeOperacion = $value;
        }

        //Definimos el metodo __toString
        public function __toString() {
            $cadena = parent::__toString();
            $cadena .=
            "El numero de empleado es: " . $this->getRnumeroEmpleado() . "\n" . 
            "El numero de licencia es: " . $this->getRnumeroLicencia() . "\n";
        return $cadena;
        }


        //Definimos el metodo de carga
        public function cargarRe($pdocumento, $pnombre, $papellido, $numeroLicencia) {
            parent::cargar($pdocumento, $pnombre, $papellido);
            $this ->setRnumeroLicencia($numeroLicencia);
        }

        //Definimos los metodos necesarios para la base de datos
        //Primero realizamos el metodo para insertar informacion a la tabla de responsable
        public function insertar() {
            $baseDatos = new BaseDatos;
            $resultado = false;
            if (parent::insertar()) {
            $consultaInsertar = "INSERT INTO responsable(rnumeroLicencia, rdocumento) 
                                 VALUES (". $this->getRnumeroLicencia() .",
                                       '". $this->getDocumento() ."')";
            if ($baseDatos->Iniciar()) {
                if ($id = $baseDatos->devuelveIDInsercion($consultaInsertar)) {
                    $this->setRnumeroEmpleado($id);
                    $resultado = true;
                } else {
                    $this->setMensajeOperacion($baseDatos->getError());
                }
            } else {
                $this->setMensajeOperacion($baseDatos->getError());
            }
            return $resultado;
            }
        }

        //Definimos la funcion que nos ayuda a buscar la el responsable por su ID
        public function buscar ($rnumeroEmpleado) {
            $baseDatos = new BaseDatos();
            $consulta = "SELECT * FROM responsable WHERE rnumeroempleado =". $rnumeroEmpleado ;
            $respuesta = false;
            if($baseDatos->Iniciar()) {
                if($baseDatos->Ejecutar($consulta)) {
                    if($responsableV = $baseDatos->Registro()) {
                        parent::buscar($responsableV['rdocumento']);
                        $this->setRnumeroLicencia($responsableV['rnumerolicencia']);
                        $this->setRnumeroEmpleado($responsableV['rnumeroempleado']);
                        $respuesta = true;
                    }
                } else {
                    $this->setMensajeOperacion($baseDatos->getError());
                } 
            } else {
                $this->setMensajeOperacion($baseDatos->getError());
            }
            return $respuesta;
        }

        //Definimos el metodo para modificar los datos de un responsable
        public function modificar () {
            $baseDatos = new BaseDatos;
            $persona = new Persona;
            $respuesta = false;
            if (Persona::modificar()) {
            $consulta = "UPDATE responsable 
                         SET rnumerolicencia = ". $this->getRnumeroLicencia() ."
                         WHERE rnumeroempleado = '". $this->getRnumeroEmpleado() ."' ";

            if ($baseDatos->Iniciar()) {
                if ($baseDatos->Ejecutar($consulta)) {
                    $respuesta = true;
                } else {
                    $this->setMensajeOperacion($baseDatos->getError());
                }
            } else {
                $this->setMensajeOperacion($baseDatos->getError());
            }
          }
            return $respuesta;
        }

        //Definimos el metodo para eliminar al responsable
        public function eliminar () {
            $baseDatos = new BaseDatos;
            $consulta = "DELETE FROM responsable WHERE rnumeroempleado = ". $this->getRnumeroEmpleado() ." ";
            $respuesta = false;
            if ($baseDatos->Iniciar()) {
                if($baseDatos->Ejecutar($consulta)) {
                    $respuesta = true;
                } else {
                    $this->setMensajeOperacion($baseDatos->getError());
                }
            } else {
                $this->setMensajeOperacion($baseDatos->getError());
            }
            return $respuesta;
        }

        //Definimos un metodo para listar todas las tablas del responsable con o sin condicion
        public function listar ($condicion = "") {
            $arregloResponsableV = null;
            $baseDatos = new BaseDatos();
            $consulta = "SELECT * FROM responsable ";
            if ($condicion != "") {
                $consulta .= "WHERE ".$condicion;
            }
            if ($baseDatos->Iniciar()) {
                if ($baseDatos->Ejecutar($consulta)) {
                    $arregloResponsableV = [];
                    while ($responsablevEncontrado = $baseDatos->Registro()) {
                        $responsableV = new ResponsableV();
                        $responsableV->buscar($responsablevEncontrado['rnumeroempleado']);                        array_push($arregloResponsableV, $responsableV);
                    }
                } else {
                    $this->setMensajeOperacion($baseDatos->getError());
                }
            } else {
                $this->setMensajeOperacion($baseDatos->getError());
            }
            return $arregloResponsableV;
        }
    }