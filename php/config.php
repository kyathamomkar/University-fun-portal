<?php
//error_reporting(0);
//session_start();

$con = new mysqli('hackathon.cbwqiuux8uje.us-east-1.rds.amazonaws.com', 'hackathon', 'hackathon', 'UBS');
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}