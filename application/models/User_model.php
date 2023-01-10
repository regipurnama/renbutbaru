<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model {
	

	public function getAllLog()
	{
		$this->db->select('*');
		$this->db->from('log');
		//$this->db->join('ms_divisi', 'ms_siswa_prestasi.sekolah = ms_divisi.divisi_id','left');
		$query = $this->db->get();

		return $query->result();
	}

	public function getLogbyIsi($sekolah)
	{
		
	}

	public function getLogByID($id)
	{
		$query = $this->db->get_where('log', array('id' => $id));

		return $query->result();
	}


	public function deleteLog($id)
	{
		$this->db->delete('log', array('id' => $id));
	}

	public function addLog($data)
	{
		if($this->db->insert('log',$data)){
			return true;
		}else{
			return false;
		}
	}
	

}

/* End of file log_model.php */
/* Location: ./application/models/log_model.php */