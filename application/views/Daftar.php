<style type="text/css">
	.title{
		margin-bottom: 5%;
	}
	#biodata{display: block;}
	#dinas1, #dinas2{display: none;}
</style>

<div class="container" style="margin-bottom: 5%;">
	<div class="row">
		<div class="title" style="text-align: center;">
			<h1><strong>FORMULIR PENDAFTARAN</strong></h1>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6 col-md-offset-1">
			<div style="margin-bottom: 3%;">
				<?php  
					$msg = $this->session->flashdata('msg');
					if(isset($msg)){
						echo $msg;
					}
				?>
			</div>
		</div>
	</div>

	<div id="biodata">
		<div class="row">
			 <div class="col-md-6 col-md-offset-1">
	<!-- 		 <div class="input-append"><input type="text" id="" name="" class="form-control"><span class="add-on"><i class="fa fa-book"></i></span></div> -->
			<?php echo form_open_multipart('Peserta/daftar'); ?>
			 	<div class="form-group">
			 		 <p>Nomor Induk Mahasiswa / NIM : <?= $dt->nim ?></p>
			 	</div>
			 	<div class="form-group">
			 		<label for="Nama">Nama</label>
			 		 <input type="text" name="nama" placeholder="Nama" class="form-control" value="<?= $dt->nama ?>" required>
			 	</div>
			 	<div class="form-group">
			 		<label for="Jurusan">Jurusan</label>
			 		<select name="jurusan" class="form-control" required>
			  			<?php if($dt->jurusan == 'Komputer Akuntansi (D3)'): ?>
			  				<option value="Komputer Akuntansi (D3)">Komputer Akuntansi (D3)</option>
				  			<option value="Manajemen Informatika (D3)">Manajemen Informatika (D3)</option>
				  			<option value="Sistem Informasi (S1 Bilingual)">Sistem Informasi (S1 Bilingual)</option>
				  			<option value="Sistem Informasi (S1 Profesional)">Sistem Informasi (S1 Profesional)</option>
				  			<option value="Sistem Informasi (S1 Reguler)">Sistem Informasi (S1 Reguler)</option>
				  			<option value="Teknik Komputer dan Jaringan (D3)">Teknik Komputer dan Jaringan (D3)</option>
				  			<option value="Teknik Komputer (D3)">Teknik Komputer (D3)</option>
				  			<option value="Sistem Komputer (S1 Reguler)">Sistem Komputer (S1 Reguler)</option>
				  			<option value="Sistem Komputer (S1 Profesional)">Sistem Komputer (S1 Profesional)</option>
				  			<option value="Teknik Informatika (S1 Reguler)">Teknik Informatika (S1 Reguler)</option>
				  			<option value="Teknik Informatika (S1 Bilingual)">Teknik Informatika (S1 Bilingual)</option>
				  		<?php elseif($dt->jurusan == 'Manajemen Informatika (D3)'): ?>
				  			<option value="Manajemen Informatika (D3)">Manajemen Informatika (D3)</option>
				  			<option value="Komputer Akuntansi (D3)">Komputer Akuntansi (D3)</option>
				  			<option value="Sistem Informasi (S1 Bilingual)">Sistem Informasi (S1 Bilingual)</option>
				  			<option value="Sistem Informasi (S1 Profesional)">Sistem Informasi (S1 Profesional)</option>
				  			<option value="Sistem Informasi (S1 Reguler)">Sistem Informasi (S1 Reguler)</option>
				  			<option value="Teknik Komputer dan Jaringan (D3)">Teknik Komputer dan Jaringan (D3)</option>
				  			<option value="Teknik Komputer (D3)">Teknik Komputer (D3)</option>
				  			<option value="Sistem Komputer (S1 Reguler)">Sistem Komputer (S1 Reguler)</option>
				  			<option value="Sistem Komputer (S1 Profesional)">Sistem Komputer (S1 Profesional)</option>
				  			<option value="Teknik Informatika (S1 Reguler)">Teknik Informatika (S1 Reguler)</option>
				  			<option value="Teknik Informatika (S1 Bilingual)">Teknik Informatika (S1 Bilingual)</option>
						<?php elseif($dt->jurusan == 'Sistem Informasi (S1 Bilingual)'): ?>
				  			<option value="Sistem Informasi (S1 Bilingual)">Sistem Informasi (S1 Bilingual)</option>
				  			<option value="Komputer Akuntansi (D3)">Komputer Akuntansi (D3)</option>
				  			<option value="Manajemen Informatika (D3)">Manajemen Informatika (D3)</option>
				  			<option value="Sistem Informasi (S1 Profesional)">Sistem Informasi (S1 Profesional)</option>
				  			<option value="Sistem Informasi (S1 Reguler)">Sistem Informasi (S1 Reguler)</option>
				  			<option value="Teknik Komputer dan Jaringan (D3)">Teknik Komputer dan Jaringan (D3)</option>
				  			<option value="Teknik Komputer (D3)">Teknik Komputer (D3)</option>
				  			<option value="Sistem Komputer (S1 Reguler)">Sistem Komputer (S1 Reguler)</option>
				  			<option value="Sistem Komputer (S1 Profesional)">Sistem Komputer (S1 Profesional)</option>
				  			<option value="Teknik Informatika (S1 Reguler)">Teknik Informatika (S1 Reguler)</option>
				  			<option value="Teknik Informatika (S1 Bilingual)">Teknik Informatika (S1 Bilingual)</option>
						<?php elseif($dt->jurusan == 'Sistem Informasi (S1 Profesional)'): ?>
							<option value="Sistem Informasi (S1 Profesional)">Sistem Informasi (S1 Profesional)</option>
				  			<option value="Komputer Akuntansi (D3)">Komputer Akuntansi (D3)</option>
				  			<option value="Manajemen Informatika (D3)">Manajemen Informatika (D3)</option>
				  			<option value="Sistem Informasi (S1 Bilingual)">Sistem Informasi (S1 Bilingual)</option>
				  			<option value="Sistem Informasi (S1 Reguler)">Sistem Informasi (S1 Reguler)</option>
				  			<option value="Teknik Komputer dan Jaringan (D3)">Teknik Komputer dan Jaringan (D3)</option>
				  			<option value="Teknik Komputer (D3)">Teknik Komputer (D3)</option>
				  			<option value="Sistem Komputer (S1 Reguler)">Sistem Komputer (S1 Reguler)</option>
				  			<option value="Sistem Komputer (S1 Profesional)">Sistem Komputer (S1 Profesional)</option>
				  			<option value="Teknik Informatika (S1 Reguler)">Teknik Informatika (S1 Reguler)</option>
				  			<option value="Teknik Informatika (S1 Bilingual)">Teknik Informatika (S1 Bilingual)</option>
						<?php elseif($dt->jurusan == 'Sistem Informasi (S1 Reguler)'): ?>
							<option value="Sistem Informasi (S1 Reguler)">Sistem Informasi (S1 Reguler)</option>
				  			<option value="Komputer Akuntansi (D3)">Komputer Akuntansi (D3)</option>
				  			<option value="Manajemen Informatika (D3)">Manajemen Informatika (D3)</option>
				  			<option value="Sistem Informasi (S1 Bilingual)">Sistem Informasi (S1 Bilingual)</option>
				  			<option value="Sistem Informasi (S1 Profesional)">Sistem Informasi (S1 Profesional)</option>
				  			<option value="Teknik Komputer dan Jaringan (D3)">Teknik Komputer dan Jaringan (D3)</option>
				  			<option value="Teknik Komputer (D3)">Teknik Komputer (D3)</option>
				  			<option value="Sistem Komputer (S1 Reguler)">Sistem Komputer (S1 Reguler)</option>
				  			<option value="Sistem Komputer (S1 Profesional)">Sistem Komputer (S1 Profesional)</option>
				  			<option value="Teknik Informatika (S1 Reguler)">Teknik Informatika (S1 Reguler)</option>
				  			<option value="Teknik Informatika (S1 Bilingual)">Teknik Informatika (S1 Bilingual)</option>
						<?php elseif($dt->jurusan == 'Teknik Komputer dan Jaringan (D3)'): ?>
							<option value="Teknik Komputer dan Jaringan (D3)">Teknik Komputer dan Jaringan (D3)</option>
				  			<option value="Komputer Akuntansi (D3)">Komputer Akuntansi (D3)</option>
				  			<option value="Manajemen Informatika (D3)">Manajemen Informatika (D3)</option>
				  			<option value="Sistem Informasi (S1 Bilingual)">Sistem Informasi (S1 Bilingual)</option>
				  			<option value="Sistem Informasi (S1 Profesional)">Sistem Informasi (S1 Profesional)</option>
				  			<option value="Sistem Informasi (S1 Reguler)">Sistem Informasi (S1 Reguler)</option>
				  			<option value="Teknik Komputer (D3)">Teknik Komputer (D3)</option>
				  			<option value="Sistem Komputer (S1 Reguler)">Sistem Komputer (S1 Reguler)</option>
				  			<option value="Sistem Komputer (S1 Profesional)">Sistem Komputer (S1 Profesional)</option>
				  			<option value="Teknik Informatika (S1 Reguler)">Teknik Informatika (S1 Reguler)</option>
				  			<option value="Teknik Informatika (S1 Bilingual)">Teknik Informatika (S1 Bilingual)</option>
						<?php elseif($dt->jurusan == 'Teknik Komputer (D3)'): ?>
							<option value="Teknik Komputer (D3)">Teknik Komputer (D3)</option>
				  			<option value="Komputer Akuntansi (D3)">Komputer Akuntansi (D3)</option>
				  			<option value="Manajemen Informatika (D3)">Manajemen Informatika (D3)</option>
				  			<option value="Sistem Informasi (S1 Bilingual)">Sistem Informasi (S1 Bilingual)</option>
				  			<option value="Sistem Informasi (S1 Profesional)">Sistem Informasi (S1 Profesional)</option>
				  			<option value="Sistem Informasi (S1 Reguler)">Sistem Informasi (S1 Reguler)</option>
				  			<option value="Teknik Komputer dan Jaringan (D3)">Teknik Komputer dan Jaringan (D3)</option>
				  			<option value="Sistem Komputer (S1 Reguler)">Sistem Komputer (S1 Reguler)</option>
				  			<option value="Sistem Komputer (S1 Profesional)">Sistem Komputer (S1 Profesional)</option>
				  			<option value="Teknik Informatika (S1 Reguler)">Teknik Informatika (S1 Reguler)</option>
				  			<option value="Teknik Informatika (S1 Bilingual)">Teknik Informatika (S1 Bilingual)</option>
						<?php elseif($dt->jurusan == 'Sistem Komputer (S1 Reguler)'): ?>
							<option value="Sistem Komputer (S1 Reguler)">Sistem Komputer (S1 Reguler)</option>
				  			<option value="Komputer Akuntansi (D3)">Komputer Akuntansi (D3)</option>
				  			<option value="Manajemen Informatika (D3)">Manajemen Informatika (D3)</option>
				  			<option value="Sistem Informasi (S1 Bilingual)">Sistem Informasi (S1 Bilingual)</option>
				  			<option value="Sistem Informasi (S1 Profesional)">Sistem Informasi (S1 Profesional)</option>
				  			<option value="Sistem Informasi (S1 Reguler)">Sistem Informasi (S1 Reguler)</option>
				  			<option value="Teknik Komputer dan Jaringan (D3)">Teknik Komputer dan Jaringan (D3)</option>
				  			<option value="Teknik Komputer (D3)">Teknik Komputer (D3)</option>
				  			<option value="Sistem Komputer (S1 Profesional)">Sistem Komputer (S1 Profesional)</option>
				  			<option value="Teknik Informatika (S1 Reguler)">Teknik Informatika (S1 Reguler)</option>
				  			<option value="Teknik Informatika (S1 Bilingual)">Teknik Informatika (S1 Bilingual)</option>
						<?php elseif($dt->jurusan == 'Sistem Komputer (S1 Profesional)'): ?>
							<option value="Sistem Komputer (S1 Profesional)">Sistem Komputer (S1 Profesional)</option>
				  			<option value="Komputer Akuntansi (D3)">Komputer Akuntansi (D3)</option>
				  			<option value="Manajemen Informatika (D3)">Manajemen Informatika (D3)</option>
				  			<option value="Sistem Informasi (S1 Bilingual)">Sistem Informasi (S1 Bilingual)</option>
				  			<option value="Sistem Informasi (S1 Profesional)">Sistem Informasi (S1 Profesional)</option>
				  			<option value="Sistem Informasi (S1 Reguler)">Sistem Informasi (S1 Reguler)</option>
				  			<option value="Teknik Komputer dan Jaringan (D3)">Teknik Komputer dan Jaringan (D3)</option>
				  			<option value="Teknik Komputer (D3)">Teknik Komputer (D3)</option>
				  			<option value="Sistem Komputer (S1 Reguler)">Sistem Komputer (S1 Reguler)</option>
				  			<option value="Teknik Informatika (S1 Reguler)">Teknik Informatika (S1 Reguler)</option>
				  			<option value="Teknik Informatika (S1 Bilingual)">Teknik Informatika (S1 Bilingual)</option>
						<?php elseif($dt->jurusan == 'Teknik Informatika (S1 Reguler)'): ?>
							<option value="Teknik Informatika (S1 Reguler)">Teknik Informatika (S1 Reguler)</option>
				  			<option value="Komputer Akuntansi (D3)">Komputer Akuntansi (D3)</option>
				  			<option value="Manajemen Informatika (D3)">Manajemen Informatika (D3)</option>
				  			<option value="Sistem Informasi (S1 Bilingual)">Sistem Informasi (S1 Bilingual)</option>
				  			<option value="Sistem Informasi (S1 Profesional)">Sistem Informasi (S1 Profesional)</option>
				  			<option value="Sistem Informasi (S1 Reguler)">Sistem Informasi (S1 Reguler)</option>
				  			<option value="Teknik Komputer dan Jaringan (D3)">Teknik Komputer dan Jaringan (D3)</option>
				  			<option value="Teknik Komputer (D3)">Teknik Komputer (D3)</option>
				  			<option value="Sistem Komputer (S1 Reguler)">Sistem Komputer (S1 Reguler)</option>
				  			<option value="Sistem Komputer (S1 Profesional)">Sistem Komputer (S1 Profesional)</option>
				  			<option value="Teknik Informatika (S1 Bilingual)">Teknik Informatika (S1 Bilingual)</option>
						<?php elseif($dt->jurusan == 'Teknik Informatika (S1 Bilingual)'): ?>
							<option value="Teknik Informatika (S1 Bilingual)">Teknik Informatika (S1 Bilingual)</option>
				  			<option value="Komputer Akuntansi (D3)">Komputer Akuntansi (D3)</option>
				  			<option value="Manajemen Informatika (D3)">Manajemen Informatika (D3)</option>
				  			<option value="Sistem Informasi (S1 Bilingual)">Sistem Informasi (S1 Bilingual)</option>
				  			<option value="Sistem Informasi (S1 Profesional)">Sistem Informasi (S1 Profesional)</option>
				  			<option value="Sistem Informasi (S1 Reguler)">Sistem Informasi (S1 Reguler)</option>
				  			<option value="Teknik Komputer dan Jaringan (D3)">Teknik Komputer dan Jaringan (D3)</option>
				  			<option value="Teknik Komputer (D3)">Teknik Komputer (D3)</option>
				  			<option value="Sistem Komputer (S1 Reguler)">Sistem Komputer (S1 Reguler)</option>
				  			<option value="Sistem Komputer (S1 Profesional)">Sistem Komputer (S1 Profesional)</option>
				  			<option value="Teknik Informatika (S1 Reguler)">Teknik Informatika (S1 Reguler)</option>
						<?php else: ?>										  			
				  			<option value="">Pilih Jurusan</option>
				  			<option value="Komputer Akuntansi (D3)">Komputer Akuntansi (D3)</option>
				  			<option value="Manajemen Informatika (D3)">Manajemen Informatika (D3)</option>
				  			<option value="Sistem Informasi (S1 Bilingual)">Sistem Informasi (S1 Bilingual)</option>
				  			<option value="Sistem Informasi (S1 Profesional)">Sistem Informasi (S1 Profesional)</option>
				  			<option value="Sistem Informasi (S1 Reguler)">Sistem Informasi (S1 Reguler)</option>
				  			<option value="Teknik Komputer dan Jaringan (D3)">Teknik Komputer dan Jaringan (D3)</option>
				  			<option value="Teknik Komputer (D3)">Teknik Komputer (D3)</option>
				  			<option value="Sistem Komputer (S1 Reguler)">Sistem Komputer (S1 Reguler)</option>
				  			<option value="Sistem Komputer (S1 Profesional)">Sistem Komputer (S1 Profesional)</option>
				  			<option value="Teknik Informatika (S1 Reguler)">Teknik Informatika (S1 Reguler)</option>
				  			<option value="Teknik Informatika (S1 Bilingual)">Teknik Informatika (S1 Bilingual)</option>
				  		<?php endif; ?>
			  		</select>
			 	</div>
			 	<div class="form-group">
			 		<label for="Angkatan">Angkatan</label>
			 		<select name="angkatan" class="form-control" required>
			 			<?php if($dt->angkatan == '2016'): ?>
			 				<option value="2016">2016</option>
				 			<option value="2015">2015</option>
				 			<option value="2014">2014</option>
			 			<?php elseif($dt->angkatan == '2015'): ?>
			 				<option value="2015">2015</option>
			 				<option value="2016">2016</option>
				 			<option value="2014">2014</option>
			 			<?php elseif($dt->angkatan == '2014'): ?>
			 				<option value="2014">2014</option>
			 				<option value="2016">2016</option>
				 			<option value="2015">2015</option>
			 			<?php else: ?>
				 			<option value="">Pilih Angkatan</option>
				 			<option value="2016">2016</option>
				 			<option value="2015">2015</option>
				 			<option value="2014">2014</option>
				 		<?php endif; ?>
			 		</select>
			 	</div>
			 	<div class="form-group">
			 		<label for="IPK">IPK <span style="color: #C6C2C2">  Contoh 3.74</span></label>
			 		 <input type="number" max="4" min="2" step="0.01" lang="nb" name="ipk" id="ipk" placeholder="IPK" class="form-control" value="<?= $dt->ipk ?>" required>
			 	</div>
			 	<div class="form-group">
			 		<label for="Tempat Lahir">Tempat Lahir</label>
			 		 <input type="text" name="tempat" placeholder="Tempat Lahir" class="form-control" value="<?= $dt->tempat ?>" required>
			 	</div>
			 	<div class="form-group">
			 		<label for="ttl">Tanggal lahir <span style="color: magenta;">* dd-mm-yyyy</span></label>
			 		 <input type="text" name="ttl" placeholder="Tanggal Lahir" class="form-control" value="<?= $dt->ttl ?>" required>
			 	</div>
			 	<div class="form-group">
			 		<label for="Nomor HP">Nomor HP</label>
			 		 <input type="text" name="no_hp" placeholder="Nomor HP" class="form-control" value="<?= $dt->no_hp ?>" onkeyup="validAngka(this)" required>
			 	</div>
			 	<div class="form-group">
			 		<label for="ID Line">ID Line</label>
			 		 <input type="text" name="id_line" placeholder="ID Line" class="form-control" value="<?= $dt->id_line ?>" required>
			 	</div>
			 	<div class="form-group">
			 		<label for="Alamat">Alamat</label>
			 		 <textarea name="alamat" placeholder="Alamat" class="form-control" required><?= $dt->alamat ?></textarea>
			 	</div>
			 
			 	<button class="btn btn-primary" onclick="lanjut(); return false;">Lanjut</button>
			 </div>

			 <div class="col-md-4 col-md-offset-1">
			 	<div class="panel panel-primary">
				  <div class="panel-heading">	
				    <h3 class="panel-title">Info</h3>
				  </div>
				  <div class="panel-body">
				    Ketika Wawancara Open Recruitment BEM KM Fasilkom 2017. Peserta wajib membawa persyaratan berikut.<br>
				    <ul>
				    	<li>Membawa uang akomodasi sebesar Rp. 20.000 untuk fasilitas makan siang dan snack pada saat workshop.</li>
				    	<li>Membawa foto diri close up ukuran 3r (1lembar).</li>
				    	<li>Menggunakan Kartu peserta yang telah di download dari web pendaftaran.</li>
				    </ul>
				  </div>
				</div>
			 </div>
		</div>
	</div>

	<div id="dinas1">
		<div class="row">
			<div class="col-md-6 col-md-offset-1">
				<div class="form-group">
					<label for="Alasan Masuk BEM">Alasan Masuk BEM</label>
					<textarea name="alasan_bem" class="form-control" required><?= $dt->alasan_bem ?></textarea>
				</div>
				<div class="form-group">
					<label for="Dinas/Divisi Pertama">Dinas/Divisi Pertama</label>
		 			<select name="dinas1" class="form-control" id="dinas_satu" required>
						<?php if(isset($dt->dinas1)): ?>
			 				<option value="<?= $dt->dinas1 ?>"><?= $dt->dinas1 ?></option>
				 			<option value="Dinas Kesekretariatan">Dinas Kesekretariatan</option>
				 			<option value="Dinas Pengembangan Sumber Daya Manusia">Dinas Pengembangan Sumber Daya Manusia</option>
				 			<option value="Dinas PTI">Dinas PTI</option>
				 			<option value="Dinas Sosial dan Masyarakat">Dinas Sosial dan Masyarakat</option>
				 			<option value="Dinas Seni dan Olahraga">Dinas Seni dan Olahraga</option>
				 			<option value="Dinas Kastrad">Dinas Kastrad</option>
				 			<option value="Divisi Politik Kajian Strategi">Divisi Politik Kajian Strategi</option>
				 			<option value="Divisi Advokasi Kampus">Divisi Advokasi Kampus</option>
				 			<option value="Dinas Media dan Informasi">Dinas Media dan Informasi</option>
				 			<option value="Divisi Hubungan Masyarakat">Divisi Hubungan Masyarakat</option>
				 			<option value="Divisi Multimedia">Divisi Multimedia</option>
				 			<option value="Dinas Kewirausahaan">Dinas Kewirausahaan</option>
				 			<option value="Dinas Akademik">Dinas Akademik</option>
				 		<?php else: ?>
				 			<option value="">Pilih Dinas/Divisi Pertama</option>
				 			<option value="Dinas Kesekretariatan">Dinas Kesekretariatan</option>
				 			<option value="Dinas Pengembangan Sumber Daya Manusia">Dinas Pengembangan Sumber Daya Manusia</option>
				 			<option value="Dinas PTI">Dinas PTI</option>
				 			<option value="Dinas Sosial dan Masyarakat">Dinas Sosial dan Masyarakat</option>
				 			<option value="Dinas Seni dan Olahraga">Dinas Seni dan Olahraga</option>
				 			<option value="Dinas Kastrad">Dinas Kastrad</option>
				 			<option value="Divisi Politik Kajian Strategi">Divisi Politik Kajian Strategi</option>
				 			<option value="Divisi Advokasi Kampus">Divisi Advokasi Kampus</option>
				 			<option value="Dinas Media dan Informasi">Dinas Media dan Informasi</option>
				 			<option value="Divisi Hubungan Masyarakat">Divisi Hubungan Masyarakat</option>
				 			<option value="Divisi Multimedia">Divisi Multimedia</option>
				 			<option value="Dinas Kewirausahaan">Dinas Kewirausahaan</option>
				 			<option value="Dinas Akademik">Dinas Akademik</option>
				 		<?php endif; ?>
			 		</select>
			 	</div>
			 	<div class="form-group">
			 		<label for="Alasan memilih dinas/divisi pertama">Alasan memilih dinas/divisi pertama</label>
			 		 <textarea name="alasan1" placeholder="Alasan memilih Dinas/Divisi Pertama" class="form-control" required><?= $dt->alasan1 ?></textarea>
			 	</div>		 	
				<button onclick="lanjut2(); return false;" class="btn btn-primary">Lanjut</button>
			</div>
			<div class="col-md-4 col-md-offset-1">
			 	<div class="panel panel-primary">
				  <div class="panel-heading">
				    <h3 class="panel-title">Info</h3>
				  </div>
				  <div class="panel-body">
				    Ketika Wawancara Open Recruitment BEM KM Fasilkom 2017. Peserta wajib membawa persyaratan berikut.<br>
				    <ul>
				    	<li>Membawa uang akomodasi sebesar Rp. 20.000 untuk fasilitas makan siang dan snack pada saat workshop.</li>
				    	<li>Membawa foto diri close up ukuran 3r (1lembar).</li>
				    	<li>Menggunakan Kartu peserta yang telah di download dari web pendaftaran.</li>
				    </ul>
				  </div>
				</div>
			 </div>
		</div>
	</div>

	<div id="dinas2">
		<div class="row">
			<div class="col-md-6 col-md-offset-1">
				<div class="form-group">
					<label for="Dinas/Divisi Kedua">Dinas/Divisi Kedua</label>
			 		<?php  
			 			$dinas2 = [
			 				'Dinas PTI',
			 				'Dinas Kesekretariatan',
			 				'Dinas Pengembangan Sumber Daya Manusia',
			 				'Dinas Sosial dan Masyarakat',
			 				'Dinas Seni dan Olahraga',
			 				'Dinas Kastrad',
			 				'Divisi Politik Kajian Strategi',
			 				'Divisi Advokasi Kampus',
			 				'Dinas Media dan Informasi',
			 				'Divisi Multimedia',
			 				'Divisi Hubungan Masyarakat',
			 				'Dinas Kewirausahaan',
			 				'Dinas Akademik'
			 			];
			 			$dinas2 = array_diff($dinas2, [$dt->dinas1]);
			 			$xd = [];
			 			foreach ($dinas2 as $d)
			 				$xd[$d] = $d;
			 			echo form_dropdown('dinas2', $xd, $dt->dinas2, ['class' => 'form-control', 'id' => 'dinas_satu', 'required' => '']);
			 		?>
			 	</div>
			 	<div class="form-group">
			 		<label for="Alasan memilih dinas/divisi kedua">Alasan memilih dinas/divisi kedua</label>
			 		<textarea name="alasan2" placeholder="Alasan memilih Dinas/Divisi Kedua" class="form-control" required><?= $dt->alasan2 ?></textarea>
			 	</div>	
			 	<input type="submit" name="simpan" value="Daftar" class="btn btn-primary">
			</div>
			<div class="col-md-4 col-md-offset-1">
			 	<div class="panel panel-primary">
				  <div class="panel-heading">
				    <h3 class="panel-title">Info</h3>
				  </div>
				  <div class="panel-body">
				    Ketika Wawancara Open Recruitment BEM KM Fasilkom 2017. Peserta wajib membawa persyaratan berikut.<br>
				    <ul>
				    	<li>Membawa uang akomodasi sebesar Rp. 20.000 untuk fasilitas makan siang dan snack pada saat workshop.</li>
				    	<li>Membawa foto diri close up ukuran 3r (1lembar).</li>
				    	<li>Menggunakan Kartu peserta yang telah di download dari web pendaftaran.</li>
				    </ul>
				  </div>
				</div>
			 </div>
		</div>
	</div>

	<?php echo form_close(); ?>
</div>

<script type="text/javascript">
	var dinas1;
	function cek_ipk(){
		var ipk = ("#ipk").val();
		if(ipk > 4){
			console.log('<div class="alert alert-danger">IPK yang anda inputkan tidak boleh lebih dari 4! Isi kembali IPK yang sesuai!</div>');
		}
	}

	function validAngka(a)
    {
        if(!/^[0-9.]+$/.test(a.value))
        {
        a.value = a.value.substring(0,a.value.length-1000);
        }
    }

	function lanjut(){
		$("#biodata").css("display", "none");
		$("#dinas1").animate({height:"toggle"}, 500);
		$("#dinas1").css("display", "block");

		return false;
	}

	function lanjut2(){
		dinas1 = $('#dinas_satu').val();

		$("#biodata").css("display", "none");
		$("#dinas1").css("display", "none");
		$("#dinas2").animate({height:"toggle"}, 500);
		$("#dinas2").css("display", "block");
		return false;
	}
	
</script>