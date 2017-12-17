<div class="container">
	<div class="row">
		<div style="margin-bottom: 5%;">
			<h2 style="text-align: center;">Detail Peserta</h2>
		</div>
		<div class="col-md-2">
			<img src="https://akademik.unsri.ac.id/images/foto_mhs/<?= $dt->angkatan ?>/<?= $dt->nim ?>.jpg" width="150" height="200" alt="foto">
		</div>
		<div class="col-md-9 col-md-offset-1">
			<table class="table table-striped">
				<tr>
					<td style="width: 200px;">NIM</td>
					<td><?= $dt->nim ?></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td><?= $dt->nama ?></td>
				</tr>
				<tr>
					<td>Jurusan</td>
					<td><?= $dt->jurusan ?></td>
				</tr>
				<tr>
					<td>Angkatan</td>
					<td><?= $dt->angkatan ?></td>
				</tr>
				<tr>
					<td>IPK</td>
					<td><?= $dt->ipk ?></td>
				</tr>
				<tr>
					<td>Tempat, tanggal lahir</td>
					<td><?= $dt->tempat ?>, <?= $dt->ttl ?></td>
				</tr>
				<tr>
					<td>Nomor HP</td>
					<td><?= $dt->no_hp ?></td>
				</tr>
				<tr>
					<td>ID Line</td>
					<td><?= $dt->id_line ?></td>
				</tr>
				<tr>
					<td>Alasan masuk BEM</td>
					<td><?= $dt->alasan_bem ?></td>
				</tr>
				<tr>
					<td>Dinas/Divisi Pertama</td>
					<td><?= $dt->dinas1 ?></td>
				</tr>
				<tr>
					<td>Alasan memilih dinas/divisi pertama</td>
					<td><?= $dt->alasan1 ?></td>
				</tr>
				<tr>
					<td>Dinas/Divisi Kedua</td>
					<td><?= $dt->dinas2 ?></td>
				</tr>
				<tr>
					<td>Alasan memilih dinas/divisi Kedua</td>
					<td><?= $dt->alasan2 ?></td>
				</tr>
			</table>
		</div>
	</div>
</div>