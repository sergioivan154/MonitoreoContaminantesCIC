<?php

/**
 * Representa el la estructura de las metas
 * almacenadas en la base de datos
 */
require 'Database.php';

class Sensor
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
    public static function getAll()
    {
        $consulta = "SELECT * FROM sensorParser";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo $e;
            return false;

        }
    }

     /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function getAllSensor($IdSensor, $ordenamiento)
    {

        if ( $ordenamiento == 1){ // de mayor a menor
            $consulta = "select id_wasp, sensor, value, timestamp from sensorParser where id_wasp = ".$IdSensor." and upper(sensor) in('CO','CO2','NO2','O3','TCA','HUMA') order by timestamp DESC;";
        }
        else{ //de menor a mayor
            $consulta = "select id_wasp, sensor, value, timestamp from sensorParser where id_wasp = ".$IdSensor." and upper(sensor) in('CO','CO2','NO2','O3','TCA','HUMA') order by timestamp ASC;";
        }


        
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo $e;
            return false;

        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $idSensor Identificador del sensor
     * @return mixed
     */
    public static function getImecas($numeroSensor, $numeroElementos, $ordenamiento, $filtro)
    {

        $numeroSensor = -1;
        $numeroElementos = -1;
        $ordenamiento = 'mayor';
        $filtro = 'co';

        // Consulta de la meta
        $consulta=  "SELECT * FROM sensorParser";

        echo $consulta;

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo $e;
            return false;

        }
    }

     public static function getPrediccion()
    {

      
        // Consulta de la meta
        $consulta=  "SELECT * FROM prediccion order by id desc";

        echo $consulta;

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo $e;
            return false;

        }
    }

     public static function insert(
        $contaminante,
        $imecas,
        $calidad,
        $hora
    )
    {
        // Sentencia INSERT
        $comando = "INSERT INTO prediccion ( " .
            "contaminante," .
            " imecas," .
            " calidad," .
            " hora) " .
            " VALUES(?,?,?,?);";



                        

                    
        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);
		
		$sentencia->bindParam(1, $contaminante);
        $sentencia->bindParam(2, $imecas);
        $sentencia->bindParam(3, $calidad);
        $sentencia->bindParam(4, $hora);

        return $sentencia->execute();

    }


    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $idMeta      identificador
     * @param $titulo      nuevo titulo
     * @param $descripcion nueva descripcion
     * @param $fechaLim    nueva fecha limite de cumplimiento
     * @param $categoria   nueva categoria
     * @param $prioridad   nueva prioridad
     
    public static function update(
        $idMeta,
        $titulo,
        $descripcion,
        $fechaLim,
        $categoria,
        $prioridad
    )
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE meta" .
            " SET titulo=?, descripcion=?, fechaLim=?, categoria=?, prioridad=? " .
            "WHERE idMeta=?";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($titulo, $descripcion, $fechaLim, $categoria, $prioridad, $idMeta));

        return $cmd;
    }

    /**
     * Insertar una nueva meta
     *
     * @param $titulo      titulo del nuevo registro
     * @param $descripcion descripción del nuevo registro
     * @param $fechaLim    fecha limite del nuevo registro
     * @param $categoria   categoria del nuevo registro
     * @param $prioridad   prioridad del nuevo registro
     * @return PDOStatement
     
    public static function insert(
        $titulo,
        $descripcion,
        $fechaLim,
        $categoria,
        $prioridad
    )
    {
        // Sentencia INSERT
        $comando = "INSERT INTO meta ( " .
            "titulo," .
            " descripcion," .
            " fechaLim," .
            " categoria," .
            " prioridad)" .
            " VALUES( ?,?,?,?,?)";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $titulo,
                $descripcion,
                $fechaLim,
                $categoria,
                $prioridad
            )
        );

    }

    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idMeta identificador de la meta
     * @return bool Respuesta de la eliminación
     
    public static function delete($idMeta)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM meta WHERE idMeta=?";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($idMeta));
    }*/
}

?>