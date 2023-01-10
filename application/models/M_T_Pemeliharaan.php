<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_T_Pemeliharaan extends CI_Model {
	private $_table="temp_pemeliharaan";

	public $id_temp_pemeliharaan;
	public $id_user;
	public $tgl_usulan;
	public $kode_barang;
	public $kuantitas;
	public $session_id;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
   function temp_list($id_user){
        // $hasil=$this->db->get($this->_table);
        // return $hasil->result();
        $this->db->select('*');
    $this->db->where('id_user',$id_user);
        $this->db->from($this->_table);
        return $this->db->get()->result();
        
    }
    public function getbyidpost($id)
    {

    	$this->db->where(["id_post" => $id]);
        $this->db->order_by('datetime','ASC');
        return $this->db->get($this->_table)->result();
    }
    
    public function get_id_temp()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $this->db->where(["id_temp_pemeliharaan" => $id]);
        return $this->db->get($this->_table)->result();
    }
    
    public function get_keranjang($id)
    {
        $this->db->where(["id_user" => $id]);
        //$this->db->where(["session_id" => $unik]);
        return $this->db->get($this->_table)->result();
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
    
    public function save()
    {
        // var_dump($id);die;
        $post = $this->input->post();
        
        $this->id_user = $this->session->userdata('id_user');
        $this->tgl_usulan = Date('Y-m-d');
        $this->kode_barang = $post["kode_barang"];
        $this->nama_barang = $post["nama_barang"];
        $this->kuantitas = $post["kuantitas"];
        $this->satuan = $post["satuan"];
        $this->keterangan = $post["keterangan"];
        $this->session_id = uniqid();
        // $this->session_id = $this->session->session_id();
        // //$this->datetime = $date->format('Y-m-d H:i:s');
        $this->db->insert($this->_table, $this);
    }
     public function update_temp()
    {
        // var_dump($id);die;
        $post = $this->input->post();
        
         $this->id_user = $this->session->userdata('id_user');
         $this->tgl_usulan = Date('Y-m-d');
         $id = $post["id_temp"];
         $this->id_temp_pemeliharaan = $post["id_temp"];
         $this->kode_barang = $post["kode_barang"];
         $this->nama_barang = $post["nama_barang"];
         $this->kuantitas = $post["kuantitas"];
         $this->satuan = $post["satuan"];
         $this->keterangan = $post["keterangan"];
         $this->session_id = uniqid();
        // $this->session_id = $this->session->session_id();
        // //$this->datetime = $date->format('Y-m-d H:i:s');
        $this->db->where('id_temp_pemeliharaan',$id);
        $this->db->update($this->_table, $this);
    }
    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_post" => $id));
    }
    
    public function delete_temp()
    {
        $post = $this->input->post();
        //var_dump($post);
        $id = $post["id"];
        return $this->db->delete($this->_table, array("id_temp_pemeliharaan" => $id));
    }
    public function delete_temp_by_id($id)
    {
        return $this->db->delete($this->_table, array("id_temp_pemeliharaan" => $id));
    }
    
  
    
}

/* End of file log_model.php */
/* Location: ./application/models/M_Post.php */