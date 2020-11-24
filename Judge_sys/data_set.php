<?php	
	include 'connection/connect.php';
	$fp = fopen("lang_set.txt","r");
	$test = array();
	while(!feof($fp))
	{
		$line = trim(fgets($fp));
		$exp = explode("-",$line);
		$test[$exp[0]] = @$exp[1];
		//$query = "INSERT INTO languages(lang_name,lang_arg) values('$exp[0]','$exp[1]')";
		//$conn->query($query);
	}	

	//print_r($test);

?>
