<?php
require 'koneksi.php';
$del_makanan = $_GET["hal"];

if (delete_makanan($del_makanan) > 0) {
  echo "<script>
                    alert ('Data Berhasil Dihapus!');
                    document.location.href = 'index.php';
            </script>";
} else {
  echo "<script>
                alert ('Data Gagal Dihapus!');
                document.location.href = 'index.php';
            </script>";
};
mysqli_close($conn);
