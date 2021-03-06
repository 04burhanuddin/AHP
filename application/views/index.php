</style>
</style>
<div class="row" >
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="jumbotron" id="gambar">
			<div class="row" >

				<div class="col-lg-12">
					<center>
					<img src="<?php echo base_url('assets/images/LOGO_KABUPATEN_KLATEN.png'); ?>" style="width: 120px; margin-left: 30px" class="center">	
					<h2 style="text-shadow: 2px 2px white ;">Sistem Pendukung Keputusan Pemilihan Pakan Ayam Broiler</h2>

						<p style="text-shadow: 2px 2px white;">DESA MUTIHAN GANTIWARNO KLATEN</p>
					</center>
				</div>
			</div>
		</div>
		<!-- <div id="container2" style="min-width: 100%; height: 400px; margin: 0 auto"></div> -->
		<br />
		<div class="row">
			<div class="col-xs-8 col-sm-8 col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Nilai Preferensi</h3>
					</div>
					<div class="panel-body">
						<ol>
							<?php
							foreach ($nilai_preferensi as $key => $value) {
								echo "$key. $value ($key)<br>";
							}
							?>
						</ol>
					</div>
				</div>
			</div>
			<div class="col-xs-8 col-sm-8 col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Kriteria</h3>
					</div>
					<div class="panel-body">
						<ol>
							<?php
							foreach ($kriteria as $key => $value) {
								echo ($key + 1) . ". $value->nama<br>";
							}
							?>
						</ol>
					</div>
				</div>
			</div>
			<div class="col-xs-8 col-sm-8 col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Alternatif</h3>
					</div>
					<div class="panel-body">
						<ol>
							<?php
							foreach ($alternatif as $key => $value) {
								echo ($key + 1) . ". $value->nama<br>";
							}
							?>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/highcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/exporting.js"></script>
<script>
	var chart1; // globally available
	$(document).ready(function() {
		chart1 = new Highcharts.Chart({
			chart: {
				renderTo: 'container2',
				type: 'column'
			},
			title: {
				text: 'Grafik Usulan'
			},
			xAxis: {
				categories: ['Alternatif']
			},
			yAxis: {
				title: {
					text: 'Jumlah Nilai'
				}
			},
			series: [

			]
		});
	});
</script>
</body>

</html>