<?php
require_once('database.php');
require_once('session.php');
//untuk periksa cart
$cart = true;
$ang = 1;
//die(var_dump($_POST));
if (isset($_POST['quantity_1'])) {


while ($cart == true) {
	if (isset($_POST['quantity_' . $ang] )) {
		$arr[$ang-1]['quantity_' .$ang] =  $_POST['quantity_' . $ang];
		$arr[$ang-1]['harga_' .$ang] =  $_POST['amount_' . $ang];
		$arr[$ang-1]['barang_' .$ang] =  $_POST['w3ls_item_' . $ang];
		
		
			
	} else {
		$cart = false;
		break;
	}
	$ang++;

}
$_SESSION['cartnya'] = $arr;
}
//var_dump($arr);
//untuk simpan checkoutnya
if (isset($_POST['checkout'])) {
	$arr = $_SESSION['cartnya'];
	foreach ($arr as $indx => $barangnya) {
		//masukkin ke database transaksi
		//awalnya lihat harga satuan di tabel barang..
		$id_user = $_SESSION['id_user'];
		$catatan = $_POST['catatan'];
		$jumlah_barang = $barangnya['quantity_'. ($indx+1)];
		$nama_barang = $barangnya['barang_'. ($indx+1)];
		$sqq = "SELECT harga FROM `barang` WHERE nama='$nama_barang'";
		$ret1 = mysqli_query($conn,$sqq);
		$out1= mysqli_fetch_array($ret1,MYSQLI_ASSOC);
		$subtotal = $out1['harga'] * $jumlah_barang;
		//dapat harga barang per satuannya untuk dimasukkan ke subtotal
		$sqp = "INSERT INTO `transaksi`( `id_user`, `nama_barang`, `jumlah_barang`, `subtotal`, `catatan`) VALUES ($id_user,'$nama_barang',$jumlah_barang,$subtotal,'')";
		$ret = mysqli_query($conn,$sqp);

		//setelah itu masukkan ke tabel user untuk mengupdate alamat dan nomor telpon
	}

	$alamat = $_POST['alamat'];
	$alamat .= " No." . $_POST['nomor'];
	$alamat .= " RT " . $_POST['RT'];
	$alamat .= " RW " . $_POST['RW'];
	$alamat .= " " . $_POST['kelurahan'];
	$alamat .= " " . $_POST['kecamatan'];
	$alamat .= " " . $_POST['kota'];
	$alamat .= " " . $_POST['provinsi'];

	$alamat_awal = $_POST['alamat'];
	$nomor =  $_POST['nomor'];
	$RT =  $_POST['RT'];
	$RW =  $_POST['RW'];
	$kelurahan = $_POST['kelurahan'];
	$kecamatan = $_POST['kecamatan'];
	$kota = $_POST['kota'];
	$provinsi = $_POST['provinsi'];

	$telepon =  $_POST['telepon'];
	$sqx = "UPDATE `user` SET `alamat` = '$alamat',`telepon`='$telepon' WHERE `user`.`id_user` = $id_user;";
	$ret2 = mysqli_query($conn,$sqx);
	if ($ret2 == true) {
		$sukses =true;
		//ambil id transaksi untuk 3 digit terakhir
		$pd = "SELECT * FROM `transaksi` order by id_transaksi desc";
		$ret3 = mysqli_query($conn,$pd);
		$out3= mysqli_fetch_array($ret3,MYSQLI_ASSOC);
		$digit_terakhir = $out3['id_transaksi'];

	} else {
		$sukses = false;
	}
	
}


//untuk simpan bukti pembayaran
if (isset($_POST['bukti'])) {
	$id_user = $_SESSION['id_user'];

	$target_dir = "bukti/";
    $target_file = $target_dir . basename($_FILES["bukti_pembayaran"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["bukti_pembayaran"]["tmp_name"]);
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
        if (move_uploaded_file($_FILES["bukti_pembayaran"]["tmp_name"], $target_file)) {
			$rtm = "INSERT INTO `konfirmasi`( `id_user`, `upload_pembayaran`) VALUES ($id_user,'$target_file')";
			mysqli_query($conn,$rtm);
			exit("
			<script>
			alert('Terima kasih telah berbelanja di toko kami! Barang anda akan segera dikirim');
			window.location='index.php';
			</script>			
			");
		}
	}
}

?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Fresh market</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Electronic Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
	function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!-- Custom Theme files -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" /> 
<!-- //Custom Theme files -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery.min.js"></script> 
<!-- //js -->  
<!-- web fonts --> 
<link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- //web fonts --> 
<!-- for bootstrap working -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<!-- start-smooth-scrolling -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- //end-smooth-scrolling --> 
</head> 
<body> 
	<!-- header modal -->
	<div class="modal fade" id="myModal88" tabindex="-1" role="dialog" aria-labelledby="myModal88"
		aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						&times;</button>
					<h4 class="modal-title" id="myModalLabel">Don't Wait, Login now!</h4>
				</div>
				<div class="modal-body modal-body-sub">
					<div class="row">
						<div class="col-md-8 modal_body_left modal_body_left1" style="border-right: 1px dotted #C2C2C2;padding-right:3em;">
							<div class="sap_tabs">	
								<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
									<ul>
										<li class="resp-tab-item" aria-controls="tab_item-0"><span>Sign in</span></li>
										<li class="resp-tab-item" aria-controls="tab_item-1"><span>Sign up</span></li>
									</ul>		
									<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
										<div class="facts">
											<div class="register">
												<form action="#" method="post">			
													<input name="Email" placeholder="Email Address" type="text" required="">						
													<input name="Password" placeholder="Password" type="password" required="">										
													<div class="sign-up">
														<input type="submit" value="Sign in"/>
													</div>
												</form>
											</div>
										</div> 
									</div>	 
									<div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
										<div class="facts">
											<div class="register">
												<form action="#" method="post">			
													<input placeholder="Name" name="Name" type="text" required="">
													<input placeholder="Email Address" name="Email" type="email" required="">	
													<input placeholder="Password" name="Password" type="password" required="">	
													<input placeholder="Confirm Password" name="Password" type="password" required="">
													<div class="sign-up">
														<input type="submit" value="Create Account"/>
													</div>
												</form>
											</div>
										</div>
									</div> 			        					            	      
								</div>	
							</div>
							<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
							<script type="text/javascript">
								$(document).ready(function () {
									$('#horizontalTab').easyResponsiveTabs({
										type: 'default', //Types: default, vertical, accordion           
										width: 'auto', //auto or any width like 600px
										fit: true   // 100% fit in a container
									});
								});
							</script>
							<div id="OR" class="hidden-xs">OR</div>
						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<div class="row text-center sign-with">
								<div class="col-md-12">
									<h3 class="other-nw">Sign in with</h3>
								</div>
								<div class="col-md-12">
									<ul class="social">
										<li class="social_facebook"><a href="#" class="entypo-facebook"></a></li>
										<li class="social_dribbble"><a href="#" class="entypo-dribbble"></a></li>
										<li class="social_twitter"><a href="#" class="entypo-twitter"></a></li>
										<li class="social_behance"><a href="#" class="entypo-behance"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 
	<!-- header modal -->
	<!-- header -->
	<?php require('header.php');?>
	<!-- //header -->
	<!-- navigation -->
	<?php require('navbar.php');?>
	<!-- //navigation -->
	<!-- banner -->
	<div class="banner banner10">
		<div class="container">
			<h2>Checkout</h2>
		</div>
	</div>
	<!-- //banner -->
    <!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Checkout</li>
			</ul>
		</div>
	</div>
	<!-- //breadcrumbs --> 	
	<!-- pameran -->
<div class="typo codes icons main-grid-border">
		<div class="container"> 
			<div class="grid_3 grid_4 w3_agileits_icons_page">
				<div class="icons">
					<h3 class="agileits-title">Checkout</h3>
					
					<div class="section group">
						<div class="box"> 
							<div class="title ">
								<h3 class="page-header icon-subheading">Your Cart</h3>
							</div>
							<div class="box_content">
							<table class="table">
								<thead>
								<tr>
									<th>Nama Barang</th>
									<th>Jumlah Barang</th>
									<th>Total Harga</th>
								</tr>
								</thead>
								<tbody>
								<?php
								$total = 0;
								foreach ($arr as $indx => $out) {
								?>
								<tr>
									<td><?=$out['barang_' . ($indx+1)]?></td>
									<td><?=$out['quantity_' . ($indx+1)]?></td>
									<td><?=$out['harga_' . ($indx+1)]?></td>
								</tr>
								<?php
								$total += $out['harga_' . ($indx+1)];
								}
									?>
							
								
								</tbody>
							</table>
							<h4>Total harga : Rp<?=$total?></h4>
							</div>
							<!-- <div class="box_content"> 
								<div class="fontawesome-icon-list"> 
										<div class="icon-box col-md-3 col-sm-4"><a class="agile-icon" ><i class="fa fa-calendar"></i> <b> 5 - 12 Agustus 2018 </b></br></br>
										<i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Lt. Ground, Botani Square Mall, Bogor.</a></div>
								
										<div class="clearfix"></div>
									</div> -->
									<div class="clearfix"></div>
									<div class="title margin-top">
									
										<h3 class="page-header icon-subheading">Informasi Pemesan</h3>
									</div>
									<div class="box_content">
									<form id="register-form" action="" method="post" role="form" >
										<div class="row">
											<div class="col-md-6">
												<label for="f_name">Nama </label>
												<input type="text" id="f_name" name="f_name" class="form-control" value="<?=$_SESSION['nama']?>" disabled>
											</div>		
										</div>
										<div class="row">
											<div class="col-md-6">
											<div class="form-group">
												<label for="addres">Alamat</label>
												<input type="text" id="addres" name="alamat" class="form-control" placeholder="Nama Jalan" value="<?php (isset($alamat_awal) ? print($alamat_awal) : print(""))?>">
											</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-3">
												<label for="addres"> Nomor </label>
													<input type="text" id="l_name" name="nomor" class="form-control" placeholder="No. Rumah" value="<?php (isset($nomor) ? print($nomor) : print(""))?>">
												</div>
												<div class="col-md-2">
													<label for="addres">RT</label>
													<input type="text" id="addres" name="RT" class="form-control" placeholder="001" value="<?php (isset($RT) ? print($RT) : print(""))?>">
												</div>
												<div class="col-md-2">
													<label for="addres"> RW </label>
													<input type="text" id="l_name" name="RW"class="form-control" placeholder="005" value="<?php (isset($RW) ? print($RW) : print(""))?>">
												</div>
										</div>
										<div class="row">
											<div class="col-md-6">
											<label for="addres">Kelurahan</label>
												<input type="text" id="addres" name="kelurahan" class="form-control" placeholder="" value="<?php (isset($kelurahan) ? print($kelurahan) : print(""))?>">
											</div>
											<div class="col-md-6">
											<label for="addres">Kecamatan</label>
												<input type="text" id="l_name" name="kecamatan" class="form-control" placeholder="" value="<?php (isset($kecamatan) ? print($kecamatan) : print(""))?>">
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
											<label for="addres">Kota/Kabupaten</label>
												<input type="text" id="addres" name="kota" class="form-control" placeholder="" value="<?php (isset($kota) ? print($kota) : print(""))?>">
											</div>
											<div class="col-md-6">
											<label for="addres"> Provinsi </label>
												<input type="text" id="l_name" name="provinsi" class="form-control" placeholder="" value="<?php (isset($provinsi) ? print($provinsi) : print(""))?>">
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">							
												<div class="form-group">
												<label for="email">Email</label>
													<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="contoh@gmail.com" disabled value="<?=$_SESSION['email']?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="dd">Nomor Telepon</label>
													<input type="text" name="telepon" id="dd" tabindex="1" class="form-control" placeholder="Handphone" value="<?php (isset($telepon) ? print($telepon) : print(""))?>">
												</div>
											</div>

											<div class="row">
												<div class="col-md-6">
													<label for="dp">Catatan</label>
													<input type="text" name="catatan" id="dp" tabindex="3" class="form-control" placeholder="Catatan khusus untuk pesanan Anda">
												</div>
											</div>
											
									
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<div class="form-group">
													<hr>
													<input type="submit" name="checkout" class="btn btn-danger" value="Pesan Sekarang">
												</div>
											</div>
										</div>
								</form>
									
									</div>
									<div class="title margin-top">
										<h3 class="page-header icon-subheading">Payment</h3>
									</div>
									<div class="box_content">

									<h3>Kode transaksi anda <code><?php 
									if (isset($digit_terakhir)) {
									print(sprintf('%03d', $digit_terakhir));
									}?></code></h3>
									<p> Silahkan transfer ke no. rekening <strong> BCA 99210210317 a/n Cendy Putra Budiaman. Harap menambahkan 3 digit akhir nomor order di dalam transfer</strong> untuk memudahkan kami dalam pengecekan. Pesanan Anda tidak dapat kami proses sebelum kami dapat mengkonfirmasikan pembayaran Anda. Lalu silahkan upload bukti transfer Anda pada kolom dibawah ini:</p>
									<form id="register-form" action="" method="post" role="form" enctype="multipart/form-data" >
										<div class="form-group">
											<label for="dp">Upload Pembayaran</label>
											<input type="file" name="bukti_pembayaran" class="form-control" >
										</div>
										<div class="form-group">
											<br>
											<input type="submit" name="bukti" class="btn btn-danger" value="Upload bukti pembayaran">
										</div>
									</form>
									</div>
									
				</div>
			</div>	
		</div>
	</div> 
	<!-- footer -->
	<?php require('footer.php');?>
	<!-- //footer -->   
	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
        w3ls.render();

        w3ls.cart.on('w3sb_checkout', function (evt) {
        	var items, len, i;

        	if (this.subtotal() > 0) {
        		items = this.items();

        		for (i = 0, len = items.length; i < len; i++) { 
        		}
        	}
        });
    </script>  
	<!-- //cart-js --> 
</body>
</html>