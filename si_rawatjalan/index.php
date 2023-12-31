<?php
error_reporting(E_ALL & ~E_NOTICE);
include"config/koneksi.php";
session_start();
if (empty($_SESSION[namauser]) AND empty($_SESSION[passuser])){

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
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	
	<link rel="stylesheet" href="stylesheets/reset.css" type="text/css" media="screen" title="no title" />
	<link rel="stylesheet" href="stylesheets/text.css" type="text/css" media="screen" title="no title" />
	<link rel="stylesheet" href="stylesheets/buttons.css" type="text/css" media="screen" title="no title" />
	<link rel="stylesheet" href="stylesheets/theme-default.css" type="text/css" media="screen" title="no title" />
	<link rel="stylesheet" href="stylesheets/login.css" type="text/css" media="screen" title="no title" />
</head>

<body>

<div id="login">
	<h1>Dashboard</h1>
	<div id="login_panel">
		<form action="cek_login.php" method="post" accept-charset="utf-8">		
			<div class="login_fields">
				<div class="field">
					<label for="email">Username</label>
					<input type="text" name="username" value="" id="email" tabindex="1" placeholder="username" />		
				</div>
				
				<div class="field">
					<label for="password">Password <small><a href="javascript:;">Forgot Password?</a></small></label>
					<input type="password" name="password" value="" id="password" tabindex="2" placeholder="password" />			
				</div>
			</div> <!-- .login_fields -->
			
			<div class="login_actions">
				<button type="submit" class="btn btn-primary" tabindex="3">Login</button>
			</div>
		</form>
	</div> <!-- #login_panel -->		
</div> <!-- #login -->

<script src="javascripts/all.js"></script>


</body>
</html>
<?php
}else{
header('location:media.php?module=home');
}

?>