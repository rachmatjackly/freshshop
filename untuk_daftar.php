<?php
if (isset($_POST['register'])) {
    //berarti dia daftar
    $nama = $_POST['Name'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $confirm_pass = $_POST['Password2'];

    if ($password === $confirm_pass) {
        //database connect
        $sql = "INSERT INTO `user` ( `nama`, `email`, `password`) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss",$nama,$email,$password);
        $stmt->execute();
        
        $pesan_ok = 'pendaftaran berhasil';
    } else {
        $pesan_gagal = 'password anda tidak serupa';
    }
       
}