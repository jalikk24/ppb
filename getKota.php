<?php 
	$provId = $_GET['prov_id'];
	
	require_once('dbConnect.php');

    $sql = "SELECT * FROM cities WHERE prov_id = $provId";
	
	$r = mysqli_query($con,$sql);
	
	$result = array();

	while($row = mysqli_fetch_array($r)) {
		array_push($result,array(
            "idCity"=>(int)$row['city_id'],
			"cityName"=>$row['city_name'],
			// "prov_id"=>(int)$row['prov_id'],
		));
	}

	echo json_encode(array('result'=>$result));
	
	mysqli_close($con);