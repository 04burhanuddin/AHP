<style type="text/css">
		body {
			<?php echo $url; ?>
		}
	</style>
<div class="row">
	<div class="col-md-12">
		<div class="text-center">
			<h3><b>Penilaian Pakan Ternak Ayam Broiler (PPTAB)</b></h3><br>
			<h4><b>Balai Besar Pelatihan Peternakan (BBPP) KLATEN</b></h4>
		</div>
	</div>
	<!-- <div class="col-md-8 text-left">
		<strong style="font-size:18pt;">Penilaian Karyawan Tenaga Harian Lepas (THL)</strong>
	</div> -->
	<table class="table table-responsive">
		<thead>
			<tr>
				<th>Nama</th>
				<th>Nilai</th>
				<th>Ranking</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$dat=array();
			foreach ($nama_alternatif as $key => $value) {
				array_push($dat, [$rank[$key], $value->nama, $ahp[$key]]);
			}
				asort($dat);
				foreach ($dat as $key){

					echo "<tr>
						 <td class='info'>$key[1]</td>";
					echo '<td class="success">' . @$key [2] . '</td>';
					echo '<td class="warning">' . @$key [0] . '</td>';
					echo "</tr>";
				}
			
			?>
		</tbody>
	</table>

	<div class="col-md-12">
		<div class="text-right">
			Yang bertanggung Jawab
			<br><br><br><br>
			<?php echo $nama; ?>
		</div>
	</div>

</div>

<script type="text/javascript">
	window.print();
</script>