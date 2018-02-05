<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">

  <title>LOGIN | PT. Telekomunikasi Selular</title>

  <link href="<?= base_url('assets') ?>	/vendor/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="<?= base_url('assets') ?>	/vendor/bootstrap/css/elegant-icons-style.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="<?= base_url('assets') ?>	/vendor/bootstrap/css/style.css" rel="stylesheet">
  <link href="<?= base_url('assets') ?>	/vendor/bootstrap/css/style-responsive.css" rel="stylesheet" />
  <!-- Bootstrap Core CSS -->
  <link href="<?= base_url('assets') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom Fonts -->
  <link href="<?= base_url('assets') ?>/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <style type="text/css">
  	body{
  		background-image: url('assets/img/telkomsel3.jpg');
  		background-size: cover;
  		background-repeat: no-repeat;
  	}
  </style>

</head>

<body>
  <div class="container">
  	<?= form_open('Login', ['id' => 'form']) ?>
    <div class="login-form">

      <div class="login-wrap"><!-- 
        <p class="login-img"><i class="fa fa-lock" aria-hidden="true"></i></p> -->
        <p class="login-img">
          <img style="border-radius: 5%; padding: 2%;" width="220" height="120" src="<?= base_url('assets/img/logo.png') ?>" alt="Logo Telkomsel">
        </p>
        <div><?= $this->session->flashdata('msg') ?></div>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
          <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
          <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <input onclick="submit_data()" type="submit" name="login-submit" class="btn btn-primary btn-lg btn-block" value="Login">
      </div>
    </div>
    <?= form_close() ?>
  </div>


  <script type="text/javascript">
    function submit_data(){
      $('#form').submit();
    }
  </script>


</body>

</html>
