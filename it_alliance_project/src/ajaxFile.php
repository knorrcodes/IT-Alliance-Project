<?php
header("Access-Control-Allow-Origin: *");
//echo "\n__1__\n"
//include ($_SERVER['DOCUMENT_ROOT']."/config.php");

$mysqli = new mysqli("localhost:3308", "dbAdmin", "Doodle6-Clothing", "itadb");
/* check connection */
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

//echo "\n__1__\n";

if ($projectData = $mysqli->query("SELECT * FROM project_table")) {
  //printf("Select returned %d rows.\n", $result->num_rows);
  $response = array();
  
  while($row = mysqli_fetch_assoc($projectData)){
  
     $response[] = $row;
  }
  
  echo json_encode($response);

  /* free result set */
  $projectData->close();
}

$mysqli->close();

//$data = json_decode(file_get_contents("php://input"));
//echo "__5__\n";
//echo "\n_@_", $_GET , "_@_\n";

//$request = $data->request;
/*
// Fetch All records
//if($request == 1){
//  $condition = "1";
//  if(isset($_GET['id'])){
//    $condition = "id=".$_GET['id'];
//  }
*/
  //$projectData = mysqli_query($con,"SELECT * FROM itadb.project_table WHERE ".$condition);

  //$projectData = mysqli_query($con,"SELECT * FROM project_table");
/*
  $response = array();
  
  while($row = mysqli_fetch_assoc($projectData)){
  
     $response[] = $row;
  }
  
  echo json_encode($response);
  exit;

*/
  /* $projectData = mysqli_query($con,"SELECT * FROM project_table ORDER BY id DESC");
  echo mysqli_errno($con);

  $response = array();
  while($row = mysqli_fetch_assoc($projectData)){
    $response[] = $row;
  }

  echo json_encode($response);
  exit; */
//}
/*
// Add record
if($request == 2){
  //$project_id = $data->project_id;
  $project_name = $data->project_name;
  $project_descrip = $data->project_descrip;
  $client_name = $data->client_name;
  $team_member_names = $data->team_member_names;

  $projectData = mysqli_query($con,"SELECT * FROM project_table WHERE name='".$project_name."'");
  if(mysqli_num_rows($projectData) == 0){
    mysqli_query($con,"INSERT INTO project_table(name,description,client,team_members) VALUES('".$project_name."','".$project_descrip."','".$client_name."','".$team_member_names."')");
    echo "Insert successfully";
  }else{
    echo "Project already exists.";
  }

  exit;
}

// Update record
if($request == 3){
  $id = $data->id;
  $project_name = $data->project_name;
  $project_descrip = $data->project_descrip;
  $client_name = $data->client_name;
  $team_member_names = $data->team_member_names;

  mysqli_query($con,"UPDATE project_table SET name='".$project_name."',description='".$project_descrip."',client='".$client_name."',team_members='".$team_member_names."' WHERE id=".$id);
 
  echo "Update successfully";
  exit;
}

// Delete record
if($request == 4){
  $id = $data->id;

  mysqli_query($con,"DELETE FROM project_table WHERE id=".$id);

  echo "Delete successfully";
  exit;
}*/
?>