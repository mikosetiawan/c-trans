<?php
session_start();

include("conn.php");

// Timezone
date_default_timezone_set('Asia/Jakarta');


// POST DATA FORM
$username = $_POST['username'];
$password = $_POST['password'];
$status = $_POST['status'];


mysqli_query($conn, "INSERT INTO users VALUES('','$username','$password', '','$status', '0', '','','',current_timestamp(), date('h:i:s a'))");


// Ridirect halaman
echo "<script>alert('User/Admin berhasil ditambahkan!');window.location.href='../../view/dashboard/add_user?pesan=berhasil-disimpan';</script>";

