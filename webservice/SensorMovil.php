<?php

/**
 * Representa el la estructura de las metas
 * almacenadas en la base de datos
 */
require 'Database.php';

class SensorMovil
{
    

    function __construct()
    {
        ini_set('memory_limit', '512M');
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function getLast($numeroSensor, $idioma, $numeroElementos)
    {
        $consulta = "call `airmxgen_meshliu`.`ObtenerDatosParaMoviles`(?, ?);";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->bindParam(1,$numeroSensor);
            $comando->bindParam(2,$idioma);
            $comando->execute();     

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo $e;
            return $e;

        }
    }

    
}

?>