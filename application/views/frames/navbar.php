<?php  
  $nim = $this->session->userdata('nim');
  $role = $this->session->userdata('role');
?>

<style type="text/css">
  .logo_utama{
    width:50px; height: 50px; float: left;
    padding: -2%;
  }
  .logo_utama img{
    width:50px; height: 50px; 
    border-radius: 50%;
  }
  #pilihan{
    background: url(<?= base_url('assets/img/header.png') ?>) no-repeat bottom center scroll;
    background-size: 1400px;
  }
  #coba li a:hover{
    background-color: #FD7F04;
  }
</style>

<nav class="navbar navbar-inverse" id="pilihan">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?= base_url('') ?>">OPREC BEM KM FASILKOM</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav navbar-right" id="coba">
        <?php if(!isset($nim)): ?>
          <li><a href="<?= base_url('regist') ?>"><i class="fa fa-user"></i> Daftar</a></li>
        <?php endif; ?>
        <?php if(isset($nim) && $role == 'mhs'): ?>
          <li><a href="<?= base_url('peserta/cetak_ID') ?>"><i class="fa fa-download"></i> Cetak ID Card</a></li>
        <?php endif; ?>
        <?php if(!isset($nim)): ?>
          <li><a href="<?= base_url('login') ?>"><i class="fa fa-sign-in"></i> Login</a></li>
        <?php else: ?>
          <li><a href="<?= base_url('logout') ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>