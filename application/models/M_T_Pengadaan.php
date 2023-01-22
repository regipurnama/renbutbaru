<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_T_Pengadaan extends CI_Model {
	private $_table="temp_pengadaan";



    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    function temp_list($id_user,$jenis_belanja){
        $sql = "SELECT * FROM temp_pengadaan a
                LEFT JOIN subkegiatan on a.id_subkegiatan = subkegiatan.id_subkegiatan
                LEFT JOIN kegiatan on subkegiatan.id_kegiatan = kegiatan.id_kegiatan
                LEFT JOIN program on program.id_program = kegiatan.id_program
                LEFT JOIN uraian on a.id_uraian = uraian.id_uraian
                LEFT JOIN users on a.id_user = users.id_user
                LEFT JOIN jenis_barang on a.jenis_barang = jenis_barang.id_jenis_barang
                LEFT JOIN tipe_barang on a.tipe_barang = tipe_barang.id_tipe_barang

                where a.id_user = ".$id_user." and a.jenis_belanja= ".$jenis_belanja;


    	return $this->db->query($sql)->result();
                
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
        $sql = "SELECT * FROM temp_pengadaan a
                LEFT JOIN subkegiatan on a.id_subkegiatan = subkegiatan.id_subkegiatan
                LEFT JOIN kegiatan on subkegiatan.id_kegiatan = kegiatan.id_kegiatan
                LEFT  JOIN program on program.id_program = kegiatan.id_program
                LEFT JOIN uraian on a.id_uraian = uraian.id_uraian
                LEFT JOIN jenis_barang on a.jenis_barang = jenis_barang.id_jenis_barang
                LEFT JOIN tipe_barang on a.tipe_barang = tipe_barang.id_tipe_barang
                where a.id_temp_pengadaan = ".$id;


    	return $this->db->query($sql)->result();
        
        
        // $this->db->where(["id_temp_pengadaan" => $id]);
        // return $this->db->get($this->_table)->result();
    }
    
    public function get_keranjang($id,$jenis_belanja)
    {
        $this->db->where(["id_user" => $id]);
        $this->db->where(["jenis_belanja" => $jenis_belanja]);
       
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
        $harga_satuan = str_replace(".", "", $post['hs']);
        // var_dump($harga_satuan);
        // echo "cekdata";
        // var_dump($_FILES);
        // var_dump($post);die;
             if($post["id_subkegiatan"]==NULL || $post["id_subkegiatan"] == 'NULL'){
            $id_subkegiatan = 0; 
        }else {
            $id_subkegiatan = $post["id_subkegiatan"];
        }
        //var_dump($post);die;
        //ppn = 10%
        $ppn = 0.1;
        //inflasi = 2%
        $inflasi= 0.02;
        //keuntungan = 10%
        $keuntungan= 0.1;
        $this->id_user = $this->session->userdata('id_user');
        $this->tgl_usulan = Date('Y-m-d');
        $this->kode_barang = '-';
        $this->nama_barang = $post["nama_barang"];
        $this->kuantitas = $post["kuantitas"];
        $this->satuan = $post["satuan"];
        // $this->keterangan = $post["keterangan"];
        $this->id_subkegiatan = $id_subkegiatan;
        $this->id_uraian = $post["id_uraian"];
        $this->sumber_dana = $post["sumber_dana"];
        $this->spesifikasi = $post["spesifikasi"];
        $this->harga_satuan =      $harga_satuan;
        $this->prioritas = $post["prioritas"];
        $this->catatan = $post["catatan"];
        $this->total_harga =      $harga_satuan*$post["kuantitas"];
        //$this->total_harga = ($post["harga_satuan"]*$post["kuantitas"])+(($post["harga_satuan"]*$post["kuantitas"])*$ppn)+(($post["harga_satuan"]*$post["kuantitas"])*$inflasi)+(($post["harga_satuan"]*$post["kuantitas"])*$keuntungan) ;
        $this->jenis_belanja = $post["jenis_belanja"];
        $this->tipe_barang = $post["id_tipe_barang"];
        $this->jenis_barang = $post["id_jenis_barang"];
        $this->nama_file = $_FILES["image"]["name"];

        
        $this->session_id = uniqid();
        // $this->session_id = $this->session->session_id();
        // //$this->datetime = $date->format('Y-m-d H:i:s');
        $this->db->insert($this->_table, $this);
    }
    public function update_temp()
    {
        // var_dump($id);die;
        $post = $this->input->post();
        // var_dump($post);
        if($post["id_subkegiatan"]==NULL || $post["id_subkegiatan"] == 'NULL'){
            $id_subkegiatan = 0; 
        }else {
            $id_subkegiatan = $post["id_subkegiatan"];
        }
        //ppn = 10%
        $ppn = 0.1;
        //inflasi = 2%
        $inflasi= 0.02;
        //keuntungan = 10%
        $keuntungan= 0.1;
        
        $this->id_user = $this->session->userdata('id_user');
        $this->tgl_usulan = Date('Y-m-d');
        $id = $post["id_temp"];
        $this->id_temp_pengadaan = $post["id_temp"];
        $this->kode_barang = "-";
        $this->id_subkegiatan = $id_subkegiatan;
        $this->id_uraian = $post["id_uraian"];
        $this->sumber_dana = $post["sumber_dana"];
        $this->spesifikasi = $post["spesifikasi"];
        $this->harga_satuan = $post["harga_satuan"];
        $this->prioritas = $post["prioritas"];
        $this->catatan = $post["catatan"];
        $this->total_harga = $post["harga_satuan"]*$post["kuantitas"];
        //$this->total_harga = ($post["harga_satuan"]*$post["kuantitas"])+(($post["harga_satuan"]*$post["kuantitas"])*$ppn)+(($post["harga_satuan"]*$post["kuantitas"])*$inflasi)+(($post["harga_satuan"]*$post["kuantitas"])*$keuntungan) ;
        $this->jenis_belanja = $post["jenis_belanja"];
        $this->tipe_barang = $post["id_tipe_barang"];
        $this->jenis_barang = $post["id_jenis_barang"];
        $this->nama_file = $_FILES["image"]["name"];

         $this->nama_barang = $post["nama_barang"];
         $this->kuantitas = $post["kuantitas"];
         $this->satuan = $post["satuan"];
         $this->catatan = $post["catatan"];
         $this->session_id = uniqid();
        // $this->session_id = $this->session->session_id();
        // //$this->datetime = $date->format('Y-m-d H:i:s');
        $this->db->where('id_temp_pengadaan',$id);
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
        return $this->db->delete($this->_table, array("id_temp_pengadaan" => $id));
    }
    public function delete_temp_by_id($id)
    {
        return $this->db->delete($this->_table, array("id_temp_pengadaan" => $id));
    }
    
  
    
}

/* End of file log_model.php */
/* Location: ./application/models/M_Post.php */