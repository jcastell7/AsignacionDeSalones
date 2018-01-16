<?php

class Salon {
    /*
     * clase salon
     * contiene los atributos del objeto salon
     */

    private $idSalon;
    private $numero;
    private $capacidad;
    private $info;
                    
    /*
     * constructor del objeto
     * recibe el numero de salon (bloque-salon ej: 11-112)
     * la capacidad del salón (entero)
     * informacion extra(por defecto está vacío)
     * disponibilidad (booleano que por defecto será true (disponible)
     */

    function __construct($numero, $capacidad, $idSalon, $info = null) {
        $this->numero = $numero;
        $this->capacidad = $capacidad;
        $this->info = $info;
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

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setCapacidad($capacidad) {
        $this->capacidad = $capacidad;
    }
    
    function getIdSalon() {
        return $this->idSalon;
    }

    function getInfo() {
        return $this->info;
    }
    
    function setInfo($info) {
        $this->info = $info;
    }



    
}
