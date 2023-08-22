<?php

session_start();

// Hapus SESSION
session_unset();
session_destroy();

// alihkan ke halaman
echo "<script>alert('Berhasil logout!');window.location.href='../../index?pesan=berhasil-logout';</script>";