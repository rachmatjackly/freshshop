<?php

$sql = "SELECT `id_barang`, `nama`, `stock`, `harga`, `deskripsi`, `static`,`kategori` FROM (barang inner join kategori on barang.id_kategori = kategori.id_kategori) order by id_barang asc";
$result = mysqli_query($conn,$sql);

?>
 <h1 class="page-header">Barang</h1>
        <br>
        <a class="btn btn-primary" href="?kat=buat_barang" role="button" >Tambah Barang</a>
        <hr>
        <br>
        <table class="table table-striped table-bordered" id="barang"  cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Kategori</th>
            <th>Gambar</th>
            <th>Action</th>
        </tr>
        </thead>
         <tbody>
         <?php while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            ?>
            <tr>
            <td><?=$row['id_barang']?></td>
            <td><?=$row['nama']?></td>
            <td><?php ($row['stock'] == 1 ? print('Tersedia'):print('Tidak Tersedia'))?></td>
            <td><?=$row['harga']?></td>
            <td><?=$row['deskripsi']?></td>
            <td><?=$row['kategori']?></td>
            <td><img src="../images/<?=$row['static']?>" width="100px" height="100px"></td>
            <td>
              <center>
                  <a href="?kat=edit_barang&id_barang=<?=$row['id_barang']?>" class="btn btn-success">Edit</a>
                  <a href="?kat=hapus_barang&id_barang=<?=$row['id_barang']?>" class="btn btn-danger">Delete</a>
              </center>
            </td>
            </tr>
         <?php } ?>
         </tbody>
         </table>