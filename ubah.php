<?php
error_reporting(E_ALL);
include_once "koneksi.php";

if(isset($_POST["submit"])) {
    require("post_data.php");

    $query = "UPDATE data_barang SET ";
    $query .= "nama = '{$nama}', kategori = '{$kategori}', harga_jual = '{$harga_jual}', harga_beli = '{$harga_beli}', stock = '{$stock}' ";

    if(!empty($gambar)) {
        $query .= ", gambar = '($gambar)' ";
    }

    $query .= "WHERE id_barang = '{$id}' ";
    $result = mysqli_query($conn, $query);
    header("location: index.php");
}
$id = $_GET["id"];
$query = "SELECT * FROM data_barang WHERE id_barang = '{$id}' ";
$result = mysqli_query($conn, $query);

if(!$result) die("Error: Data tidak tersedia");

$data = mysqli_fetch_array($result);

function is_select($var, $val) {
    if($var == $val) return 'selected="selected"';
    return false;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Barang</title>
</head>
<body>
    <h1>Ubah Barang</h1>
    <form action="ubah.php" method="post" enctype="multipart/form-data">

        <label for="name">Nama Barang</label>
        <input type="text" name="name" value="<?= $data["nama"]; ?>">

        <br><br>

        <label for="category">Kategori</label>        
        <select name="category" id="category">
            <option value="">--SELECT--</option>
            <option <?= is_select("Komputer", $data["kategori"]); ?>
            value="Komputer">Komputer</option>
            <option <?= is_select("Elektronik", $data["kategori"]); ?>
            value="Elektronik">Elektronik</option>
            <option <?= is_select("Hand Phone", $data["kategori"]); ?>
            value="Hand Phone">Hand Phone</option>
        </select>

        <br><br>

        <label for="price">Harga Jual</label>
        <input type="number" name="price" value="<?= $data["harga_jual"]; ?>">

        <br><br>

        <label for="purchase">Harga Beli</label>
        <input type="number" name="purchase" value="<?= $data["harga_beli"]; ?>">

        <br><br>

        <label for="stock">Stock</label>
        <input type="number" name="stock" value="<?= $data["stock"]; ?>">

        <br><br>

        <label for="file_image">File Gambar</label>
        <input type="file" name="file_image" value="<?= $data["gambar"] ?>">

        <br><br>

        <input type="hidden" name="id" value="<?= $data["id_barang"]; ?>">

        <br><br>

        <input type="submit" name="submit" value="Simpan">
    </form>
</body>
</html>