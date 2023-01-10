<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_D_Pemeliharaan extends CI_Model {
	private $_table="detail_pemeliharaan";

	
   
    function tampil_detail(){
        $post = $this->input->post();
        $id = $post['id'];
        $sql = "SELECT * FROM head_pemeliharaan a
                JOIN detail_pemeliharaan b on a.id_pemeliharaan = b.id_pemeliharaan 
                JOIN users on a.id_user = users.id_user
                where a.id_pemeliharaan = ".$id."";


    	return $this->db->query($sql)->result();
        
        
        
    }
   
    function get_id_detail(){
        $post = $this->input->post();
        $id = $post['id'];
        $this->db->where(["id_detail_pemeliharaan" => $id]);
        return $this->db->get($this->_table)->result();    
        
    }
    
    public function update_pemeliharaan()
    {
        $post = $this->input->post();
      //  var_dump($post);die;
        
         $id = $post["id_detail"];
         $this->nama_pemeliharaan = $post["nama_barang"];
         $this->kuantitas = $post["kuantitas"];
         $this->satuan = $post["satuan"];
         $this->keterangan = $post["keterangan"];
         $this->jml_realisasi = 0;
        $this->status_realisasi = 0;
        $this->isdeleted = 0;
        $this->modified_at = date('Y-m-d H:i:s');
        $this->last_user_edited = $this->session->userdata('id_user');
        
        $this->db->where('id_detail_pemeliharaan',$id);
        $this->db->update($this->_table, $this);
    }

     public function save_pemeliharaan_from_temp($x,$data)
    {
        //print_r("masuk gaes");
        
        //var_dump($y);die;
        $this->id_pemeliharaan = $x;
        $this->nama_pemeliharaan = $data->nama_barang;
        $this->kuantitas = $data->kuantitas;
        $this->satuan = $data->satuan;
        $this->keterangan = $data->keterangan;
        $this->jml_realisasi = 0;
        $this->status_realisasi = 0;
        $this->isdeleted = 0;
        $this->last_user_edited = $this->session->userdata('id_user');
        
    	 $this->db->insert($this->_table, $this);
    }
     
    public function save_pemeliharaan_from_edit()
    {
        //print_r("masuk gaes");
        
        //var_dump($y);die;
        $post = $this->input->post();
        //var_dump($post->nama_barang);die;
        $this->id_pemeliharaan = $post["id_pemeliharaan"];
        $this->nama_pemeliharaan = $post["nama_barang"];
        $this->kuantitas = $post["kuantitas"];
        $this->satuan = $post["satuan"];
        $this->keterangan = $post["keterangan"];
        $this->jml_realisasi = 0;
        $this->status_realisasi = 0;
        $this->isdeleted = 0;
        $this->last_user_edited = $this->session->userdata('id_user');
        
    	 $this->db->insert($this->_table, $this);
    }
     

}

/* End of file log_model.php */
/* Location: ./application/models/M_Post.php */