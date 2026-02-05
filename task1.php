<?php
// deklarasi variabel
$nama = "";
$harga = "";
$deskripsi = "";
$pesan = "";

// cek tombol submit
if (isset($_POST['submit'])) {

  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $deskripsi = $_POST['deskripsi'];

  // VALIDASI
  if ($nama == "" || $harga == "" || $deskripsi == "") {
    $pesan = "❌ Semua field wajib diisi!";
  } else {
    $pesan = "✅ Produk berhasil disimpan";

    // simulasi simpan ke database
    // (nanti bisa diganti query INSERT)
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Produk</title>
</head>
<body>

<h2>Form Tambah Produk</h2>

<?php
// tampilkan pesan
if ($pesan != "") {
  echo "<p>$pesan</p>";
}
?>

<form method="POST" action="">
  <label>Nama Produk</label><br>
  <input type="text" name="nama" value="<?php echo $nama; ?>"><br><br>

  <label>Harga Produk</label><br>
  <input type="number" name="harga" value="<?php echo $harga; ?>"><br><br>

  <label>Deskripsi</label><br>
  <textarea name="deskripsi"><?php echo $deskripsi; ?></textarea><br><br>

  <button type="submit" name="submit">Simpan</button>
</form>

</body>
</html>
