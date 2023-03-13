<?php

require('koneksi.php');

$query = "SELECT * FROM tblrumahsakitpalembang";

$execute = mysqli_query($konek, $query);

$cek = mysqli_affected_rows($konek);

if ($cek > 0) {
    $respone['kode'] = 1;
    $respone['pesan'] = "Data Tersedia";
    $respone['Data'] = array();

    while($ambil = mysqli_fetch_object($execute)) {
        $temp["id"] = $ambil->id;
        $temp["nama"] = $ambil->nama;
        $temp["alamat"] = $ambil->alamat;
        $temp["telepon"] = $ambil->telepon;
        $temp["foto"] = $ambil->foto;

        array_push($response['data'], $temp);
     }
} else {
    $respone['kode'] = 0;
    $respone['pesan'] = "Data Tidak Tersedia";
}

echo json_encode($respone);
mysqli_close($konek);