<?php

include "Grupos.php";
include "Salon.php";

class Mapa {
    /*
     * clase contenedora de las tablas de salones y de grupos
     * recibe la informacion de la base de datos
     */

    private $conn;
    private $matrizIdSalon;
    private $matrizIdGrupos;

    function __construct() {
        require_once '../db/logindb.php';
        $this->conn = new mysqli($hn, $un, $pw, $db);
        if ($this->conn->connect_error) {
            die($this->conn->connect_error);
        }
        $this->matrizIdSalon = 0;
        $this->matrizIdGrupos = 0;
    }

    /*
     * metodo para convertir de query de mysql a objeto Salon php
     * recibe el idSalon y retorna un objeto Salon
     */

    private function convertirSqlObjetoSalon($idSalon) {
        $resultado = $this->conn->query("SELECT * FROM `salones` WHERE  `idSalon` =$idSalon");
        $object = mysqli_fetch_object($resultado);
        $salon = new Salon($object->numero, $object->capacidad, $object->idSalon, $object->info, $object->disponibilidad);
        return $salon;
    }

    /*
     * crea un nuevo salon, recibe el numero del salon , la capacidad, la disponibilidad, la informacion (puede dejarse vacio)
     * lueog llama el metodo de agregar a la base de datos y lo almacena.
     */

    public function crearSalon($numero, $capacidad, $disponibilidad = true, $info = null) {
        $idSalon = $this->matrizIdSalon + 1;
        $this->matrizIdSalon = $idSalon;
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
        if ($info == null) {
            $info = "NULL";
        } else {
            $info = "'" . $info . "'";
        }
        $agregarSalon = "INSERT INTO `salones` (`idSalon`, `numero`, `capacidad`, `disponibilidad`, `info`) VALUES ('$idSalon', '$numero', '$capacidad', '$disponibilidad', $info)";
        $this->conn->query($agregarSalon);
    }

    /*
     * modifica el registro seleccionado de la tabla salones
     * el id no es modificable
     */

    public function modificarSalon($salon) {
        $idSalon = $salon->getIdSalon();
        $numero = $salon->getNumero();
        $capacidad = $salon->getCapacidad();
        $disponibilidad = $salon->getDisponibilidad();
        $info = $salon->getInfo();
        if ($info == null) {
            $info = "NULL";
        } else {
            $info = "'" . $info . "'";
        }
        $editarSalon = "UPDATE `salones` SET `numero` = '$numero',`capacidad` = $capacidad,"
                . "`disponibilidad` = $disponibilidad, `info` = $info WHERE `salones`.`idSalon` = $idSalon";
        $this->conn->query($editarSalon);
    }

    /*
     * metodo para convertir de query de mysql a objeto Salon php
     * recibe el idGrupo y retorna un objeto Grupo
     */

    public function convertirSqlObjetoGrupo($idGrupo) {
        $resultado = $this->conn->query("SELECT * FROM `grupos` WHERE  `idGrupo` =$idGrupo");
        $object = mysqli_fetch_object($resultado);
        $grupo = new Grupos($object->periodo, $object->programa, $object->tipoPrograma, $object->numEstudiantes, $object->fechaFinalizacion, $object->info, $object->semestre, $object->idGrupo, $object->salonId);
        return $grupo;
    }

    /*
     * crea un nuevo objeto grupo y luego llama el metodo de agregar grupos 
     * y actualiza la base de datos
     */

    public function crearGrupo($periodo, $programa, $tipoPrograma, $numEstudiantes, $fechaFinalizacion, $info = null, $semestre = null, $salonId = null) {
        $idGrupo = $this->matrizIdGrupos + 1;
        $this->matrizIdGrupos = $idGrupo;
        if ($semestre == null) {
            $semestre = "NULL";
        } else {
            $semestre = "'" . $semestre . "'";
        }
        if ($info == null) {
            $info = "NULL";
        } else {
            $info = "'" . $info . "'";
        }
        if ($salonId == null) {
            $salonId = "NULL";
        } else {
            $salonId = "'" . $salonId . "'";
        }
        $grupoNuevo = new Grupos($periodo, $programa, $tipoPrograma, $numEstudiantes, $fechaFinalizacion, $info, $semestre, $idGrupo, $salonId);
        $this->agregarGrupos($grupoNuevo);
    }

    /*
     * agrega un grupo a la tabla de grupos
     * recibe el objeto grupo
     */

    private function agregarGrupos($grupo) {
        $idGrupo = $grupo->getIdGrupo();
        $periodo = $grupo->getPeriodo();
        $programa = $grupo->getPrograma();
        $tipoPrograma = $grupo->getTipoPrograma();
        $semestre = $grupo->getSemestre();
        $numEstudiantes = $grupo->getNumEstudiantes();
        $fechaFinalizacion = $grupo->getfechaFinalizacion();
        $info = $grupo->getInfo();
        $salonId = $grupo->getSalonId();
        $agregarGrupo = "INSERT INTO `grupos` (`idGrupo`, `periodo`, `programa`, `tipoPrograma`, `semestre`, `numEstudiantes`, `fechaFinalizacion`, `info`, `salonId`) VALUES ('$idGrupo', '$periodo', '$programa', '$tipoPrograma',$semestre , '$numEstudiantes', '$fechaFinalizacion', $info, $salonId);";
        $this->conn->query($agregarGrupo);
    }

    /*
     * modifica el registro grupo de la tabla de grupos
     * el id no es modificable
     */

    function modificarGrupos($grupo) {
        $idGrupo = $grupo->getIdGrupo();
        $periodo = $grupo->getPeriodo();
        $programa = $grupo->getPrograma();
        $tipoPrograma = $grupo->getTipoPrograma();
        $semestre = $grupo->getSemestre();
        $numEstudiantes = $grupo->getNumEstudiantes();
        $fechaFinalizacion = $grupo->getFechaFinalizacion();
        $info = $grupo->getInfo();
        $salonId = $grupo->getSalonId();
        if ($semestre == null) {
            $semestre = "NULL";
        } else {
            $semestre = "'" . $semestre . "'";
        }
        if ($info == null) {
            $info = "NULL";
        } else {
            $info = "'" . $info . "'";
        }
        if ($salonId == null) {
            $salonId = "NULL";
        }
        $editarGrupo = "UPDATE `grupos` SET `periodo` = '$periodo',`programa` = '$programa', `tipoPrograma` = '$tipoPrograma',"
                . "`semestre` = $semestre,`numEstudiantes` = '$numEstudiantes',`fechaFinalizacion` = '$fechaFinalizacion',"
                . "`info` = $info,`salonId` = $salonId WHERE `grupos`.`idGrupo` = $idGrupo";
        $this->conn->query($editarGrupo);
    }

    /*
     * 
     */

    private function ingresarGrupoASalon($arrayIdGrupos, $idSalon) {
        foreach ($arrayIdGrupos as $grupo) {
            $grupo->setSalonId($idSalon);
            $this->modificarGrupos($grupo);
        }
    }

    /*
     * elimina el grupo del array de grupos
     * recibe el nombre del programa que se quiere eliminar
     */

    private function eliminarGrupoID($idGrupo) {
        $eliminarGrupo = "DELETE FROM `grupos` WHERE `grupos`.`idGrupo` = $idGrupo;";
        $resultado = $this->conn->query($eliminarGrupo);
        if (!$resultado) {
            return "no se pudo eliminar el grupo";
        } else {
            return "eliminado correctamente";
        }
    }

    /*
     * elimina el salon de la tabla de salones
     * recibe el numero del salon a eliminar
     */

    private function eliminarSalon($idSalon) {
        $eliminarSalon = "DELETE FROM `salones` WHERE `salones`.`idSalon` = $idSalon";
        $resultado = $this->conn->query($eliminarSalon);
        if (!$resultado) {
            return "no se pudo eliminar el salon";
        } else {
            return "eliminado correctamente";
        }
    }

    /*
     * retorna una lista de los grupos sin salon asignado
     * si no hay ninguno retorna vacio
     */

    public function gruposSinSalon() {
        $respuesta = array();
        $query = "SELECT * FROM grupos";
        $result = $this->conn->query($query);
        $rows = $result->num_rows;
        for ($j = 0; $j < $rows; ++$j) {
            $result->data_seek($j);
            $grupo = $this->convertirSqlObjetoGrupo($result->fetch_assoc()['idGrupo']);
            if ($grupo->getSalonId() === null) {
                array_push($respuesta, $grupo);
            }
        }
        return $respuesta;
    }

    /*
     * retorna una lista de los grupos con un salon asignado
     * si no hay ninguno retorna vacio
     */

    public function gruposConSalon() {
        $respuesta = array();
        $query = "SELECT * FROM grupos";
        $result = $this->conn->query($query);
        $rows = $result->num_rows;
        for ($j = 0; $j < $rows; ++$j) {
            $result->data_seek($j);
            $grupo = $this->convertirSqlObjetoGrupo($result->fetch_assoc()['idGrupo']);
            if ($grupo->getSalonId() !== null) {
                array_push($respuesta, $grupo);
            }
        }
        return $respuesta;
    }

    /*
     * 
     */

    public function listaSalones() {
        $salones = array();
        $query = "SELECT * FROM salones";
        $result = $this->conn->query($query);
        if (!$result) {
            die($this->conn->error);
        }
        $rows = $result->num_rows;
        for ($j = 0; $j < $rows; ++$j) {
            $result->data_seek($j);
            $idSalon = $result->fetch_assoc()['idSalon'];
            if (!in_array($idSalon, $salones)) {
                array_push($salones, $idSalon);
            }
        }
        foreach ($salones as $key => $salon) {
            $salones[$key] = $this->convertirSqlObjetoSalon($salon);
        }
    }

    /*
     * retorna una tabla de los salones que estan siendo utilizados
     * si no hay ninguno retorna vacio
     */

    public function salonesOcupados() {
        $respuesta = array();
        $grupos = $this->gruposConSalon();
        foreach ($grupos as $grupo) {
            $idSalon = $grupo->getSalonId();
            if (!in_array($idSalon, $respuesta)) {
                array_push($respuesta, $idSalon);
            }
        }
        foreach ($respuesta as $key => $salon) {
            $respuesta[$key] = $this->convertirSqlObjetoSalon($salon);
        }
        return $respuesta;
    }

    /*
     * retorna una lista de los salones disponibles, es decir que no estan siendo utilizados
     * si no hay ninguno retorna vacio
     */

    public function salonesDisponibles() {
        $salones = $this->listaSalones();
        $salonesOcupados = $this->salonesOcupados();
        foreach ($salones as $key => $salon) {
            if (in_array($salon, $salonesOcupados)) {
                unset($salones[$key]);
            }
        }
        if (empty($salones)) {
            return "no hay salones disponibles";
        }
        return $salones;
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
     * 
     */

    private function query2ArraySalones($query) {
        $respuesta = array();
        $result = $this->conn->query($query);
        if (!$result) {
            die($this->conn->error);
        }
        $rows = $result->num_rows;
        if ($rows > 0) {
            for ($j = 0; $j < $rows; ++$j) {
                $result->data_seek($j);
                $salonObjeto = $this->convertirSqlObjetoSalon($result->fetch_assoc()['idGrupo']);
                array_push($respuesta, $salonObjeto);
            }
            return $respuesta;
        }
        return "no hubo resultados";
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
