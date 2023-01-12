<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_D_Pengadaan extends CI_Model {
	private $_table="detail_pengadaan";

    function tampil_detail(){
        $post = $this->input->post();
        $id = $post['id'];
        $sql = "SELECT * FROM head_pengadaan a
                LEFT JOIN detail_pengadaan b on a.id_pengadaan = b.id_pengadaan 
                LEFT JOIN Subkegiatan on b.id_subkegiatan = Subkegiatan.id_subkegiatan 
                LEFT JOIN kegiatan on kegiatan.id_kegiatan = Subkegiatan.id_kegiatan 
                LEFT JOIN Program on program.id_program = Kegiatan.id_program 
                LEFT JOIN Uraian on Uraian.id_uraian = b.id_uraian 
                LEFT JOIN users on a.id_user = users.id_user
                where a.id_pengadaan = ".$id."";


    	return $this->db->query($sql)->result();  
        
    }

    function tampil_persetujuan_rtp(){
        $post = $this->input->post();
        $id = $post['id'];
        $status = 2;
        $sql = "SELECT * FROM head_pengadaan a
                JOIN detail_pengadaan b on a.id_pengadaan = b.id_pengadaan 
                JOIN Subkegiatan on b.id_subkegiatan = Subkegiatan.id_subkegiatan 
                JOIN kegiatan on kegiatan.id_kegiatan = Subkegiatan.id_kegiatan 
                JOIN Program on program.id_program = Kegiatan.id_program 
                JOIN Uraian on Uraian.id_uraian = b.id_uraian 
                JOIN users on a.id_user = users.id_user
                where a.id_pengadaan = ".$id." and a.status=".$status;


    	return $this->db->query($sql)->result();  
        
    }

    function get_id_detail(){
        $post = $this->input->post();
        $id = $post['id'];
        // $this->db->where(["id_detail_pengadaan" => $id]);
        $sql = "SELECT * FROM detail_pengadaan a
                LEFT JOIN subkegiatan on a.id_subkegiatan = subkegiatan.id_subkegiatan 
                LEFT JOIN kegiatan on kegiatan.id_kegiatan = subkegiatan.id_kegiatan 
                LEFT JOIN program on program.id_program = kegiatan.id_program 
                LEFT JOIN Uraian on a.id_uraian = Uraian.id_uraian
                where a.id_detail_pengadaan =".$id;
        
        return $this->db->query($sql)->result();
        // return $this->db->get($this->_table)->result();    
        
    }
    public function update_pengadaan()
    {
        //$post = $this->input->post();
        $post = $this->input->post();
        // var_dump($post);die;
     
        //ppn = 10
        $ppn = 0.1;
        //inflasi = 10%
        $inflasi= 0.02;
        //keuntungan = 10%
        $keuntungan= 0.1;
       
         $id = $post["e_id_detail"];
         $this->nama_barang = $post["e_nama_barang"];
         $this->kuantitas = $post["e_kuantitas"];
         $this->satuan = $post["e_satuan"];
         $this->catatan = $post["e_catatan"];
         $this->id_subkegiatan = $post["e_id_subkegiatan"];
         $this->id_uraian = $post["e_id_uraian"];
         $this->spesifikasi = $post["e_spesifikasi"];
         $this->harga_satuan = $post["e_harga_satuan"];
         $this->prioritas = $post["e_prioritas"];
         $this->total_harga = $post["e_harga_satuan"] * $post["e_kuantitas"];
        //  $this->total_harga = ($post["e_harga_satuan"]*$post["e_kuantitas"])+(($post["e_harga_satuan"]*$post["e_kuantitas"])*$ppn)+(($post["e_harga_satuan"]*$post["e_kuantitas"])*$inflasi)+(($post["e_harga_satuan"]*$post["e_kuantitas"])*$keuntungan) ;
        $this->jml_realisasi = 0;
        $this->status_realisasi = 0;
        $this->isdeleted = 0;
        $this->modified_at = date('Y-m-d H:i:s');
        $this->last_user_edited = $this->session->userdata('id_user');
        
        $this->db->where('id_detail_pengadaan',$id);
        $this->db->update($this->_table, $this);
    }


	
    function Pengadaaan_list(){
        $hasil=$this->db->get('product');
        return $hasil->result();
    }
 
    function save_Pengadaaan($id,$temp){
        $this->id_Pengadaaan = $id;
        $this->nama_Pengadaaan = $temp->nama_barang;
        $this->kuantitas = $temp->kuantitas;
        $this->satuan = $temp->satuan;
        $this->keterangan = $temp->keterangan;
        $this->jml_realisasi = 0;
        $this->status_realisasi = 1;
        $this->isdeleted = 0;
        $this->last_user_edited = $this->session->userdata('id_user');
        // $this->session_id = $this->session->session_id();
        // //$this->datetime = $date->format('Y-m-d H:i:s');
        $result = $this->db->insert($this->_table, $this);
        return $result;
        
    }
 
    function update_h_Pengadaaan(){
        $product_code=$this->input->post('product_code');
        $product_name=$this->input->post('product_name');
        $product_price=$this->input->post('price');
 
        $this->db->set('product_name', $product_name);
        $this->db->set('product_price', $product_price);
        $this->db->where('product_code', $product_code);
        $result=$this->db->update('product');
        return $result;
    }
 
    function delete_h_Pengadaaan(){
        $product_code=$this->input->post('product_code');
        $this->db->where('product_code', $product_code);
        $result=$this->db->delete('product');
        return $result;
    }

    public function save_pengadaan_from_temp($x,$data)
    {
        //print_r("masuk gaes");
        
        //var_dump($y);die;
        $this->id_pengadaan = $x;
        $this->id_subkegiatan = $data->id_subkegiatan;
        $this->id_uraian = $data->id_uraian;
        $this->nama_barang = $data->nama_barang;
        $this->prioritas = $data->prioritas;
        $this->sumber_dana = $data->sumber_dana;
        $this->harga_satuan = $data->harga_satuan;
        $this->total_harga = $data->total_harga;
        $this->jenis_belanja = $data->jenis_belanja;
        $this->spesifikasi = $data->spesifikasi;
        $this->catatan = $data->catatan;
        $this->kuantitas = $data->kuantitas;
        $this->satuan = $data->satuan;
        $this->jml_realisasi = 0;
        $this->status_realisasi = 0;
        $this->isdeleted = 0;
        $this->last_user_edited = $this->session->userdata('id_user');
        
    	 $this->db->insert($this->_table, $this);
    }

    public function delete_detail()
    {
        $post = $this->input->post();
        //var_dump($post);
        $id = $post["id"];
        return $this->db->delete($this->_table, array("id_detail_pengadaan" => $id));
    }

    public function save_pengadaan_from_edit()
    {
        //print_r("masuk gaes");
        
        //var_dump($y);die;
        $post = $this->input->post();
        //var_dump($post->nama_barang);die;
        //ppn = 10%
        $ppn = 0.1;
        //inflasi = 10%
        $inflasi= 0.02;
        //keuntungan = 10%
        $keuntungan= 0.1;
        

        $this->id_pengadaan = $post["e_id_pengadaan"];
        $this->nama_barang = $post["e_nama_barang"];
        $this->kuantitas = $post["e_kuantitas"];
        $this->satuan = $post["e_satuan"];
        $this->id_subkegiatan = $post["e_id_subkegiatan"];
        $this->id_uraian = $post["e_id_uraian"];
        $this->harga_satuan = $post["e_harga_satuan"];
        $this->sumber_dana = $post["e_sumber_dana"];
        $this->prioritas = $post["e_prioritas"];
        $this->spesifikasi = $post["e_spesifikasi"];
        $this->catatan = $post["e_catatan"];
        $this->jenis_belanja = $post["e_jenis_belanja"];
        $this->total_harga = $post["e_harga_satuan"] * $post["e_kuantitas"];
        // $this->total_harga = ($post["harga_satuan"]*$post["kuantitas"])+(($post["harga_satuan"]*$post["kuantitas"])*$ppn)+(($post["harga_satuan"]*$post["kuantitas"])*$inflasi)+(($post["harga_satuan"]*$post["kuantitas"])*$keuntungan) ;
        $this->jml_realisasi = 0;
        $this->status_realisasi = 0;
        $this->isdeleted = 0;
        $this->last_user_edited = $this->session->userdata('id_user');
        
    	 $this->db->insert($this->_table, $this);
    }
    

     

}

/* End of file log_model.php */
/* Location: ./application/models/M_Post.php */