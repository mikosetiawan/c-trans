<?php

$page = $_GET['page'];

switch ($page) {
    case "Dashboard":
        header("Location:../view/dashboard/index");
        break;
    case "Booking":
        header("Location:../view/dashboard/booking");
        break;
    case "Transportation":
        header("Location:../view/dashboard/transportation");
        break;
    case "Driver":
        header("Location:../view/dashboard/driver");
        break;
    case "BBM":
        header("Location:../view/dashboard/bbm");
        break;
    case "Approval":
        header("Location:../view/dashboard/approval");
        break;
    case "Approved1":
        header("Location:../view/dashboard/approved1");
        break;
    case "Approved2":
        header("Location:../view/dashboard/approved2");
        break;
    case "Approved3":
        header("Location:../view/dashboard/approved3");
        break;
    default:
        header("Location:../view/dashboard/dashboard");
}
