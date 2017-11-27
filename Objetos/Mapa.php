<?php

class Mapa {
    /*
     * clase contenedora de las listas de salones y de grupos
     * recibe la informacion de la base de datos
     */

    private $salones = array();
    private $grupos = array();
    private $salonesConGrupo = array();

    function __construct() {
        
    }

    /*
     * agrega un salon a la lista de salones
     */

    public function agregarSalon($salon) {
        array_push($this->salones, $salon);
    }

    /*
     * agrega un grupo a la lista de grupos
     */

    public function agregarGrupos($grupo) {
        array_push($this->grupos, $grupo);
    }

    /*
     * almacena los grupos en una celda del array
     * el id es el numero del salon en el que se dará la clase
     * recibe el numero del salon (bloque-salon ej: 11-102) y el array de grupos que entran al salon
     * si es un solo grupo en el salon debe estar en un array
     */

    public function ingresarGrupoASalon($numeroSalon, $arrayGrupos) {
        $this->salonesConGrupo[$numeroSalon] = $arrayGrupos;
    }

    /*
     * elimina el grupo del array de grupos
     * recibe el nombre del programa que se quiere eliminar
     */

    public function eliminarGrupoPrograma($programa) {
        foreach ($this->grupos as $id => $grupo) {
            if ($grupo->getPrograma() === $programa) {
                unset($this->grupos[$id]);
            }
        }
        return "no se pudo eliminar el grupo";
    }

    /*
     * elimina el salon de la lista de salones
     * recibe el numero del salon a eliminar
     */

    public function eliminarSalon($salon) {
        foreach ($this->salones as $id => $salon) {
            if ($salon->getNumero() === $salon) {
                unset($this->grupos[$id]);
            }
        }
        return "no se pudo eliminar el salon";
    }

    /*
     * retorna una lista de los salones disponibles, es decir que no estan siendo utilizados
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
     * retorna una lista de los salones que estan siendo utilizados
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
     * retorna una lista de los salones que esta utilizando un grupo
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
     * obtiene una lista de los programas que finalizan determinada fecha
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
     * Devuelve una lista de los salones con determinada o menor capacidad
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
     * Devuelve una lista de los salones con determinada capacidad
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
     * Devuelve una lista de los salones con determinada o mayor capacidad
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
    
    public function grupoPorPrograma($programa){
        $res=array();
        foreach ($this->grupos as $clase) {
            if($clase->getPrograma()===$programa){
                array_push($res, $clase->getPeriodo());
            }
        }
        return $res;
    }
    
    /*
     * devuelve los programas por el periodo del grupo
     * recibe el periodo del grupo
     */
    
    public function programaPorGrupo($periodo){
        $res=array();
        foreach ($this->grupos as $clase){
            if($clase->getPeriodo()===$periodo){
                array_push($res, $clase->getPrograma());
            }
        }
        return $res;
    }
}
