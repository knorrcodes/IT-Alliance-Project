<?php
header("Access-Control-Allow-Origin: *");
//include ($_SERVER['DOCUMENT_ROOT']."/config.php");

$request = "1";
if(isset($_GET["request"])){
  $request = $_GET["request"];
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

// uploadFiles()
if ($request == "5") {
  $semester = $_GET["semester"];
  $project_id = $_GET["project_id"];
  $long_blob = $_GET["long_blob"];
  $file_name = $_GET["file_name"];
  $file_type = $_GET["file_type"];

  $mysqli->query("INSERT INTO ".$table_name." (semester,project_id,long_blob,file_name,file_type) VALUES ('".$semester."','".$project_id."','".$long_blob."','".$file_name."','".$file_type."')");

  echo "Insert Successful";
}

// getFiles()
if ($request == "6") {
  $semester = $_GET["semester"];
  $project_id = $_GET["project_id"];
  
  if ($projectData = $mysqli->query("SELECT * FROM ".$table_name." WHERE semester='".$semester."' and project_id='".$project_id."'")) {
    $response = array();
    
    while($row = mysqli_fetch_assoc($projectData)){
    
       $response[] = $row;
    }
    
    echo json_encode($response);

    $projectData->close();
  }
}

//imageView()
if ($request == "7") {
  $id = $_GET["id"];

  $result = $mysqli->query("SELECT long_blob,file_type FROM blobStorage WHERE id=".$id);

  $row = mysqli_fetch_array($result);

  //header("Content-type: ".$row["file_type"]);

  echo $row["long_blob"];

  //echo '<b-img src="data:'.$row["file_type"].';base64,'.base64_encode( $row['long_blob'] ).'"/>';
  //echo '"data:'.$row["file_type"].';base64,'.base64_encode( $row["long_blob"] ).'"';
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
  if(isset($_GET["completed_date"])){
    $completed_date = $_GET['completed_date'];
  }
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
    if(isset($completed_date)){
      $mysqli->query("INSERT INTO ".$table_name." (priority,status,semester,name,start_date,projected_date,completed_date,description,client,client_email,team_member_names,tshirt_s,tshirt_m,tshirt_l,tshirt_xl) VALUES('".$priority."','".$status."','".$semester."','".$name."','".$start_date."','".$projected_date."','".$completed_date."','".$description."','".$client."','".$client_email."','".$team_member_names."','".$tshirt_s."','".$tshirt_m."','".$tshirt_l."','".$tshirt_xl."')");
    }
    else{
      $mysqli->query("INSERT INTO ".$table_name." (priority,status,semester,name,start_date,projected_date,description,client,client_email,team_member_names,tshirt_s,tshirt_m,tshirt_l,tshirt_xl) VALUES('".$priority."','".$status."','".$semester."','".$name."','".$start_date."','".$projected_date."','".$description."','".$client."','".$client_email."','".$team_member_names."','".$tshirt_s."','".$tshirt_m."','".$tshirt_l."','".$tshirt_xl."')");
    }
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
  if(isset($_GET["completed_date"])){
    $completed_date = $_GET['completed_date'];
  }
  $description = $_GET['description'];
  $client = $_GET['client'];
  $client_email = $_GET['client_email'];
  $team_member_names = $_GET['team_member_names'];
  $tshirt_s = $_GET['tshirt_s'];
  $tshirt_m = $_GET['tshirt_m'];
  $tshirt_l = $_GET['tshirt_l'];
  $tshirt_xl = $_GET['tshirt_xl'];

  if(isset($completed_date)){
    $mysqli->query("UPDATE ".$table_name." SET priority='".$priority."',status='".$status."',semester='".$semester."',name='".$name."',start_date='".$start_date."',projected_date='".$projected_date."',completed_date='".$completed_date."',description='".$description."',client='".$client."',client_email='".$client_email."',team_member_names='".$team_member_names."',tshirt_s='".$tshirt_s."',tshirt_m='".$tshirt_m."',tshirt_l='".$tshirt_l."',tshirt_xl='".$tshirt_xl."' WHERE id=".$id);
  }
  else{
    $mysqli->query("UPDATE ".$table_name." SET priority='".$priority."',status='".$status."',semester='".$semester."',name='".$name."',start_date='".$start_date."',projected_date='".$projected_date."',description='".$description."',client='".$client."',client_email='".$client_email."',team_member_names='".$team_member_names."',tshirt_s='".$tshirt_s."',tshirt_m='".$tshirt_m."',tshirt_l='".$tshirt_l."',tshirt_xl='".$tshirt_xl."' WHERE id=".$id);
  }

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