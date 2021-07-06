<?php
if (isset($_POST['signin'])) {
    //berarti dia login biasa
    $sql = "SELECT id_user,nama,email FROM `user` WHERE email=? and password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss",$_POST['Email'],$_POST['Password']);
    $stmt->execute();
    $stmt->bind_result($id_user,$nama,$email);
    while($stmt->fetch()) {
        $_SESSION['id_user'] = $id_user;
        $_SESSION['nama'] = $nama;
        $_SESSION['email'] = $email;
    
    }
    if (!isset($_SESSION['nama'])) {
        $pesan_gagal = "Silahkan periksa kembali email dan password anda";
    }

}

?>