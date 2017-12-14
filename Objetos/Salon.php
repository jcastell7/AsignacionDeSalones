<?php

class Salon {
    /*
     * clase salon
     * contiene los atributos del objeto salon
     */

    private $idSalon;
    private $numero;
    private $capacidad;
    private $disponibilidad;
    private $info;
    private $gruposEnSalon;
                    
    /*
     * constructor del objeto
     * recibe el numero de salon (bloque-salon ej: 11-112)
     * la capacidad del salón (entero)
     * informacion extra(por defecto está vacío)
     * disponibilidad (booleano que por defecto está vacio)
     */

    function __construct($numero, $capacidad, $idSalon, $info = null, $disponibilidad = false, $grupos=null) {
        $this->numero = $numero;
        $this->capacidad = $capacidad;
        $this->disponibilidad = $disponibilidad;
        $this->info = $info;
        $this->gruposEnSalon= $grupos;
        $this->idSalon = $idSalon;
    }

    /*
     * geters y seters del objeto
     */

    
    function getNumero() {
        return $this->numero;
    }

    function getCapacidad() {
        return $this->capacidad;
    }

    function getDisponibilidad() {
        return $this->disponibilidad;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setCapacidad($capacidad) {
        $this->capacidad = $capacidad;
    }

    function setDisponibilidad($disponibilidad) {
        $this->disponibilidad = $disponibilidad;
    }
    
        /*
     * almacena los grupos en una celda del array
     * el id es el numero del salon en el que se dará la clase
     * recibe el numero del salon (bloque-salon ej: 11-102) y el array de grupos que entran al salon
     * el array de grupos esta compuesto por el objeto del grupo.
     * si es un solo grupo en el salon debe estar en un array
     */

    private function ingresarGrupoASalon($arrayGrupos) {
        $this->gruposEnSalon = $arrayGrupos;
    }

    
}
