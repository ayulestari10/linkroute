<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Bootstrap Core CSS -->
    <link href="<?= base_url('assets') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    </style>
</head>
<body>
	<br><br><br>
	<div class="container-fluid" id="div1">
		<div class="row"></div>
			<div class="container" id="div3">
				<div class="col-lg-4"></div>
				<div class="col-lg-4">
					<div style="margin-top: 20px">
					<h3>Login</h3>
						<?= form_open('Login') ?>
							<div class="form-group">
								<input type="text" class="form-control" name="username" placeholder="Username">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="password" placeholder="Password">
							</div>
							<div class="form-group">
								<input type="submit" name="login-submit" value="Login" class="btn btn-primary form-control">
							</div>
						</form>
						<?= form_close() ?>
					</div>
				</div>
				<div class="col-lg-4"></div>
			</div>
		</div>

	<script src="<?= base_url('assets')?>/vendor/jquery/jquery.js"></script>
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