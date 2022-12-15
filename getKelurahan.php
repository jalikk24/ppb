<?php 
	$kotaKabsId = $_GET['dis_id'];
	
	require_once('dbConnect.php');

    $sql = "SELECT * FROM subdistricts WHERE dis_id = $kotaKabsId";
	
	$r = mysqli_query($con,$sql);
	
	$result = array();

	while($row = mysqli_fetch_array($r)) {
		array_push($result,array(
            "idKel"=>(int)$row['subdis_id'],
			"kelurName"=>$row['subdis_name'],
			// "kotaKabsId"=>(int)$row['dis_id'],
		));
	}

	echo json_encode(array('result'=>$result));
	
	mysqli_close($con);