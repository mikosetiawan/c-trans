<?php
session_start();


include("conn.php");

echo $idPemesanan = $_POST['idPemesanan'];
echo $status_acc = $_POST['status_acc'];


// update data ke database
mysqli_query($conn, "UPDATE tb_pemesanan SET status_acc='$status_acc' WHERE idPemesanan='$idPemesanan' OR namaApproval='$_SESSION[namaApproval]' OR namaApproval2='$_SESSION[namaApproval]'");

if ($_SESSION['status'] == "Approval1") {
    // Ridirect halaman
    echo "<script>alert('Berhasil dikonfirmasi/ACC!');window.location.href='../../view/dashboard/approved1?pesan=berhasil-diupdate';</script>";
} else if ($_SESSION['status'] == "Approval2") {
    // Ridirect halaman
    echo "<script>alert('Berhasil dikonfirmasi/ACC!');window.location.href='../../view/dashboard/approved2?pesan=berhasil-diupdate';</script>";
} else {
    echo "Session error!";
}
