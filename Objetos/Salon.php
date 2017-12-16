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
                    
    /*
     * constructor del objeto
     * recibe el numero de salon (bloque-salon ej: 11-112)
     * la capacidad del salón (entero)
     * informacion extra(por defecto está vacío)
     * disponibilidad (booleano que por defecto será true (disponible)
     */

    function __construct($numero, $capacidad, $idSalon, $info = null, $disponibilidad = true) {
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
    
    function getIdSalon() {
        return $this->idSalon;
    }

    function getInfo() {
        return $this->info;
    }

    function setIdSalon($idSalon) {
        $this->idSalon = $idSalon;
    }

    function setInfo($info) {
        $this->info = $info;
    }



    
}
