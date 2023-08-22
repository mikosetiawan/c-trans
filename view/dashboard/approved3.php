<?php
session_start();

if (!isset($_SESSION['status'])) {
    header("Location: ../../index");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approved ACC | Dash C-Trans</title>

    <!-- Logo -->
    <link rel="shortcut icon" href="../../assets/img/ic_c-trans.png" type="image/x-icon">

    <!-- Boostrap Framework -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <!-- Font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- CSS Style -->
    <link rel="stylesheet" href="../../assets/css/dashboard.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- CDN JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


</head>

<body>

    <nav class="navbar navbar-expand-lg bg-c-trans1 sticky-top">
        <div class="container">
            <img src="../../assets/img/ic_c-rans-white.png" class="d-inline-block align-text-top sz_ic_nav" alt="">
            <li class="mx-auto me-1 nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../../assets/img/user.png" class="w-50" alt="">
                </a>
                <ul class="dropdown-menu rounded-nav shadow border-0 px-2 py-2" style="margin-left: -60px;">
                    <li><a class="dropdown-item line-nav" href="#">Edit Profile</a></li>
                    <li><a class="dropdown-item" href="../../assets/php/act_logout.php">Logout</a></li>
                </ul>
            </li>
        </div>
    </nav>

    <?php
    if ($_SESSION['status'] == "Approval") {
    ?>
        <!-- Sidebar Menu -->
        <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none; background-color: #FF6000;" id="mySidebar">
            <button class="w3-bar-item active-sidebar w3-large text-black" style="background-color: #fff;" onclick="w3_close()">Close &times;</button>
            <a href="../../controller/page?page=Dashboard" class="w3-bar-item px-3 py-3 active-sidebar-active text-white" style="text-decoration: none;">Dashboard</a>
            <a href="../../controller/page?page=Approved" class="w3-bar-item px-3 py-3 active-sidebar text-white" style="text-decoration: none;">Approved</a>
        </div>
    <?php
    } else {
    ?>
        <!-- Hak akses menu admin -->
        <!-- Sidebar Menu -->
        <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none; background-color: #FF6000;" id="mySidebar">
            <button class="w3-bar-item active-sidebar w3-large text-black" style="background-color: #fff;" onclick="w3_close()">Close &times;</button>
            <a href="../../controller/page?page=Dashboard" class="w3-bar-item px-3 py-3 active-sidebar text-white" style="text-decoration: none;">Dashboard</a>
            <a href="../../controller/page?page=Booking" class="w3-bar-item px-3 py-3 active-sidebar text-white" style="text-decoration: none;">Booking</a>
            <a href="../../controller/page?page=Transportation" class="w3-bar-item px-3 py-3 active-sidebar text-white" style="text-decoration: none;">Transportation</a>
            <a href="../../controller/page?page=Driver" class="w3-bar-item px-3 py-3 active-sidebar text-white" style="text-decoration: none;">Driver</a>
            <a href="../../controller/page?page=BBM" class="w3-bar-item px-3 py-3 active-sidebar text-white" style="text-decoration: none;">BBM</a>
            <a href="../../controller/page?page=Approval" class="w3-bar-item px-3 py-3 active-sidebar text-white" style="text-decoration: none;">Approval</a>
            <a href="../../controller/page?page=Approval" class="w3-bar-item px-3 py-3 active-sidebar-active text-white" style="text-decoration: none;">Approved</a>
        </div>
    <?php
    }
    ?>

    <!-- Breadcrumb -->
    <div id="main" class="px-3 py-3">
        <button id="openNav" class="w3-button w3-xlarge" onclick="w3_open()"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            </svg></button>
        <div class="w3-container bg-white">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Approved</li>
                </ol>
            </nav>
        </div>

        <!-- Data Grafis -->
        <div class="w3-container">
            <div class="row my-3">
                <div class="col-lg-12 shadow-lg px-5 py-5 rounded-4">
                    <div class="my-4">
                        <span class="title-form">ACC Transportation / Status Pengajuan</span>
                    </div>

                    <div class="row">

                        <?php
                        include("../../assets/php/conn.php");

                        $data = mysqli_query($conn, "SELECT * from tb_pemesanan");
                        foreach ($data as $row) {
                        ?>

                            <div class="col-lg-6">
                                <div class="mb-3 shadow px-3 py-3">
                                    <div class="d-flex justify-content-end">
                                        <!-- <a href="detailApproved?id=<?= $row['idPemesanan']; ?>" class="badge" style="text-decoration: none; background-color:#FF6000;">View detail</a> -->
                                    </div>
                                    <label for="" style="color: #FF6000;"><?= $row['namaPemesanan']; ?></label>
                                    <p for="" style="color: #FF6000; font-weight:800; font-size:30px;"><?= $row['namaKendaraan']; ?></p>
                                    <p>Booking : <?= $row['tglPemesanan']; ?></p>

                                    <?php
                                    if ($row['status_acc'] == 1) {
                                    ?>

                                        <div class="mb-3">
                                            <input name="idPemesanan" type="text" value="<?= $row['idPemesanan']; ?>" hidden>
                                            <button name="status_acc" type="submit" value="2" class="btn-approved3" disabled>Diprosess / Approved Level 1</button>
                                        </div>

                                    <?php

                                    } else if ($row['status_acc'] == 2) {
                                    ?>
                                        <div class="mb-3">
                                            <a href="detailApproved?id=<?= $row['idPemesanan']; ?>"><button class="btn-approved2" disabled>Selesai / Approved Level 2</button></a>
                                        </div>
                                        <div class="mb-3">
                                            <a href="detailApproved?id=<?= $row['idPemesanan']; ?>"><button class="btn-approved">Lihat Detail</button></a>
                                        </div>

                                    <?php
                                    } else {
                                    
                                        echo "Tidak ada Pemesanan!";
                                    }

                                    ?>
                                </div>
                            </div>
                        <?php
                        }

                        ?>

                    </div>

                </div>
            </div>
        </div>


    </div>



    <!-- Sidebar responsive -->
    <script>
        function w3_open() {
            document.getElementById("main").style.marginLeft = "25%";
            document.getElementById("mySidebar").style.width = "25%";
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("openNav").style.display = 'none';
        }

        function w3_close() {
            document.getElementById("main").style.marginLeft = "0%";
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("openNav").style.display = "inline-block";
        }
    </script>

    <!-- Chart grafis  -->
    <script>
        const xValues = [100, 200, 300, 400, 500, 600, 700, 800, 900, 1000];

        new Chart("myChart", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    data: [860, 1140, 1060, 1060, 1070, 1110, 1330, 2210, 7830, 2478],
                    borderColor: "red",
                    fill: false
                }, {
                    data: [1600, 1700, 1700, 1900, 2000, 2700, 4000, 5000, 6000, 7000],
                    borderColor: "green",
                    fill: false
                }, {
                    data: [300, 700, 2000, 5000, 6000, 4000, 2000, 1000, 200, 100],
                    borderColor: "blue",
                    fill: false
                }]
            },
            options: {
                legend: {
                    display: false
                }
            }
        });
    </script>


</body>

</html>