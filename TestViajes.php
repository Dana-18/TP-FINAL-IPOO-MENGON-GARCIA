<?php
//Incluimos las otras clases en nuestro test
include_once "BaseDatos.php";
include_once "Empresa.php";
include_once "Pasajero.php";
include_once "ResponsableV.php";
include_once "Viaje.php";
include_once "Viaje_pasajeros.php";
include_once "Persona.php";

Class TestViajes {
    
    public static function showMenu() {

        $opcion = -1;
        //Definimos la funcion mostrar menu que la misma en donde estan todos los menus de todas las clases
        while ($opcion != 0) {
            echo "\n --- MENU PRINCIPAL ---\n";
            echo "1. Gestionar Empresas\n";
            echo "2. Gestionar Responsables\n";
            echo "3. Gestionar Viajes\n";
            echo "4. Gestionar Pasajeros\n";
            echo "5. Gestionar Viajes Pasajero\n";
            echo "0. Salir\n";
            echo "Ingrese su opcion: ";
            $opcion = trim(fgets(STDIN));

            switch ($opcion) {
                case 1:
                    TestViajes::menuEmpresas();
                    break;
                case 2:
                    TestViajes::menuResponsables();
                    break;
                case 3:
                    TestViajes::menuViajes();
                    break;
                case 4:
                    TestViajes::menuPasajeros();
                    break;
                case 5:
                    TestViajes::menuViajePasajeros();
                    break;
                case 0:
                    echo "Saliendo del programa. ¡Adios!\n";
                    break;
                default:
                    echo "Opcion no valida. Intente de nuevo.\n";
                    break;
            }
        }
    }

       public static function menuEmpresas() {
                $opcionEmpresa = -1;
                //Definimos el menu de empresa
                while ($opcionEmpresa != 0) {
                    echo "\n --- GESTION DE EMPRESAS ---\n";
                    echo "1. Listar Empresas\n";
                    echo "2. Buscar Empresa\n";
                    echo "3. Crear Empresa\n";
                    echo "4. Modificar Empresa\n";
                    echo "5. Eliminar Empresa\n";
                    echo "0. Volver al menu principal\n";
                    echo "Ingrese su opción: ";
                    $opcionEmpresa = trim(fgets(STDIN));

                    switch($opcionEmpresa) {
                        case 1:
                            TestViajes::mostrarEmpresas();
                            break;
                        case 2:
                            TestViajes::buscarEmpresaMenu();
                            break;
                        case 3:
                            TestViajes::agregarEmpresaMenu();
                            break;
                        case 4:
                            TestViajes::modificarEmpresaMenu();
                            break;
                        case 5: 
                            TestViajes::eliminarEmpresaMenu();
                            break;
                        case 0:
                            echo "Volviendo al menu principal.\n";
                            break;
                        default:
                            echo "Opcion no valida. Intentelo de nuevo.\n";
                            break;
                    }
                }
            }

            public static function menuResponsables() {
                $opcionResponsables = -1;
                //Definimos el menu de responsables
                while ($opcionResponsables != 0) {
                    echo "\n --- GESTION RESPONSABLES ---\n";
                    echo "1. Listar Responsables\n";
                    echo "2. Buscar Responsable\n";
                    echo "3. Crear Responsable\n";
                    echo "4. Modificar Responsable\n";
                    echo "5. Eliminar Responsable\n";
                    echo "0. Volver al menu principal\n";
                    echo "Ingrese su opcion: ";
                    $opcionResponsables = trim(fgets(STDIN));

                    switch ($opcionResponsables) {
                        case 1:
                            TestViajes::mostrarResponsables();
                            break;
                        case 2:
                            TestViajes::buscarResponsableMenu();
                            break;
                        case 3:
                            TestViajes::agregarResponsableMenu();
                            break;
                        case 4:
                            TestViajes::modificarResponsableMenu();
                            break;
                        case 5:
                            TestViajes::eliminarResponsableMenu();
                            break;
                        case 0:
                            echo "Volviendo al menu principal\n";
                            break;
                        default:
                            echo "Opcion no valida. Intentelo nuevamente:\n";
                            break;
                    }
                }
            }

            public static function menuViajes() {
                $opcionViajes = -1;
                //Definimos el menu de viajes
                while ($opcionViajes != 0) {
                    echo "--- GESTION VIAJES ---\n";
                    echo "1. Listar Viajes\n";
                    echo "2. Buscar Viaje\n";
                    echo "3. Crear Viaje\n";
                    echo "4. Modificar Viaje\n";
                    echo "5. Eliminar Viaje\n";
                    echo "0. Volver al menu principal\n";
                    echo "Ingrese su opcion: ";
                    $opcionViajes = trim(fgets(STDIN));

                    switch ($opcionViajes) {
                        case 1:
                            TestViajes::mostrarViajes();
                            break;
                        case 2:
                            TestViajes::buscarViajeMenu();
                            break;
                        case 3:
                            TestViajes::agregarViajeMenu();
                            break;
                        case 4:
                            TestViajes::modificarViajeMenu();
                            break;
                        case 5:
                            TestViajes::eliminarViajeMenu();
                            break;
                        case 0:
                            echo "Volviendo al menu principal\n";
                            break;
                        default:
                            echo "Opcion no valida. Intentelo nuevamente:\n";
                            break;
                    }
                }
            }

            public static function menuPasajeros() {
                $opcionPasajeros = -1;
                //Definimos el menu de pasajeros
                while ($opcionPasajeros != 0) {
                    echo "--- GESTION PASAJEROS ---\n";
                    echo "1. Listar Pasajeros\n";
                    echo "2. Buscar Pasajero\n";
                    echo "3. Crear Pasajero\n";
                    echo "4. Modificar Pasajero\n";
                    echo "5. Eliminar Pasajero\n";
                    echo "0. Volver al menu principal\n";
                    echo "Ingrese su opcion: ";
                    $opcionPasajeros = trim(fgets(STDIN));
              

                switch ($opcionPasajeros) {
                    case 1:
                        TestViajes::mostrarPasajeros();
                        break;
                    case 2:
                        TestViajes::buscarPasajeroMenu();
                        break;
                    case 3:
                        TestViajes::agregarPasajeroMenu();
                        break;
                    case 4:
                        TestViajes::modificarPasajeroMenu();
                        break;
                    case 5:
                        TestViajes::eliminarPasajeroMenu();
                        break;
                    case 0:
                        echo "Volviendo al menu principal\n";
                        break;
                    default:
                        echo "Opcion no valida. Intentelo nuevamente: \n";
                        break;
                }
            }
            }
            public static function menuViajePasajeros() {
                $opcionPasajeros = -1;
                //Definimos el menu de pasajeros
                while ($opcionPasajeros != 0) {
                    echo "--- GESTION VIAJE PASAJEROS ---\n";
                    echo "1. Mostrar Viajes Pasajero\n";
                    echo "2. Buscar Viajes Pasajero\n";
                    echo "3. Modificar Viaje Pasajero\n";
                    echo "4. Eliminar Viaje Pasajero\n";
                    echo "0. Volver al menu principal\n";
                    echo "Ingrese su opcion: ";
                    $opcionPasajeros = trim(fgets(STDIN));
                    
                    
                    switch ($opcionPasajeros) {
                        case 1:
                            TestViajes::mostrarViajesPasajero();
                            break;
                        case 2:
                            TestViajes::buscarViajesPasajero();
                            break;
                        case 3:
                            TestViajes::modificarViajesPasajero();
                            break;
                        case 4:
                            TestViajes::eliminarViajesPasajero();
                            break;
                        case 0:
                            echo "Volviendo al menu principal\n";
                            break;
                        default:
                            echo "Opcion no valida. Intentelo nuevamente: \n";
                            break;
                    }
                }
            }
            public static function mostrarViajesPasajero() {
                $viajePasajero = new ViajePasajero();
                $viajes = $viajePasajero->listar();
                if ($viajes != null) {
                    foreach ($viajes as $viaje) {
                        echo "$viaje\n";
                    }
                }else {
                    echo "\nNo existen pasajeros con viajes\n";
                }
            }
            
            public static function buscarViajesPasajero() {
                echo "Inserte el numero de documento del pasajero: \n";
                $docPasajero = trim(fgets(STDIN));
                $viajePasajero = new ViajePasajero();
                $viajes = $viajePasajero->listar("vpdocumento= " . $docPasajero);
                if ($viajes != null) {
                    foreach ($viajes as $viaje) {
                        echo "$viaje";
                    }
                }else {
                    echo "\nNo existen viajes\n";
                }
            }

            public static function modificarViajesPasajero() {
                $viajePasajero= new ViajePasajero;
                $viaje = new Viaje;
                $pasajero = new Pasajero;
                TestViajes::mostrarViajesPasajero();
                echo "Ingrese el documento de la persona a la que desea modificarle el viaje:\n";
                $docPersona = trim(fgets(STDIN));
                echo "Ingrese el nuevo id de viaje:\n";
                $idViaje = trim(fgets(STDIN));
                $pasajero->setDocumento($docPersona);
                $viaje->setIdViaje($idViaje);
                
                if (TestViajes::es_numerico($idViaje)) {
                    if ($viajePasajero->buscar(" pdocumento= ".$docPersona)) {
                        if ($viajePasajero->buscar(" idviaje= " . $idViaje)) {
                            echo "Ya existe un viaje con ese id\n";
                        } else {
                            $idViejo = $viajePasajero->getObjViaje()->getIdViaje();
                            $viajePasajero->setObjPasajero($pasajero);
                            $viajePasajero->setObjViaje($viaje);
                            $viajePasajero->modificar($idViejo);
                            echo "Pasajero modificado con exito\n";                        }
                    } 
                }
            }
            
            public static function eliminarViajesPasajero() {
                echo "Ingrese el id del viaje que desea eliminar\n";
                $idViaje = trim(fgets(STDIN));
                echo "Ingrese su numero de documento: \n";
                $documento = trim(fgets(STDIN));
                TestViajes::mostrarViajesPasajero();
                $resp = false;
                $viajePasajero = new ViajePasajero;
                if ($viajePasajero->buscar("vpdocumento = ".$documento . " AND idviaje= ". $idViaje)) {
                    $resp = $viajePasajero->eliminar();
                    echo "Viaje Eliminado con exito!\n";
                    
                    if (!$viajePasajero->buscar("vpdocumento= " . $documento)) {
                        $pasajero = new Pasajero;
                        $pasajero->setDocumento($documento);
                        $pasajero->eliminar();
                    }
                } else {
                    if (!$viajePasajero->buscar("vpdocumento= " . $documento)) {
                        $pasajero = new Pasajero;
                        $pasajero->setDocumento($documento);
                        $pasajero->eliminar();
                    }
                    echo "Ocurrio un error\n";                }
            }
            
            //Funcion que nos permite verificar que el usuario
            public static function es_numerico($valor) {
                return is_numeric( $valor ) && filter_var( $valor, FILTER_VALIDATE_INT ) !== false && $valor >= 0;
            }

            
            //Creamos los metodos para las opciones del menu de empresas    
            public static function mostrarEmpresas() {
                $empresa = new Empresa();
                $empresas = $empresa->listar();
                if ($empresas != null) {
                foreach ($empresas as $empresa) {
                    echo "$empresa";
                } 
                }else {
                    echo "\nNo existen empresas\n";
                }
            }

            public static function buscarEmpresa($id) {
                $rta = null;
                $empresa = new Empresa;
                if (TestViajes::es_numerico($id)) {
                    if ($empresa->buscar($id)) {
                        $rta = $empresa;
                    } else {
                    echo "\nNo se encontraron empresas.\n"; 
                    }
                } else {
                    echo "\nEl id de empresa debe ser un numero mayor a 0.\n";
                }
                return $rta;
            }

            public static function buscarEmpresaMenu() {
                TestViajes::mostrarEmpresas();
                echo "\n Buscar Empresa\n";
                echo "Ingrese el ID de la empresa: ";
                $id = trim(fgets(STDIN));
                if ($empresa = TestViajes::buscarEmpresa($id)) {
                    echo $empresa;
                } else {
                    echo "\nEmpresa no encontrada\n";
                }
            }

            public static function agregarEmpresa($nombre, $direccion) {
                $empresa = new Empresa;
                $empresas = $empresa->listar();
                if ($empresas != "") {
                $empresa->cargar($nombre, $direccion);
                return $empresa->insertar();
                } else {
                    echo "Ya existe una empresa.\n";                
                }
            }

            public static function agregarEmpresaMenu() {

                echo "\n Agregar Empresa\n";
                echo "Ingrese el nombre de la empresa: ";
                $nombre = trim(fgets(STDIN));
                echo "Ingrese la direccion: ";
                $direccion = trim(fgets(STDIN));
                $empresa = new Empresa();
                if (!$empresa->listar()) {
                if (TestViajes::agregarEmpresa($nombre, $direccion)) { //chequeamos que no existan empresas
                    echo "\nEmpresa Agregada\n";
                } else {
                    echo "\nOcurrio un error. Intentelo nuevamente.\n";
                } 
                } else {
                    echo "\nYa existe una empresa.\n";
                } 
            }

            public static function modificarEmpresa($id, $nombre, $direccion) {
                $empresa = new Empresa;
                $resp = false;

                if (TestViajes::es_numerico($id)) {
                    if ($empresa->buscar($id)) {
                        if ($nombre != "") {
                            $empresa->setNombre($nombre);
                        }
                        if ($direccion != "") {
                            $empresa->setDireccion($direccion);
                        }
                        $resp = $empresa->modificar();
                    } else {
                        echo "\nID no encontrado.\n";
                    }
                } else {
                    echo "\nID de empresa menor a 0.\n";
                }
                return $resp;
            }

            public static function modificarEmpresaMenu() {
                TestViajes::mostrarEmpresas();
                echo "Ingrese el id de la empresa a modificar: "; //Pido ID para ver que empresa modifico
                $id = trim(fgets(STDIN));
                echo "Ingrese el nuevo nombre de la empresa: ";
                $nombre = trim(fgets(STDIN));
                echo "Ingrese la nueva direccion de la empresa: ";
                $direccion = trim(fgets(STDIN));
                if (TestViajes::modificarEmpresa($id, $nombre, $direccion)) {
                    echo "\nEmpresa modificada con exito.\n";
                } else {
                    echo "\nError al intentar modificar la empresa.\n";
                }
            }


            public static function eliminarEmpresa($id) {
                $empresa = new Empresa;
                $resp = false;
                if (TestViajes::es_numerico($id)) {
                    if ($empresa->buscar($id)) {
                        $resp = $empresa->eliminar();
                    } else {
                        echo "\nEmpresa no encontrada.\n";
                    }
                } else {
                    echo "\nID menor a cero.\n";
                }
                return $resp;
            }

            public static function eliminarEmpresaMenu() {
                TestViajes::mostrarEmpresas();
                echo "Ingrese el ID de la empresa que desea eliminar: ";
                $id = trim(fgets(STDIN));
                if (TestViajes::eliminarEmpresa($id)) {
                    echo "\nEmpresa eliminada con exito.\n";
                } else {
                    echo "\nError al intentar eliminar la empresa.\nAsegurese de que no exista un viaje asociado.\n";
                }
            }

            //Creamos los metodos para las opciones del menu de responsables
            public static function mostrarResponsables() {
                $responsable = new ResponsableV;
                $responsables = $responsable->listar();
                if ($responsables != null) {
                foreach ($responsables as $responsableV) {
                    echo "\n $responsableV";
                }
                } else {
                    echo "\nNo existen responsables.\n";
                }
            }
            public static function buscarResponsable($numeroEmpleado) {
                $respuesta = null;
                $responsable = new ResponsableV;
                if (TestViajes::es_numerico($numeroEmpleado)) {
                    if($responsable->buscar($numeroEmpleado)) {
                        $respuesta = $responsable;
                    }
                } else {
                    echo "\nError, numero de empleado incorrecto.\n";
                }
                return $respuesta;
            }

            public static function buscarResponsableMenu() {
                TestViajes::mostrarResponsables();
                echo "\nBuscar responsable\n";
                echo "Ingresar el numero de empleado del responsable: ";
                $numeroEmpleado = trim(fgets(STDIN));
                if ($responsable = TestViajes::buscarResponsable($numeroEmpleado)) {
                    echo $responsable;
                } else {
                    echo "\nError, el responsable no fue encontrado.\n";
                }
            }
             
            public static function agregarResponsable($documento, $nombre, $apellido, $numeroLicencia) {
                $responsable = new ResponsableV;
                if (!$responsable->listar("rnumerolicencia= ".$numeroLicencia)) { //Verificamoas que no exista un responsable con el mismo numero de licencia
                $responsable->cargarRe($documento, $nombre, $apellido, $numeroLicencia);
                return $responsable->insertar();
                } else {
                    echo "\nYa existe un responsable con esa licencia.\n";
                }

            }

            public static function agregarResponsableMenu () {
                echo "\nAgregar responsable\n";
                echo "Ingrese el nombre: ";
                $nombre = trim(fgets(STDIN));
                echo "Ingrese el apellido: ";
                $apellido = trim(fgets(STDIN));
                echo "Ingrese el numero de documento: ";
                $documento = trim(fgets(STDIN));
                echo "Ingrese el numero de licencia: ";
                $numeroLicencia = trim(fgets(STDIN));
                if (TestViajes::agregarResponsable($documento, $nombre, $apellido, $numeroLicencia)) {
                    echo "\nEl responsable ha sido agregado con exito!\n";
                } else {
                    echo "\nError, el responsable no ha sido agregado.\n";
                }
            }

            public static function modificarResponsable($numeroEmpleado, $numeroLicencia, $nombre, $apellido) {
                $responsable = new ResponsableV;
                $respuesta = false;
                if (!$responsable->listar("rnumerolicencia= ".$numeroLicencia)) {
                if(TestViajes::es_numerico($numeroEmpleado)) {
                    if ($responsable->buscar($numeroEmpleado)) {
                            $responsable->setNombre($nombre);
                            $responsable->setApellido($apellido);
                        if (TestViajes::es_numerico($numeroEmpleado)) {
                            $responsable->setRnumeroEmpleado($numeroEmpleado);
                        }
                        if (TestViajes::es_numerico($numeroLicencia)) {
                            $responsable->setRnumeroLicencia($numeroLicencia);
                        }
                        $respuesta = $responsable->modificar();
                    } else {
                        echo "\nError, el responsable no existe.\n";
                    }
                }else {
                    echo "\nError, numero de empleado incorrecto.\n";
                    }
                } else {
                    echo "\nError, ya existe un responsable con ese numero de licencia";
                }
                return $respuesta;
            }
            
           public static function modificarResponsableMenu() {
                TestViajes::mostrarResponsables();
                echo "\nModificar Responsable\n";
                echo "Ingrese el numero de empleado: \n";
                $numeroEmpleado = trim(fgets(STDIN));
                echo "Ingrese el numero de licencia: \n";
                $numeroLicencia = trim(fgets(STDIN));
                echo "Ingresa el nombre: \n";
                $nombre = trim(fgets(STDIN));
                echo "Ingresa el apellido: \n";
                $apellido = trim(fgets(STDIN));
                if (TestViajes::modificarResponsable($numeroEmpleado, $numeroLicencia, $nombre, $apellido)) {
                    echo "\nEl responsable ha sido modificado con exito!\n";
                } else {
                    echo "\nNo es posible modificar el responsable.\n";
                }
            }

            public static function eliminarResponsable ($numeroEmpleado, $numDoc) {
                $responsable = new ResponsableV; 
                $respuesta = false;
                if (TestViajes::es_numerico($numeroEmpleado)) {
                    if ($responsable->buscar($numeroEmpleado)) {
                        $respuesta = $responsable->eliminar();
                       // $persona = new Persona;
                        //$persona->buscar($numDoc);
                       // $persona->eliminar();
                    } else {
                        echo "Error, el responsable no existe.";
                    }
                } else {
                    echo "\nError, numero de empleado incorrecto.\n";
                }
                return $respuesta;
            }

            public static function eliminarResponsableMenu () {
                TestViajes::mostrarResponsables();
                echo "\nEliminar Responsable\n";
                echo "Ingrese el numero de empleado: ";
                $numeroEmpleado = trim(fgets(STDIN));
                echo "ingrese el numero de documento: ";
                $numDoc = trim(fgets(STDIN));
                if(TestViajes::eliminarResponsable($numeroEmpleado, $numDoc)) {
                    echo "\nEl responsable ha sido eliminado con exito!\n";
                } else {
                    echo "\nError, el responsable no ha sido eliminado.\n";
                }
            }

            //Creamos los metodos para las opciones del menu de viajes
            public static function mostrarViajes() {
                $viaje = new Viaje();
                $viajes = $viaje->listar();
                if ($viajes != null) {
                foreach ($viajes as $viaje) {
                    echo "\n";
                    echo "$viaje\n";
                }
                }else {
                    echo "\nNo existen viajes.\n";
                }
            }

            public static function buscarViaje($idViaje) {
                $rta = null;
                $viaje = new Viaje;

                if (TestViajes::es_numerico($idViaje)) {
                    if ($viaje->buscar($idViaje)) {
                        $rta = $viaje;
                    }
                } else {
                    echo "\nEl ID ingresado es menor a cero.\n";
                }
                return $rta;
            }

            public static function buscarViajeMenu() {
                echo "Ingrese el ID del viaje que quiere buscar: ";
                $idViaje = trim(fgets(STDIN));
                if ($viaje = TestViajes::buscarViaje($idViaje)) {
                    echo $viaje;
                } else {
                    echo "\nID ingresado no encontrado.\n";
                }
            }

            public static function agregarViaje($destino, $cantMaxPasajeros, $objPasajeros, $nroResponsable, $importeViaje, $idEmpresa) {
                $viaje = new Viaje;
                $resp = false;
                $yaExiste = false;
                $viajes = $viaje->listar();
                //Compruebo que no exista un viaje con ese destino
                foreach ($viajes as $buscarViaje) { 
                    if ($buscarViaje->getvDestino() == $destino) {
                        $yaExiste = true;
                    }
                }
                //Compruebo que no exista un responsable con ese destino
                if (!$yaExiste) { 
                if (TestViajes::es_numerico($nroResponsable)) {
                    $objResponsableV = new ResponsableV;
                    $objResponsableV->buscar($nroResponsable);
                    if (TestViajes::es_numerico($idEmpresa)) {
                        $objEmpresa = new Empresa;
                        $objEmpresa->buscar($idEmpresa);
                        if (!TestViajes::es_numerico($cantMaxPasajeros)) {
                            $cantMaxPasajeros = 0;
                        }
                        if ($importeViaje < 0) {
                            $importeViaje = 0;
                        }
                        $viaje->cargar($destino, $cantMaxPasajeros, $objPasajeros, $objResponsableV, $importeViaje, $objEmpresa);
                        $resp = $viaje->insertar();
                    } else {
                        echo "\nID de empresa ingresado incorrecto.\n";
                    }
                } else {
                    echo "\nNumero de responsable ingresado incorrecto.\n";
                }
            } else {
                echo "\nYa existe un viaje con ese destino.\n";
            }
                return $resp;
            }

            public static function agregarViajeMenu() {
                
                echo "Ingrese el destino del viaje: ";
                $destino = trim(fgets(STDIN));
                echo "Ingrese la cantidad maxima de pasajeros del viaje: ";
                $cantMaxPasajeros = trim(fgets(STDIN));
                echo "Ingrese el numero del empleado responsable: ";
                $nroResponsable = trim(fgets(STDIN));
                echo "Ingrese el costo del viaje: ";
                $importeViaje = trim(fgets(STDIN));
                echo "Ingrese el id de la empresa a la que desea agregar el viaje: ";
                $idEmpresa = trim(fgets(STDIN));
                if (TestViajes::agregarViaje($destino, $cantMaxPasajeros, [], $nroResponsable, $importeViaje, $idEmpresa)) {
                    echo "\nViaje agregado con exito.\n";
                } else {
                    echo "\nError al intentar agregar el viaje.\n";
                }
            }

            public static function modificarViaje($idViaje, $destino, $cantMaxPasajeros, $objPasajeros, $nroResponsable, $importeViaje, $idEmpresa) {
                $viaje = new Viaje();
                $resp = false;
                if (TestViajes::es_numerico($idViaje)) {
                    if ($viaje->buscar($idViaje)) {
                        $viaje->setObjPasajeros($objPasajeros);
                        if ($destino != "") {
                            $viaje->setvDestino($destino);
                        }
                        if ($importeViaje > 0) {
                            $viaje->setvImporte($importeViaje);
                        }
                        if (TestViajes::es_numerico($cantMaxPasajeros)) {
                            $viaje->setvCantMaxPasajeros($cantMaxPasajeros);
                        }
                        if (TestViajes::es_numerico($nroResponsable)) {
                            $objResponsableV = new ResponsableV();
                            if ($objResponsableV->buscar($nroResponsable)) {
                                $viaje->setObjResponsableV($objResponsableV);
                            }
                        }
                        if (TestViajes::es_numerico($idEmpresa)) {
                            $objEmpresa = new Empresa();
                            if ($objEmpresa->buscar($nroResponsable)) {
                                $viaje->setObjEmpresa($objEmpresa);
                            }
                        }
                        $resp = $viaje->modificar();
                    } else {
                        echo "\nViaje no encontrado.\n";
                    }
                } else {
                    echo "\nID de viaje incorrecto.\n";
                }
                return $resp;
            }

            public static function modificarViajeMenu () {
                TestViajes::mostrarViajes();

                echo "Ingrese el ID del viaje que desea modificar: ";
                $idViaje = trim(fgets(STDIN));
                echo  "Ingrese el nuevo destino: ";
                $destino = trim(fgets(STDIN));
                echo "Ingrese la cantidad maxima de pasajeros: ";
                $cantidadMaxima = trim(fgets(STDIN));
                echo "Ingrese el numero del empleado responsable: ";
                $nroResponsable = trim(fgets(STDIN));
                echo "Ingrese el importe del viaje: ";
                $importeViaje = trim(fgets(STDIN));
                echo "Ingrese el ID de la empresa que realiza el viaje: ";
                $idEmpresa = trim(fgets(STDIN));
                if (TestViajes::modificarViaje($idViaje, $destino, $cantidadMaxima, [], $nroResponsable, $importeViaje, $idEmpresa)) {
                    echo "\nViaje modificado con exito.\n";
                } else {
                    echo "\nError al intentar modificar el viaje.\n";
                }
            }

            public static function eliminarViaje($idViaje) {
                $viaje = new Viaje;
                $resp = false;
                if (TestViajes::es_numerico($idViaje)) {
                    if ($viaje->buscar($idViaje)) {
                        $resp = $viaje->eliminar();
                    } else {
                        echo "\nViaje inexistente.\n";
                    }
                } else {
                    echo "\nEl ID del viaje no existe.\n";
                }
                return $resp;
            }

            public static function eliminarViajeMenu() {
                TestViajes::mostrarViajes();
                echo "Ingrese el ID del viaje que desea eliminar: ";
                $idViaje = trim(fgets(STDIN));
                if (TestViajes::eliminarViaje($idViaje)) {
                    echo "\nViaje eliminado exitosamente.\n";
                } else {
                    echo "\nOcurrio un error al intentar eliminar el viaje.\n";
                }
            }

            //Creamos los metodos para las opciones del menu de pasajero
            public static function mostrarPasajeros() {
                $pasajero = new Pasajero();
                $pasajeros = $pasajero->listar();
                if ($pasajeros != null) {
                foreach ($pasajeros as $pasajero) {
                    echo "\n $pasajero";
                }
                } else {
                    echo "\nNo existen pasajeros.\n";
                }
            }
            
            public static function buscarPasajero($numDoc) {
                $rta = null;
                $pasajero = new Pasajero();
                if (TestViajes::es_numerico($numDoc)) {
                    if ($pasajero->buscar($numDoc)) {
                        $rta = $pasajero;
                    }
                } else {
                    echo "\nDebe ingresar un numero de documento valido.\n";
                }
                return $rta;
            }
            
            public static function buscarPasajeroMenu () {
                TestViajes::mostrarPasajeros();
                echo "\nBuscar Pasajeros\n";
                echo "Ingrese el documento del pasajero: ";
                $documento = trim(fgets(STDIN));
                if ($pasajero = TestViajes::buscarPasajero($documento)) {
                    echo $pasajero;
                } else {
                    echo "\nError, pasajero no encontrado.\n";
                }
            }

            public static function agregarPasajero($nombre, $apellido, $numDoc, $telefono, $idViaje) {
                $resp = false;
                $viaje = new Viaje;
                if (TestViajes::es_numerico($idViaje)) {
                    if ($viaje->buscar($idViaje)) {
                        $pasajero = new Pasajero;
                        $objViaje = new Viaje;
                        $pasajeroViaje = new ViajePasajero;
                        $objViaje->setIdViaje($idViaje);
                        if (!$pasajero->buscar($numDoc)) { //verificamos que no exista un pasajero con el mismo numero de documento
                        if (TestViajes::es_numerico($numDoc)) {
                            $pasajero->cargarPa($numDoc, $nombre, $apellido, $telefono, $objViaje);
                            $resp = $pasajero->insertar();
                            $pasajero->setDocumento($numDoc);
                            $pasajeroViaje->cargar($objViaje, $pasajero);
                            $pasajeroViaje->insertar();
                        } else {
                            echo "\nDocumento ingresado inexistente.\n";
                        } }
                        else if ($pasajeroViaje->buscar(" idviaje= ".$idViaje . " AND vpdocumento= " .$numDoc)){
                            echo "Ya existe un pasajero en ese viaje\n";
                        } else {
                            $pasajero->setDocumento($numDoc);
                            $pasajeroViaje->cargar($objViaje, $pasajero);
                            $pasajeroViaje->insertar();
                            $resp = true;
                            echo "\nYa existe un pasajero con ese documento, se asocio un nuevo viaje.\n";
                        }
                    } else {
                        echo "\nID de viaje ingresado inexistente.\n";
                    }
                } else {
                    echo "\nID de viaje no valido.\n";
                }
                return $resp;
            }

            public static function agregarPasajeroMenu () {
                echo "\nAgregar Pasajero\n";
                echo "Ingrese el nombre: ";
                $nombre = trim(fgets(STDIN));
                echo "Ingrese el apellido: ";
                $apellido = trim(fgets(STDIN));
                echo "Ingrese el numero de documento: ";
                $numDoc = trim(fgets(STDIN));
                echo "Ingrese el numero de telefono: ";
                $telefono = trim(fgets(STDIN));
                echo "Ingrese el id de viaje: ";
                $idViaje = trim(fgets(STDIN));
                if(TestViajes::agregarPasajero($nombre, $apellido, $numDoc, $telefono, $idViaje)) {
                    echo "\nPasajero agregado.\n";
                } else {
                    echo "\nHa ocurrido un error.\n";
                }
            }
            

            public static function modificarPasajero($numDoc, $nombre, $apellido, $telefono, $idViaje) {
                $pasajero = new Pasajero();
                $respuesta = false;
                if (TestViajes::es_numerico($numDoc)) {
                    if ($pasajero->buscar($numDoc)) {
                        if ($nombre != "") {
                            $pasajero->setNombre($nombre);
                        }
                        if ($apellido != "") {
                            $pasajero->setApellido($apellido);
                        }
                        if ($telefono != "") {
                            $pasajero->setPtelefono($telefono);
                        }
                        $viaje = new Viaje();
                        if (TestViajes::es_numerico($idViaje)) {
                            if ($viaje->buscar($idViaje)) {
                                $pasajero->setObjViaje($viaje);
                            }
                        }
                    $respuesta = $pasajero->modificar();
                    } else {
                        echo "\nEl pasajero no existe.\n";
                    }
                } else {
                    echo "\nEl numero de documento es invalido.\n";
                }
                return $respuesta;
            }
            
            public static function modificarPasajeroMenu() {
                TestViajes::mostrarPasajeros();
                echo "Ingrese el numero de documento del pasajero a modificar: ";
                $numDoc = trim(fgets(STDIN));
                echo "Ingrese el nombre: ";
                $nombre = trim(fgets(STDIN));
                echo "Ingrese el apellido: ";
                $apellido = trim(fgets(STDIN));
                echo "Ingrese el numero de telefono: ";
                $telefono = trim(fgets(STDIN));
                echo "Ingrese el id de viaje: ";
                $idViaje = trim(fgets(STDIN));
                if(TestViajes::modificarPasajero($numDoc, $nombre, $apellido, $telefono, $idViaje)) {
                    echo "\nEl pasajero ha sido modificado con exito!\n";
                } else {
                    echo "\nError, el pasajero no se pudo modificar.\n";
                }
            }
            
            public static function eliminarPasajero($numDoc) {
                $pasajero = new Pasajero();
                $respuesta = false;
                if (TestViajes::es_numerico($numDoc)) {
                    if($pasajero->buscar($numDoc)) {
                        $respuesta = $pasajero->eliminar();
                        $viajePasajero = new ViajePasajero;
                        if ($viajePasajero->buscar(" pdocumento = ".$numDoc))  {
                            $viajePasajero->eliminar();
                        }
                    //    $persona = new Persona;
                    //    if ($persona->buscar($numDoc)) {
                     //       $persona->eliminar();
                      //  }
                    } else {
                        echo "\nError, el pasajero no se pudo eliminar.\n";
                    } 
                } else {
                    echo "\nError, el numero de documento del pasajero es inexistente.\n";
                }
                return $respuesta;
            }

            public static function eliminarPasajeroMenu () {
                TestViajes::mostrarPasajeros();
                echo "\nEliminar Pasajero\n";
                echo "Ingrese el numero de documento del pasajero: ";
                $documento = trim(fgets(STDIN));
                if (TestViajes::eliminarPasajero($documento)) {
                    echo "\nEl pasajero ha sido eliminado con exito!\n";
                } else {
                    echo "\nError, el pasajero no se pudo eliminar.\n";
                }
            }             
}

//Nos ayuda a iniciar la funcion
TestViajes::showMenu();