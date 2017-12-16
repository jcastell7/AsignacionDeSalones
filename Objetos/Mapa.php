<?php

class Mapa {
    /*
     * clase contenedora de las tablas de salones y de grupos
     * recibe la informacion de la base de datos
     */

    private $salones;
    private $grupos;
    private $conn;
    private $querySalones;
    private $queryGrupos;

    function __construct() {
        require_once '../db/logindb.php';
        $this->conn = new mysqli($hn, $un, $pw, $db);
        if ($this->conn->connect_error) {
            die($this->conn->connect_error);
        }
        $this->queryGrupos = "SELECT * FROM grupos";
        $this->querySalones = "SELECT * FROM salones";
        $this->salones = $this->conn->query($this->querySalones);
        $this->grupos = $this->conn->query($this->queryGrupos);
    }

    /*
     * metodo para convertir de query de mysql a objeto Salon php
     * recibe el idSalon y retorna un objeto Salon
     */

    private function convertirSqlObjetoSalon($idSalon) {
        $object = $this->querySalones->fetch_object($idSalon);
        $salon = new Salon($object->numero, $object->capacidad, $object->idSalon, $object->info, $object->disponibilidad);
        return $salon;
    }

    /*
     * crea un nuevo salon, recibe el numero del salon , la capacidad, la disponibilidad, la informacion (puede dejarse vacio)
     * y la agrega al array de salones
     */

    public function crearSalon($numero, $capacidad, $disponibilidad = true, $info = null) {
        $idSalon = $this->salones->num_rows + 1;
        $salonNuevo = new Salon($numero, $capacidad, $idSalon, $info, $disponibilidad);
        $this->agregarSalon($salonNuevo);
    }

    /*
     * agrega un salon a la tabla de salones
     * recibe el objeto salon
     */

    private function agregarSalon($salon) {
        $idSalon = $salon->getIdSalon();
        $numero = $salon->getNumero();
        $capacidad = $salon->getCapacidad();
        $disponibilidad = $salon->getDisponibilidad();
        $info = $salon->getInfo();
        $agregarSalon = "INSERT INTO `salones` (`idSalon`, `numero`, `capacidad`, `disponibilidad`, `info`) VALUES ('$idSalon', '$numero', '$capacidad', '$disponibilidad', '$info')";
    }

    /*
     * metodo para convertir de query de mysql a objeto Salon php
     * recibe el idSalon y retorna un objeto Salon
     */

    private function convertirSqlObjetoSGrupo($idGrupo) {
        $object = $this->queryGrupos->fetch_object($idGrupo);
        $salon = new Salon($object->, $object->capacidad, $object->idSalon, $object->info, $object->disponibilidad);
        return $salon;
    }

    /*
     * agrega un grupo a la tabla de grupos
     */

    private function agregarGrupos($grupo) {
        array_push($this->grupos, $grupo);
    }

    /*
     * almacena los grupos en una celda del array
     * el id es el numero del salon en el que se dará la clase
     * recibe el numero del salon (bloque-salon ej: 11-102) y el array de grupos que entran al salon
     * el array de grupos esta compuesto por el objeto del grupo.
     * si es un solo grupo en el salon debe estar en un array
     */

    private function ingresarGrupoASalon($numeroSalon, $arrayGrupos) {
        
    }

    /*
     * elimina el grupo del array de grupos
     * recibe el nombre del programa que se quiere eliminar
     */

    private function eliminarGrupoPrograma($programa) {
        foreach ($this->grupos as $id => $grupo) {
            if ($grupo->getPrograma() === $programa) {
                unset($this->grupos[$id]);
                return "grupo eliminado";
            }
        }
        return "no se pudo eliminar el grupo";
    }

    /*
     * elimina el salon de la tabla de salones
     * recibe el numero del salon a eliminar
     */

    private function eliminarSalon($salon) {
        foreach ($this->salones as $id => $salon) {
            if ($salon->getNumero() === $salon) {
                unset($this->grupos[$id]);
            }
        }
        return "no se pudo eliminar el salon";
    }

    /*
     * retorna una tabla de los salones disponibles, es decir que no estan siendo utilizados
     * si no hay ninguno retorna vacio
     */

    public function salonesDisponibles() {
        $respuesta = array();
        foreach ($this->salones as $salon) {
            if (!array_key_exists($salon->getNumero(), $this->salonesConGrupo)) {
                array_push($respuesta, $salon);
            }
        }
        return $respuesta;
    }

    /*
     * retorna una tabla de los salones que estan siendo utilizados
     * si no hay ninguno retorna vacio
     */

    public function salonesOcupados() {
        $respuesta = array();
        foreach ($this->salones as $salon) {
            if (array_key_exists($salon->getNumero(), $this->salonesConGrupo)) {
                array_push($respuesta, $salon);
            }
        }
        return $respuesta;
    }

    /*
     * retorna una tabla de los salones que esta utilizando un grupo
     * recibe el nombre del programa
     */

    public function salonesPorPrograma($programa) {
        $res = array();
        foreach ($this->salonesConGrupo as $salon => $grupos) {
            foreach ($grupos as $clase) {
                if ($clase->getPrograma() === $programa) {
                    array_push($res, $salon);
                }
            }
        }
        return $res;
    }

    /*
     * obtiene una tabla de los programas que finalizan determinada fecha
     * recibe la fecha en formato fecha (dd/mm/aaaa) como un string
     */

    public function programasPorFecha($fecha) {
        $res = array();
        foreach ($this->grupos as $programas) {
            if ($programas->getFechaFinalizacion() === $fecha) {
                array_push($res, $programas);
            }
        }
        return $res;
    }

    /*
     * Devuelve una tabla de los salones con determinada o menor capacidad
     * recibe la capacidad requerida (entero)
     */

    public function salonesMenorIgual($cantidad) {
        $res = array();
        foreach ($this->salones as $salon) {
            if ($salon->getCapacidad() <= $cantidad) {
                array_push($res, $salon);
            }
        }
        return $res;
    }

    /*
     * Devuelve una tabla de los salones con determinada capacidad
     * recibe la capacidad requerida (entero)
     */

    public function salonesIgual($cantidad) {
        $res = array();
        foreach ($this->salones as $salon) {
            if ($salon->getCapacidad() === $cantidad) {
                array_push($res, $salon);
            }
        }
        return $res;
    }

    /*
     * Devuelve una tabla de los salones con determinada o mayor capacidad
     * recibe la capacidad requerida (entero)
     */

    public function salonesMayorIgual($cantidad) {
        $res = array();
        foreach ($this->salones as $salon) {
            if ($salon->getCapacidad() >= $cantidad) {
                array_push($res, $salon);
            }
        }
        return $res;
    }

    /*
     * devuelve el programa por el numero de estudiantes
     * recibe la cantidad de estudiantes (entero)
     */

    public function programaPorCantidadEstudiantes($cantidad) {
        $res = array();
        foreach ($this->grupos as $programa) {
            if ($programa->getNumEstudiantes() === $cantidad) {
                array_push($res, $programa);
            }
        }
        return $res;
    }

    /*
     * devuelve los grupos por el nombre de programa
     * recibe el nombre del programa
     */

    public function grupoPorPrograma($programa) {
        $res = array();
        foreach ($this->grupos as $clase) {
            if ($clase->getPrograma() === $programa) {
                array_push($res, $clase->getPeriodo());
            }
        }
        return $res;
    }

    /*
     * devuelve los programas por el periodo del grupo
     * recibe el periodo del grupo
     */

    public function programaPorGrupo($periodo) {
        $res = array();
        foreach ($this->grupos as $clase) {
            if ($clase->getPeriodo() === $periodo) {
                array_push($res, $clase->getPrograma());
            }
        }
        return $res;
    }

    /*
     * recibe el programa del cual se quiere conocer los periodos, sin el tipo de programa.
     * retorna un array de periodos en los cuales se esta desarrollando el programa.
     */

    public function periodoPorPrograma($programa) {
        $res = array();
        foreach ($this->grupos as $clase) {
            if ($clase->getPrograma() == $programa) {
                array_push($res, $clase->getPeriodo());
            }
        }
        return $res;
    }

    /*
     * recibe una confirmacion si se desea quitar (true) o si se desea que el grupo siga (false)
     * y la fecha de los grupos que se desean eliminar
     * si la confirmacion es verdadera llama el metodo limiteFechaFinalizacion($fecha)
     */

    public function confirmacionFinalizacion($confirmacion, $fecha) {
        if ($confirmacion) {
            $this->limiteFechaFinalizacion($fecha);
        } else {
            return $confirmacion;
        }
    }

    /*
     * quita los grupos de los salones que llegaron a la fecha de finalizacion
     * recibe la fecha de finalizacion
     * NO LLAMAR DIRECTAMENTE! debe ser llamado por el metodo de confirmacionFinalizacion($confirmacion,$fecha)
     */

    private function limiteFechaFinalizacion($fecha) {
        $grupos = array();
        foreach ($this->grupos as $clases) {
            if ($clases->getFechaFinalizacion() === $fecha) {
                foreach ($this->salonesConGrupo as $salon => $grupos) {
                    foreach ($grupos as $periodo => $clase) {
                        if ($clase->getPrograma() === $clases) {
                            unset($this->salonesConGrupo[$grupos[$periodo]]);
                        }
                    }
                }
            }
        }
    }

    /*
     * envia una notificacion con los grupos que tienen una semana para su fecha limite
     */

    public function gruposAExpirar1Sem() {
        
    }

    /*
     * envia una notificacion con los grupos que tienen tres dias para su fecha limite
     */

    public function gruposAExpirar3Dias() {
        
    }

    /*
     * envia una notificacion con los grupos que tienen un dia para su fecha limite
     */

    public function gruposAExpirar1Dia() {
        
    }

}
