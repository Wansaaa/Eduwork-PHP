<?php
include "../config/database.php";

$id = $_GET['id'];
$data = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM products WHERE id=$id")
);

if (isset($_POST['update'])) {
    mysqli_query($conn, "UPDATE products SET
      nama_produk='$_POST[nama]',
      deksripsi='$_POST[deskripsi]',
      harga='$_POST[harga]',
      stok='$_POST[stok]'
      WHERE id=$id
    ");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Produk</title>
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
    <a href="index.php" class="navbar-brand fw-bold">← Kembali</a>
  </div>
</nav>

<!-- FORM EDIT -->
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-6">

      <div class="card shadow form-card">
        <div class="card-header bg-primary text-white text-center fw-bold">
          Edit Data Produk
        </div>

        <div class="card-body">
          <form method="post">

            <div class="mb-3">
              <label class="form-label">Nama Produk</label>
              <input type="text" name="nama" 
                     class="form-control"
                     value="<?= $data['nama_produk']; ?>" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Deskripsi</label>
              <textarea name="deskripsi" 
                        class="form-control"
                        rows="4"><?= $data['deksripsi']; ?></textarea>
            </div>

            <div class="mb-3">
              <label class="form-label">Harga</label>
              <input type="number" name="harga" 
                     class="form-control"
                     value="<?= $data['harga']; ?>" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Stok</label>
              <input type="number" name="stok" 
                     class="form-control"
                     value="<?= $data['stok']; ?>" required>
            </div>

            <div class="d-flex justify-content-between">
              <a href="index.php" class="btn btn-secondary">
                Batal
              </a>
              <button name="update" class="btn btn-success">
                Update Produk
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
