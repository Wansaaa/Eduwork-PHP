<?php
session_start();
include "../config/database.php";

// Hapus 1 item cart
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    unset($_SESSION['cart'][$id]);
}

// Kosongkan cart
if (isset($_GET['clear'])) {
    unset($_SESSION['cart']);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Keranjang Belanja</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: #f4f6f9;
    }
    .cart-img {
      width: 80px;
      height: 80px;
      object-fit: cover;
      border-radius: 10px;
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

<div class="container my-5">
  <h2 class="fw-bold mb-4 text-center">🛒 Keranjang Belanja</h2>

<?php if (!empty($_SESSION['cart'])) : ?>
  <div class="table-responsive">
    <table class="table table-bordered align-middle bg-white shadow-sm">
      <thead class="table-primary text-center">
        <tr>
          <th>Produk</th>
          <th>Nama</th>
          <th>Harga</th>
          <th>Qty</th>
          <th>Subtotal</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>

<?php
$total = 0;
foreach ($_SESSION['cart'] as $id => $qty) :
  $p = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id=$id"));
  $subtotal = $p['harga'] * $qty;
  $total += $subtotal;
?>
        <tr>
          <td class="text-center">
            <img src="https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=200&auto=format&fit=crop" class="cart-img">
          </td>
          <td><?= $p['nama_produk']; ?></td>
          <td>Rp <?= number_format($p['harga']); ?></td>
          <td class="text-center"><?= $qty; ?></td>
          <td class="fw-bold">Rp <?= number_format($subtotal); ?></td>
          <td class="text-center">
            <a href="?remove=<?= $id; ?>" 
               class="btn btn-sm btn-danger"
               onclick="return confirm('Hapus produk ini dari cart?')">
               Hapus
            </a>
          </td>
        </tr>
<?php endforeach; ?>

      </tbody>
    </table>
  </div>

  <!-- TOTAL -->
  <div class="d-flex justify-content-between align-items-center mt-4">
    <h4>Total Belanja:
      <span class="text-primary fw-bold">
        Rp <?= number_format($total); ?>
      </span>
    </h4>

    <div>
      <a href="?clear=true" 
         class="btn btn-outline-danger"
         onclick="return confirm('Kosongkan keranjang?')">
         Kosongkan Cart
      </a>
      <button class="btn btn-success ms-2">Checkout</button>
    </div>
  </div>

<?php else : ?>
  <div class="alert alert-warning text-center">
    Keranjang masih kosong 😢
  </div>
<?php endif; ?>

</div>

</body>
</html>
