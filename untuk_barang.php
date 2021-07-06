<?php
$sql = "SELECT barang.`id_barang`, barang.`nama`, barang.`stock`, barang.`harga`, barang.`deskripsi`,kategori.kategori,gambar.gambar_1,gambar.gambar_2,gambar.gambar_3,gambar.gambar_4,barang.static FROM (( `barang` INNER JOIN kategori ON barang.id_kategori = kategori.id_kategori) INNER JOIN gambar ON barang.id_gambar = gambar.id_gambar) where kategori.kategori = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s",$_GET['barang']);
$stmt->execute();
$stmt->bind_result($id_barang,$nama,$stock,$harga,$deskripsi,$kategori,$gambar1,$gambar2,$gambar3,$gambar4,$static);

while($stmt->fetch()) {
    $tampilan_barang [] = array("id_barang" => $id_barang,"nama"=>$nama,"stock"=>$stock,"harga"=>$harga,"deskripsi"=>$deskripsi,"gambar1"=>$gambar1,"gambar2"=>$gambar2,"gambar3"=>$gambar3,"gambar4"=>$gambar4,"kategori"=>$kategori,"static"=>$static);
}

?>