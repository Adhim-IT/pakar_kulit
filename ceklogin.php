<?php
$db_host 		= 'localhost';
$db_user 		= 'root';
$db_password 	= '';
$db_name 		= 'spforward2';

$con = @mysqli_connect($db_host,$db_user,$db_password) or die('<center><strong>Gagal koneksi ke server database</strong></center>');
mysqli_select_db($con,$db_name) or die('<center><strong>Database tidak ditemukan</strong></center>');
$error = '';
if (isset($_POST['login'])) {
    // Pastikan Anda memiliki koneksi ke database ($con) yang sesuai di sini
    // Lakukan sanitasi input
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    
    // Buat query menggunakan prepared statement untuk mencegah SQL injection
    $query = "SELECT * FROM pengguna WHERE username=? AND password=?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) == 0) {
        $error = 'Username and password are incorrect!';
    }
    if (empty($error)) {
        $r = mysqli_fetch_array($result);
        $_SESSION['LOG_USER'] = $r['id_pengguna'];
        $_SESSION['LOG_LEVEL'] = $r['level'];
        header('location:index.php');
    }
}