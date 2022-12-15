<?php 
	
	require_once('dbConnect.php');
	$sql = "SELECT * FROM provinces";
	$r = mysqli_query($con,$sql);
	$result = array();
	$row = mysqli_fetch_array($r);
	while($row = mysqli_fetch_array($r)){
		array_push($result,array(
			"provId"=>(int)$row['prov_id'],
            "provName"=>$row['prov_name'],
            "locationId"=>(int)$row['locationid'],
		));
	}
	
	
	echo json_encode(array('result'=>$result));
	
	mysqli_close($con);