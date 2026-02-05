<?php
include "../config/database.php";

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    if ($nama && $harga && $stok) {
        mysqli_query($conn, "INSERT INTO products 
        VALUES (NULL,'$nama','$deskripsi','$harga','$stok')");
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Produk</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: #f4f6f9;
    }
    .form-card {
      border-radius: 15px;
    }
  </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-primary shadow">
  <div class="container">
    <a href="index.php" class="navbar-brand fw-bold">← Kembali ke Produk</a>
  </div>
</nav>

<!-- FORM TAMBAH -->
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8">

      <div class="card shadow form-card">
        <div class="card-header bg-primary text-white text-center fw-bold">
          Tambah Produk Baru
        </div>

        <div class="card-body">
          <form method="post">

            <div class="mb-3">
              <label class="form-label">Nama Produk</label>
              <input type="text" name="nama" class="form-control"
                     placeholder="Contoh: Laptop ASUS" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Deskripsi Produk</label>
              <textarea name="deskripsi" class="form-control"
                        rows="4" placeholder="Deskripsi produk"></textarea>
            </div>

            <div class="mb-3">
              <label class="form-label">Harga (Rp)</label>
              <input type="number" name="harga" class="form-control"
                     placeholder="5000000" required>
            </div>

            <div class="mb-4">
              <label class="form-label">Stok</label>
              <input type="number" name="stok" class="form-control"
                     placeholder="10" required>
            </div>

            <div class="d-flex justify-content-between">
              <a href="index.php" class="btn btn-secondary">
                Batal
              </a>
              <button name="submit" class="btn btn-success">
                Simpan Produk
              </button>
            </div>

          </form>
        </div>
      </div>

    </div>
  </div>
</div>

</body>
</html>
