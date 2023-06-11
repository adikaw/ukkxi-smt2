<?php
session_start();

if (isset($_COOKIE['login'])) {
  if ($_COOKIE['login'] == 'true') {
    $_COOKIE['login'] = true;
  }
}

if (isset($_SESSION["login"])) {
  header("location: index.php");
  exit;
}

include 'koneksi.php';

if (isset($_POST["login"])) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

  if (mysqli_num_rows($result) === 1) {

    $row = mysqli_fetch_assoc($result); {

      $_SESSION["login"] = true;

      if (isset($_POST['remember'])) {
        setcookie('login', 'true', time() + 86400);
      }

      header("location: index.php");
      exit;
    }
  }

  $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />

    <link rel="stylesheet" type="text/css" href="style/logreg.css">

</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800; margin:0;">LOGIN</p>
            <p class="login-text" style="font-size: 1.5rem; font-weight: 800; font-style: italic ; margin: 1; color: #686868;">"RESTO TELKOM"</p>
            <div class="input-group">
                <input type="username" placeholder="Username" name="username" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="input-group">
                <button name="login" type="submit" class="btn">Login</button>
            </div>
            <p class="login-register-text">Anda belum punya akun? <a href="register.php">Register</a></p>
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