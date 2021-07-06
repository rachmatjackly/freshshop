<?php

$sql = "SELECT * FROM `kategori` ";
$result = mysqli_query($conn,$sql);

?>
 <h1 class="page-header">Kategori</h1>
      
        <br>
        <table class="table table-striped table-bordered" id="barang"  cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Kategori</th>

        </tr>
        </thead>
         <tbody>
         <?php while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            ?>
            <tr>
            <td><?=$row['id_kategori']?></td>
            <td><?=$row['kategori']?></td>
            </tr>
         <?php } ?>
         </tbody>
         </table>