<?php
session_start();

include("conn.php");

// Timezone
date_default_timezone_set('Asia/Jakarta');


// POST DATA FORM
$namaDriver = $_POST['namaDriver'];
$tempatLahir = $_POST['tempatLahir'];
$tglLahir = $_POST['tglLahir'];
$noTlp = $_POST['noTlp'];
$jenisSIM = $_POST['jenisSIM'];
$alamat = $_POST['alamat'];


mysqli_query($conn, "INSERT INTO tb_driver VALUES('','$namaDriver','$tempatLahir','$tglLahir','$noTlp','$jenisSIM','$alamat', current_timestamp(), date('h:i:s a'))");

// Ridirect halaman
echo "<script>alert('Data Driver berhasil disimpan!');window.location.href='../../view/dashboard/driver?pesan=berhasil-disimpan';</script>";

