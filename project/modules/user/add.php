<?php
?>
<section>
    <h2>Tambah Barang</h2>

    <form class="card-form" method="post" action="modules/user/save_add.php" enctype="multipart/form-data">
        <label>Nama Barang</label>
        <input type="text" name="nama" required placeholder="Contoh: Mouse Logitech">

        <label>Kategori</label>
        <select name="kategori" required>
            <option value="">-- Pilih Kategori --</option>
            <option value="Komputer">Komputer</option>
            <option value="Elektronik">Elektronik</option>
            <option value="Hand Phone">Hand Phone</option>
        </select>

        <label>Harga Beli</label>
        <input type="number" name="harga_beli" required step="0.01">

        <label>Harga Jual</label>
        <input type="number" name="harga_jual" required step="0.01">

        <label>Stok</label>
        <input type="number" name="stok" required>

        <label>File Gambar</label>
        <input type="file" name="file_gambar" accept="image/*">

        <button class="btn" type="submit">Simpan</button>
    </form>
</section>
