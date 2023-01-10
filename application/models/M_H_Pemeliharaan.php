<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_H_Pemeliharaan extends CI_Model {
	private $_table="head_pemeliharaan";

	public $id_user;
	
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    public function getbyidpost($id)
    {

    	$this->db->where(["id_post" => $id]);
        $this->db->order_by('datetime','ASC');
        return $this->db->get($this->_table)->result();
    }


    public function get_by_id($id)
    {

    	$this->db->where(["id_user" => $id]);
    	$this->db->where(["status" => 1]);
        return $this->db->get($this->_table)->result();
    }
    
    public function get_pemeliharaan_admin()
    {

        $sql = "SELECT * FROM head_pemeliharaan 
                JOIN users on head_pemeliharaan.id_user = users.id_user";

    	return $this->db->query($sql)->result();
    }
   
    public function get_pemeliharaan_user($id)
    {

        //$this->db->where(["id_user" => $id]);
        
        $sql = "SELECT * FROM head_pemeliharaan 
                JOIN users on head_pemeliharaan.id_user = users.id_user 
                where head_pemeliharaan.id_user = ".$id."";


    	return $this->db->query($sql)->result();
    }

    public function getcomuserbyidpost($id)
    {

        $this->db->select('*');
        $this->db->from('comments');
        $this->db->join('users', 'users.id_user = comments.id_user');
        $this->db->where(["comments.id_post" => $id]);
        $this->db->order_by('comments.datetime ASC');
        return $this->db->get()->result();
    }
    
    public function save_pemeliharaan($tgl_usulan)
    {
        // var_dump($id);die;
        $this->kode_permohonan = 'RKBU-RSJ/'.date('Ymd').'/PML/'.$this->session->userdata('id_user');
       // var_dump($this->kode_permohonan);die;
        $this->id_user = $this->session->userdata('id_user');
        $this->tgl_usulan = $tgl_usulan;
        $this->status = 1;
    	$this->db->insert($this->_table, $this);
    }
    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_pemeliharaan" => $id));
    }
}

/* End of file log_model.php */
/* Location: ./application/models/M_Post.php */