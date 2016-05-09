<?php session_start();

/*Lo que vamos a comprobar primero es si se esta solicitando un nuevo idioma
Si se esta solicitando, verificamos que el idioma existe tambien*/


if(!empty($_REQUEST['local']) && file_exists('lang/'.$_REQUEST['local'].'.php')){

  /*Entonces lo que vamos a hacer ahora, es decir que a partir de ahora,
  nuestro idioma por defecto es este, al menos que se solicite cambiarlo de vuelta*/

  $_SESSION['local'] = $_REQUEST['local'];

  //y esto lo vamos a usar despues
  $language = $_REQUEST['local'];
}

//Sino se solicito ningun idioma, verificamos si quedo guardado en nuestra session

elseif(isset($_SESSION['local']))

  //Lo mismo que antes, esto para despues

  $language = $_SESSION['local'];

//Y por ultimo, si nada de lo anterior cumple los requisitos, cargamos el idioma, que seria el idioma por defecto

else
  $language = 'es';

require_once('lang/'.$language.'.php');

?>

<?php

/* Database connection start */
$servername = "localhost";
$username = "airmxgen_meshliu";
$password = "libelium2007";
$dbname = "airmxgen_meshliu";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

/* Database connection end */

// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 =>'fecha', 
	1 =>'sensor',
	3 =>'Contaminante', 
	2 =>'PUNTOS_IMECA',
	4 =>'CALIDAD'
	
);

$idioma = '';
if($language == 'en'){
	$idioma  = 'es';
}
else{
	$idioma  = 'en';		
}

// getting total number records without any search
$sql = "CALL `IMECA`(-1, -1, 'menor','', '".$idioma."');";
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get data");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
mysqli_close($conn);

if( !empty($requestData['search']['value']) ) {
	 
	// if there is a search parameter
	$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

	$sql = "CALL `IMECA`(-1, ".$requestData['length'].", 'mayor',".$requestData['search']['value'].", '".$idioma."'); ";
	//$sql.=" FROM sensorParser";
	//$sql.=" WHERE id_wasp LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	//$sql.=" OR sensor LIKE '".$requestData['search']['value']."%' ";
	//$sql.=" OR value LIKE '".$requestData['search']['value']."%' ";
	//$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get data");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	//$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   desc  LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get data"); // again run query with limit
	
	mysqli_close($conn);

} else {	

	$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

	$sql = "CALL `IMECA`(-1, ".$requestData['length'].", 'mayor','', '".$idioma."'); ";
	//$sql = "SELECT timestamp, id_wasp, sensor, value ";
	//$sql.=" FROM sensorParser";
	//$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."  desc  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get data");
	mysqli_close($conn);

}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["fecha"];
	$nestedData[] = $row["sensor"];
	$nestedData[] = $row["Contaminante"];
	$nestedData[] = $row["PUNTOS_IMECA"];
	$nestedData[] = $row["CALIDAD"]; //tiene que ir el if de la linea
	
	$data[] = $nestedData;
}


$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);


echo json_encode($json_data);  // send data as json format

?>
