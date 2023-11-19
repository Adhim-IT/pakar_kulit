<?php
include "ceklogin.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign in</title>
    <link rel="stylesheet" href="style1.css" />
    <style>
    .error-message {
        color: white;
        width: 80%;
        background-color: red;
        /* Sesuaikan dengan kebutuhan margin */
    }
    </style>
</head>

<body>
    <main>
        <div class="box">
            <div class="inner-box">
                <div class="forms-wrap">
                    <form action="" method="POST" autocomplete="off" class="sign-in-form">
                        <div class="logo">
                            <img src="logo.png" alt="Dokterpedia." />
                            <h4>Dokterpedia.</h4>
                        </div>
                        <div class="heading">
                            <h2>Welcome</h2>
                            <h6>Not registered yet?</h6>
                            <a href="formregister.php" class="toggle">Sign up</a>
                        </div>
                        <div class="error-message">
                            <?php
                            if (isset($_SESSION['errorMessage'])) {
                             echo $_SESSION['errorMessage'];
                             unset($_SESSION['errorMessage']); // Hapus pesan kesalahan setelah ditampilkan
                            }
                            ?>
                        </div>
                        <div class="actual-form">
                            <div class="input-wrap">
                                <input type="text" name="username" id="username" minlength="4" class="input-field"
                                    autocomplete="off" required />
                                <label>Username</label>
                            </div>
                            <div class="input-wrap">
                                <input type="password" name="password" id="password" minlength="4" class="input-field"
                                    autocomplete="off" required />
                                <label>Password</label>

                            </div>
                            <input type="submit" name="login" value="Sign In" class="sign-btn" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="carousel">
                <div class="images-wrapper">
                    <img src="login.png" class="image img-1 show" alt="" />
                </div>
            </div>
        </div>
    </main>


    <script src="app.js"></script>

</body>

</html>
