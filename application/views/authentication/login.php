<!-- <div class="login-box">
	<div class="login-logo">
		<a href="<?php //echo base_url(); ?>"><b><?php //echo $site['nama_website']; ?></b></a>
	</div> -->
	<!-- /.login-logo -->
<!DOCTYPE html>
<html>

<html>

<head>
	<title>
		Login | Sumbangan TI	</title>
	<link href='http://localhost/sistem/assets/upload/images/admin.png' rel='shortcut icon' type='image/x-icon' />
	<!-- meta -->
	<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	
	<!-- css -->
	<link href="http://localhost/sistem/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="http://localhost/sistem/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="http://localhost/sistem/assets/vendor/AdminLTE-2.4.3/css/AdminLTE.min.css" rel="stylesheet">
<link href="http://localhost/sistem/assets/vendor/iCheck/square/blue.css" rel="stylesheet">
<script src="http://localhost/sistem/assets/vendor/jquery/jquery.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<!-- jQuery 2.2.3 -->
	<script src="http://localhost/sistem/assets/vendor/jquery/jquery.min.js"></script>
</head>

<body class="hold-transition register-page">

	<div class="wrapper">
		<div class="login-box">
	<div class="login-logo">
		<a href="http://localhost/sistem/"><b>SUMBANGAN TI</b></a>
	</div>
	<div class="login-box-body">
		<p class="login-box-msg text-bold"> Masuk Dengan Email & Password Anda</p>
		<form method="post" action="<?php echo base_url('auth/login'); ?>" role="login">
			<div class="form-group has-feedback">
				<input type="email" name="email" class="form-control" required minlength="5" placeholder="Email" />
				<span class="glyphicon  glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" name="password" class="form-password" style="width: 320px; height: 33px; padding: 5px 10px;" required minlength="5" placeholder="Password" 
				/>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>

			<div class="checkbox icheck col-xs-12 col-sm-6 col-md-6">
					<input type="checkbox" class="form-checkbox">
					Show Password

				</div>

			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6" style="padding-bottom: 5px">
					<button type="submit" name="submit" value="login" class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in" aria-hidden="true"></i> Masuk</button>
				</div>
			</div>

			
		</form>
		
	</div>
	<div id="myalert">
		<?php echo $this->session->flashdata('alert', true); ?>
	</div>
	<br>

<script>
	$(function() {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' // optional
		});
	});
	$('#myalert').delay('slow').slideDown('slow').delay(4100).slideUp(600);
</script>
