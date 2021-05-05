<?php
$connection = new mysqli('hackathon.cbwqiuux8uje.us-east-1.rds.amazonaws.com', 'hackathon', 'hackathon', 'UBS');
		$table=$_POST['table'];
        $id=$_POST['id'];	
		$function=$_POST['function'];
		$increment=$_POST['increment'];
		if($increment=='true')
		{
			$operation = '+';
		}
		else{
			$operation = '-';
		}
        $sql = "UPDATE ".$table." SET `".$function."`=`".$function."`".$operation."1 WHERE `id`=".$id;
		if (mysqli_query($connection, $sql)) {
            echo json_encode(array("statusCode"=>200));
        }
        else {
            echo json_encode(array("statusCode"=>201));
        }
        mysqli_close($connection);
    
?>