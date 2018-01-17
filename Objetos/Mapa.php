<?php

include "Grupos.php";
include "Salon.php";

class Mapa {
    /*
     * clase contenedora de las tablas de salones y de grupos
     * recibe la informacion de la base de datos
     */

    private $conn;
    private $aviso = "";

    function __construct() {
        require_once 'db/logindb.php';
        $this->conn = new mysqli($hn, $un, $pw, $db);
        if ($this->conn->connect_error) {
            die($this->conn->connect_error);
        }
    }

    /*
     * retorna el id para el grupo nuevo
     */

    public function getIdGrupo() {
        $query = "Select * from grupos order by idGrupo desc limit 1";
        $res = $this->conn->query($query);
        $rows = $res->num_rows;
        if ($rows != 0) {
            $grupo = mysqli_fetch_object($res);
            return $grupo->idGrupo + 1;
        } else {
            return 1;
        }
    }

    /*
     * retorna el id para el grupo nuevo
     */

    public function getIdSalon() {
        $query = "Select * from salones order by idSalon desc limit 1";
        $res = $this->conn->query($query);
        $rows = $res->num_rows;
        if ($rows != 0) {
            $salon = mysqli_fetch_object($res);
            return $salon->idSalon + 1;
        } else {
            return 1;
        }
    }

    /*
     * metodo para convertir de query de mysql a objeto Salon php
     * recibe el idSalon y retorna un objeto Salon
     */

    private function convertirSqlObjetoSalon($idSalon) {
        $resultado = $this->conn->query("SELECT * FROM `salones` WHERE  `idSalon` =$idSalon");
        $object = mysqli_fetch_object($resultado);
        $salon = new Salon($object->numero, $object->capacidad, $object->idSalon, $object->info);
        return $salon;
    }

    /*
     * metodo publico que retorna el objeto salon
     */

    public function getSalon($idSalon) {
        return $this->convertirSqlObjetoSalon($idSalon);
    }

    /*
     * crea un nuevo salon, recibe el numero del salon , la capacidad,  la informacion (puede dejarse vacio)
     * lueog llama el metodo de agregar a la base de datos y lo almacena.
     */

    public function crearSalon($idSalon, $numero, $capacidad, $info) {
        $this->matrizIdSalon = $idSalon;
        $salonNuevo = new Salon($numero, $capacidad, $idSalon, $info);
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
        $info = $salon->getInfo();
        if ($info == null) {
            $info = "NULL";
        } else {
            $info = "'" . $info . "'";
        }
        $agregarSalon = "INSERT INTO `salones` (`idSalon`, `numero`, `capacidad`, `info`) VALUES ('$idSalon', '$numero', '$capacidad',  $info)";
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
        $info = $salon->getInfo();
        if ($info == null) {
            $info = "NULL";
        } else {
            $info = "'" . $info . "'";
        }
        $editarSalon = "UPDATE `salones` SET `numero` = '$numero',`capacidad` = $capacidad,"
                . " `info` = $info WHERE `salones`.`idSalon` = $idSalon";
        $this->conn->query($editarSalon);
    }

    /*
     * metodo para convertir de query de mysql a objeto Salon php
     * recibe el idGrupo y retorna un objeto Grupo
     */

    private function convertirSqlObjetoGrupo($idGrupo) {
        $resultado = $this->conn->query("SELECT * FROM `grupos` WHERE  `idGrupo` =$idGrupo");
        $object = mysqli_fetch_object($resultado);
        $grupo = new Grupos($object->periodo, $object->programa, $object->tipoPrograma, $object->numEstudiantes, $object->fechaFinalizacion, $object->info, $object->semestre, $object->idGrupo, $object->salonId);
        return $grupo;
    }

    /*
     * metodo publico que retorna un objeto grupo
     */

    public function getGrupo($idGrupo) {
        return $this->convertirSqlObjetoGrupo($idGrupo);
    }

    /*
     * crea un nuevo objeto grupo y luego llama el metodo de agregar grupos 
     * y actualiza la base de datos
     */

    public function crearGrupo($idGrupo, $tipoPrograma, $programa, $periodo, $numEstudiantes, $fechaFinalizacion, $info = null, $semestre = null) {
        $salonId = "NULL";
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
     * recibe un array de los grupos(objeto) y les asigna el nuevo id del salon
     * luego los guarda en la base de datos
     */

    private function ingresarGrupoASalon($arrayGrupos, $idSalon) {
        foreach ($arrayGrupos as $grupo) {
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
     * retorna una lista de los grupos en la base de datos
     */

    public function listarGrupos() {
        $grupos = array();
        $query = "SELECT * FROM grupos";
        $result = $this->conn->query($query);
        if (!$result) {
            die($this->conn->error);
        }
        $rows = $result->num_rows;
        for ($j = 0; $j < $rows; ++$j) {
            $result->data_seek($j);
            $idGrupo = $result->fetch_assoc()['idGrupo'];
            if (!in_array($idGrupo, $grupos)) {
                array_push($grupos, $idGrupo);
            }
        }
        foreach ($grupos as $key => $grupo) {
            $grupos[$key] = $this->convertirSqlObjetoGrupo($grupo);
        }
        return $grupos;
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
        return $salones;
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
     * recibe una cadena de query y retorna un array con los resultados
     * si no se encuentra nada retorna un aviso de no resultados.
     * funciona solo para los query que retornan salones
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
                $salonObjeto = $this->convertirSqlObjetoSalon($result->fetch_assoc()['idSalon']);
                array_push($respuesta, $salonObjeto);
            }
            return $respuesta;
        }
        return "no hubo resultados";
    }

    /*
     * recibe una cadena de query y retorna un array con los resultados
     * si no se encuentra nada retorna un aviso de no resultados.
     * funciona solo para los query que retornan grupos
     */

    private function query2ArraySGrupos($query) {
        $respuesta = array();
        $result = $this->conn->query($query);
        if (!$result) {
            die($this->conn->error);
        }
        $rows = $result->num_rows;
        if ($rows > 0) {
            for ($j = 0; $j < $rows; ++$j) {
                $result->data_seek($j);
                $grupoObjeto = $this->convertirSqlObjetoGrupo($result->fetch_assoc()['idGrupo']);
                array_push($respuesta, $grupoObjeto);
            }
            return $respuesta;
        }
        return "no hubo resultados";
    }

    /*
     * obtiene una lista de los programas que finalizan determinada fecha
     * recibe la fecha en formato fecha (aaaa-mm-dd) como un string
     */

    public function programasPorFecha($fecha) {
        $query = "SELECT * FROM `grupos` WHERE `fechaFinalizacion` = '$fecha';";
        return $this->query2ArraySGrupos($query);
    }

    /*
     * Devuelve una lista de los salones con determinada o menor capacidad
     * recibe la capacidad requerida (entero)
     */

    public function salonesMenorIgual($cantidad) {
        $query = "SELECT * FROM `salones` WHERE `capacidad` <= $cantidad;";
        return $this->query2ArraySalones($query);
    }

    /*
     * Devuelve una lista de los salones con determinada capacidad
     * recibe la capacidad requerida (entero)
     */

    public function salonesIgual($cantidad) {
        $query = "SELECT * FROM `salones` WHERE `capacidad` = $cantidad;";
        return $this->query2ArraySalones($query);
    }

    /*
     * Devuelve una lista de los salones con determinada o mayor capacidad
     * recibe la capacidad requerida (entero)
     */

    public function salonesMayorIgual($cantidad) {
        $query = "SELECT * FROM `salones` WHERE `capacidad` >= $cantidad;";
        return $this->query2ArraySalones($query);
    }

    /*
     * devuelve el programa por el numero de estudiantes
     * recibe la cantidad de estudiantes (entero)
     */

    public function programaPorCantidadEstudiantes($cantidad) {
        $query = "SELECT * FROM `grupos` WHERE `numEstudiantes` = $cantidad;";
        return $this->query2ArraySGrupos($query);
    }

    /*
     * devuelve los grupos por el nombre de programa
     * recibe el nombre del programa
     */

    public function grupoPorPrograma($programa) {
        $query = "SELECT * FROM `grupos` WHERE `programa` LIKE '$programa';";
        return $this->query2ArraySGrupos($query);
    }

    /*
     * devuelve los programas por el periodo del grupo
     * recibe el periodo del grupo
     */

    public function programaPorGrupo($periodo) {
        $query = "SELECT * FROM `grupos` WHERE `periodo` LIKE '$periodo';";
        return $this->query2ArraySGrupos($query);
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

        $aviso = "Alert.warning('Message','')";
        echo$aviso;
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

    /*
     * crea y llena las tarjetas de los salones
     */

    public function llenarSalonesIndex() {

        $salones = $this->listaSalones();
        foreach ($salones as $salon) {
            $numSalon = $salon->getNumero();
            $idSalon = $salon->getIdSalon();
            $numCuposSalon = $salon->getCapacidad();
            $cuerpoTarjeta = $this->llenarGruposIndex($salon->getIdSalon());
            $listaGrupos = $this->llenarListaGrupos();
            $tarjetaSalon = "<div id='tarjeta.$idSalon' class='card text-white bg-dark mb-3' style='max-width: 20rem;'>" .
                    "<div class='card-header '>" .
                    "<div class='d-flex justify-content-between'>" . $numSalon .
                    "<div class='dropdown show'>" .
                    "<a class='btn btn-secondary dropdown-toggle ' href='' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'></a>" .
                    "<div class='dropdown-menu'  aria-labelledby='dropdownMenuLink'>" .
                    "<form action='' method='post'>" .
                    "<input type='hidden' value='$idSalon' name='idSalon'>" .
                    "<div class='menuGrupo'>" . $listaGrupos . "</div>" .
                    "<div class='dropdown-divider'></div>" .
                    "<div><input class='dropdown-item' href='' onclick='recargarTarjetas();' type='submit' name='submit' value ='Aceptar'/></div>" .
                    "</form>" .
                    "</div>" .
                    "</div>" .
                    "</div>" .
                    "</div>" .
                    "<div id='bodyTarjeta.$idSalon' class='card-body'>" .
                    $cuerpoTarjeta
                    . "</div>" .
                    "<div class='card-footer text-muted'>" .
                    "Cantidad de puestos en Salon: " . $numCuposSalon .
                    "</div>" .
                    "</div>" .
                    "<br/>";

            echo $tarjetaSalon;
        }
    }

    /*
     * muestra que grupos estan en que salones
     */

    private function llenarGruposIndex($idSalon) {
        $gruposConSalon = $this->gruposConSalon();
        $respuesta = "";
        foreach ($gruposConSalon as $grupos) {
            if ($grupos->getSalonId() === $idSalon) {
                $grupo1 = $grupos->getPrograma();
                $tipoPrograma = $grupos->getTipoPrograma();
                $programa = $grupos->getPrograma();
                $numEstudiantes = $grupos->getNumEstudiantes();
                $periodo = $grupos->getPeriodo();
                $respuesta = "<h5 class='card-title'>" . $grupo1 . "</h5>" .
                        "<p class='card-text'>" .
                        $tipoPrograma . " en " . $programa . "<br>" . " #est."
                        . $numEstudiantes . "<br>" .
                        "periodo: " . $periodo .
                        "</p>" . $respuesta;
            }
        }
        return $respuesta;
    }

    /*
     * llena el dropdown de las tarjetas con los grupos
     */

    private function llenarListaGrupos() {
        $respuesta = "";
        $listaGrupos = $this->listarGrupos();
        foreach ($listaGrupos as $grupo) {
            $programa = $grupo->getPrograma();
            $idGrupo = $grupo->getIdGrupo();
            $respuesta = "<a class='dropdown-item' href=''><input type='checkbox' name='check_list[]' value='$idGrupo'/>$programa</a>" . $respuesta;
        }
        return $respuesta;
    }

    /*
     * 
     */

    public function cantidadEstudiantesEnSalon($idSalon) {
        $contador = 0;
        $gruposConSalon = $this->gruposConSalon();
        foreach ($gruposConSalon as $grupos) {
            if ($grupos->getSalonId() === $idSalon) {
                $contador += $grupos->getNumEstudiantes();
            }
        }
        return $contador;
    }

    /*
     * recibe los grupos seleccionados y los pone en el salon del que se esta
     * llamando el submit
     */

    public function cambiarGrupos() {
        $idSalon = $_POST['idSalon'];
        $arrayGrupos = array();
        $contador = $this->cantidadEstudiantesEnSalon($idSalon);
        $salon = $this->convertirSqlObjetoSalon($idSalon);
        $aviso = "";
        if (!empty($_POST['check_list'])) {
            foreach ($_POST['check_list'] as $selected) {
                $idGrupo = $selected;
                $grupo = $this->convertirSqlObjetoGrupo($idGrupo);
                $contador += $grupo->getNumEstudiantes();
                $capacidad = $salon->getCapacidad();
                if ($contador <= $capacidad) {
                    array_push($arrayGrupos, $grupo);
                } else {
                    $this->aviso = "Alert.warning('No es posible asignar este grupo a este salon debido a las limitaciones de espacio fisico','La capacidad del salon es de " . $capacidad . " personas');";
                }
            }
        }
        $this->ingresarGrupoASalon($arrayGrupos, $idSalon);
        $cuerpo = $this->llenarGruposIndex($idSalon);
        echo $aviso;
    }

    public function sobrecupo() {
        echo $this->aviso;
    }

    public function reporteListaGrupos() {
        $grupos = $this->listarGrupos();
        $lista1 = "<ul id='list' class='list-group'>";
        echo $lista1;
        if (is_array($grupos)) {
            foreach ($grupos as $grupo) {
                $idGrupo = $grupo->getIdGrupo();
                $item = "<li class='in'>"
                        . "<div class='list-group-item d-flex justify-content-between'>"
                        . $idGrupo . ". " . $grupo->getTipoPrograma() . " en " . $grupo->getPrograma()
                        . "<form action='editarGrupos.php' method='post' id='editarGrupos.$idGrupo'>"
                        . "<input type='hidden' name='editar' value='$idGrupo'>"
                        . "<a href='javascript:{}' "
                        . 'onclick= "document.getElementById'
                        . "('editarGrupos.$idGrupo')"
                        . '.submit();"'
                        . "><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a></form></div></li>";

                echo $item;
            }
        } else {
            echo "no hay grupos por mostrar";
        }
        $lista2 = "</ul>";
        echo $lista2;
    }

    public function reporteListaSalonesDisponibles() {
        $salones = $this->salonesDisponibles();
        $lista1 = "<ul id='list' class='list-group'>";

        echo $lista1;
        if (is_array($salones)) {
            foreach ($salones as $salon) {
                $idSalon = $salon->getIdSalon();
                $item = "<li class='in'>"
                        . "<div class='list-group-item d-flex justify-content-between'>"
                        . $idSalon . '. ' . $salon->getNumero()
                        . "<form action='editarSalones.php' method='post' id='editarSalones.$idSalon'>"
                        . "<input type='hidden' name='editar' value='$idSalon'>"
                        . "<a href='javascript:{}' "
                        . 'onclick= "document.getElementById'
                        . "('editarSalones.$idSalon')"
                        . '.submit();"'
                        . "><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a></form></div></li>";
                echo $item;
            }
        } else {
            echo $salones;
        }

        $lista2 = "</ul>";
        echo $lista2;
    }

    public function reporteListaSalonesEnUso() {
        $salones = $this->salonesOcupados();
        $lista1 = "<ul id='list' class='list-group'>";
        echo $lista1;
        if (is_array($salones)) {
            foreach ($salones as $salon) {
                $idSalon = $salon->getIdSalon();
                $item = "<li class='in'>"
                        . "<div class='list-group-item d-flex justify-content-between'>"
                        . $idSalon . '. ' . $salon->getNumero()
                        . "<form action='editarSalones.php' method='post' id='editarSalones.$idSalon'>"
                        . "<input type='hidden' name='editar' value='$idSalon'>"
                        . "<a href='javascript:{}' "
                        . 'onclick= "document.getElementById'
                        . "('editarSalones.$idSalon')"
                        . '.submit();"'
                        . "><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a></form></div></li>";
                echo $item;
            }
        } else {
            echo "No hay salones En Uso";
        }
        $lista2 = "</ul>";
        echo $lista2;
    }
    public function reporteListaSalones() {
        $salones = $this->listaSalones();
        $lista1 = "<ul id='list' class='list-group'>";
        echo $lista1;
        if (is_array($salones)) {
            foreach ($salones as $salon) {
                $idSalon = $salon->getIdSalon();
                $item = "<li class='in'>"
                        . "<div class='list-group-item d-flex justify-content-between'>"
                        . $idSalon . '. ' . $salon->getNumero()
                        . "<form action='editarSalones.php' method='post' id='editarSalones.$idSalon'>"
                        . "<input type='hidden' name='editar' value='$idSalon'>"
                        . "<a href='javascript:{}' "
                        . 'onclick= "document.getElementById'
                        . "('editarSalones.$idSalon')"
                        . '.submit();"'
                        . "><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a></form></div></li>";
                echo $item;
            }
        } else {
            echo "No hay salones En Uso";
        }
        $lista2 = "</ul>";
        echo $lista2;
    }

}
