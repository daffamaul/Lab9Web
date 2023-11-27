<?php

$nama = $_POST["name"];
$kategori = $_POST["category"];
$harga_beli = $_POST["purchase"];
$harga_jual = $_POST["price"];
$stock = $_POST["stock"];
$file_gambar = $_FILES["file_image"];
var_dump($file_gambar);
$gambar = null;

if($file_gambar["error"] == 0) {
    $file_name = str_replace(' ', '_', $file_gambar["name"]);
    $destination = dirname(__FILE__) . "/gambar/" . $file_name;

    if(move_uploaded_file($file_gambar["tmp_name"], $destination)) {
        $gambar = "gambar/" . $file_name;
    }
}