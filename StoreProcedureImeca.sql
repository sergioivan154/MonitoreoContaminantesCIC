-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `airmxgen_meshliu`.`IMECA` ( IN NUMERO_SENSOR INT, IN NUMERO_ELEMENTOS INT,IN ORDENAMIENTO TEXT) -- SI ES 1 ENTONCES (DEL 2016 -> 2015) Y SI ES -1 ENTONCES VALOR POR OMISION
BEGIN
	


DROP temporary TABLE IF exists RESULTADO_TEMP;
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

sensor IN ('NO2', 'CO', 'O3') and NUMERO_SENSOR = -1 -- caso 1 es cuando quieres todos los elementos para la tabla debajo del mapa
or sensor IN ('NO2', 'CO', 'O3')   -- caso necesitas un marcador por sensor
AND sensorParser.id_wasp  = NUMERO_SENSOR


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


IF NUMERO_ELEMENTOS < 0 THEN
	IF lower(ORDENAMIENTO) = 'menor' THEN
		SELECT * FROM  RESULTADO_TEMP;
	elseif lower(ORDENAMIENTO) = 'mayor' then
		SELECT * FROM  RESULTADO_TEMP ORDER BY fecha DESC;
	END IF;
ELSE 
	IF lower(ORDENAMIENTO) = 'menor' THEN
		SELECT * FROM  RESULTADO_TEMP LIMIT NUMERO_ELEMENTOS;
	elseif lower(ORDENAMIENTO) = 'mayor' then
		SELECT * FROM  RESULTADO_TEMP ORDER BY fecha DESC LIMIT NUMERO_ELEMENTOS;
		
	END IF;
	
END IF;

DROP temporary TABLE RESULTADO_TEMP;
DROP temporary TABLE CALIDAD_AIRE_TEMP;

END

call imeca(-1,-1,'Menor', 'O2');