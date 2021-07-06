<?php

$sql = "SELECT `id_gambar`, `kategori`, `gambar_1`, `gambar_2`, `gambar_3`, `gambar_4` FROM `gambar` ";
$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->bind_result($id_gambar,$kategori,$gambar1,$gambar2,$gambar3,$gambar4);

?>