<?php
header("Access-Control-Allow-Origin: *");
//include ($_SERVER['DOCUMENT_ROOT']."/config.php");

$request = "1";
if(isset($_GET['request'])){
  $request = $_GET['request'];
}

if(isset($_GET['table_name'])){
  $table_name = $_GET['table_name'];
}

if(isset($_GET['username'])){
  $username = $_GET['username'];
}

if(isset($_GET['password'])){
  $password = $_GET['password'];
}

// Connect to Database
$mysqli = new mysqli("localhost:3308", $username, $password, "itadb");
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

// allRecords()
if ($request == "1") {
  if ($projectData = $mysqli->query("SELECT * FROM ".$table_name)) {
    $response = array();
    
    while($row = mysqli_fetch_assoc($projectData)){
    
       $response[] = $row;
    }
    
    echo json_encode($response);

    $projectData->close();
  }
}

// addRecord()
if ($request == "2") {
  $priority = $_GET['priority'];
  $status = $_GET['status'];
  $semester = $_GET['semester'];
  $name = $_GET['name'];
  $start_date = $_GET['start_date'];
  $projected_date = $_GET['projected_date'];
  $completed_date = $_GET['completed_date'];
  $description = $_GET['description'];
  $client = $_GET['client'];
  $client_email = $_GET['client_email'];
  $team_member_names = $_GET['team_member_names'];
  $tshirt_s = $_GET['tshirt_s'];
  $tshirt_m = $_GET['tshirt_m'];
  $tshirt_l = $_GET['tshirt_l'];
  $tshirt_xl = $_GET['tshirt_xl'];

  $projectData = $mysqli->query("SELECT * FROM ".$table_name." WHERE name='".$name."'");

  if(mysqli_num_rows($projectData) == 0){
    $mysqli->query("INSERT INTO ".$table_name." (priority,status,semester,name,start_date,projected_date,completed_date,description,client,client_email,team_member_names,tshirt_s,tshirt_m,tshirt_l,tshirt_xl) VALUES('".$priority."','".$status."','".$semester."','".$name."','".$start_date."','".$projected_date."','".$completed_date."','".$description."','".$client."','".$client_email."','".$team_member_names."','".$tshirt_s."','".$tshirt_m."','".$tshirt_l."','".$tshirt_xl."')");
    echo "Insert successfully";
  }else{
    echo "Project already exists.";
  }

  $projectData->close();
}

// updateRecord()
if ($request == "3") {
  $id = $_GET['id'];
  $priority = $_GET['priority'];
  $status = $_GET['status'];
  $semester = $_GET['semester'];
  $name = $_GET['name'];
  $start_date = $_GET['start_date'];
  $projected_date = $_GET['projected_date'];
  $completed_date = $_GET['completed_date'];
  $description = $_GET['description'];
  $client = $_GET['client'];
  $client_email = $_GET['client_email'];
  $team_member_names = $_GET['team_member_names'];
  $tshirt_s = $_GET['tshirt_s'];
  $tshirt_m = $_GET['tshirt_m'];
  $tshirt_l = $_GET['tshirt_l'];
  $tshirt_xl = $_GET['tshirt_xl'];

  $mysqli->query("UPDATE ".$table_name." SET priority='".$priority."',status='".$status."',semester='".$semester."',name='".$name."',start_date='".$start_date."',projected_date='".$projected_date."',completed_date='".$completed_date."',description='".$description."',client='".$client."',client_email='".$client_email."',team_member_names='".$team_member_names."',tshirt_s='".$tshirt_s."',tshirt_m='".$tshirt_m."',tshirt_l='".$tshirt_l."',tshirt_xl='".$tshirt_xl."' WHERE id=".$id);

  echo "Update Successful.";
}

// deleteRecord()
if ($request == "4") {
  $id = $_GET['id'];

  $mysqli->query("DELETE FROM ".$table_name." WHERE id=".$id);

  echo "Delete successful.";
}

$mysqli->close();
?>