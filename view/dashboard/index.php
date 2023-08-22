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
    <title>Dashboard | Dash C-Trans</title>

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

    <!-- PRINT -->
    <script>
        function printPageArea(areaID) {
            var printContent = document.getElementById(areaID).innerHTML;
            var originalContent = document.body.innerHTML;
            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = originalContent;
        }
    </script>



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
    if ($_SESSION['status'] == "Approval1") {
    ?>
        <!-- Hak akses menu admin -->
        <!-- Sidebar Menu -->
        <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none; background-color: #FF6000;" id="mySidebar">
            <button class="w3-bar-item active-sidebar w3-large text-black" style="background-color: #fff;" onclick="w3_close()">Close &times;</button>
            <a href="../../controller/page?page=Dashboard" class="w3-bar-item px-3 py-3 active-sidebar-active text-white" style="text-decoration: none;">Dashboard</a>
            <a href="../../controller/page?page=Approved1" class="w3-bar-item px-3 py-3 active-sidebar text-white" style="text-decoration: none;">Approved</a>
        </div>
    <?php
    } else if ($_SESSION['status'] == "Approval2") {
    ?>
        <!-- Hak akses menu admin -->
        <!-- Sidebar Menu -->
        <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none; background-color: #FF6000;" id="mySidebar">
            <button class="w3-bar-item active-sidebar w3-large text-black" style="background-color: #fff;" onclick="w3_close()">Close &times;</button>
            <a href="../../controller/page?page=Dashboard" class="w3-bar-item px-3 py-3 active-sidebar-active text-white" style="text-decoration: none;">Dashboard</a>
            <a href="../../controller/page?page=Approved2" class="w3-bar-item px-3 py-3 active-sidebar text-white" style="text-decoration: none;">Approved</a>
        </div>
    <?php

    } else {
    ?>
        <!-- Hak akses menu admin -->
        <!-- Sidebar Menu -->
        <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none; background-color: #FF6000;" id="mySidebar">
            <button class="w3-bar-item active-sidebar w3-large text-black" style="background-color: #fff;" onclick="w3_close()">Close &times;</button>
            <a href="../../controller/page?page=Dashboard" class="w3-bar-item px-3 py-3 active-sidebar-active text-white" style="text-decoration: none;">Dashboard</a>
            <a href="../../controller/page?page=Booking" class="w3-bar-item px-3 py-3 active-sidebar text-white" style="text-decoration: none;">Booking</a>
            <a href="../../controller/page?page=Transportation" class="w3-bar-item px-3 py-3 active-sidebar text-white" style="text-decoration: none;">Transportation</a>
            <a href="../../controller/page?page=Driver" class="w3-bar-item px-3 py-3 active-sidebar text-white" style="text-decoration: none;">Driver</a>
            <a href="../../controller/page?page=BBM" class="w3-bar-item px-3 py-3 active-sidebar text-white" style="text-decoration: none;">BBM</a>
            <a href="../../controller/page?page=Approval" class="w3-bar-item px-3 py-3 active-sidebar text-white" style="text-decoration: none;">Approval</a>
            <a href="../../controller/page?page=Approved3" class="w3-bar-item px-3 py-3 active-sidebar text-white" style="text-decoration: none;">Approved</a>
        </div>
    <?php
    }
    ?>



    <?php
    include("../../assets/php/conn.php");
    $no = 1;

    $sql = "SELECT * from tb_kendaraan";

    if ($result = mysqli_query($conn, $sql))

        // Return the number of rows in result set
        $rowcount = mysqli_num_rows($result);

    $data = mysqli_query($conn, "SELECT SUM(jmlBBM) AS total FROM tb_pemesanan");
    $d = mysqli_fetch_array($data);

    $sql = "SELECT * from tb_driver";

    if ($result = mysqli_query($conn, $sql))

        // Return the number of rows in result set
        $rowcount2 = mysqli_num_rows($result);

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
                    <!-- <li class="breadcrumb-item active" aria-current="page">Library</li> -->
                </ol>
            </nav>
        </div>

        <!-- Data Grafis -->
        <div class="w3-container">
            <div class="row my-3">
                <div class="col-lg-8 col-12">
                    <canvas id="myChart" style="width:100%;"></canvas>
                    <div class="d-flex flex-row-reverse">
                        <a href="javascript:void(0);" onclick="printPageArea('printableArea')"><button class="btn-print-ctrans bi bi-printer-fill fs-5"> Print</button></a>
                        <button class="btn-export-ctrans bi bi-file-earmark-spreadsheet-fill fs-5" onclick="exportTableToExcel('tblData', 'members-data')"> Export</button>
                    </div>
                </div>


                <!-- Diagram grafis -->
                <div class="col-lg-4 col-12">
                    <div class="col-12 rounded-4">
                        <div class="row bg-c-trans2 rounded-4 px-4 my-3 py-4 align-items-center">
                            <div class="col-6 text-white">
                                <span class="fs-no"><?= $rowcount; ?></span>
                            </div>
                            <div class="col-6 text-white">
                                <span class="fs-no2">Kendaraan</span>
                            </div>
                        </div>
                        <div class="row bg-c-trans2 rounded-4 px-4 my-3 py-4 align-items-center">
                            <div class="col-6 text-white">
                                <span class="fs-no"><?= $d['total']; ?></span>
                            </div>
                            <div class="col-6 text-white">
                                <span class="fs-no2">Liter</span>
                            </div>
                        </div>
                        <div class="row bg-c-trans2 rounded-4 px-4 my-3 py-4 align-items-center">
                            <div class="col-6 text-white">
                                <span class="fs-no"><?= $rowcount2; ?></span>
                            </div>
                            <div class="col-6 text-white">
                                <span class="fs-no2">Driver</span>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div class="container py-5 px-5">
            <span class="say">Goog Morning!,</span>
            <p class="hi">Hai. <?= $_SESSION['username']; ?>!</p>

            <?php
            include("../../assets/php/conn.php");

            $data = mysqli_query($conn, "SELECT * FROM users WHERE username='$_SESSION[username]'");
            $row = mysqli_fetch_array($data);
            ?>

            <?php
            if ($row['cprofile'] == "") {
            ?>
                <a href=""><button class="btn-complete">Please complete your profile!</button></a>
            <?php
            } else if ($row['cprofile'] == 0) {
            ?>
                <a href=""><button class="btn-complete">Please complete your profile!</button></a>
            <?php
            } else {
            ?>
                <button class="btn-complete-success">Profile Complete!</button>
            <?php
            }

            ?>

            <div id="printableArea" class="my-5">
                <table class="table" id="tblData">
                    <span>Table Drap Data All Th.2023</span>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jumlah</th>
                    </tr>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td>Kendaraan</td>
                        <td><?= $rowcount; ?></td>
                    </tr>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td>Liter</td>
                        <td><?= $d['total']; ?></td>
                    </tr>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td>Driver</td>
                        <td><?= $rowcount2; ?></td>
                    </tr>
                </table>
            </div>


        </div>
    </div>



    <!-- EXPORT EXCEL -->
    <script>
        function exportTableToExcel(tableID, filename = '') {
            var downloadLink;
            var dataType = 'application/vnd.ms-excel';
            var tableSelect = document.getElementById(tableID);
            var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

            // Specify file name
            filename = filename ? filename + '.xls' : 'excel_data.xls';

            // Create download link element
            downloadLink = document.createElement("a");

            document.body.appendChild(downloadLink);

            if (navigator.msSaveOrOpenBlob) {
                var blob = new Blob(['\ufeff', tableHTML], {
                    type: dataType
                });
                navigator.msSaveOrOpenBlob(blob, filename);
            } else {
                // Create a link to the file
                downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

                // Setting the file name
                downloadLink.download = filename;

                //triggering the function
                downloadLink.click();
            }
        }
    </script>


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