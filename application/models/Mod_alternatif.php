<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_alternatif extends CI_Model
{

	var $table = 'alternatif';
	var $table2 = 'hasil_alternatif';

	function get_group()
	{

		$this->db->select('alternatif.*');
		$this->db->from('alternatif');
		$this->db->join('hasil_alternatif', '(hasil_alternatif.alternatif1 = alternatif.id or hasil_alternatif.alternatif2 = alternatif.id)');
		$this->db->group_by('alternatif.id');
		return $this->db->get()->result();
	}





	function get_id($id) // cek validation for insert / update date if therea a same name in a row
	{
		$query = $this->db->get_where($this->table, 'id ="' . $id . '"')->row();

		return $query;
	}



	function get_nama($id)
	{
		$this->db->select('id, nama');
		$this->db->from($this->table);
		$query = $this->db->get()->row();
		return $query;
	}



	function search_idi($nob)
	{
		$this->db->like('No Pakan', $nob, 'both');
		$this->db->orde_by('No Pakan', 'asc');
		$this->db->limit(10);
		return $this->db->get($this->table)->result();
	}
}

/* End of file Alternatif.php */
/* Location: ./application/models/Alternatif.php */