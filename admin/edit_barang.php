<?php
    if (isset($_POST['update_barang'])) {
        $id_barang = $_GET['id_barang'];
        $tersedia = $_POST['stock'];
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];

        $sqd = "UPDATE `barang` SET `deskripsi` = '$deskripsi',`harga` = $harga, `stock` = $tersedia WHERE `barang`.`id_barang` = $id_barang;";
       // var_dump($sqd);
        if (mysqli_query($conn,$sqd)) {
            $pesan = "Berhasil di-update";
        } else {
            $pesan = "Tidak berhasil di-update";
        }
    }

    if (isset($_GET['id_barang'])) {
        $id_barang = $_GET['id_barang'];
        $sqd = "SELECT * FROM `barang` WHERE id_barang=$id_barang";

        $ret = mysqli_query($conn,$sqd);
        if ($ret == true) {
            while ($out = $ret->fetch_array()) {
                $tersedia = $out['stock'];
                $harga = $out['harga'];
                $deskripsi = $out['deskripsi'];
                $barang = $out['nama'];
            }
        }
    } else {
        exit("tidak ada id barang");
    }

    
?>
     <h1 class="page-header">Edit barang</h1>
     <?php if (isset($pesan)) {
         ?>
     
    <div class="alert alert-success">
        <strong> Pemberitahuan !</strong> <?=$pesan?>
    </div>
    <?php
    }
    ?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <h3>Barang : <?=$barang?></h3>
    <div class="form-group">
        <label for="stok" class="col-sm-2 col-xs-3 control-label">Stock</label>
        <div class="col-xs-8 col-md-4">
           <select name="stock" class="form-control">
                <option value="1" <?php (($tersedia == 1) ? print('checked') : null) ?>>Tersedia</option>
                <option value="0" <?php (($tersedia == 0) ? print('checked') : null) ?>>Tidak Tersedia</option>
           </select>
        </div>
    </div>
    <div class="form-group">
        <label for="harga" class="col-sm-2 col-xs-3 control-label">Harga</label>
        <div class="col-xs-8 col-md-4">
            <input type="number" name="harga" class="form-control" id="harga" min="0" required value="<?=$harga?>">
        </div>
    </div>
    <div class="form-group">
        <label for="deskripsi" class="col-sm-2 col-xs-3 control-label">Deskripsi</label>
        <div class="col-xs-8 col-md-4">
            <textarea class="form-control" rows="3" id="deskripsi" name="deskripsi" required><?=$deskripsi?></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary" name="update_barang">Update data</button>
        </div>
    </div>
</form>