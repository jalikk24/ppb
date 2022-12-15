<?php
	header('Content-Type:application/json');
	
	if($_SERVER['REQUEST_METHOD']=='POST'){

		$request = file_get_contents('php://input');
        $data_retrevie = json_decode($request);

        $message = "Input Berhasil";
        $code = 200;
        $status = true;

        $data_collect = json_decode($request);
	
		$username = $data_collect->namaUsername;
		$passwords = $data_collect->passwords;

		$sql = "SELECT * FROM user WHERE namaUsername='$username' AND passwords='$passwords'";

		require_once('dbConnect.php');

		$r = mysqli_query($con, $sql);
	
	 	$row = mysqli_fetch_array($r);

		if (!empty($row)){
			$result = [
				"result" => [
					"id"=>$row['id'],
					"username"=>$row['namaUsername'],
				],
				"status" => [
					"code"=> $code,
					"success" => $status,
					"description" => $message
				]
			];
			
		} else { 
			$result = [
				"result" => null,
				"status" => [
					"code"=> 400,
					"success" => false,
					"description" => "User Not Found !"
				]
			];
		}
		
		$json = json_encode($result);

		echo $json;
		//Closing the database 
		mysqli_close($con);

}

?>