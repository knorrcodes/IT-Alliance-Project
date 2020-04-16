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
  if ($projectData = $mysqli->query("SELECT * FROM " . $table_name)) {
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

  $projectData = $mysqli->query("SELECT * FROM {$table_name} WHERE name='".$name."'");

  if(mysqli_num_rows($projectData) == 0){
    $mysqli->query("INSERT INTO {$table_name}(name,description,client,team_member_names) VALUES('".$name."','".$description."','".$client."','".$team_member_names."')");
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
    $mysqli->query("UPDATE {$table_name} SET name='".$name."' WHERE id=".$id);
  }
  if ($description != '') {
    $mysqli->query("UPDATE {$table_name} SET description='".$description."' WHERE id=".$id);
  }
  if ($client != '') {
    $mysqli->query("UPDATE {$table_name} SET client='".$client."' WHERE id=".$id);
  }
  if ($team_member_names != '') {
    $mysqli->query("UPDATE {$table_name} SET team_member_names='".$team_member_names."' WHERE id=".$id);
  }

  echo "Update successful.";
}

// deleteRecord()
if ($request == "4") {
  $id = $_GET['id'];

  $mysqli->query("DELETE FROM {$table_name} WHERE id=".$id);

  echo "Delete successful.";
}

$mysqli->close();
?>