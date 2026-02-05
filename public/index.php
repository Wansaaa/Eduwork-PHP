<?php
session_start();
include "../config/database.php";

$result = mysqli_query($conn, "SELECT * FROM products");

if (isset($_POST['add_cart'])) {
    $id = $_POST['id'];
    $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>E-Commerce</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: #f4f6f9;
    }
    .product-card img {
      height: 200px;
      object-fit: cover;
    }
    .product-card:hover {
      transform: translateY(-5px);
      transition: 0.3s;
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
  </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">MyStore</a>
    <div class="ms-auto">
      <a href="cart.php" class="btn btn-light">
        🛒 Cart (<?= isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0 ?>)
      </a>
      <a href="add.php" class="btn btn-warning ms-2">+ Produk</a>
    </div>
  </div>
</nav>

<!-- CONTENT -->
<div class="container my-5">
  <h2 class="text-center fw-bold mb-4">Daftar Produk</h2>

  <div class="row g-4">
    <?php while ($p = mysqli_fetch_assoc($result)) : ?>
      <div class="col-lg-4 col-md-6">
        <div class="card product-card h-100 border-0">
          <img 
            src="https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=600&auto=format&fit=crop" 
            class="card-img-top"
            alt="Produk">

          <div class="card-body text-center">
            <h5 class="card-title fw-bold"><?= $p['nama_produk']; ?></h5>
            <p class="text-muted small"><?= $p['deksripsi']; ?></p>
            <h6 class="text-primary fw-bold mb-3">
              Rp <?= number_format($p['harga']); ?>
            </h6>

            <form method="post">
              <input type="hidden" name="id" value="<?= $p['id']; ?>">
              <button name="add_cart" class="btn btn-success w-100 mb-2">
                Tambah ke Keranjang
              </button>
            </form>

            <div class="d-flex justify-content-between">
              <a href="edit.php?id=<?= $p['id']; ?>" class="btn btn-sm btn-outline-primary">
                Edit
              </a>
              <a href="delete.php?id=<?= $p['id']; ?>" 
                 class="btn btn-sm btn-outline-danger"
                 onclick="return confirm('Yakin hapus produk ini?')">
                Hapus
              </a>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>

<!-- FOOTER -->
<footer class="bg-dark text-white text-center py-3 mt-5">
  <small>© <?= date('Y'); ?> MyStore | E-Commerce PHP</small>
</footer>

</body>
</html>
