<?php
require 'koneksi.php';


error_reporting(0);

if (isset($_POST['register'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $cpassword = md5($_POST['cpassword']);

  if ($password == $cpassword) {
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    if (!$result->num_rows > 0) {
      $sql = "INSERT INTO users ( username, password)
                    VALUES ('$username' ,'$password')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        echo "<script>alert('Selamat, registrasi berhasil!, silahkan ke login untuk login')</script>";
        $email = "";
        $nama = "";
        $_POST['password'] = "";
        $_POST['cpassword'] = "";
      } else {
        echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
      }
    } else {
      echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
    }
  } else {
    echo "<script>alert('Password Tidak Sesuai')</script>";
  }
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
 
    <link rel="stylesheet" type="text/css" href="style/logreg.css">
 
    <title>Register</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800; margin: 0;">SIGNUP</p>
            <p class="login-text" style="font-size: 1.5rem; font-weight: 800; font-style: italic ; margin: 1; color: #686868;">"RESTO TELKOM"</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password"  required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword"  required>
            </div>
            <div class="input-group">
                <button name="register" type="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Anda sudah punya akun? <a href="login.php">Login </a></p>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init({
        easing: 'ease-out-back',
        duration: 1000
    });
    </script>
</body>
</html>