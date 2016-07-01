<?php
/**
 * Obtiene todas las metas de la base de datos
 */

require 'Sensor.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Manejar petición GET
    if (isset($_GET['contaminante']) && isset($_GET['imecas']) && isset($_GET['calidad']) && isset($_GET['hora']) && isset($_GET['sensor']) ) {

        // Obtener parámetros
        $contaminante = $_GET['contaminante'];
        $imecas = $_GET['imecas'];
        $calidad = $_GET['calidad'];
        $hora = $_GET['hora'];
        $sensor = $_GET['sensor'];
        // Tratar retorno
        $retorno = Sensor::insert($contaminante, $imecas, $calidad, $hora, $sensor);
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