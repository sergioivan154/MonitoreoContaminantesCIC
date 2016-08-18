<?php
/**
 * Obtiene todas las metas de la base de datos
 */

require 'SensorMovil.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
     
    // Manejar petición GET
    if (isset(  $_GET['numeroSensor']) && isset(  $_GET['idioma']) ){
    
        // Obtener parámetros
        $numeroSensor = $_GET['numeroSensor'];
        $idioma = $_GET['idioma'];


        // Tratar retorno
        $retorno = SensorMovil::getLast($numeroSensor, $idioma);
    }

    if ($retorno) {

        $datos["estado"] = 1;
        $datos["retorno"] = $retorno;

        print json_encode($datos);
    } else {
        print json_encode(array(
            "estado" => 2,
            "mensaje" => "Ha ocurrido un error"
        ));
    }
}