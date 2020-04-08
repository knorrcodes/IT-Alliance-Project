<?php
header('Access-Control-Allow-Origin: *'); 
//echo "\n__2__\n";

$host = "localhost:3308"; /* Host name */
//$port=3306; /* Port */
//$socket="";
$user = "dbAdmin"; /* User */
$password = "Doodle6-Clothing"; /* Password */
$dbname = "itadb"; /* Database name */

$con = mysqli_connect($host, $user, $password, $dbname);

/* check connection */
if (mysqli_connect_errno()) {
  printf("Connect failed: %s\n", mysqli_connect_error());
  exit();
}

$method = $_SERVER['REQUEST_METHOD'];
//$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
//$input = json_decode(file_get_contents('php://input'),true);

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

mysqli_close($con);



/*
switch ($method) {
  case 'GET':
    $condition = "1";
    if(isset($_GET['id'])){
      $condition = " id=".$_GET['id'];
    }
    //$id = .$_GET['id'];
    $sql = "SELECT * FROM itadb.project_table WHERE ".$condition; 
    break;
  case 'POST':
    $project_name = $_POST["name"];
    $project_descrip = $_POST["description"];
    $client_name = $_POST["client"];
    $team_member_names = $_POST["team_members"];

    $sql = "INSERT INTO itadb.project_table (name, description, client, team_members) 
      VALUES ('$project_name', '$project_descrip', '$client_name', '$team_member_names')"; 
    break;
}

// run SQL statement
$result = mysqli_query($con,$sql);

// die if SQL statement failed
if (!$result) {
  http_response_code(404);
  die(mysqli_error($con));
}

if ($method == 'GET') {
    if (!$id) echo '[';
    for ($i=0 ; $i<mysqli_num_rows($result) ; $i++) {
      echo ($i>0?',':'').json_encode(mysqli_fetch_object($result));
    }
    if (!$id) echo ']';
  } elseif ($method == 'POST') {
    echo json_encode($result);
  } else {
    echo mysqli_affected_rows($con);
  }
*/

//$con->close();

/* $con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

$con->close(); */
?>