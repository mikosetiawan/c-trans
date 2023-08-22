<?php
session_start();


// Timezone
date_default_timezone_set('Asia/Jakarta');

include("conn.php");


// POST LAINYA
$namaPemesanan = $_POST['namaPemesanan'];
$tglPemesanan = $_POST['tglPemesanan'];
$flatNo = $_POST['flatNo'];
$namaKendaraan = $_POST['namaKendaraan'];
$jenisKendaraan = $_POST['jenisKendaraan'];
$statusKendaraan = $_POST['statusKendaraan'];
$jenisBBM = $_POST['jenisBBM'];
$hargaBBM = $_POST['hargaBBM'];
$jmlBBM = $_POST['jmlBBM'];
$namaDriver = $_POST['namaDriver'];
$namaApproval = $_POST['namaApproval'];
$namaApproval2 = $_POST['namaApproval2'];
$status_acc = $_POST['status_acc'];
$_POST['totalBBM'] += ((int)$hargaBBM * (int)$jmlBBM);
"<br>";

// Get ID mysqli
$data = mysqli_query($conn, "SELECT * from tb_kendaraan WHERE flatNo='$_POST[flatNo]'");
$row_kendaraan = mysqli_fetch_array($data);

$data = mysqli_query($conn, "SELECT * from tb_bbm WHERE jenisBBM='$_POST[jenisBBM]'");
$row_bbm = mysqli_fetch_array($data);

$data = mysqli_query($conn, "SELECT * from tb_driver WHERE namaDriver='$_POST[namaDriver]'");
$row_driver = mysqli_fetch_array($data);

$data = mysqli_query($conn, "SELECT * from tb_approval WHERE namaApproval='$_POST[namaApproval]'");
$row_approval = mysqli_fetch_array($data);


// ID POST
$idKendaraan = $row_kendaraan['idKendaraan'];
$idBMM = $row_bbm['idBBM'];
$idDriver = $row_driver['idDriver'];
$idApproval = $row_approval['idApproval'];



mysqli_query($conn, "INSERT INTO tb_pemesanan VALUES('','$namaPemesanan','$tglPemesanan','$idKendaraan','$namaKendaraan','$flatNo',
'$jenisKendaraan','$statusKendaraan','$idBMM','$jenisBBM','$jmlBBM','$_POST[totalBBM]','$idDriver','$namaDriver','$idApproval','$namaApproval','$namaApproval2',
'$status_acc', current_timestamp(), date('h:i:s a'))");


// Ridirect halaman
echo "<script>alert('Data Pemesanan berhasil disimpan!');window.location.href='../../view/dashboard/booking?pesan=berhasil-disimpan';</script>";
