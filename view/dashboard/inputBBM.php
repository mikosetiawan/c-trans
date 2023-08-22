<?php


session_start();

if (!isset($_SESSION['status'])) {
    header("Location: ../../index");
}



//membuat koneksi ke database
include("../../assets/php/conn.php");

//variabel flatNo yang dikirimkan 
$jenisBBM = $_GET['jenisBBM'];

//mengambil data
$query = mysqli_query($conn, "SELECT * FROM tb_bbm WHERE jenisBBM='$jenisBBM'");
$row = mysqli_fetch_array($query);
$data = array(
    'hargaBBM'      =>  @$row['hargaBBM'],

);

//tampil data
echo json_encode($data);
