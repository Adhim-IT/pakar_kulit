<?php
require_once "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- CSS Link -->
    <link rel="stylesheet" href="user.css">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">



    <script src="assets/js/jQuery-2.1.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/datatables/js/jquery.dataTables.min.js"></script>
    <script src="assets/datatables/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/bootstrap-select/bootstrap-select.js"></script>
    <script src="assets/iCheck/icheck.min.js"></script>
    <script src="assets/js/app.min.js"></script>







    <title>wkwkw</title>
</head>

<nav class=" navbar navbar-expand-lg fixed-top" style="background-color: #ffffff;">
    <div class="container">
        <div style="margin-right: 2rem;" class="collarse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <?php include "menu.php"; ?>
                <style>
                .navbar-nav li {
                    margin-right: 3px;
                    font-size: 15px;
                    margin-left: 10px;
                }
                </style>
            </ul>
            <div class="profil" style="margin-left: 10rem;">
                <img src="logo.png" alt="">
            </div>
        </div>
    </div>
</nav>


</html>