<?php
/**
 * Obtiene todas las metas de la base de datos
 */

require 'Sensor.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    // Manejar petición GET
    if (isset(  $_GET['numeroSensor']) && isset(  $_GET['ordenamiento'])  ){
    
        // Obtener parámetros
        $IdSensor = $_GET['numeroSensor'];
        $ordenamiento = $_GET['ordenamiento'];

        // Tratar retorno
        $retorno = Sensor::getAllSensor($IdSensor,$ordenamiento);
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