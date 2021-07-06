<?php
if (isset($_GET['id_barang'])) {
    $id_barang = $_GET['id_barang'];
    $sqd = "DELETE FROM `barang` WHERE `barang`.`id_barang` = $id_barang";
    if (mysqli_query($conn,$sqd)) {
        echo '<script>alert("Berhasil dihapus..");window.location="index.php?kat=barang";</script>';
    } else {
        echo '<script>alert("Gagal dihapus..");</script>';
    }
}