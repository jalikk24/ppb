<?php 
	$cityId = $_GET['city_id'];
	
	require_once('dbConnect.php');

    $sql = "SELECT * FROM districts WHERE city_id = $cityId";
	
	$r = mysqli_query($con,$sql);
	
	$result = array();

	while($row = mysqli_fetch_array($r)) {
		array_push($result,array(
            "idKec"=>(int)$row['dis_id'],
			"kecName"=>$row['dis_name'],
			// "cityId"=>(int)$row['city_id'],
		));
	}

	echo json_encode(array('result'=>$result));
	
	mysqli_close($con);