<?php
session_start();

include("conn.php");

// Timezone
date_default_timezone_set('Asia/Jakarta');


// POST DATA FORM
$jenisBBM = $_POST['jenisBBM'];
$hargaBBM = $_POST['hargaBBM'];


mysqli_query($conn, "INSERT INTO tb_bbm VALUES('','$jenisBBM','$hargaBBM', current_timestamp(), date('h:i:s a'))");

// Ridirect halaman
echo "<script>alert('Data BBM berhasil disimpan!');window.location.href='../../view/dashboard/bbm?pesan=berhasil-disimpan';</script>";

