<?php
/**
 * Obtiene todas las metas de la base de datos
 */

require 'Sensor.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Manejar petición GET
    // Tratar retorno
    $retorno = Sensor::getPrediccion();
    
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