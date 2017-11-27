<?php

class Salon {
    /*
     * clase salon
     * contiene los atributos del objeto salon
     */

    private $numero;
    private $capacidad;
    private $disponibilidad;
    private $info;

    /*
     * constructor del objeto
     * recibe el numero de salon (bloque-salon ej: 11-112)
     * la capacidad del salón (entero)
     * informacion extra(por defecto está vacío)
     * disponibilidad (booleano que por defecto está vacio)
     */

    function __construct($numero, $capacidad, $info = null, $disponibilidad = false) {
        $this->numero = $numero;
        $this->capacidad = $capacidad;
        $this->disponibilidad = $disponibilidad;
        $this->info = $info;
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

}
