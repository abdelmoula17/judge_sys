<?php
	
	include 'connection/connect.php';
	$fields = array("PHP","C","PROBLEM SOLVING","JAVASCRIPT","SHELL","SQL","OOP");
	for($i = 0;$i < count($fields);$i++)	
	{
		$x = $fields[$i];
		$query  = "INSERT INTO fields(field_name) values('$x')";
		$result = $conn->query($query);
		if(!$result)
		{
			echo "mysql : ".mysqli_error($conn);
		}
		//$conn->query($query);
	}

?>
