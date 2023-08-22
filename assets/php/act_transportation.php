<?php
session_start();

include("conn.php");

// Timezone
date_default_timezone_set('Asia/Jakarta');


// POST DATA FORM
$namaKendaraan = $_POST['namaKendaraan'];
$jenisKendaraan = $_POST['jenisKendaraan'];
$flatNo = $_POST['flatNo'];
$statusKendaraan = $_POST['statusKendaraan'];
$serviceKendaraan = $_POST['serviceKendaraan'];


mysqli_query($conn, "INSERT INTO tb_kendaraan VALUES('','$namaKendaraan','$jenisKendaraan','$flatNo','$statusKendaraan','$serviceKendaraan',current_timestamp(), date('h:i:s a'))");

// Ridirect halaman
echo "<script>alert('Data transportasi berhasil disimpan!');window.location.href='../../view/dashboard/transportation?pesan=berhasil-disimpan';</script>";

