<?php 
	
	require_once('dbConnect.php');
	$sql = "SELECT * FROM makanan";
	$r = mysqli_query($con,$sql);
	$result = array();
	$row = mysqli_fetch_array($r);
	while($row = mysqli_fetch_array($r)){
		array_push($result,array(
			"idMakanan"=>(int)$row['idMakanan'],
            "nama"=>$row['nama'],
            "price"=>(int)$row['price'],
            "rating"=>$row['rating'],
            "image"=>$row['image'],
		));
	}
	
	
	echo json_encode(array('result'=>$result));
	
	mysqli_close($con);