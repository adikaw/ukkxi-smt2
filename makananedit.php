<?php
require 'koneksi.php';

$id = $_GET["id"];

$editm = query("SELECT * FROM ukk_makanan WHERE id = $id")[0];

if (isset($_POST["edit-makanan"])) {

  if (editmakanan($_POST) > 0) {
    echo "<script>
                        alert ('Data makanan Berhasil Diubah!');
                        document.location.href = 'index.php';
                </script>";
  } else {
    echo "<script>
                    alert ('Data makanan Gagal Diubah!');
                    document.location.href = 'index.php';
                </script>";
  };
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Siswa</title>

  <link rel="stylesheet" type="text/css" href="style/index.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
  <nav class="navbar navbar-expand-sm navbar-light fixed-top" id="neubar">
    <div class="container">
      <a class="navbar-brand" href="#"><img src="../latihan_ukk/img/logo.png" height="45" /><b> SEKOLAH ESEMKA</b></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class=" collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto ">
          <li class="nav-item">
            <a class="nav-link mx-2 active" aria-current="page" href="index.php"><i class="bi bi-house-door-fill"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2" href="siswa.php"> <i class="bi bi-people"></i> About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2" href="guru.php"><i class="bi bi-table"></i> Table</a>
          </li>
          <li class="nav-item">
          <li><a class="nav-link mx-2" href="logout.php"><i class="bi bi-box-arrow-left"></i> Logout</a></li>
          </li>
        </ul>
      </div>
    </div>
  </nav><br><br><br><br><br><br>

  <div class="" id="editsiswa" tabindex="3" aria-hidden="true" data-aos="fade-up">
    <div class="modal-dialog dialog-centered container">
      <div class="modal-content">
      <form action="" method="post">
          <div class="modal-header">
            <h5 class="modal-title">Update menu Makanan</h5>
            <a href="index.php"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
          </div>
          <div class="modal-body">
          <input type="hidden" name="id" class="form-control" id="id" required value="<?php echo $editm["id"]; ?>">
            <div class="mb-3">
              <label for="nama_makanan">Nama makanan<span class="text-danger">*</span></label>
              <input type="text" name="nama_makanan" class="form-control" id="nama_makanan" placeholder="Input nama Makanan " required value="<?php echo $editm["nama_makanan"]; ?>">
            </div>

            <div class="mb-3">
              <label for="harga">Harga<span class="text-danger">*</span></label>
              <input type="number" name="harga" class="form-control" id="harga" placeholder="Input Harga" required value="<?php echo $editm["harga"]; ?>">
            </div>

            <div class="mb-3">
            <label for="stok">Stok<span class="text-danger">*</span></label>
              <input type="number" name="stok" class="form-control" id="stok" placeholder="Input Stok makanan" required value="<?php echo $editm["stok"]; ?>">
            </div>

            <div class="mb-3">
              <label for="kategori">Kategori<span class="text-danger">*</span></label>
              <select class="form-control" name="kategori" required value="<?php echo $editm["kategori"]; ?>">
                <option value="None">Pilih kategori makanan</option>
                <option value="Makanan berat">Makanan berat</option>
                <option value="Makanan ringan">Makanan ringan</option>
                <option value="Minuman">Minuman</option>
              </select>
            </div>
            
            <div class="mb-3">
            <label for="deskripsi">Deskripsi<span class="text-danger">*</span></label>
              <input type="text" name="deskripsi" class="form-control" id="deskripsi" placeholder="Input deskripsi makanan" required value="<?php echo $editm["deskripsi"]; ?>">
            </div>


            <div class="mb-3">
              <label for="kode_makanan">Kode makanan<span class="text-danger">*</span></label>
              <input type="text-area" name="kode_makanan" class="form-control" id="kode_makanan" placeholder="Input Kode makanan" required value="<?php echo $editm["kode_makanan"]; ?>">
            </div>
            
          </div>
          <div class="modal-footer pt-4">
            <button type="submit" name="edit-makanan" class="btn btn-primary mx-auto w-100">Update data makanan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <footer class="text-center text-white" style="background-color: #E8F6EF;">
    <!-- Grid container -->
    <div class="container pt-4">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="bi bi-facebook"></i></a>

        <!-- Twitter -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="bi bi-twitter"></i></a>

        <!-- Instagram -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="bi bi-instagram"></i></i></a>

        <!-- Linkedin -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="bi bi-linkedin"></i></i></a>
        <!-- Github -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="bi bi-github"></i></a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2023 Copyright:
      <a class="text-dark" href="">DanisAdika</a>
    </div>
    <!-- Copyright -->
  </footer>

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