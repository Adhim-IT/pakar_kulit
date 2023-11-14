<?php
include '../koneksi.php';

if (isset($_POST['submit'])) {
   $nama = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = $_POST['password'];
   $confirmPassword = $_POST['confirm_password'];
   $passwordEncrypted = md5($confirmPassword);
   
   if ($password !== $confirmPassword) {
   $_SESSION['errorMessage'] = 'pass dan confrim pass tidak sesuai';
   }  
   
   $getUserByEmail = "SELECT * FROM user WHERE email = '$email'";
   $resGetUserByEmail = mysqli_query($conn, $getUserByEmail);
   if (mysqli_num_rows($resGetUserByEmail) > 0) {
      $errorMessage = 'Username is already registered!';
   }

   if (empty($errorMessage)) { // If no errors, insert the user data into the database
      $insertUser = "INSERT INTO user (name, email, password) VALUES('$nama','$email','$passwordEncrypted')";
      mysqli_query($conn, $insertUser);
      header('location: login.php');
   }
}