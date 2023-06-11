<?php
$servername =   'localhost';
$username   =   'root';
$password   =   '';
$dbname     =   "uprakxi";
$conn = mysqli_connect($servername, $username, $password, "$dbname");
if ($conn === false) {
  die("ERROR: " . mysqli_connect_error());
}

$makanan = mysqli_query($conn, "SELECT * FROM ukk_makanan");

function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function add_makanan($addmakanan)
{
  global $conn;
  $nama_makanan = $addmakanan["nama_makanan"];
  $harga = $addmakanan["harga"];
  $stok = $addmakanan["stok"];
  $kategori = $addmakanan["kategori"];
  $deskripsi = $addmakanan["deskripsi"];
  $kode_makanan = $addmakanan["kode_makanan"];

  $query = "INSERT INTO ukk_makanan VALUES ('', '$nama_makanan', '$harga', '$stok', '$kategori', '$deskripsi', '$kode_makanan') ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function delete_makanan($del_makanan)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM ukk_makanan WHERE id = $del_makanan");
  return mysqli_affected_rows($conn);
}

function editmakanan($makananedit)
{
  global $conn;
  $id = $makananedit["id"];
  $nama_makanan = $makananedit["nama_makanan"];
  $harga = $makananedit["harga"];
  $stok = $makananedit["stok"];
  $kategori = $makananedit["kategori"];
  $deskripsi = $makananedit["deskripsi"];
  $kode_makanan = $makananedit["kode_makanan"];

  $query = "UPDATE ukk_makanan SET
                nama_makanan = '$nama_makanan',
                harga = '$harga',
                stok = '$stok',
                kategori = '$kategori',
                deskripsi = '$deskripsi',
                kode_makanan = '$kode_makanan'
                WHERE id = $id
        ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}
