<?php


session_start();

if (!isset($_SESSION['status'])) {
    header("Location: ../../index");
}



//membuat koneksi ke database
include("../../assets/php/conn.php");

//variabel flatNo yang dikirimkan 
$flatNo = $_GET['flatNo'];

//mengambil data
$query = mysqli_query($conn, "SELECT * FROM tb_kendaraan WHERE flatNo='$flatNo'");
$row = mysqli_fetch_array($query);
$data = array(
    'namaKendaraan'      =>  @$row['namaKendaraan'],
    'jenisKendaraan'      =>  @$row['jenisKendaraan'],
    'statusKendaraan'   =>  @$row['statusKendaraan'],
);

//tampil data
echo json_encode($data);
