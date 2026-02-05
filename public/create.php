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

<form method="post">
  <input name="nama" placeholder="Nama Produk" required>
  <textarea name="deskripsi"></textarea>
  <input name="harga" type="number" required>
  <input name="stok" type="number" required>
  <button name="submit">Simpan</button>
</form>
