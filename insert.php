<?php

define("servename","localhost");
define("username","root");
define("password","");
define("db","water_level_monitoring");

$con = mysqli_connect(servename,username,password,db);


$level=$_GET['WaterLevel'];

$sql = "INSERT INTO waterrecords (WaterLevel)
VALUES ('$level')";

if (mysqli_query($con, $sql)) 
echo "New record created successfully";
?>