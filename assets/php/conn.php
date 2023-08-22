<?php

$conn = mysqli_connect("localhost","root","sayabisa01","db_cTrans");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
