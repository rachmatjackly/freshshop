<?php
$sdd = "SELECT `id_transaksi`, `tgl`, `nama_barang`, `jumlah_barang`, `subtotal`, `catatan`,`nama` FROM (transaksi inner join user on transaksi.id_user = user.id_user)";
$result = mysqli_query($conn,$sdd);

?>
<h1 class="page-header">Pembelian</h1>
        <br>
      
        <hr>
        <br>
        <table class="table table-striped table-bordered" id="barang"  cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>ID transaksi</th>
            <th>Nama Pelanggan</th>
            <th>Nama Barang</th>
            <th>Jumlah Barang</th>
            <th>Subtotal</th>
            <th>Catatan</th>
            <th>Tanggal Pembelian</th>
           
        </tr>
        </thead>
         <tbody>
         <?php while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            ?>
            <tr>
            <td><?=$row['id_transaksi']?></td>
            <td><?=$row['nama']?></td>
            <td><?=$row['nama_barang']?></td>
            <td><?=$row['jumlah_barang']?></td>
            <td><?=$row['subtotal']?></td>
            <td><?=$row['catatan']?></td>
            <td><?=$row['tgl']?></td>
            </tr>
         <?php } ?>
         </tbody>
         </table>