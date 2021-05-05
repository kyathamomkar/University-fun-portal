<?php
  include "./config.php";
  $uname = $_GET['username'];
  $sql = "SELECT * FROM `users` where `email`!='$uname'";
  $result = $con->query($sql);
  $users ='';
  $users .= '{\'Users\':{';  

  while($row = $result->fetch_assoc()){
      $users .= "'".$row["email"]."':'".$row["firstname"]."',";
  }
	$users = rtrim($users, ",");
  $sql = "SELECT * FROM clubs where clubname in (select clubname from clubmemberships where useremail ='".$uname."')"; 
  $result = $con->query($sql);

  $users .= '},\'Clubs\':{';

    while($row = $result->fetch_assoc()){
        $users .= "'".$row["clubid"]."':'".$row["clubname"]."',";
    }
	$users = rtrim($users, ",");
    $users .= '}}';
	
	$users = str_replace("'",'"',$users);
	
	header('Content-Type: application/json');
	echo $users;
?>