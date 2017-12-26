<!DOCTYPE html>
<html>
<head>
	<title>Sistem Pakar Waris</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap-theme.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css"/>

</head>
<body>
	<br><br>
	<div class="container-fluid" id="div1">
	<hr>
		<h1>Sistem Pakar Waris</h1><br>
		<div id="div2">
		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist">
		    <li role="presentation"><a href="<?php echo base_url() ?>C_Home/index" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
		    <li role="presentation"><a href="<?php echo base_url() ?>C_Ilmu/index" aria-controls="ilmu" role="tab" data-toggle="tab">Ilmu Waris</a></li>
		    <li role="presentation"><a href="<?php echo base_url() ?>C_Kalkulator/index" aria-controls="kalkulator" role="tab" data-toggle="tab">Kalkulator Waris</a></li>
		    <li role="presentation"><a href="<?php echo base_url() ?>C_Kamus/index" aria-controls="kamus" role="tab" data-toggle="tab">Kamus Ilmu Waris</a></li>
		    <ul class="nav pull-right">
				<li role="presentation" class="active"><a href="<?php echo base_url() ?>C_Login/index" aria-controls="login" role="tab" data-toggle="tab">Login</a></li>
			</ul>
		  </ul>
		  <hr>
		</div>
		<div class="row"></div>
			<div class="container" id="div3">
				<div class="col-lg-4"></div>
				<div class="col-lg-4">
					<div style="margin-top: 20px">
					<h3>Please Login</h3>
						<h5><?php echo isset($message) ? $message: ''; ?></h5>
						<p><?php echo isset($message2) ? $message2: ''; ?></p>
						<?php echo form_open("C_Login/process"); ?>
						<form action="" method="POST">
							<div class="form-group">
								<input type="email" class="form-control" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="password" placeholder="Password">
							</div>
							<div class="form-group">
								<input type="submit" name="Login" value="Login" class="btn btn-primary form-control">
							</div>
							<div id="link">
			          			Doesn't have account ? <a href="<?php echo base_url() ?>C_Register/index">Create account</a>
			    			</div>
						</form>
						<?php echo form_close(); ?>
					</div>
				</div>
				<div class="col-lg-4"></div>
			</div>
		</div>

	<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
	<script>
		function validAngka(a)
		{
			if(!/^[0-9.]+$/.test(a.value))
			{
			a.value = a.value.substring(0,a.value.length-1000);
			}
		}
	</script>
</body>
</html>