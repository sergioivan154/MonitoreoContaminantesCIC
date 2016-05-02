<?php
/**
 * Obtiene todas las metas de la base de datos
 */

require 'Sensor.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Manejar petición GET
    if (isset($_GET['numeroSensor']) && isset($_GET['numeroElementos']) && isset($_GET['ordenamiento']) && isset($_GET['filtro']) ) {

        // Obtener parámetros
        $numeroSensor = $_GET['numeroSensor'];
        $numeroElementos = $_GET['numeroElementos'];
        $ordenamiento = $_GET['ordenamiento'];
        $filtro = $_GET['filtro'];
        // Tratar retorno
        $retorno = Sensor::getImecas($numeroSensor, $numeroElementos, $ordenamiento, $filtro);
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