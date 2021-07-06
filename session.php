<?php
//ini gunanaya untuk lihat apakah dia udah login?
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if ($_SESSION['nama'] === null) {
        session_destroy();
        header("Location: /1/index.php?login=yes");
        //ini maksudnya kalau dia belum login, maka dilempar ke halaman utama

    
    }
?>