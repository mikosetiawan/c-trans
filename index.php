<?php
session_start();

if (isset($_SESSION['status'])) {
    header("Location: view/dashboard/index");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Wellcome to C-Trans</title>

    <!-- Logo -->
    <link rel="shortcut icon" href="assets/img/ic_c-trans.png" type="image/x-icon">

    <!-- Boostrap Framework -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <!-- Font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- CSS Style -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <div class="row d-flex align-items-center">
        <div class="col-lg-6">
            <form action="assets/php/act_login.php" method="post">
                <input name="username" type="text" class="form-input-ctrans" placeholder="Username.">
                <input name="password" type="password" class="form-input-ctrans2" placeholder="Password.">
                <input type="submit" class="form-input-ctrans-btn" value="Login">
                <a href="forgetPass" class="text-white position-absolute forget">Forget Password?</a>
            </form>
            <img src="assets/img/media_login/imgBGLog.png" alt="" class="img-fluid">
        </div>
        <div class="col-lg-6 px-4 py-4">
            <img src="assets/img//media_login/title_log.png" alt="" class="img-fluid">
            <a href=""><img src="assets/img//media_login/explore.png" alt="" class="img-fluid my-5 explore"></a>
        </div>
    </div>


</body>

</html>