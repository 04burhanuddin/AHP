<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alternatif extends CI_Controller
{

	var $bobot = array(
		'1' => 'Sama Penting Dengan (1)',
		'2' => 'Mendekati Sedikit Lebih Penting (2)',
		'3' => 'Sedikit Lebih Penting (3)',
		'4' => 'Mendekati Lebih Penting (4)',
		'5' => 'Lebih Penting (5)',
		'6' => 'Mendekati Lebih Penting (6)',
		'7' => 'Sangat Penting (7)',
		'8' => 'Mendekati Mutlak (8)',
		'9' => 'Mutlak Sangat Penting (9)',
	);



	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('nama'))) {
			redirect('Login', 'refresh');
		} else {

			$this->load->model('crud');
			$this->load->model('AHP');
			$this->load->model('AHP2');
			$this->load->model('Mod_alternatif');
			$this->load->model('Mod_kriteria');
		}
		//Do your magic here
	}

	public function index()
	{
		$data = array(
			//bawaan
			'role' => $this->session->userdata('ha'),
			'nama' => $this->session->userdata('nama'),
			'nilai_preferensi' => $this->bobot,
			//tambahan
			'data' => $this->crud->alternatif(),
			'bobot' => $this->bobot,
			'kriteria' => $this->crud->kriteria(),
			'url' => 'background-image: url("../assets/images/images.jpg");',
		);

		//echo str_replace(['],[','[[',']]'],'<br>',json_encode($data)); echo '<hr>';

		$this->load->view('Header', $data);
		$this->load->view('alternatif/Nindex');
		$this->load->view('Footer');
	}

	public function nilai_awal()
	{
		$data = array(
			//bawaan
			'role' => $this->session->userdata('ha'),
			'nama' => $this->session->userdata('nama'),
			//tambahan
			'bibit' => $this->db->get('alternatif')->result(),
			'kriteria' => $this->db->get('kriteria')->result(),
			'data' => $this->db->query('SELECT *, nilai_awal.id as idnilai from nilai_awal, alternatif WHERE alternatif.id = nilai_awal.id_alternatif')->result(),
			'url' => 'background-image: url("../../assets/images/back5.png");',
		);

		$this->load->view('Header', $data, FALSE);
		$this->load->view('alternatif/Nilai');
		$this->load->view('Footer');

		//$this->pre($data);
	}

	function nilai_detail()
	{
		$id = $this->input->post('rowid');

		$data['data'] = $this->Mod_alternatif->get_nilai($id);
		#$this->pre($data);
		$this->load->view('Modal/Nilai_detail', $data);
	}

	function get_id_complete()
	{
		if (isset($_GET['term'])) {
			$result = $this->Mod_alternatif->search_id($_GET['term']);
			if (count($result) > 0) {
				foreach ($result as $key => $value) {
					$arr_result[] = $value->ID;
					echo json_encode($arr_result);
				}
			}
		}
	}

	function get_edit_nilai()
	{
		$id = $this->input->post('rowid');

		$nilai = $this->Mod_alternatif->get_nilai($id);

		foreach ($nilai as $key => $value) {
			$data['nilai'][] = $value->nilai;
			$nama = $value->nama;
			$idv = $value->id;
		}

		$data['nama'] = $nama;
		$data['id'] = $idv;
		$data['kriteria'] = $this->Mod_kriteria->get_kriteria();

		$this->load->view('Modal/Edit_nilai', $data);
	}


	public function perbandingan_alternatif()
	{
		//$input = $this->input->post();
		//$id = $this->input->post('kriteria');

		//echo str_replace(['],[','[[',']]'],'<br>',json_encode($inputan['alternatif1'][1][2])); echo '<hr>';

		$data = array(
			//bawaan
			'role' => $this->session->userdata('ha'),
			'nama' => $this->session->userdata('nama'),
			//tambahan
			'data' => $this->db->get('hasil_alternatif')->result(),
			'data_id' => $this->db->group_by('kriteria')->get('hasil_alternatif')->result(),
			'alke' => $this->crud->alternatif(),
			'kriteria' => $this->db->get_where('kriteria')->result(),
			'url' => 'background-image: url("../../assets/images/back5.png");',

		);

		$ahp = $this->AHP2->perbandingan_alternatif($data['alke'], $data['data']);
		$data['ahp1'] = $ahp;
		/*$this->pre($ahp);
		die;*/
		$ahp = $this->AHP2->normalisasi_prioritas($data['alke'], $data['data'], $ahp);
		$data['ahp2'] = $ahp;
		/*$this->pre($ahp);
		die;*/

		//echo str_replace(['],[','[[',']]'],'<br>',json_encode($ahp)); echo '<hr>';

		/*$ahp = $this->AHP->perbandingan_alternatif($data['alke'], $data['input']);
		echo str_replace(['],[','[[',']]'],'<br>',json_encode($ahp)); echo '<hr>';
		$data['ahp'] = $ahp;
		$ahp = $this->AHP->normalisasi_prioritas($data['alke'], $ahp);
		echo str_replace(['],[','[[',']]'],'<br>',json_encode($ahp)); echo '<hr>';
		$data['ahp2'] = $ahp;

		echo str_replace(['],[','[[',']]'],'<br>',json_encode($ahp)); echo '<hr>';
		$this->load->view('test/hasil',$data);*/
		$this->load->view('Header', $data, FALSE);
		$this->load->view('alternatif/Nilai_prio');
		$this->load->view('Footer');
	}

	public function hasil_perhitungan()
	{

		$data = array(
			//bawaan
			'role' => $this->session->userdata('ha'),
			'nama' => $this->session->userdata('nama'),
			//tambahan
			'alternatif' => $this->db->group_by('alternatif')->get('prioritas_alternatif')->result(),
			'kriteria' => $this->db->group_by('kriteria')->get('prioritas_kriteria')->result(),
		);
		/* $this->load->view('Header', $data);
		$this->load->view('hasil/perangkingan');
		$this->load->view('Footer'); */
		$this->pre($data);
	}

	public function perbandingan_alternatif_single()
	{
		$input = $this->input->post();
		$id = $this->input->post('kriteria');

		/*$this->pre($id);
		die;*/

		$data = array(
			//bawaan
			'role' => $this->session->userdata('ha'),
			'nama' => $this->session->userdata('nama'),
			//tambahan
			'data' => $this->db->get('hasil_alternatif')->result(),
			'data_id' => $this->db->group_by('kriteria')->get('hasil_alternatif')->result(),
			'alke' => $this->crud->alternatif(),
			'kriteria' => $this->db->get_where('kriteria', 'id="' . $id . '"')->row(),
			'input' => $this->input->post('kriteria'),
			'url' => 'background-image: url("../../assets/images/back5.png");',
		);

		$ahp = $this->AHP->perbandingan_alternatif($data['alke'], $input);
		$data['ahp1'] = $ahp;
		/*$this->pre($ahp);
		die;*/
		$ahp = $this->AHP->normalisasi_prioritas($data['alke'], $ahp);
		$data['ahp2'] = $ahp;

		/*$this->pre($ahp);
		die;*/

		$this->load->view('Header', $data, FALSE);
		$this->load->view('alternatif/single');
		$this->load->view('Footer');

		#$this->pre($data);

	}

	public function analisa()
	{
		$data = array(
			//bawaan
			'role' => $this->session->userdata('ha'),
			'nama' => $this->session->userdata('nama'),
			'bobot' => $this->bobot,
			//tambahan

			'kriteria' => $this->db->get('kriteria')->result(),
			'alternatif' => $this->db->get('alternatif')->result(),
			'url' => 'background-image: url("../../assets/images/back5.png");',
		);

		#SELECT alternatif.id as ,  alternatif.nama AS nater, nilai_awal.nilai as nilai_awal, nilai_detail.nilai as nilai_detail, nilai_awal.keterangan FROM nilai_awal, nilai_detail, alternatif where nilai_detail.id_nilai_awal = nilai_detail.id and alternatif.id = nilai_awal.id_alternatif

		$this->load->view('Header', $data, FALSE);
		$this->load->view('Alternatif/Analisa');
		$this->load->view('Footer');

		#$this->pre($data);

	}

	function get_kriteria()
	{
		$id = $this->input->post('kriteria');
		$alternatif = $this->db->get('alternatif')->result();
		$bobot = $this->bobot;

		foreach ($alternatif as $key => $value) {
			foreach ($alternatif as $keys => $values) {

				if ($key < $keys) {

					echo '<div class="row">';

					echo '<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<input type="text" class="form-control" readonly value="' . $value->nama . '"">
								<input type="hidden" class="form-control" readonly value="' . $value->id . '" name="alternatif1[' . $key . '][' . $keys . ']">
							</div>
						  </div>';
					echo '<div class="col-xs-12 col-md-6">
							<div class="form-group">';
					echo "<select name='bobot[$key][$keys]' class='form-control'>";
					$cek = $this->db->query('select * from hasil_alternatif where kriteria = ? and alternatif1 = ? and alternatif2 = ?', array($id, $value->id, $values->id))->row();
					if ($cek != null) {
						if ($cek->bobot == 1) {

							echo "<option value='$cek->bobot'>$cek->bobot-Sama Penting</option>";
						} elseif ($cek->bobot == 2) {
							echo "<option value='$cek->bobot'>$cek->bobot-Mendekati Sedikit Lebih Penting</option>";
						} elseif ($cek->bobot == 3) {
							echo "<option value='$cek->bobot'>$cek->bobot-Sedikit Lebih Penting</option>";
						} elseif ($cek->bobot == 4) {
							echo "<option value='$cek->bobot'>$cek->bobot-Mendekati Lebih Penting</option>";
						} elseif ($cek->bobot == 5) {
							echo "<option value='$cek->bobot'>$cek->bobot-Lebih Penting</option>";
						} elseif ($cek->bobot == 6) {
							echo "<option value='$cek->bobot'>$cek->bobot-Mendekati Lebih Penting</option>";
						} elseif ($cek->bobot == 7) {
							echo "<option value='$cek->bobot'>$cek->bobot-Sangat Penting</option>";
						} elseif ($cek->bobot == 8) {
							echo "<option value='$cek->bobot'>$cek->bobot-Mendekati Mutlak</option>";
						} else {
							echo "<option value='$cek->bobot'>$cek->bobot-Mutlak Sangat Penting</option>";
						}

						foreach ($bobot as $keyb => $valueb) {
							if ($cek->bobot == $keyb) {
							} else {
								echo "<option value='$keyb'>$keyb-$valueb</option>";
							}
						}
					} else {

						foreach ($bobot as $keyb => $valueb) {
							if ($cek->bobot == $keyb) {
							} else {
								echo "<option value='$keyb'>$keyb-$valueb</option>";
							}
						}
					}
					echo '</select></div>
							</div>';

					echo '<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<input type="text" class="form-control" readonly value="' . $values->nama . '"">
								<input type="hidden" class="form-control" readonly value="' . $values->id . '" name="alternatif2[' . $key . '][' . $keys . ']">
							</div>
						 </div>';

					echo '</div>'; //end row
				} // end if

			} // end keys
		} // end key
		//$query = $this->db->query('select * from hasil alternatif whre')
		//$this->pre($cek->bobot);
	}

	function get_edit()
	{
		$id =  $this->input->post('rowid');

		$query = $this->db->get_where('alternatif', array('id' => $id))->row();
		$now = $this->db->query('SELECT CURRENT_DATE as now')->row();
		#$max = $this->db->query('select DATE_SUB(curdate(), INTERVAL 15 Year) as now')->row();


		echo "<form action='" . site_url('alternatif/update') . "' method='post' enctype='multipart/form-data'>
				<div class='col-lg-6'>
					<input type='hidden' name='id' value='$id'>
					<label>No Pakan</label>
					<input type='text' required name='idi' class='form-control' value='$id'>
					<label>Nama Pakan</label>
					<input type='text' required name='nama' class='form-control' value='$query->nama'>
					<label>Kemasan</label>
					<input type='text' required name='kemasan' value='$query->kemasan' class='form-control'>
					<label>Asal Barang</label>
					<input type='text' name='asal' required value='$query->asal' class='form-control'>
					<label>Jenis Pakan</label>
					<input type='text' required name='jenis' class='form-control' value='$query->jenis'>
					<label>Ketegori</label>
					<input type='text' name='kategori' class='form-control' required value='$query->kategori'>
					</input>";
		echo "</select> <input type='submit' class='btn btn-success'>

				</div>
			 </form>";

		#echo json_encode($data);
	}

	function update()
	{
		$table = 'alternatif';
		$data = $this->input->post();

		$input = array(
			'id' => $data['idi'],
			'nama' => $data['nama'],
			'kemasan' => $data['kemasan'],
			'asal' => $data['asal'],
			'jenis' => $data['jenis'],
			'kategori' => $data['kategori'],

		);


		$query = $this->db->update($table, $input, array('id' => $data['id']));
		if ($query == true) {
			echo "<script>alert('Berhasil Update')</script>";
			redirect('alternatif', 'refresh');
		} else {
			echo "<script>alert('Gagal Update')</script>";
			redirect('alternatif', 'refresh');
		}
		echo json_encode($data);
	}


	//CRUD

	function ins_nilai_alternatif()
	{
		$input = $this->input->post();
		$inputan = array(
			'kriteria' => $this->input->post('kriteria'),
			'alternatif1' => $this->input->post('alternatif1'),
			'bobot' => $this->input->post('bobot'),
			'alternatif2' => $this->input->post('alternatif2'),
		);
		$cc = count($inputan['alternatif1']);

		//input bobot
		for ($i = 0; $i <= $cc; $i++) {

			for ($j = $i + 1; $j <= $cc; $j++) {

				$cek = $this->db->query('SELECT * from hasil_alternatif where kriteria = ? and alternatif1 = ? and alternatif2 = ?', array($inputan['kriteria'], $inputan['alternatif1'][$i][$j], $inputan['alternatif2'][$i][$j]))->row();
				if ($cek == true) {
					$query = $this->db->query('UPDATE hasil_alternatif set bobot = ?  where kriteria = ? and alternatif1 =? and alternatif2 = ?', array($inputan['bobot'][$i][$j], $inputan['kriteria'], $inputan['alternatif1'][$i][$j], $inputan['alternatif2'][$i][$j]));
				} else {
					$query = $this->db->query('INSERT into hasil_alternatif values("' . $inputan['kriteria'] . '","' . $inputan['alternatif1'][$i][$j] . '","' . $inputan['bobot'][$i][$j] . '","' . $inputan['alternatif2'][$i][$j] . '")');
				}
			}
		}
		#$query = $this->db->query
		//input prioritas



		if ($query == true) {
			echo '<script>alert("Berhasil");</script>';
			#redirect('Alternatif/perbandingan_alternatif', 'refresh');
			redirect('alternatif/analisa', 'refresh');
		} else {
			echo '<script>alert("Gagal");</script>';
			redirect('alternatif/analisa', 'refresh');
		}
		#$this->pre($input);
	}

	function ins_prioritas()
	{
		$input = $this->input->post();

		$inputan = array(
			'kriteria' => $this->input->post('kriteria'),
			'alternatif' => $this->input->post('alternatif'),
			'prioritas' => $this->input->post('prioritas'),
		);



		$jumlah = count($inputan['kriteria']);

		for ($i = 0; $i < $jumlah; $i++) {

			$cek = $this->db->query('SELECT * from prioritas_alternatif where kriteria = ? and alternatif = ?', array($inputan['kriteria'][$i], $inputan['alternatif'][$i]))->row();

			if ($cek == true) {
				$query = $this->db->query('UPDATE prioritas_alternatif set prioritas = ? where kriteria = ? and alternatif = ?', array($inputan['prioritas'][$i], $inputan['kriteria'][$i], $inputan['alternatif'][$i]));
			} else {
				$query = $this->db->query('INSERT into prioritas_alternatif values ("", "' . $inputan['kriteria'][$i] . '", "' . $inputan['alternatif'][$i] . '", "' . $inputan['prioritas'][$i] . '")');
			}
		}


		if ($query == true) {
			echo '<script>alert("Prioritas Tersimpan");</script>';
			#redirect('alternatif/perbandingan_alternatif', 'refresh');
			redirect('alternatif/analisa', 'refresh');
		} else {
			echo '<script>alert("Gagal");</script>';
			redirect('alternatif/analisa', 'refresh');
		}

		#$this->pre($input);
	}






	public function ins_alternatif()
	{
		$input = $this->input->post();
		$id = $this->input->post('id');

		$cek = $this->Mod_alternatif->get_id($id);

		/*$this->pre($cek);
		die;*/

		if (empty($cek) and !empty($id)) {
			$query = $this->db->insert('alternatif', $input);
			if ($query == true) {

				$this->session->set_flashdata(
					'msg',
					'<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4>Tambah Data Berhasil</h4>
				</div>'
				);

				redirect('alternatif', 'refresh');
			} else {
				$this->session->set_flashdata(
					'msg',
					'<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4>Oops ! ! GAGAL</h4>
				</div>'
				);

				redirect('alternatif', 'refresh');
			}
			#$this->pre($query);
		} else {
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4>Oops ! ! nomor id sama</h4>
				</div>'
			);

			redirect('alternatif', 'refresh');
		}
	}

	public function del_alternatif($id)
	{

		$query = $this->db->delete('alternatif', 'id = ' . $id . '');
		if ($query == true) {
			echo '<script>alert("Berhasil Delete")</script>';
			redirect('alternatif', 'refresh');
		} else {
			echo '<script>alert("Sorry")</script>';
		}
		$this->pre($query);
	}



	function pre($var)
	{
		echo '<pre>';
		print_r($var);
		echo '</pre>';
	}
}

/* End of file Kriteria.php */
/* Location: ./application/controllers/Kriteria.php */