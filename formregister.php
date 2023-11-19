<?php
$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "spforward2";

$conn = mysqli_connect($serverName, $username, $password, $dbName);

$errorMessage = ""; // Inisialisasi variabel pesan kesalahan

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $nama_lengkap = mysqli_real_escape_string($conn, $_POST['nama_lengkap']);

    // Validasi apakah username sudah ada
    $checkUsernameQuery = "SELECT * FROM pengguna WHERE username = '$username'";
    $resultUsername = mysqli_query($conn, $checkUsernameQuery);

    if (mysqli_num_rows($resultUsername) > 0) {
        $_SESSION['errorMessage'] = 'Username sudah digunakan.';
    } else {
        // Validasi apakah email sudah ada
        $checkEmailQuery = "SELECT * FROM pengguna WHERE email = '$email'";
        $resultEmail = mysqli_query($conn, $checkEmailQuery);

        if (mysqli_num_rows($resultEmail) > 0) {
            $_SESSION['errorMessage'] = 'Email sudah digunakan.';
        } else {
            if (empty($errorMessage)) { // Jika tidak ada kesalahan, masukkan data pengguna ke dalam database
                $passwordEncrypted = mysqli_real_escape_string($conn, $password); // Hindari SQL Injection dengan menggunakan escaping

                // Tetapkan level default ke 'user'
                $insertUser = "INSERT INTO pengguna (username, email, password, nama_lengkap, level) VALUES ('$username','$email','$passwordEncrypted','$nama_lengkap','user')";
                mysqli_query($conn, $insertUser);
                header('location: formlogin.php');
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="stylesheet" href="style1.css" />
    <style>
    .error-message {
        color: white;
        width: 90%;
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
                    <form action="" method="POST" autocomplete="off" class="sign-up-form">
                        <div class="logo">
                            <img src="logo.png" alt="Dokterpedia." />
                            <h4>Dokterpedia.</h4>
                        </div>
                        <div class="heading">
                            <h2>Get Started</h2>
                            <h6>Already have an account?</h6>
                            <a href="formlogin.php" class="toggle">Sign in</a>
                        </div>
                        <div class="error-message">
                            <?php
                           if (isset($_SESSION['errorMessage'])) {
                             echo $_SESSION['errorMessage'];
                             unset($_SESSION['errorMessage']); // Hapus pesan kesalahan setelah ditampilkan
                           }         
                             ?>
                        </div>
                        <br>
                        <div class="input-wrap">
                            <input type="text" name="nama_lengkap" class="input-field" autocomplete="off" required />
                            <label>Full Name</label>
                        </div>
                        <div class="actual-form">
                            <div class="input-wrap">
                                <input type="text" name="username" minlength="4" class="input-field" autocomplete="off"
                                    required />
                                <label>Name</label>
                            </div>
                            <div class="input-wrap">
                                <input type="email" name="email" class="input-field" autocomplete="off" required />
                                <label>Email</label>
                            </div>
                            <div class="input-wrap">
                                <input type="password" name="password" minlength="4" class="input-field"
                                    autocomplete="off" required />
                                <label>Password</label>
                            </div>
                            <input type="submit" name="submit" value="Sign Up" class="sign-btn" />
                        </div>
                    </form>
                </div>
                <div class="carousel">
                    <div class="images-wrapper">
                        <img src="login.png" class="image img-1 show" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- Javascript file -->
    <script>
    // Dapatkan elemen <div> dengan class "error"
    var errorDiv = document.querySelector('.error');

    // Periksa apakah halaman sedang direload
    if (performance.navigation.type === 1) {
        // Jika halaman sedang direload, hilangkan elemen <div>
        errorDiv.remove();
    }
    </script>
    <script src="app.js"></script>
</body>

</html>
