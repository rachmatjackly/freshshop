<?php
$sdp = "SELECT `id_konfirmasi`, `tgl`, `nama`, `upload_pembayaran` FROM (konfirmasi INNER JOIN user on konfirmasi.id_user= user.id_user) ";
$result = mysqli_query($conn,$sdp);

?>
<h1 class="page-header">Konfirmasi</h1>
        <br>
      
        <hr>
        <br>
        <table class="table table-striped table-bordered" id="barang"  cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>ID Konfirmasi</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal Konfirmasi</th>
            <th>Gambar</th>
            
        </tr>
        </thead>
         <tbody>
         <?php while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            ?>
            <tr>
            <td><?=$row['id_konfirmasi']?></td>
            <td><?=$row['nama']?></td>
            <td><?=$row['tgl']?></td>
            <td><a href="../<?=$row['upload_pembayaran']?>"><img src="../<?=$row['upload_pembayaran']?>" width="100px" height="100px"></a></td>
           
            </tr>
         <?php } ?>
         </tbody>
         </table>