<?php
include 'navbar.php';
require_once "koneksi.php";
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- CSS Link -->
    <link rel="stylesheet" href="user.css">

    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


    <!-- JS Link -->
    <script src="/asset/js/main.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Fonts Link For Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <style>
    .navbar-nav li {
        margin-right: 3px;
        font-size: 15px;
        margin-left: 10px;
        margin-top: 3rem;

    }
    </style>
</head>

<section style="margin-top: 10px;" id="home" class="home">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-md-6 home-tagline">
                <div class="home-text">
                    <h2 style="color: #3570FF;">Dokterpedia.</h2>
                    <h1>Cek kesehatan kulit <br> anda dengan mudah <br>di Dokterpedia</h1>
                    <p class="animate-text">
                        <span>fakta</span>
                        <span>Akurat</span>
                        <span>gratis</span>
                    </p>
                </div>

            </div>
            <div class="col-md-6 text-center mt-4 mt-md-0" style="border-radius: 30px;">
                <img src="home.png" alt="Image" class="img-fluid custom-image">
            </div>
        </div>
    </div>
</section>
<script>
var copy = document.querySelector(".logos-slide-mdprt").cloneNode(true);
document.querySelector(".logos-media-partner").appendChild(copy);
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script>
$(document).ready(function() {
    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 100) {
            $('.navbar').css('backdrop-filter', 'blur(10px)');
        } else {
            $('.navbar').css('backdrop-filter', 'blur(0)');
        }
    });
});
</script>

<script>
var copy = document.querySelector(".logos-slide").cloneNode(true);
document.querySelector(".logos").appendChild(copy);
</script>


<script>
// Animated text
const txts = document.querySelector(".animate-text").children,
    txtsLen = txts.length;
let index = 0;
const textInTimer = 3000,
    textOutTimer = 2800;

function animateText() {
    for (let i = 0; i < txtsLen; i++) {
        txts[i].classList.remove("text-in", "text-out");
    }
    txts[index].classList.add("text-in");

    setTimeout(function() {
        txts[index].classList.add("text-out");
    }, textOutTimer)

    setTimeout(function() {

        if (index == txtsLen - 1) {
            index = 0;
        } else {
            index++;
        }
        animateText();
    }, textInTimer);
}

window.onload = animateText;
</script>
