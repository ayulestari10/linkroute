<style type="text/css">
	#hasil{
		color: white;
		font-family: cursive;
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
		<div class="col-md-6" style="background-color: #EE0202">
			<strong>Anda dinyatakan tidak lulus seleksi Open Recruitment BEM KM Fasilkom 2017.</strong>
			<strong>Tetap semangat!</strong>
		</div>
	</div>
</div>