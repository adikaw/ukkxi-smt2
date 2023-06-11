<?php
require 'koneksi.php';
session_start();

if (!isset($_SESSION["login"])) {
  header("location: login.php");
  exit;
}

if (isset($_POST["add-makanan"])) {

  if (add_makanan($_POST) > 0) {
    echo "<script>
                        alert ('Data makanan Berhasil Ditambahkan!');
                        document.location.href = 'index.php';
                </script>";
  } else {
    echo "<script>
                    alert ('Data makanan Gagal Ditambahkan!');
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
  <title>Resto Telkom</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <link rel="stylesheet" type="text/css" href="style/index.css">

</head>

<body>
  <nav class="navbar navbar-expand-sm navbar-light fixed-top" id="neubar">
    <div class="container">
      <a class="navbar-brand fw-bolder" href="#"><img src="../uprak/img/ts.png" height="40" /><b> RESTO TELKOM</b></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class=" collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto ">
          <li class="nav-item">
            <a class="nav-link mx-2 active" aria-current="page" href="index.php"><i class="bi bi-house-door-fill"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2" href=""> <i class="bi bi-people"></i> About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2" href="#menu"><i class="bi bi-table"></i> Table</a>
          </li>
          <li class="nav-item">
          <li><a class="nav-link mx-2" href="logout.php"><i class="bi bi-box-arrow-left"></i> Logout</a></li>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Welcome To</h1>
          <h2 data-aos="fade-up" data-aos-delay="400"><b>Resto Telkom</b>, Lihat Menu<br>
          </h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="#menu" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Lihat menu</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="../uprak/img/makanan.jpg" class="img-fluid rounded-circle" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->



  <div class="container-lg" data-aos="fade-down" id="menu" <div class="table-responsive">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-8">
            <h2>Daftar makanan <b>RESTO TELKOM</b></h2>
          </div>
          <div class="col-sm-4">
            <button type="button" class="btn btn-info add-new" data-bs-toggle="modal" data-bs-target="#addmakanan"><i class="bi bi-plus-circle-fill"></i> Add Menu</button>
          </div>
        </div>
      </div>
      <table class="table table-bordered">
        <thead>
          <tr class="text-center">
            <th>Nama Makanan</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Kategori</th>
            <th>Deskripsi</th>
            <th>Kode Makanan</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_array($makanan)) : ?>
            <tr class="text-center">
              <td><?php echo $row["nama_makanan"]; ?></td>
              <td><?php echo $row["harga"]; ?></td>
              <td><?php echo $row["stok"]; ?></td>
              <td><?php echo $row["kategori"]; ?></td>
              <td><?php echo $row["deskripsi"]; ?></td>
              <td><?php echo $row["kode_makanan"]; ?></td>
              <td>
                <a class="add" title="Add" data-toggle="tooltip"><i class="bi bi-plus-circle-fill"></i></a>
                <a class="edit" title="Edit" name="edit" data-bs-toggle="modal" href="../uprak/makananedit.php?id=<?= $row["id"]; ?>"><i class="bi bi-pencil-square"></i></a>
                <a class="delete" title="Delete" name="delete" data-toggle="tooltip" href="makanandel.php?hal=<?= $row["id"]; ?>" onclick="return confirm('Yakin Menghapus data siswa tersebut?');"><i class="bi bi-trash3"></i></a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
  </div>

  <div class="modal fade" id="addmakanan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form action="index.php" method="post">
          <div class="modal-header">
            <h5 class="modal-title">Tambah menu Makanan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="nama_makanan">Nama makanan<span class="text-danger">*</span></label>
              <input type="text" name="nama_makanan" class="form-control" id="nama_makanan" placeholder="Input nama Makanan " required>
            </div>

            <div class="mb-3">
              <label for="harga">Harga<span class="text-danger">*</span></label>
              <input type="number" name="harga" class="form-control" id="harga" placeholder="Input Harga" required>
            </div>

            <div class="mb-3">
              <label for="stok">Stok<span class="text-danger">*</span></label>
              <input type="number" name="stok" class="form-control" id="stok" placeholder="Input Stok makanan" required>
            </div>

            <div class="mb-3">
              <label for="kategori">Kategori<span class="text-danger">*</span></label>
              <select class="form-control" name="kategori" required>
                <option value="None">Pilih kategori makanan</option>
                <option value="Makanan berat">Makanan berat</option>
                <option value="Makanan ringan">Makanan ringan</option>
                <option value="Minuman">Minuman</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="deskripsi">Deskripsi<span class="text-danger">*</span></label>
              <textarea type="text" name="deskripsi" class="form-control" id="deskripsi" placeholder="Input deskripsi makanan" required></textarea>
            </div>


            <div class="mb-3">
              <label for="kode_makanan">Kode makanan<span class="text-danger">*</span></label>
              <input type="text-area" name="kode_makanan" class="form-control" id="kode_makanan" placeholder="Input Kode makanan" required>
            </div>

          </div>
          <div class="modal-footer pt-4">
            <button type="submit" name="add-makanan" class="btn btn-primary mx-auto w-100">Tambah data makanan</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <footer class="text-center text-white mt-3" style="background-color: #E8F6EF;">
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
      <a class="text-dark" href="">Resto Telkom</a>
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