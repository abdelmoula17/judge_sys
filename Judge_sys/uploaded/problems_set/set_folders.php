<?php
	$conn = new mysqli("127.0.0.1","root","","Sys_judge");
	if($conn->connect_errno)
	{
		die("unable connection : ".$conn->connect_errno);
	}
	$result = $conn->query("select * from languages");
	
	while($row = $result->fetch_array())
	{
		exec("sudo mkdir ".$row[1]);
	}
?>
