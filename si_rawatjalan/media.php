<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
include"config/koneksi.php";
if($_SESSION[leveluser]=='admin' or $_SESSION[leveluser]=='dokter'){
?>


<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>

	<title>Sistem Informasi Manajemen Rawat Jalan Pasien Berbasis Web Pada Balai Pengobatan Nirmala Cirebon</title>

	<meta charset="utf-8" />
	<meta name="description" content="" />
	<meta name="author" content="" />		
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
	<link rel="stylesheet" href="stylesheets/all.css" type="text/css" />
	
	<!--[if gte IE 9]>
	<link rel="stylesheet" href="stylesheets/ie9.css" type="text/css" />
	<![endif]-->
	
	<!--[if gte IE 8]>
	<link rel="stylesheet" href="stylesheets/ie8.css" type="text/css" />
	<![endif]-->
	
</head>

<body>

<div id="wrapper">
	
	<div id="header">
		<h1><a href="dashboard.html">Canvas Admin</a></h1>		
		
		<a href="javascript:;" id="reveal-nav">
			<span class="reveal-bar"></span>
			<span class="reveal-bar"></span>
			<span class="reveal-bar"></span>
		</a>
	</div> <!-- #header -->
	
	<div id="search">
		<form>
			<input type="text" name="search" placeholder="Search..." id="searchField" />
		</form>		
	</div> <!-- #search -->
	<?php
	if ($_SESSION[leveluser]=='admin'){
	?>
	<div id="sidebar">		
		
		<ul id="mainNav">			
			<li id="navDashboard" class="nav active">
				<span class="icon-home"></span>
				<a href="./media.php?module=home">Beranda</a>				
			</li>
						
			<li id="navPages" class="nav">
				<span class="icon-document-alt-stroke"></span>
				<a href="javascript:;">Data Master</a>				
				
				<ul class="subNav">
					<li><a href="./media.php?module=obat">Master Obat</a></li>
					<li><a href="./media.php?module=dokter">Master Dokter</a></li>
					<li><a href="./media.php?module=pasien">Master Pasien</a></li>
				</ul>						
				
			</li>	
			
			
			<li id="navPages" class="nav">
				<span class="icon-document-alt-stroke"></span>
				<a href="javascript:;">Transaksi</a>				
				
				<ul class="subNav">
					<li><a href="./media.php?module=pendaftaran">Input Pendaftaran</a></li>
					<li><a href="./media.php?module=pembayaran">Input Pembayaran</a></li>
				</ul>						
				
			</li>	
			
			
			<li id="navPages" class="nav">
				<span class="icon-document-alt-stroke"></span>
				<a href="javascript:;">Kartu Berobat</a>				
				
				<ul class="subNav">
					<li><a href="./media.php?module=kartu">Kartu Berobat</a></li>
				</ul>						
				
			</li>	
			
			<li id="navForms" class="nav">
				<span class="icon-article"></span>
				<a href="javascript:;">Laporan</a>
				
				<ul class="subNav">
					<li><a href="./media.php?module=laporanobat">Data Obat</a></li>		
					<li><a href="./media.php?module=laporandokter">Data Dokter</a></li>
					<li><a href="./media.php?module=laporanpasien">Data Pasien</a></li>
					<li><a href="./media.php?module=laporanpendaftaran">Data Pendaftaran</a></li>		
					<li><a href="./media.php?module=laporanpembayaran">Data Pembayaran</a></li>	
					<li><a href="./media.php?module=rekam">Rekam Medis</a></li>
				</ul>	
								
			</li>

			<li id="navGrid" class="nav">
				<span class="icon-layers"></span>
				<a href="logout.php" onclick="return confirm('Apakah Anda yakin?')">LogOut</a>	
			</li>
			
			
		</ul>
				
	</div> <!-- #sidebar -->
	
	
	
	<?php
	}elseif ($_SESSION[leveluser]=='dokter'){
	?>
	<div id="sidebar">		
		
		<ul id="mainNav">			
			<li id="navDashboard" class="nav active">
				<span class="icon-home"></span>
				<a href="./media.php?module=home">Beranda</a>				
			</li>
			
			
			<li id="navPages" class="nav">
				<span class="icon-document-alt-stroke"></span>
				<a href="javascript:;">Transaksi</a>				
				
				<ul class="subNav">
					<li><a href="./media.php?module=pemeriksaan">Input Pemeriksaan</a></li>
				</ul>						
				
			</li>	
			
			
			<li id="navPages" class="nav">
				<span class="icon-document-alt-stroke"></span>
				<a href="javascript:;">Laporan</a>				
				
				<ul class="subNav">
					<li><a href="./media.php?module=rekam">Rekam Medis</a></li>
				</ul>						
				
			</li>	
			

			<li id="navGrid" class="nav">
				<span class="icon-layers"></span>
				<a href="logout.php" onclick="return confirm('Apakah Anda yakin?')">LogOut</a>	
			</li>
			
			
		</ul>
				
	</div> <!-- #sidebar -->
	
	
	<?php
	}
	?>
	
	<div id="content">		
		
		<div id="contentHeader">
			<h1>Sistem Informasi Manajemen Rawat Jalan Pasien Berbasis Web Pada Balai Pengobatan Nirmala Cirebon</h1>
		</div> <!-- #contentHeader -->	
		
		<div class="container">
			<div class="grid-24">
					
					<div class="widget-content">
				
						<?php include"content.php"; ?>
                        
					</div> <!-- .widget-content -->
					
			</div> <!-- .grid -->			
		</div> <!-- .container -->
		
	</div> <!-- #content -->
	
	<div id="topNav">
		 <ul>
		 	<li>
		 		<a href="#menuProfile" class="menu"><?php echo"$_SESSION[namalengkap]"; ?></a>
		 		
		 		<div id="menuProfile" class="menu-container menu-dropdown">
					<div class="menu-content">
						<ul class="">
							<li><a href="javascript:;">Edit Profile</a></li>
							<li><a href="javascript:;">Edit Settings</a></li>
							<li><a href="javascript:;">Suspend Account</a></li>
						</ul>
					</div>
				</div>
	 		</li>
		 	<li><a href="logout.php">Logout</a></li>
		 </ul>
	</div> <!-- #topNav -->
	
		
</div> <!-- #wrapper -->

<div id="footer">
	Copyright &copy; 2020, Agus & Hasan
</div>

<script src="javascripts/all.js"></script>

</body>
</html>
<script>
$(function () { 
	$( "#datepicker" ).datepicker();
	$( "#datepicker_inline" ).datepicker();
	$('#colorpickerHolder').ColorPicker({flat: true});
	$('#timepicker').timepicker ({ 
		showPeriod: true 
		, showNowButton: true
		, showCloseButton: true
	});
	
	$('#timepicker_inline_div').timepicker({
	   defaultTime: '9:20'
	});		
		
	$('#colorSelector').ColorPicker({
		color: '#FF9900',
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onSubmit: function (hsb, hex, rgb, el) {
			$(el).ColorPickerHide ();	
		},
		onChange: function (hsb, hex, rgb) {
			$('#colorSelector div').css({ 'background-color': '#' + hex });
			$('#colorpickerField1').val ('#' + hex);
		}
	});
	
	$('#colorpickerField1').live ('keyup', function (e) {
		var val = $(this).val ();
		val = val.replace ('#', '');
		$('#colorSelector div').css({ 'background-color': '#' + val });
		$('#colorSelector').ColorPickerSetColor(val);
	});

});

</script>





<script>
$(function () { 
	$( "#datepicker2" ).datepicker();
	$( "#datepicker_inline" ).datepicker();
	$('#colorpickerHolder').ColorPicker({flat: true});
	$('#timepicker').timepicker ({ 
		showPeriod: true 
		, showNowButton: true
		, showCloseButton: true
	});
	
	$('#timepicker_inline_div').timepicker({
	   defaultTime: '9:20'
	});		
		
	$('#colorSelector').ColorPicker({
		color: '#FF9900',
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onSubmit: function (hsb, hex, rgb, el) {
			$(el).ColorPickerHide ();	
		},
		onChange: function (hsb, hex, rgb) {
			$('#colorSelector div').css({ 'background-color': '#' + hex });
			$('#colorpickerField1').val ('#' + hex);
		}
	});
	
	$('#colorpickerField1').live ('keyup', function (e) {
		var val = $(this).val ();
		val = val.replace ('#', '');
		$('#colorSelector div').css({ 'background-color': '#' + val });
		$('#colorSelector').ColorPickerSetColor(val);
	});

});

</script>

<?php
}else{
header('location:/2020/si_rawatjalan');
}
?>