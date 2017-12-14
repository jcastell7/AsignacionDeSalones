<?php

class Grupos {
    /*
     * clase del objeto grupo
     * se identifica mediante el programa
     */

    private $idGrupo;
    private $periodo;
    private $programa;
    private $tipoPrograma;
    private $semestre;
    private $numEstudiantes;
    private $fechaFinalizacion;
    private $info;

    /*
     * constructor del objeto
     * recibe el periodo(201x-1 ó 201x-2), nombre del programa, tipo del programa (diplomado, especializacion, maestria, doctorado)
     * cantidad de estudiantes, fecha de finalizacion del programa (dd/mm/aaaa) como un string, informacion (por defecto está vacía), semestre (por defecto está vacía)
     */

    function __construct($periodo, $programa, $tipoPrograma, $numEstudiantes, $fechaFinalizacion, $info = null, $semestre = null, $idGrupo) {
        $this->periodo = $periodo;
        $this->tipoPrograma = $tipoPrograma;
        $this->semestre = $semestre;
        $this->numEstudiantes = $numEstudiantes;
        $this->programa = $programa;
        $this->fechaFinalizacion = $fechaFinalizacion;
        $this->info = $info;
        $this->idGrupo = $idGrupo;
    }

    /*
     * geters y seters de  atributos
     */

    function getPeriodo() {
        return $this->periodo;
    }

    function getTipoPrograma() {
        return $this->tipoPrograma;
    }

    function getSemestre() {
        return $this->semestre;
    }

    function getNumEstudiantes() {
        return $this->numEstudiantes;
    }

    function getFechaFinalizacion() {
        return $this->fechaFinalizacion;
    }

    function setPeriodo($nombre) {
        $this->periodo = $nombre;
    }

    function setTipoPrograma($tipoPrograma) {
        $this->tipoPrograma = $tipoPrograma;
    }

    function setSemestre($semestre) {
        $this->semestre = $semestre;
    }

    function setNumEstudiantes($numEstudiantes) {
        $this->numEstudiantes = $numEstudiantes;
    }

    function setFechaFinalizacion($fechaFinalizacion) {
        $this->fechaFinalizacion = $fechaFinalizacion;
    }

    function getPrograma() {
        return $this->programa;
    }

    function setPrograma($programa) {
        $this->programa = $programa;
    }

}