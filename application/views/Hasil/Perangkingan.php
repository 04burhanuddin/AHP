<style type="text/css">
		body {
			<?php echo $url; ?>
		}
	</style>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12">
		<div class="row">
			<div class="col-md-8 text-left">
				<strong style="font-size:18pt;"><span class="fa fa-table"></span> Penilaian Pakan Ayam Broiler</strong>
			</div>
			<div class="col-md-4 text-right">
				<a href="<?php echo site_url('kriteria/print_doc'); ?>" target="_blank" class="btn btn-danger">Print</a>
				<!-- <button onclick="window.print()" class="btn btn-dark" id="print">Print</button> -->
			</div>
		</div>
		<br>
		<table class="table table-striped table-bordered">
			<tr>
				<th></th>
				<?php
				foreach ($kriteria as $key => $value) {
					echo "<th>$value->nama</th>";
				}
				?>
			</tr>
			<?php
			foreach ($nama_alternatif as $key => $value) {
				echo "<tr>
							<td class='info'>$value->nama</td>";
				foreach ($nilai as $keys => $values) {
					if ($value->id == $values->alternatif) {
						echo "<td class='success'>$values->prioritas</td>";
					}
				}
				echo "</tr>";
			}
			echo "<tr class='warning'>";
			echo "<td>Prioritas</td>";
			foreach ($prioritas_kriteria as $key => $value) {
				echo "<td>$value->prioritas</td>";
			}
			echo "</tr>";
			?>
		</table>

		<h3>Hasil Rangking Metode</h3>
		<table class="table table-striped table-bordered">
			<tr>
				<th>Nama</th>
				<th>Nilai</th>
				<th>Ranking</th>
			</tr>
			<?php
			$dat=array();
			foreach ($nama_alternatif as $key => $value) {
				array_push($dat, [$rank[$key], $value->nama, $ahp[$key]]);
			}
				asort($dat);
				foreach ($dat as $key){

					echo "<tr>
					<td class='info'>$key[1]</td>";
					echo '<td class="success">' . $key [2] . '</td>';
					echo '<td class="warning">' . $key [0] . '</td>';
					echo "</tr>";
				}
			
			?>
		</table>



	</div>
</div>