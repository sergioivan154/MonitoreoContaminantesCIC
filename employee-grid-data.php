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
	0 =>'timestamp', 
	1 =>'id_wasp', 
	2 => 'sensor',
	3 => 'value'
	
);

// getting total number records without any search
$sql = "SELECT timestamp, id_wasp, sensor, value ";
$sql.=" FROM sensorParser order by timestamp desc";
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get data");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT  timestamp, id_wasp, sensor, value ";
	$sql.=" FROM sensorParser";
	$sql.=" WHERE id_wasp LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR sensor LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR value LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get data");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   desc  LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get data"); // again run query with limit
	
} else {	

	$sql = "SELECT timestamp, id_wasp, sensor, value ";
	$sql.=" FROM sensorParser";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."  desc  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get data");
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["timestamp"];
	$nestedData[] = $row["id_wasp"];
	$nestedData[] = $row["sensor"];
	$nestedData[] = $row["value"];
	
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
