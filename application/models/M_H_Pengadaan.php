<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_H_Pengadaan extends CI_Model {
	private $_table="head_pengadaan";

	//public $id_user;
	
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


    public function get_by_id($id,$jenis_belanja)
    {

    	$this->db->where(["id_user" => $id]);
    	$this->db->where(["status" => 1]);
    	$this->db->where(["jenis_belanja" => $jenis_belanja]);
    	$this->db->order_by("id_pengadaan","DESC");
        return $this->db->get($this->_table)->result();
    }

    public function get_pengadaan_admin($jenis_belanja)
    {
    
        // $sql = "SELECT * FROM head_pengadaan 
        //         JOIN users on head_pengadaan.id_user = users.id_user
        //         where head_pengadaan.jenis_belanja = ".$jenis_belanja;
        // var_dump($_SESSION['tahun']);
        $tahun = $_SESSION['tahun'];
        $sql ="SELECT head_pengadaan.id_pengadaan,head_pengadaan.kode_pengadaan,head_pengadaan.tgl_usulan,head_pengadaan.status,head_pengadaan.jenis_belanja,head_pengadaan.id_user
        ,users.unit_kerja
        ,COUNT(detail_pengadaan.id_pengadaan) as jumlah_usulan, SUM(detail_pengadaan.total_harga) as total_anggaran
        FROM head_pengadaan 
        JOIN users on head_pengadaan.id_user = users.id_user
        JOIN detail_pengadaan on detail_pengadaan.id_pengadaan = head_pengadaan.id_pengadaan
        where head_pengadaan.jenis_belanja = ".$jenis_belanja."  and detail_pengadaan.id_uraian != 0 and head_pengadaan.tahun_anggaran = ".$tahun."
        GROUP BY head_pengadaan.id_pengadaan,head_pengadaan.kode_pengadaan,head_pengadaan.tgl_usulan,head_pengadaan.status,head_pengadaan.jenis_belanja,head_pengadaan.id_user";
        // and detail_pengadaan.id_subkegiatan != 0
    	return $this->db->query($sql)->result();
    }
    public function get_pengadaan_user($id,$jenis_belanja)
    {

        //$this->db->where(["id_user" => $id]);
        
        // $sql = "SELECT * FROM head_pengadaan 
        //         JOIN users on head_pengadaan.id_user = users.id_user 
        //         where head_pengadaan.id_user = ".$id." and head_pengadaan.jenis_belanja =".$jenis_belanja;
          $tahun = $_SESSION['tahun'];
          $sql ="SELECT head_pengadaan.id_pengadaan,head_pengadaan.kode_pengadaan,head_pengadaan.tgl_usulan,head_pengadaan.status,head_pengadaan.jenis_belanja,head_pengadaan.id_user
          ,users.unit_kerja
          ,COUNT(detail_pengadaan.id_pengadaan) as jumlah_usulan, SUM(detail_pengadaan.total_harga) as total_anggaran
          FROM head_pengadaan 
          JOIN users on head_pengadaan.id_user = users.id_user
          JOIN detail_pengadaan on detail_pengadaan.id_pengadaan = head_pengadaan.id_pengadaan
          where head_pengadaan.jenis_belanja = ".$jenis_belanja." and head_pengadaan.id_user = ".$id." and detail_pengadaan.id_uraian != 0 and head_pengadaan.tahun_anggaran = ".$tahun."
          GROUP BY head_pengadaan.id_pengadaan,head_pengadaan.kode_pengadaan,head_pengadaan.tgl_usulan,head_pengadaan.status,head_pengadaan.jenis_belanja,head_pengadaan.id_user
          ";
    // and detail_pengadaan.id_subkegiatan != 0
    	

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
    
    public function save_pengadaan($tgl_usulan,$jenis_belanja)
    {
        $tahun = $_SESSION['tahun'];
        // var_dump($id);die;
        // mengambil data barang dengan kode paling besar
            $query = "SELECT if(max(id_pengadaan) is null, 0, max(id_pengadaan) ) as kodeTerbesar FROM head_pengadaan";
            $data = $this->db->query($query)->result();
            // var_dump($data[0]->kodeTerbesar);
            $kodeBarang = $data[0]->kodeTerbesar;
            
            // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
            // dan diubah ke integer dengan (int)
            $urutan = $kodeBarang;
            //var_dump($urutan);
            
            // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
            $urutan++;
            //die;
        
            // membentuk kode barang baru
            // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
            // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
            // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
            // $huruf = "BRG";
            $kodeBarang = sprintf("%04s", $urutan);

        if($jenis_belanja == 1){
            $this->kode_pengadaan = 'RKBU-RSJ/'.date('Ymd').'/BLJ-BarJas/'.$this->session->userdata('id_user').'/'.$kodeBarang;
        }else if($jenis_belanja == 2){
            $this->kode_pengadaan = 'RKBU-RSJ/'.date('Ymd').'/BLJ-Modal/'.$this->session->userdata('id_user').'/'.$kodeBarang;
        }else if($jenis_belanja == 0){
            $this->kode_pengadaan = 'RKBU-RSJ/'.date('Ymd').'/BLJ-Peg/'.$this->session->userdata('id_user').'/'.$kodeBarang;
        }
       /// var_dump($this->kode_permohonan);die;
        $this->id_user = $this->session->userdata('id_user');
        $this->tgl_usulan = $tgl_usulan;
        $this->status = 1;
        $this->jenis_belanja = $jenis_belanja;
        $this->tahun_anggaran = $tahun;
        $this->is_tombol  = 1;
    	$this->db->insert($this->_table, $this);
    }
    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_pengadaan" => $id));
    }

    public function kirim_rtp(){
        $post = $this->input->post();
        $this->status = 2;
        $this->db->where('id_pengadaan',$post['id']);
        $this->db->update($this->_table, $this);
    }
    public function get_cetak_belanja($id){
        // $post = $this->input->post();
        //trim($id);
        //var_dump($id);die;
        $query="SELECT head_pengadaan.tgl_usulan,head_pengadaan.status, head_pengadaan.id_user,users.unit_kerja, 
                            CASE WHEN head_pengadaan.jenis_belanja =0 
                            THEN 'Belanja Pegawai' 
                            WHEN head_pengadaan.jenis_belanja =1 
                            THEN 'Belanja Barang Dan Jasa'
                            ELSE 'Belanja Modal'
                            END as jenis_belanja, 
                            program.kodering_program, program.nama_program,
                            kegiatan.kodering_kegiatan,kegiatan.nama_kegiatan,
                            subkegiatan.kodering_subkegiatan,subkegiatan.nama_subkegiatan,
                            uraian.kodering_uraian,uraian.nama_uraian,					
                            detail_pengadaan.nama_barang,detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan,
                            UPPER(detail_pengadaan.sumber_dana) as sumber_dana
                            
                  FROM head_pengadaan 
                  JOIN users on head_pengadaan.id_user = users.id_user
                  JOIN  detail_pengadaan on detail_pengadaan.id_pengadaan = head_pengadaan.id_pengadaan
                    JOIN subkegiatan on subkegiatan.id_subkegiatan = detail_pengadaan.id_subkegiatan
                    join kegiatan on kegiatan.id_kegiatan = subkegiatan.id_kegiatan
                    join program on program.id_program = kegiatan.id_program
                    join uraian on uraian.id_uraian = detail_pengadaan.id_uraian
                            
                  where  detail_pengadaan.id_subkegiatan != 0 and head_pengadaan.id_pengadaan = ".$id."  
                  GROUP BY  head_pengadaan.tgl_usulan,head_pengadaan.status,head_pengadaan.jenis_belanja,head_pengadaan.id_user
                  ,users.unit_kerja, 
                            program.kodering_program, program.nama_program,
                            kegiatan.kodering_kegiatan,kegiatan.nama_kegiatan,
                            subkegiatan.kodering_subkegiatan,subkegiatan.nama_subkegiatan,
                            uraian.kodering_uraian,uraian.nama_uraian,
                            detail_pengadaan.sumber_dana,
                            
                            detail_pengadaan.nama_barang,detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan
                            order by users.unit_kerja,head_pengadaan.jenis_belanja, program.kodering_program,kegiatan.kodering_kegiatan,subkegiatan.kodering_subkegiatan,uraian.kodering_uraian";
            return $this->db->query($query)->result();                 
    }
}

/* End of file log_model.php */
/* Location: ./application/models/M_Post.php */