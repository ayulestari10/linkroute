<div class="container">
	<div class="row">
		<div class="col-md-11">
			<h2 style="text-align: center;">List Peserta</h2>
			<div style="margin-bottom: 5%; margin-top: 3%;">
				<?php  
					$msg = $this->session->userdata('msg'); 
					if(isset($msg)){
						echo $msg;
					}

					$list_dinas = [
						'Dinas Kesekretariatan',
						'Dinas Pengembangan Sumber Daya Manusia',
						'Dinas PTI',
						'Dinas Sosial dan Masyarakat',
						'Dinas Seni dan Olahraga',
						'Dinas Kastrad',
						'Divisi Politik Kajian Strategi',
						'Divisi Advokasi Kampus',
						'Dinas Media dan Informasi',
						'Divisi Hubungan Masyarakat',
						'Divisi Multimedia',
						'Dinas Kewirausahaan',
						'Dinas Akademik'
					];
				?>
			</div>
			<table class="table table-striped">
				<thead>
					<th>No</th>
					<th>Foto</th>
					<th>NIM</th>
					<th>Nama</th>
					<th>Dinas 1</th>
					<th>Dinas 2</th>
					<th>Aksi</th>
				</thead>
				<tbody>
			<?php
				$i = 1; 
				foreach($data as $row): ?>
					<?php if ($row->role != 'admin'): ?>
					<tr>
						<td><?= $i++ ?></td>
						<td><img src="https://akademik.unsri.ac.id/images/foto_mhs/<?= $row->angkatan ?>/<?= $row->nim ?>.jpg" width="100" height="150" alt="foto"></td>
						<td><?= $row->nim ?></td>
						<td><?= $row->nama ?></td>
						<td><?= $row->dinas1 ?></td>
						<td><?= $row->dinas2 ?></td>
						<td>
							<?php  
								$role = $this->session->userdata('role');
								if($role == 'admin'): 
							?>
								<a href="<?= base_url('admin/detail_peserta/'.$row->id_data) ?>" class="btn btn-info"><i class="fa fa-info"> Detail</i></a>
							<?php elseif($role == 'super admin'): ?>
								<a href="<?= base_url('super_admin/detail_peserta/'.$row->id_data) ?>" class="btn btn-info"><i class="fa fa-info"> Detail</i></a>
							<div id="btn-<?= $row->id_data ?>">
								<?php if ($row->status1 == 'lulus'): ?>
									<button onclick="changeStatus(<?= $row->id_data ?>)" class="btn btn-success"><i class="fa fa-check"></i> Dinas 1</button>
								<?php else: ?>
									<button onclick="changeStatus(<?= $row->id_data ?>)" class="btn btn-danger"><i class="fa fa-close"></i> Dinas 1</button>
								<?php endif; ?>
							</div>

							<div id="btn2-<?= $row->id_data ?>">
								<?php if ($row->status2 == 'lulus'): ?>
									<button onclick="changeStatus2(<?= $row->id_data ?>)" class="btn btn-success"><i class="fa fa-check"></i> Dinas 2</button>
								<?php else: ?>
									<button onclick="changeStatus2(<?= $row->id_data ?>)" class="btn btn-danger"><i class="fa fa-close"></i> Dinas 2</button>
								<?php endif; ?>
							</div>

							<?php  
								$dinas = ['' => ''];
								foreach ($list_dinas as $d)
								{
									if ($d == 'Dinas Pengembangan Sumber Daya Manusia')
										$dinas['Dinas PSDM'] = $d;
									else
										$dinas[$d] = $d;
								}
								echo form_dropdown('status3-' . $row->id_data, $dinas, $row->status3, ['id' => 'status-' . $row->id_data, 'class' => 'form-control', 'onchange' => 'changeStatus3('.$row->id_data.')']);
							?>

							<?php elseif($role == 's_admin'): ?>
								<a href="<?= base_url('super_admin/detail_peserta/'.$row->id_data) ?>" class="btn btn-info"><i class="fa fa-info"> Detail</i></a>
							<?php endif; ?>
						</td>
					</tr>
				<?php endif; ?>
			<?php endforeach; ?>
				</tbody>
				</table>
		</div>
	</div>
</div>

<script type="text/javascript">
	function changeStatus(id_data) {
		$.ajax({
			url: '<?= base_url('super_admin/hasil') ?>',
			type: 'POST',
			data: {
				id_data: id_data
			},
			success: function(response) {
				$('#btn-' + id_data).html(response);
			},
			error: function (e) {
				console.log(e.responseText);
			}
		});
	}

	function changeStatus2(id_data) {
		$.ajax({
			url: '<?= base_url('super_admin/hasil') ?>',
			type: 'POST',
			data: {
				id_data2: id_data
			},
			success: function(response) {
				$('#btn2-' + id_data).html(response);
			},
			error: function (e) {
				console.log(e.responseText);
			}
		});
	}	

	function changeStatus3(id_data) {
		$.ajax({
			url: '<?= base_url('super_admin/hasil') ?>',
			type: 'POST',
			data: {
				id_data3: id_data,
				dinas: $('#status-' + id_data).val()
			},
			success: function(response) {
				console.log('Selamat anda lulus huahuahauhauauahaha');
			},
			error: function (e) {
				console.log(e.responseText);
			}
		});
	}	
</script>