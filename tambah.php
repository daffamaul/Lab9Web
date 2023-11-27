<?php
error_reporting(E_ALL);
include_once "koneksi.php";

if(isset($_POST["submit"])) {
    require("post_data.php");

    $query = "INSERT INTO data_barang (nama, kategori, harga_jual, harga_beli, stock, gambar) ";
    $query .= "VALUE ('{$nama}', '{$kategori}', '{$harga_jual}', '{$harga_beli}', '{$stock}', '{$gambar}')";

    $result = mysqli_query($conn, $query);
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
</head>
<body>
    <h1>Tambah Barang</h1>
    <form action="tambah.php" method="post" enctype="multipart/form-data">

        <label for="name">Nama Barang</label>
        <input type="text" name="name">

        <br><br>

        <label for="category">Kategori</label>        
        <select name="category" id="category">
            <option value="">--SELECT--</option>
            <option value="Komputer">Komputer</option>
            <option value="Elektronik">Elektronik</option>
            <option value="Hand Phone">Hand Phone</option>
        </select>

        <br><br>

        <label for="price">Harga Jual</label>
        <input type="number" name="price">

        <br><br>

        <label for="purchase">Harga Beli</label>
        <input type="number" name="purchase">

        <br><br>

        <label for="stock">Stock</label>
        <input type="number" name="stock">

        <br><br>

        <label for="file_image">File Gambar</label>
        <input type="file" name="file_image">

        <br><br>
        <input type="submit" name="submit" value="Simpan">
    </form>
</body>
</html>