<?php
header('Content-Type:application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $request = file_get_contents('php://input');
    $data_retrevie = json_decode($request);

    $message = "Input Berhasil";
    $code = 200;
    $status = true;

    $data_collect = json_decode($request);

    //Getting values
    $namaUsername = $data_collect->namaUsername;
    $umur = $data_collect->umur;
    $email = $data_collect->email;
    $passwords = $data_collect->passwords;
    $gender = $data_collect->gender;
    $idProv = $data_collect->idProv;
    $idKotaKabs = $data_collect->idKotaKabs;
    $idKecamatan = $data_collect->idKecamatan;
    $idKelurahan = $data_collect->idKelurahan;
    $latitude = $data_collect->latitude;
    $longitude = $data_collect->longitude;
    $alamat = $data_collect->alamat;

    //Creating an sql query
    $sql = "INSERT INTO user (namaUsername, umur, email, passwords, gender, idProv, idKotaKabs, idKecamatan, idKelurahan, latitude, longitude, alamat) VALUES 
        ('$namaUsername', '$umur', '$email', '$passwords', '$gender', '$idProv', '$idKotaKabs', '$idKecamatan', '$idKelurahan', '$latitude', '$longitude', '$alamat')";

    //Importing our db connection script
    require_once('dbConnect.php');

    //Executing query to database
    if (!mysqli_query($con, $sql)) {
        $data_collect = null;
        $message = "Request Data salah";
        $code = 400;
        $status = false;
    }

    $result = [
        "result" => $data_collect,
        "status" => [
            "code" => $code,
            "success" => $status,
            "description" => $message
        ]
    ];

    $json = json_encode($result);

    echo $json;
    //Closing the database 
    mysqli_close($con);
}
