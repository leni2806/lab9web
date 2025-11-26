<?php
require_once __DIR__ . '/../../config/database.php';

$nama = mysqli_real_escape_string($conn, $_POST['nama'] ?? '');
$kategori = mysqli_real_escape_string($conn, $_POST['kategori'] ?? '');
$harga_beli = (float)($_POST['harga_beli'] ?? 0);
$harga_jual = (float)($_POST['harga_jual'] ?? 0);
$stok = (int)($_POST['stok'] ?? 0);

$gambar_path = '';
if (!empty($_FILES['file_gambar']['name']) && $_FILES['file_gambar']['error'] === 0) {
    $uploads_dir = __DIR__ . '/../../assets/uploads/';
    if (!is_dir($uploads_dir)) mkdir($uploads_dir, 0755, true);
    $fn = preg_replace('/[^A-Za-z0-9\._-]/', '_', basename($_FILES['file_gambar']['name']));
    $target = $uploads_dir . time() . '_' . $fn;
    if (move_uploaded_file($_FILES['file_gambar']['tmp_name'], $target)) {
        $gambar_path = 'assets/uploads/' . basename($target);
    }
}

$sql = "INSERT INTO data_barang (nama,kategori,harga_beli,harga_jual,stok,gambar)
        VALUES ('$nama','$kategori','$harga_beli','$harga_jual','$stok','" . ($gambar_path ? $gambar_path : '') . "')";
mysqli_query($conn, $sql);

header("Location: ../../index.php?page=user/list");
exit;
?>