<?php

     include ("../../include/config.php"); 
     
	$strSQL = "SELECT * FROM location  ";

	$objQuery = mysql_query($strSQL);
	$resultArray = array();
	while($obResult = mysql_fetch_array($objQuery))
	{
		array_push($resultArray,$obResult);
	}
	
	mysql_close($objConnect);
	
	echo json_encode($resultArray);
?>