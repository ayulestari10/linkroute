<style type="text/css">
	#hasil{
		margin: 0 auto;
		color: white;
		font-family: cursive;
	}
	#title{
		text-align: center;
		font-size: 32px;
		font-family: cursive;
		padding: 7%;
	}
	#barcode{
		margin-left: 28%;
	}
	#barcode img{
		margin-top: 5%;
		width: 250px;
		height: 250px;
	}
</style>

<div class="container">
	<div class="row" style="margin-bottom: 1%;">
		<div class="col-md-6">
			<div class="panel panel-primary">
			  <div class="panel-heading">	
			    <h3 class="panel-title">Data Peserta Open Recruitment BEM KM Fasilkom 2017</h3>
			  </div>
			  <div class="panel-body">
			    <table class="table table-striped">
					<tr>
						<td>Nomor Pendaftaran</td>
						<td><strong><?= $row->id_data ?></strong></td>
					</tr>
					<tr>
						<td>Nama</td>
						<td><strong><?= $row->nama ?></strong></td>
					</tr>
				</table>
			  </div>
			</div>
		</div>
	</div>

	<div class="row" id="hasil">
		<div class="col-md-6" style="background-color: #09B301;">
			 	<?php if($row->status1 == 'lulus'): ?>
			 		<div id="barcode">
			 			<?php if ($row->dinas1 == 'Divisi Politik Kajian Strategi' || $row->dinas1 == 'Divisi Advokasi Kampus'): ?>
			 				<img src="<?= base_url('assets/img/qr/Dinas Kastrad.jpg') ?>">
			 			<?php elseif ($row->dinas1 == 'Divisi Multimedia' || $row->dinas1 == 'Divisi Hubungan Masyarakat'): ?>
			 				<img src="<?= base_url('assets/img/qr/Dinas Media dan Informasi.jpg') ?>">
			 			<?php else: ?>
			 				<img src="<?= base_url('assets/img/qr/'.$row->dinas1.'.jpg') ?>">
			 			<?php endif; ?>
					 </div>
					 <div style="text-align: center;">
					 	<strong>Selamat anda dinyatakan lulus.</strong>
					 </div>
					 <div id="title">
						<strong><?= $row->dinas1 ?></strong>
					</div>
				<?php elseif($row->status2 == 'lulus'): ?>
					<div id="barcode">
					 	<?php if ($row->dinas2 == 'Divisi Politik Kajian Strategi' || $row->dinas1 == 'Divisi Advokasi Kampus'): ?>
			 				<img src="<?= base_url('assets/img/qr/Dinas Kastrad.jpg') ?>">
			 			<?php elseif ($row->dinas2 == 'Divisi Multimedia' || $row->dinas2 == 'Divisi Hubungan Masyarakat'): ?>
			 				<img src="<?= base_url('assets/img/qr/Dinas Media dan Informasi.jpg') ?>">
			 			<?php else: ?>
			 				<img src="<?= base_url('assets/img/qr/'.$row->dinas2.'.jpg') ?>">
			 			<?php endif; ?>
					 </div>
					 <div style="text-align: center;">
					 	<strong>Selamat anda dinyatakan lulus.</strong>
					 </div>
					 <div id="title">
						<strong><?= $row->dinas2 ?></strong>
					</div>
				<?php elseif (strlen($row->status3) > 1): ?>
					<div id="barcode">
					 	<?php if ($row->status3 == 'Divisi Politik Kajian Strategi' || $row->status3 == 'Divisi Advokasi Kampus'): ?>
			 				<img src="<?= base_url('assets/img/qr/Dinas Kastrad.jpg') ?>">
			 			<?php elseif ($row->status3 == 'Divisi Multimedia' || $row->status3 == 'Divisi Hubungan Masyarakat'): ?>
			 				<img src="<?= base_url('assets/img/qr/Dinas Media dan Informasi.jpg') ?>">
			 			<?php else: ?>
			 				<img src="<?= base_url('assets/img/qr/'.$row->status3.'.jpg') ?>">
			 			<?php endif; ?>
					 </div>
					 <div style="text-align: center;">
					 	<strong>Selamat anda dinyatakan lulus.</strong>
					 </div>
					 <div id="title">
						<strong><?= $row->status3 ?></strong>
					</div>
				<?php endif; ?>
			<div style="text-align: center;">
				<strong>Selanjutnya anda harus bergabung dalam grup dengan cara menambahkan QR Code Grup diatas!</strong>
			</div>
		</div>
	</div>
</div>