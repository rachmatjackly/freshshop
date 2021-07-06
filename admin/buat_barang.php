<?php
if (isset($_POST['tambah_barang'])) {
    //upload image dulu, abis itu tambahin linknya di internet

    $target_dir = "../images/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $namaa = basename($_FILES["gambar"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            //kalau gambar udah diupload maka masukkan ke dalam database
            $nama = $_POST['nama'];
            $stock = $_POST['stock'];
            $harga = $_POST['harga'];
            $deskripsi = $_POST['deskripsi'];
            $static = $namaa;
            $id_gambar=$_POST['id_kategori'];
            $id_kategori = $_POST['id_kategori'];

            $sqd = "INSERT INTO `barang`( `nama`, `stock`, `harga`, `deskripsi`, `static`, `id_gambar`, `id_kategori`) VALUES ('$nama',$stock,$harga,'$deskripsi','$static',$id_gambar,$id_kategori)";
            //var_dump($sqd);
            if (mysqli_query($conn,$sqd)){
                $pesan = "Data berhasil disimpan";
            } else {
                $pesan = "Data tidak berhasil disimpan di database";
            }
        } else {
            $pesan = "Data tidak berhasil disimpan";
        }
    }   
}

?>  

     <h1 class="page-header">Tambah Barang</h1>
     <?php if (isset($pesan)) {
         ?>
     
    <div class="alert alert-success">
        <strong> Pemberitahuan !</strong> <?=$pesan?>
    </div>
    <?php
    }
    ?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nama" class="col-sm-2 col-xs-3 control-label">Nama Barang</label>
        <div class="col-xs-8 col-md-4">
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Barang" required>
        </div>
    </div>
    <div class="form-group">
        <label for="stok" class="col-sm-2 col-xs-3 control-label">Stock</label>
        <div class="col-xs-8 col-md-4">
           <select name="stock" class="form-control">
                <option value="1">Tersedia</option>
                <option value="0">Tidak Tersedia</option>
           </select>
        </div>
    </div>
    <div class="form-group">
        <label for="harga" class="col-sm-2 col-xs-3 control-label">Harga</label>
        <div class="col-xs-8 col-md-4">
            <input type="number" name="harga" class="form-control" id="harga" min="0" required>
        </div>
    </div>
    <div class="form-group">
        <label for="deskripsi" class="col-sm-2 col-xs-3 control-label">Deskripsi</label>
        <div class="col-xs-8 col-md-4">
            <textarea class="form-control" rows="3" id="deskripsi" name="deskripsi" required></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="gambar" class="col-sm-2 col-xs-3 control-label">Gambar</label>
        <div class="col-xs-8 col-md-4">
            <input type="file" id="gambar" name="gambar">
        </div>
    </div>
    <div class="form-group">
        <label for="kategori" class="col-sm-2 col-xs-3 control-label">Kategori</label>
        <div class="col-xs-8 col-md-4">
    
          <select class="form-control" name="id_kategori">
          <?php
                $sqd = "SELECT * FROM `kategori` ";
                $ret = mysqli_query($conn,$sqd);
                while ($hasil = $ret->fetch_array()) {

                
          ?>
                          <option value="<?=$hasil['id_kategori']?>"><?=$hasil['kategori']?></option>
        <?php
                }
        ?>
                        </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary" name="tambah_barang">Tambah</button>
        </div>
    </div>
</form>