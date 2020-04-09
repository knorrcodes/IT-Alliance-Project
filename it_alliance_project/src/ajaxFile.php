<?php
header("Access-Control-Allow-Origin: *");
//include ($_SERVER['DOCUMENT_ROOT']."/config.php");

$request = "1";
if(isset($_GET['request'])){
  $request = $_GET['request'];
}

// Connect to Database
$mysqli = new mysqli("localhost:3308", "dbAdmin", "Doodle6-Clothing", "itadb");
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

// allRecords()
if ($request == "1") {
  if ($projectData = $mysqli->query("SELECT * FROM project_table")) {
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
  $name = $_GET['name'];
  $description = $_GET['description'];
  $client = $_GET['client'];
  $team_member_names = $_GET['team_member_names'];

  $projectData = $mysqli->query("SELECT * FROM project_table WHERE name='".$name."'");

  if(mysqli_num_rows($projectData) == 0){
    $mysqli->query("INSERT INTO project_table(name,description,client,team_member_names) VALUES('".$name."','".$description."','".$client."','".$team_member_names."')");
    echo "Insert successfully";
  }else{
    echo "Project already exists.";
  }

  $projectData->close();
}

// updateRecord()
if ($request == "3") {
  $id = $_GET['id'];
  $name = $_GET['name'];
  $description = $_GET['description'];
  $client = $_GET['client'];
  $team_member_names = $_GET['team_member_names'];

  if ($name != '') {
    $mysqli->query("UPDATE project_table SET name='".$name."' WHERE id=".$id);
  }
  if ($description != '') {
    $mysqli->query("UPDATE project_table SET description='".$description."' WHERE id=".$id);
  }
  if ($client != '') {
    $mysqli->query("UPDATE project_table SET client='".$client."' WHERE id=".$id);
  }
  if ($team_member_names != '') {
    $mysqli->query("UPDATE project_table SET team_member_names='".$team_member_names."' WHERE id=".$id);
  }

  echo "Update successful.";
}

// deleteRecord()
if ($request == "4") {
  $id = $_GET['id'];

  $mysqli->query("DELETE FROM project_table WHERE id=".$id);

  echo "Delete successful.";
}

$mysqli->close();
?>