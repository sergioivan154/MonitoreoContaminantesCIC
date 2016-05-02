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
        $consulta= "DROP temporary TABLE IF exists RESULTADO_TEMP;
                    DROP temporary TABLE IF exists CALIDAD_AIRE_TEMP;

                        CREATE TEMPORARY TABLE CALIDAD_AIRE_TEMP

                    SELECT timestamp as fecha, id_wasp as sensor, sensor as 'Contaminante',  

                        CASE WHEN sensor = 'O3' THEN

                            CASE WHEN ROUND(VALUE,0) BETWEEN 0 AND 70 THEN
                                            
                                            0.71429 * (VALUE - 0) + 0

                                            WHEN ROUND(VALUE,0) BETWEEN 71  AND 95 THEN

                                            2.04167 * (VALUE - 71) + 51
                                            
                                            WHEN ROUND(VALUE,0) BETWEEN 96  AND 154 THEN
                                            
                                            0.84483 * (VALUE - 96) + 101

                                            WHEN ROUND(VALUE,0) BETWEEN 155  AND 204 THEN
                                            
                                            1 * (VALUE - 155) + 151 

                                            WHEN ROUND(VALUE,0) BETWEEN 205  AND  404 THEN
                                    
                                            0.49749 * (VALUE - 205) + 201

                                            WHEN ROUND(VALUE,0) BETWEEN 405  AND 504 THEN

                                            1 * (VALUE - 405) + 301

                                            WHEN ROUND(VALUE,0) BETWEEN 505  AND  604 THEN

                                            1 * (VALUE - 505) + 401
                                        
                            END

                            
                        
                        WHEN sensor = 'NO2' THEN
                            (VALUE / 1000) 
                            * 100 / 0.21 

                        WHEN sensor = 'CO' THEN
                            
                            VALUE * 100 / 11

                        END AS PUNTOS_IMECA
                        
                    FROM sensorParser where 

                    sensor IN ('NO2', 'CO', 'O3') and ".$numeroSensor." = -1 -- caso 1 es cuando quieres todos los elementos para la tabla debajo del mapa
                    or sensor IN ('NO2', 'CO', 'O3')   -- caso necesitas un marcador por sensor
                    AND sensorParser.id_wasp  = ".$numeroSensor."
                     

                    ;



                    CREATE TEMPORARY TABLE RESULTADO_TEMP
                    SELECT *,

                    CASE WHEN ROUND(PUNTOS_IMECA,0) BETWEEN 0  AND 50 THEN
                                            
                                            'BUENA'

                                            WHEN ROUND(PUNTOS_IMECA,0) BETWEEN 51  AND  100 THEN

                                            'REGULAR'
                                            
                                            WHEN ROUND(PUNTOS_IMECA,0) BETWEEN 101  AND  150 THEN
                                            
                                            'MALA'

                                            WHEN ROUND(PUNTOS_IMECA,0) BETWEEN 151  AND  200  THEN
                                            
                                            'MUY MALA'

                                            WHEN ROUND(PUNTOS_IMECA,0) BETWEEN 201  AND  300  THEN
                                    
                                            'EXTREMADAMENTE MALA'

                                            WHEN ROUND(PUNTOS_IMECA,0) BETWEEN 301  AND 400  THEN

                                            'EXTREMADAMENTE MALA'

                                            WHEN ROUND(PUNTOS_IMECA,0) BETWEEN 401  AND  500  THEN

                                            'EXTREMADAMENTE MALA'
                                        
                                        END AS CALIDAD

                    FROM CALIDAD_AIRE_TEMP order by fecha ASC ;

                    IF '".$filtro."' = '' THEN
                        IF ".$numeroElementos." < 0 THEN
                            IF lower(".$ordenamiento.") = 'menor' THEN
                                SELECT * FROM  RESULTADO_TEMP;
                            elseif lower(".$ordenamiento.") = 'mayor' then
                                SELECT * FROM  RESULTADO_TEMP ORDER BY fecha DESC;
                            END IF;
                        ELSE 
                            IF lower(".$ordenamiento.") = 'menor' THEN
                                SELECT * FROM  RESULTADO_TEMP LIMIT ".$numeroElementos.";
                            elseif lower(".$ordenamiento.") = 'mayor' then
                                SELECT * FROM  RESULTADO_TEMP ORDER BY fecha DESC LIMIT ".$numeroElementos.";
                            END IF;
                        END IF;
                    ELSE
                        IF ".$numeroElementos." < 0 THEN
                            IF lower(".$ordenamiento.") = 'menor' THEN
                                SELECT * FROM  RESULTADO_TEMP 
                                    WHERE sensor LIKE CONCAT('%', ".$filtro.", '%')  OR LOWER(Contaminante) like CONCAT('%', LOWER(".$filtro."), '%') OR PUNTOS_IMECA like CONCAT('%', ".$filtro.", '%') OR  LOWER(CALIDAD) like CONCAT('%', LOWER(".$filtro."), '%') ;
                            elseif lower(".$ordenamiento.") = 'mayor' then
                                SELECT * FROM  RESULTADO_TEMP 
                                    WHERE sensor LIKE CONCAT('%', ".$filtro.", '%')  OR LOWER(Contaminante) like CONCAT('%', LOWER(".$filtro."), '%') OR PUNTOS_IMECA like CONCAT('%', ".$filtro.", '%') OR  LOWER(CALIDAD)  like CONCAT('%', LOWER(".$filtro."), '%')   
                                ORDER BY fecha DESC;
                            END IF;
                        ELSE 
                            IF lower(".$ordenamiento.") = 'menor' THEN
                                SELECT * FROM  RESULTADO_TEMP 
                                    WHERE sensor LIKE CONCAT('%', ".$filtro.", '%')  OR LOWER(Contaminante) like CONCAT('%', LOWER(".$filtro."), '%') OR PUNTOS_IMECA like CONCAT('%', ".$filtro.", '%') OR  LOWER(CALIDAD)  like CONCAT('%', LOWER(".$filtro."), '%')  
                                LIMIT ".$numeroElementos.";
                            elseif lower(".$ordenamiento.") = 'mayor' then
                                SELECT * FROM  RESULTADO_TEMP
                                    WHERE sensor LIKE CONCAT('%', ".$filtro.", '%')  OR LOWER(Contaminante) like CONCAT('%', LOWER(".$filtro."), '%') OR PUNTOS_IMECA like CONCAT('%', ".$filtro.", '%') OR  LOWER(CALIDAD)  like CONCAT('%', LOWER(".$filtro."), '%')  
                                ORDER BY fecha DESC 
                                LIMIT ".$numeroElementos.";
                            END IF;
                        END IF;
                    END IF;

                    DROP temporary TABLE RESULTADO_TEMP;
                    DROP temporary TABLE CALIDAD_AIRE_TEMP;";

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