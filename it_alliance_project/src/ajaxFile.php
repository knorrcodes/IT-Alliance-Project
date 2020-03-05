<?php
include "config.php";

$data = json_decode(file_get_contents("php://input"));

$request = $data->request;

// Fetch All records
if($request == 1){
  $userData = mysqli_query($con,"select * from itadatabase order by id desc");

  $response = array();
  while($row = mysqli_fetch_assoc($userData)){
    $response[] = $row;
  }

  echo json_encode($response);
  exit;
}

// Add record
if($request == 2){
  $project_name = $data->project_name;
  $project_descrip = $data->project_descrip;
  $client_name = $data->client_name;
  $team_member_names = $data->team_member_names;

  $userData = mysqli_query($con,"SELECT * FROM itadatabase WHERE Name='".$project_name."'");
  if(mysqli_num_rows($userData) == 0){
    mysqli_query($con,"INSERT INTO itadatabase(name,description,client,team_members) VALUES('".$project_name."','".$project_descrip."','".$client_name."','".$team_member_names."')");
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

  mysqli_query($con,"UPDATE itadatabase SET name='".$project_name."',email='".$project_descrip."','".$client_name."','".$team_member_names."' WHERE id=".$id);
 
  echo "Update successfully";
  exit;
}

// Delete record
if($request == 4){
  $id = $data->id;

  mysqli_query($con,"DELETE FROM itadatabase WHERE id=".$id);

  echo "Delete successfully";
  exit;
}