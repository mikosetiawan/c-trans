<?php
session_start();

include("conn.php");

// Timezone
date_default_timezone_set('Asia/Jakarta');


// POST DATA FORM
$namaApproval = $_POST['namaApproval'];
$jabatan = $_POST['jabatan'];


mysqli_query($conn, "INSERT INTO tb_approval VALUES('','$namaApproval','$jabatan', current_timestamp(), date('h:i:s a'))");

// Ridirect halaman
echo "<script>alert('Data Approval berhasil disimpan!');window.location.href='../../view/dashboard/approval?pesan=berhasil-disimpan';</script>";

