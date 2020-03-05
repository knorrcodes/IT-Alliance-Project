<?php

$host = "127.0.0.1:3306"; /* Host name */
$user = "dbAdmin"; /* User */
$password = "Doodle6-Clothing"; /* Password */
$dbname = "itaDatabase"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}