<?php
include "koneksi.php";

// ambil filter kategori (jika ada)
$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : "";

// query produk
if ($kategori != "") {
  $query = "SELECT * FROM products WHERE kategori='$kategori'";
} else {
  $query = "SELECT * FROM products";
}

$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>E-Commerce PHP</title>
  <style>
    .produk {
      border: 1px solid #ccc;
      padding: 15px;
      margin: 10px;
      width: 200px;
      float: left;
    }
  </style>
</head>
<body>

<h2>Daftar Produk</h2>

<!-- FILTER -->
<a href="index.php">Semua</a> |
<a href="index.php?kategori=Elektronik">Elektronik</a> |
<a href="index.php?kategori=Buku">Buku</a>

<hr>

<!-- LOOPING PRODUK -->
<?php while ($data = mysqli_fetch_assoc($result)) { ?>
  <div class="produk">
    <h4><?= $data['nama_produk']; ?></h4>
    <p><?= $data['deksripsi']; ?></p>
    <p>Harga: Rp <?= number_format($data['harga']); ?></p>
    <p>Stok: <?= $data['stok']; ?></p>
    <small>Kategori: <?= $data['kategori']; ?></small>
  </div>
<?php } ?>

</body>
</html>
