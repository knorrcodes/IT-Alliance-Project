<?php
include "./config.php";
echo "__3__";
$data = json_decode(file_get_contents("php://input"));
echo "__5__";

$request = $data->request;

// Fetch All records
if($request == 1){
  $projectData = mysqli_query($con,"SELECT * FROM project_table ORDER BY id DESC");
  echo mysqli_errno($con);

  $response = array();
  while($row = mysqli_fetch_assoc($projectData)){
    $response[] = $row;
  }

  echo json_encode($response);
  exit;
}

// Add record
if($request == 2){
  $project_id = $data->project_id;
  $project_name = $data->project_name;
  $project_descrip = $data->project_descrip;
  $client_name = $data->client_name;
  $team_member_names = $data->team_member_names;

  $projectData = mysqli_query($con,"SELECT * FROM project_table WHERE id='".$project_id."'");
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
}
?>