<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Master extends CI_Model {
	

	//private $_table = "users";

   

    public function ambil_jenis_barang(){
        
        $sql = "SELECT * FROM jenis_barang";


    	return $this->db->query($sql)->result();
        
    }
    
    public function ambil_tipe_barang(){
        
        $sql = "SELECT * FROM tipe_barang";


    	return $this->db->query($sql)->result();
        
    }
    public function ambil_program(){

        $sql = "SELECT * FROM Program where isdeleted = 0";


    	return $this->db->query($sql)->result();
        
  }
    public function ambil_uraian(){
        $data = $this->input->post();

        $sql = "SELECT * FROM Uraian WHERE isdeleted = 0 and id_jenis_belanja=".$data['id_jenis_belanja'];


    	return $this->db->query($sql)->result();
        
  }
  
    public function ambil_kegiatan(){
      $data = $this->input->post();
      $sql = "SELECT * FROM Kegiatan
                JOIN program on Kegiatan.id_program = program.id_program
                where kegiatan.isdeleted = 0 and Program.id_program =".$data['id'];


    return $this->db->query($sql)->result();
            
    }
    
    public function ambil_pengguna(){
      $data = $this->input->post();
      $sql = "SELECT * FROM Users
                where Users.role != 'Admin'  ";


    return $this->db->query($sql)->result();
            
    }
    public function ambil_subkegiatan(){
    
        $data = $this->input->post();
        $sql = "SELECT * FROM Subkegiatan 
                JOIN Kegiatan on subkegiatan.id_kegiatan = Kegiatan.id_kegiatan
                JOIN program on Kegiatan.id_program = program.id_program
                where subkegiatan.isdeleted = 0 and Kegiatan.id_kegiatan =".$data['id'];


    	return $this->db->query($sql)->result();
        
  }
    public function ambil_subkegiatanmaster(){
    
        $sql = "SELECT Subkegiatan.kodering_subkegiatan,Subkegiatan.id_subkegiatan, Subkegiatan.nama_subkegiatan,
                Kegiatan.kodering_kegiatan, Kegiatan.id_kegiatan,Kegiatan.nama_kegiatan,
                Kegiatan.isdeleted,program.id_program,Program.kodering_program,Program.nama_program
            FROM Subkegiatan 
            JOIN Kegiatan on subkegiatan.id_kegiatan = Kegiatan.id_kegiatan
            JOIN program on Kegiatan.id_program = program.id_program
            where subkegiatan.isdeleted = 0
            GROUP BY Subkegiatan.kodering_subkegiatan,Subkegiatan.id_subkegiatan, Subkegiatan.nama_subkegiatan,
                Kegiatan.kodering_kegiatan, Kegiatan.id_kegiatan,Kegiatan.nama_kegiatan,
                Kegiatan.isdeleted,program.id_program,Program.kodering_program,Program.nama_program
            ORDER BY Subkegiatan.id_subkegiatan";  
            

    return $this->db->query($sql)->result();
    
    }
    public function ambil_uraianmaster(){
    
        $sql = "SELECT * FROM Uraian where isdeleted = 0 and id_jenis_belanja in(0,1,2)";  
            

        return $this->db->query($sql)->result();
    
    }
    public function ambil_kegiatanmaster(){
    
        $sql = "SELECT Kegiatan.kodering_kegiatan, Kegiatan.id_kegiatan,Kegiatan.nama_kegiatan,
                Kegiatan.isdeleted,program.id_program,Program.kodering_program,Program.nama_program
                FROM Kegiatan 
                JOIN Program on Program.id_program = Kegiatan.id_program 
                where kegiatan.isdeleted = 0
                GROUP BY Kegiatan.kodering_kegiatan, Kegiatan.id_kegiatan,Kegiatan.nama_kegiatan,
                Kegiatan.isdeleted,program.id_program,Program.kodering_program,Program.nama_program
                ORDER BY Kegiatan.id_kegiatan";  
            

        return $this->db->query($sql)->result();
    
    }
  public function ambil_subkegiatantemp(){
    
        $sql = "SELECT * FROM Subkegiatan 
                JOIN Kegiatan on subkegiatan.id_kegiatan = Kegiatan.id_kegiatan
                JOIN program on Kegiatan.id_program = program.id_program
                where subkegiatan.isdeleted = 0";
                

    	return $this->db->query($sql)->result();
        
  }
  public function ambil_kegiatantemp(){
    
        $sql = "SELECT * FROM Kegiatan 
                JOIN program on Kegiatan.id_program = program.id_program
                where kegiatan.isdeleted = 0";
                

    	return $this->db->query($sql)->result();
        
  }

  
	public function insert()
	{
		$post = $this->input->post();
        $this->name = $post["name"];
        $this->username = $post["username"];
        $this->email = $post["email"];
        $this->bio = $post["bio"];
        $this->hobby = $post["hobby"];
        $this->gender = $post["gender"];
        $this->password = $post["password"];
        $this->picture = $this->UploadImage();
        
        $this->db->insert($this->_table,$this);
 	}
 	public function check_login($user,$pass)
 	{
 		
 		$this->db->select('*');
 		$this->db->from($this->_table);
 		$this->db->where('username',$user);
 		$this->db->where('password',$pass);

 		return $this->db->get();
 	}

 	public function getById($id_user)
 	{
 		return $this->db->get_where($this->_table,["id_user" =>$id_user])->row();
 	}

 	public function update(){
 		$post = $this->input->post();
        $this->id_user = $post["id_user"];
        $this->name = $post["name"];
        $this->username = $post["username"];
        $this->email = $post["email"];
        $this->bio = $post["bio"];
        $this->hobby = $post["hobby"];
        $this->gender = $post["gender"];
        
        if($post["password"]!=NULL){
        	$this->password = $post["password"];
        }else{
        	$this->password = $post["old_password"];
        }

        if(!empty($_FILES["picture"]["name"])){
        	$this->picture = $this->UploadImage();

        }else{
        	$this->picture = $post['old_picture'];

        }
        $this->db->update($this->_table, $this, array('id_user' => $post['id_user']));
    
 	}

 	private function UploadImage(){
 		$date = new DateTime();
	    $now =  $date->format('U');
 		
 		$config['upload_path']          = './assets/img_profile/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10000000;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $new_name = $now.$_FILES['picture']['name'];
        $config['file_name']           = $new_name;
        
		$this->load->library('upload', $config);
 		
 		$path          = '../assets/img_profile/';
  		
		if ($this->upload->do_upload('picture')){
	
			$data = array('upload_data' => $this->upload->data());
			$return = $path . $new_name;
			return $return;
		}

		$return =  $path. "default.jpg";
		return $return;
	
 	}
     public function get_cetak_semua_2024($id,$role,$bidang){
        // $post = $this->input->post();
        //trim($id);
        //  var_dump($role);die;
        if($role == 'user' || $role=='only'){
            $aksi .= "and head_pengadaan.id_user = ".$id;
        }
    if($role == 'bidang'){
            $aksi .= "and users.bidang = ".$bidang ;

        }
        if($role == 'user' || $role == 'bidang' || $role=='only'){
            $query="SELECT head_pengadaan.tgl_usulan,head_pengadaan.status,
            CASE WHEN head_pengadaan.jenis_belanja =0 
            THEN 'Belanja Pegawai' 
            WHEN head_pengadaan.jenis_belanja =1 
            THEN 'Belanja Barang Dan Jasa'
            ELSE 'Belanja Modal'
            END as jenis_belanja, 
            
            head_pengadaan.id_user
                    ,users.unit_kerja, 
                                program.kodering_program, program.nama_program,
                                kegiatan.kodering_kegiatan,kegiatan.nama_kegiatan,
                                subkegiatan.kodering_subkegiatan,subkegiatan.nama_subkegiatan,
                                uraian.kodering_uraian,uraian.nama_uraian,					
                                detail_pengadaan.nama_barang,detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan,
                    UPPER(detail_pengadaan.sumber_dana) as sumber_dana,
                    jenis_barang.nama_jenis_barang, tipe_barang.nama_tipe_barang, detail_pengadaan.nama_file
                      FROM head_pengadaan 
                    JOIN users on head_pengadaan.id_user = users.id_user
                    JOIN  detail_pengadaan on detail_pengadaan.id_pengadaan = head_pengadaan.id_pengadaan
                    LEFT JOIN subkegiatan on subkegiatan.id_subkegiatan = detail_pengadaan.id_subkegiatan
                        LEFT join kegiatan on kegiatan.id_kegiatan = subkegiatan.id_kegiatan
                        LEFT join program on program.id_program = kegiatan.id_program
                        LEFT join uraian on uraian.id_uraian = detail_pengadaan.id_uraian
                        LEFT JOIN tipe_barang on     detail_pengadaan.tipe_barang = tipe_barang.id_tipe_barang    
                        LEFT JOIN jenis_barang on      detail_pengadaan.jenis_barang = jenis_barang.id_jenis_barang   
                    where   head_pengadaan.tahun_anggaran = 2024  $aksi 
                    GROUP BY  head_pengadaan.tgl_usulan,head_pengadaan.status,head_pengadaan.jenis_belanja,head_pengadaan.id_user
                    ,users.unit_kerja, 
                                program.kodering_program, program.nama_program,
                                kegiatan.kodering_kegiatan,kegiatan.nama_kegiatan,
                                subkegiatan.kodering_subkegiatan,subkegiatan.nama_subkegiatan,
                                uraian.kodering_uraian,uraian.nama_uraian,
                                
                                detail_pengadaan.nama_barang,detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan,
                    detail_pengadaan.sumber_dana,
                    jenis_barang.nama_jenis_barang, tipe_barang.nama_tipe_barang, detail_pengadaan.nama_file
                      
                                order by users.unit_kerja,head_pengadaan.jenis_belanja, 
                    detail_pengadaan.prioritas desc,detail_pengadaan.sumber_dana, 
                    program.kodering_program,kegiatan.kodering_kegiatan,subkegiatan.kodering_subkegiatan,uraian.kodering_uraian";
                // var_dump($query);die;

                return $this->db->query($query)->result();                 
        
        }else{
            $query="SELECT head_pengadaan.tgl_usulan,head_pengadaan.status,
                CASE WHEN head_pengadaan.jenis_belanja =0 
                THEN 'Belanja Pegawai' 
                WHEN head_pengadaan.jenis_belanja =1 
                THEN 'Belanja Barang Dan Jasa'
                ELSE 'Belanja Modal'
                END as jenis_belanja, 
                
                head_pengadaan.id_user
                        ,users.unit_kerja, 
                                    program.kodering_program, program.nama_program,
                                    kegiatan.kodering_kegiatan,kegiatan.nama_kegiatan,
                                    subkegiatan.kodering_subkegiatan,subkegiatan.nama_subkegiatan,
                                    uraian.kodering_uraian,uraian.nama_uraian,					
                                    detail_pengadaan.nama_barang,detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan,
                        UPPER(detail_pengadaan.sumber_dana) as sumber_dana,
                        jenis_barang.nama_jenis_barang, tipe_barang.nama_tipe_barang, detail_pengadaan.nama_file
                    
                        FROM head_pengadaan 
                        JOIN users on head_pengadaan.id_user = users.id_user
                        JOIN  detail_pengadaan on detail_pengadaan.id_pengadaan = head_pengadaan.id_pengadaan
                        LEFT JOIN subkegiatan on subkegiatan.id_subkegiatan = detail_pengadaan.id_subkegiatan
                        LEFT join kegiatan on kegiatan.id_kegiatan = subkegiatan.id_kegiatan
                        LEFT join program on program.id_program = kegiatan.id_program
                        LEFT join uraian on uraian.id_uraian = detail_pengadaan.id_uraian
                        LEFT JOIN tipe_barang on     detail_pengadaan.tipe_barang = tipe_barang.id_tipe_barang    
                        LEFT JOIN jenis_barang on      detail_pengadaan.jenis_barang = jenis_barang.id_jenis_barang   
                     
                        where  head_pengadaan.tahun_anggaran = 2024
                        GROUP BY  head_pengadaan.tgl_usulan,head_pengadaan.status,head_pengadaan.jenis_belanja,head_pengadaan.id_user
                        ,users.unit_kerja, 
                                    program.kodering_program, program.nama_program,
                                    kegiatan.kodering_kegiatan,kegiatan.nama_kegiatan,
                                    subkegiatan.kodering_subkegiatan,subkegiatan.nama_subkegiatan,
                                    uraian.kodering_uraian,uraian.nama_uraian,
                                    
                                    detail_pengadaan.nama_barang,detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan,
                        detail_pengadaan.sumber_dana,
                        jenis_barang.nama_jenis_barang, tipe_barang.nama_tipe_barang, detail_pengadaan.nama_file
                   
                                    order by users.unit_kerja,head_pengadaan.jenis_belanja, 
                        detail_pengadaan.prioritas desc,detail_pengadaan.sumber_dana, 
                        program.kodering_program,kegiatan.kodering_kegiatan,subkegiatan.kodering_subkegiatan,uraian.kodering_uraian";
                    return $this->db->query($query)->result();                 
        
        }
         }
         public function get_cetak_semua($id){
            // $post = $this->input->post();
            //trim($id);
            //var_dump($id);die;
            if($id){
                $query="SELECT head_pengadaan.tgl_usulan,head_pengadaan.status,
                CASE WHEN head_pengadaan.jenis_belanja =0 
                THEN 'Belanja Pegawai' 
                WHEN head_pengadaan.jenis_belanja =1 
                THEN 'Belanja Barang Dan Jasa'
                ELSE 'Belanja Modal'
                END as jenis_belanja, 
                
                head_pengadaan.id_user
                        ,users.unit_kerja, 
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
                                    
                        where  detail_pengadaan.id_subkegiatan != 0 and detail_pengadaan.id_uraian != 0 and head_pengadaan.id_user = $id
                        GROUP BY  head_pengadaan.tgl_usulan,head_pengadaan.status,head_pengadaan.jenis_belanja,head_pengadaan.id_user
                        ,users.unit_kerja, 
                                    program.kodering_program, program.nama_program,
                                    kegiatan.kodering_kegiatan,kegiatan.nama_kegiatan,
                                    subkegiatan.kodering_subkegiatan,subkegiatan.nama_subkegiatan,
                                    uraian.kodering_uraian,uraian.nama_uraian,
                                    
                                    detail_pengadaan.nama_barang,detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan,
                        detail_pengadaan.sumber_dana
                                    order by users.unit_kerja,head_pengadaan.jenis_belanja, 
                        detail_pengadaan.prioritas desc,detail_pengadaan.sumber_dana, 
                        program.kodering_program,kegiatan.kodering_kegiatan,subkegiatan.kodering_subkegiatan,uraian.kodering_uraian";
                    return $this->db->query($query)->result();                 
            
            }else{
                $query="SELECT head_pengadaan.tgl_usulan,head_pengadaan.status,
                    CASE WHEN head_pengadaan.jenis_belanja =0 
                    THEN 'Belanja Pegawai' 
                    WHEN head_pengadaan.jenis_belanja =1 
                    THEN 'Belanja Barang Dan Jasa'
                    ELSE 'Belanja Modal'
                    END as jenis_belanja, 
                    
                    head_pengadaan.id_user
                            ,users.unit_kerja, 
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
                                        
                            where  detail_pengadaan.id_subkegiatan != 0 and detail_pengadaan.id_uraian != 0
                            GROUP BY  head_pengadaan.tgl_usulan,head_pengadaan.status,head_pengadaan.jenis_belanja,head_pengadaan.id_user
                            ,users.unit_kerja, 
                                        program.kodering_program, program.nama_program,
                                        kegiatan.kodering_kegiatan,kegiatan.nama_kegiatan,
                                        subkegiatan.kodering_subkegiatan,subkegiatan.nama_subkegiatan,
                                        uraian.kodering_uraian,uraian.nama_uraian,
                                        
                                        detail_pengadaan.nama_barang,detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan,
                            detail_pengadaan.sumber_dana
                                        order by users.unit_kerja,head_pengadaan.jenis_belanja, 
                            detail_pengadaan.prioritas desc,detail_pengadaan.sumber_dana, 
                            program.kodering_program,kegiatan.kodering_kegiatan,subkegiatan.kodering_subkegiatan,uraian.kodering_uraian";
                        return $this->db->query($query)->result();                 
            
            }
             }
     public function get_cetak_pegawai($id){
        // $post = $this->input->post();
        //trim($id);
        //var_dump($id);die;
        if($id){
            $query="SELECT head_pengadaan.tgl_usulan,head_pengadaan.status,
        head_pengadaan.id_user
                  ,users.unit_kerja, 
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
                            
                  where  detail_pengadaan.id_subkegiatan != 0 and detail_pengadaan.id_uraian != 0 and head_pengadaan.jenis_belanja = 0 and head_pengadaan.id_user = $id
                  GROUP BY  head_pengadaan.tgl_usulan,head_pengadaan.status,head_pengadaan.jenis_belanja,head_pengadaan.id_user
                  ,users.unit_kerja, 
                            program.kodering_program, program.nama_program,
                            kegiatan.kodering_kegiatan,kegiatan.nama_kegiatan,
                            subkegiatan.kodering_subkegiatan,subkegiatan.nama_subkegiatan,
                            uraian.kodering_uraian,uraian.nama_uraian,
                            detail_pengadaan.sumber_dana,
                            
                            detail_pengadaan.nama_barang,detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan
                            order by users.unit_kerja,head_pengadaan.jenis_belanja, 
                            detail_pengadaan.prioritas desc,detail_pengadaan.sumber_dana, 
                            program.kodering_program,kegiatan.kodering_kegiatan,subkegiatan.kodering_subkegiatan,uraian.kodering_uraian";
            return $this->db->query($query)->result();                
        }else{
            $query="SELECT head_pengadaan.tgl_usulan,head_pengadaan.status,
        head_pengadaan.id_user
                  ,users.unit_kerja, 
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
                            
                  where  detail_pengadaan.id_subkegiatan != 0 and detail_pengadaan.id_uraian != 0 and head_pengadaan.jenis_belanja = 0
                  GROUP BY  head_pengadaan.tgl_usulan,head_pengadaan.status,head_pengadaan.jenis_belanja,head_pengadaan.id_user
                  ,users.unit_kerja, 
                            program.kodering_program, program.nama_program,
                            kegiatan.kodering_kegiatan,kegiatan.nama_kegiatan,
                            subkegiatan.kodering_subkegiatan,subkegiatan.nama_subkegiatan,
                            uraian.kodering_uraian,uraian.nama_uraian,
                            detail_pengadaan.sumber_dana,
                            
                            detail_pengadaan.nama_barang,detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan
                            order by users.unit_kerja,head_pengadaan.jenis_belanja, 
                            detail_pengadaan.prioritas desc,detail_pengadaan.sumber_dana, 
                            program.kodering_program,kegiatan.kodering_kegiatan,subkegiatan.kodering_subkegiatan,uraian.kodering_uraian";
            return $this->db->query($query)->result();                
        }
         
    }
    public function get_cetak_pegawai_2024($id,$role,$bidang){
        // $post = $this->input->post();
        //trim($id);
        //var_dump($id);die;
        if($role == 'user' || $role=='only'){
            $aksi .= "and head_pengadaan.id_user = ".$id;
        }
        if($role == 'bidang'){
            $aksi .= "and users.bidang = ".$bidang ;

        }
        if($role == 'user' || $role == 'bidang' || $role=='only'){
      
            $query="SELECT head_pengadaan.tgl_usulan,head_pengadaan.status,
        head_pengadaan.id_user
                  ,users.unit_kerja, 
                            program.kodering_program, program.nama_program,
                            kegiatan.kodering_kegiatan,kegiatan.nama_kegiatan,
                            subkegiatan.kodering_subkegiatan,subkegiatan.nama_subkegiatan,
                            uraian.kodering_uraian,uraian.nama_uraian,					
                            detail_pengadaan.nama_barang,detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan,
                            UPPER(detail_pengadaan.sumber_dana) as sumber_dana
                            
        
                  FROM head_pengadaan 
                  JOIN users on head_pengadaan.id_user = users.id_user
                  JOIN  detail_pengadaan on detail_pengadaan.id_pengadaan = head_pengadaan.id_pengadaan
                    LEFT JOIN subkegiatan on subkegiatan.id_subkegiatan = detail_pengadaan.id_subkegiatan
                    LEFT join kegiatan on kegiatan.id_kegiatan = subkegiatan.id_kegiatan
                    LEFT join program on program.id_program = kegiatan.id_program
                    LEFT join uraian on uraian.id_uraian = detail_pengadaan.id_uraian
                            
                  where  head_pengadaan.tahun_anggaran = 2024 and head_pengadaan.jenis_belanja = 0  $aksi
                  GROUP BY  head_pengadaan.tgl_usulan,head_pengadaan.status,head_pengadaan.jenis_belanja,head_pengadaan.id_user
                  ,users.unit_kerja, 
                            program.kodering_program, program.nama_program,
                            kegiatan.kodering_kegiatan,kegiatan.nama_kegiatan,
                            subkegiatan.kodering_subkegiatan,subkegiatan.nama_subkegiatan,
                            uraian.kodering_uraian,uraian.nama_uraian,
                            detail_pengadaan.sumber_dana,
                            
                            detail_pengadaan.nama_barang,detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan
                            order by users.unit_kerja,head_pengadaan.jenis_belanja, 
                            detail_pengadaan.prioritas desc,detail_pengadaan.sumber_dana, 
                            program.kodering_program,kegiatan.kodering_kegiatan,subkegiatan.kodering_subkegiatan,uraian.kodering_uraian";
            return $this->db->query($query)->result();                
        }else{
            $query="SELECT head_pengadaan.tgl_usulan,head_pengadaan.status,
        head_pengadaan.id_user
                  ,users.unit_kerja, 
                            program.kodering_program, program.nama_program,
                            kegiatan.kodering_kegiatan,kegiatan.nama_kegiatan,
                            subkegiatan.kodering_subkegiatan,subkegiatan.nama_subkegiatan,
                            uraian.kodering_uraian,uraian.nama_uraian,					
                            detail_pengadaan.nama_barang,detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan,
                            UPPER(detail_pengadaan.sumber_dana) as sumber_dana
                            
        
                  FROM head_pengadaan 
                  JOIN users on head_pengadaan.id_user = users.id_user
                  JOIN  detail_pengadaan on detail_pengadaan.id_pengadaan = head_pengadaan.id_pengadaan
                  LEFT JOIN subkegiatan on subkegiatan.id_subkegiatan = detail_pengadaan.id_subkegiatan
                    LEFT join kegiatan on kegiatan.id_kegiatan = subkegiatan.id_kegiatan
                    LEFT join program on program.id_program = kegiatan.id_program
                    LEFT join uraian on uraian.id_uraian = detail_pengadaan.id_uraian
                            
                  where  head_pengadaan.tahun_anggaran = 2024 and head_pengadaan.jenis_belanja = 0
                  GROUP BY  head_pengadaan.tgl_usulan,head_pengadaan.status,head_pengadaan.jenis_belanja,head_pengadaan.id_user
                  ,users.unit_kerja, 
                            program.kodering_program, program.nama_program,
                            kegiatan.kodering_kegiatan,kegiatan.nama_kegiatan,
                            subkegiatan.kodering_subkegiatan,subkegiatan.nama_subkegiatan,
                            uraian.kodering_uraian,uraian.nama_uraian,
                            detail_pengadaan.sumber_dana,
                            
                            detail_pengadaan.nama_barang,detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan
                            order by users.unit_kerja,head_pengadaan.jenis_belanja, 
                            detail_pengadaan.prioritas desc,detail_pengadaan.sumber_dana, 
                            program.kodering_program,kegiatan.kodering_kegiatan,subkegiatan.kodering_subkegiatan,uraian.kodering_uraian";
            return $this->db->query($query)->result();                
        }
         
    } 
    public function get_cetak_modal($id){
        // $post = $this->input->post();
        //trim($id);
        //var_dump($id);die;
        if($id){
            $query="SELECT head_pengadaan.tgl_usulan,head_pengadaan.status,
            head_pengadaan.id_user
                      ,users.unit_kerja, 
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
                                
                      where  detail_pengadaan.id_subkegiatan != 0 and detail_pengadaan.id_uraian != 0 and head_pengadaan.jenis_belanja = 2 and head_pengadaan.id_user = $id
                      GROUP BY  head_pengadaan.tgl_usulan,head_pengadaan.status,head_pengadaan.jenis_belanja,head_pengadaan.id_user
                      ,users.unit_kerja, 
                                program.kodering_program, program.nama_program,
                                kegiatan.kodering_kegiatan,kegiatan.nama_kegiatan,
                                subkegiatan.kodering_subkegiatan,subkegiatan.nama_subkegiatan,
                                uraian.kodering_uraian,uraian.nama_uraian,
                                detail_pengadaan.sumber_dana,
                                
                                detail_pengadaan.nama_barang,detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan
                                order by users.unit_kerja,head_pengadaan.jenis_belanja, 
                                detail_pengadaan.prioritas desc,detail_pengadaan.sumber_dana, 
                                program.kodering_program,kegiatan.kodering_kegiatan,subkegiatan.kodering_subkegiatan,uraian.kodering_uraian";
                return $this->db->query($query)->result();  
        }else{
            $query="SELECT head_pengadaan.tgl_usulan,head_pengadaan.status,
            head_pengadaan.id_user
                      ,users.unit_kerja, 
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
                                
                      where  detail_pengadaan.id_subkegiatan != 0 and detail_pengadaan.id_uraian != 0 and head_pengadaan.jenis_belanja = 2
                      GROUP BY  head_pengadaan.tgl_usulan,head_pengadaan.status,head_pengadaan.jenis_belanja,head_pengadaan.id_user
                      ,users.unit_kerja, 
                                program.kodering_program, program.nama_program,
                                kegiatan.kodering_kegiatan,kegiatan.nama_kegiatan,
                                subkegiatan.kodering_subkegiatan,subkegiatan.nama_subkegiatan,
                                uraian.kodering_uraian,uraian.nama_uraian,
                                detail_pengadaan.sumber_dana,
                                
                                detail_pengadaan.nama_barang,detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan
                                order by users.unit_kerja,head_pengadaan.jenis_belanja, 
                                detail_pengadaan.prioritas desc,detail_pengadaan.sumber_dana, 
                                program.kodering_program,kegiatan.kodering_kegiatan,subkegiatan.kodering_subkegiatan,uraian.kodering_uraian";
                return $this->db->query($query)->result();  
        }
                      
    }
    public function get_cetak_modal_2024($id,$role,$bidang){
        // $post = $this->input->post();
        //trim($id);
        //var_dump($id);die;
        if($role == 'user' || $role=='only'){
            $aksi .= "and head_pengadaan.id_user = ".$id;
        }
        if($role == 'bidang'){
            $aksi .= "and users.bidang = ".$bidang ;

        }
        if($role == 'user' || $role == 'bidang' || $role=='only'){
          $query="SELECT head_pengadaan.tgl_usulan,head_pengadaan.status,
            head_pengadaan.id_user
                      ,users.unit_kerja, 
                                program.kodering_program, program.nama_program,
                                kegiatan.kodering_kegiatan,kegiatan.nama_kegiatan,
                                subkegiatan.kodering_subkegiatan,subkegiatan.nama_subkegiatan,
                                uraian.kodering_uraian,uraian.nama_uraian,					
                                detail_pengadaan.nama_barang,detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan,
                                UPPER(detail_pengadaan.sumber_dana) as sumber_dana
                                
            
                      FROM head_pengadaan 
                      JOIN users on head_pengadaan.id_user = users.id_user
                      JOIN  detail_pengadaan on detail_pengadaan.id_pengadaan = head_pengadaan.id_pengadaan
                      LEFT  JOIN subkegiatan on subkegiatan.id_subkegiatan = detail_pengadaan.id_subkegiatan
                        LEFT join kegiatan on kegiatan.id_kegiatan = subkegiatan.id_kegiatan
                       LEFT join program on program.id_program = kegiatan.id_program
                        LEFT join uraian on uraian.id_uraian = detail_pengadaan.id_uraian
                                
                      where  head_pengadaan.tahun_anggaran = 2024 and head_pengadaan.jenis_belanja = 2 $aksi
                      GROUP BY  head_pengadaan.tgl_usulan,head_pengadaan.status,head_pengadaan.jenis_belanja,head_pengadaan.id_user
                      ,users.unit_kerja, 
                                program.kodering_program, program.nama_program,
                                kegiatan.kodering_kegiatan,kegiatan.nama_kegiatan,
                                subkegiatan.kodering_subkegiatan,subkegiatan.nama_subkegiatan,
                                uraian.kodering_uraian,uraian.nama_uraian,
                                detail_pengadaan.sumber_dana,
                                
                                detail_pengadaan.nama_barang,detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan
                                order by users.unit_kerja,head_pengadaan.jenis_belanja, 
                                detail_pengadaan.prioritas desc,detail_pengadaan.sumber_dana, 
                                program.kodering_program,kegiatan.kodering_kegiatan,subkegiatan.kodering_subkegiatan,uraian.kodering_uraian";
                return $this->db->query($query)->result();  
        }else{
            $query="SELECT head_pengadaan.tgl_usulan,head_pengadaan.status,
            head_pengadaan.id_user
                      ,users.unit_kerja, 
                                program.kodering_program, program.nama_program,
                                kegiatan.kodering_kegiatan,kegiatan.nama_kegiatan,
                                subkegiatan.kodering_subkegiatan,subkegiatan.nama_subkegiatan,
                                uraian.kodering_uraian,uraian.nama_uraian,					
                                detail_pengadaan.nama_barang,detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan,
                                UPPER(detail_pengadaan.sumber_dana) as sumber_dana
                                
            
                      FROM head_pengadaan 
                      JOIN users on head_pengadaan.id_user = users.id_user
                      JOIN  detail_pengadaan on detail_pengadaan.id_pengadaan = head_pengadaan.id_pengadaan
                        LEFT JOIN subkegiatan on subkegiatan.id_subkegiatan = detail_pengadaan.id_subkegiatan
                        LEFT join kegiatan on kegiatan.id_kegiatan = subkegiatan.id_kegiatan
                        LEFT join program on program.id_program = kegiatan.id_program
                        LEFT join uraian on uraian.id_uraian = detail_pengadaan.id_uraian
                                
                      where  head_pengadaan.tahun_anggaran = 2024 and head_pengadaan.jenis_belanja = 2
                      GROUP BY  head_pengadaan.tgl_usulan,head_pengadaan.status,head_pengadaan.jenis_belanja,head_pengadaan.id_user
                      ,users.unit_kerja, 
                                program.kodering_program, program.nama_program,
                                kegiatan.kodering_kegiatan,kegiatan.nama_kegiatan,
                                subkegiatan.kodering_subkegiatan,subkegiatan.nama_subkegiatan,
                                uraian.kodering_uraian,uraian.nama_uraian,
                                detail_pengadaan.sumber_dana,
                                
                                detail_pengadaan.nama_barang,detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan
                                order by users.unit_kerja,head_pengadaan.jenis_belanja, 
                                detail_pengadaan.prioritas desc,detail_pengadaan.sumber_dana, 
                                program.kodering_program,kegiatan.kodering_kegiatan,subkegiatan.kodering_subkegiatan,uraian.kodering_uraian";
                return $this->db->query($query)->result();  
        }
                      
    }
     public function get_cetak_barjas($id){
        // $post = $this->input->post();
        //trim($id);
        //var_dump($id);die;
        if($id){
            $query="SELECT head_pengadaan.tgl_usulan,head_pengadaan.status,
        head_pengadaan.id_user
                  ,users.unit_kerja, 
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
                            
                  where  detail_pengadaan.id_subkegiatan != 0 and detail_pengadaan.id_uraian != 0 and head_pengadaan.jenis_belanja = 1 and head_pengadaan.id_user = $id
                  GROUP BY  head_pengadaan.tgl_usulan,head_pengadaan.status,head_pengadaan.jenis_belanja,head_pengadaan.id_user
                  ,users.unit_kerja, 
                            program.kodering_program, program.nama_program,
                            kegiatan.kodering_kegiatan,kegiatan.nama_kegiatan,
                            subkegiatan.kodering_subkegiatan,subkegiatan.nama_subkegiatan,
                            uraian.kodering_uraian,uraian.nama_uraian,
                            detail_pengadaan.sumber_dana,
                            
                            detail_pengadaan.nama_barang,detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan
                            order by users.unit_kerja,head_pengadaan.jenis_belanja, 
                            detail_pengadaan.prioritas desc,detail_pengadaan.sumber_dana, 
                            program.kodering_program,kegiatan.kodering_kegiatan,subkegiatan.kodering_subkegiatan,uraian.kodering_uraian";
            return $this->db->query($query)->result();
        }else{
            $query="SELECT head_pengadaan.tgl_usulan,head_pengadaan.status,
        head_pengadaan.id_user
                  ,users.unit_kerja, 
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
                            
                  where  detail_pengadaan.id_subkegiatan != 0 and detail_pengadaan.id_uraian != 0 and head_pengadaan.jenis_belanja = 1
                  GROUP BY  head_pengadaan.tgl_usulan,head_pengadaan.status,head_pengadaan.jenis_belanja,head_pengadaan.id_user
                  ,users.unit_kerja, 
                            program.kodering_program, program.nama_program,
                            kegiatan.kodering_kegiatan,kegiatan.nama_kegiatan,
                            subkegiatan.kodering_subkegiatan,subkegiatan.nama_subkegiatan,
                            uraian.kodering_uraian,uraian.nama_uraian,
                            detail_pengadaan.sumber_dana,
                            
                            detail_pengadaan.nama_barang,detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan
                            order by users.unit_kerja,head_pengadaan.jenis_belanja, 
                            detail_pengadaan.prioritas desc,detail_pengadaan.sumber_dana, 
                            program.kodering_program,kegiatan.kodering_kegiatan,subkegiatan.kodering_subkegiatan,uraian.kodering_uraian";
            return $this->db->query($query)->result();
        }
                         
    }
    public function get_cetak_barjas_2024($id,$role,$bidang){
        // $post = $this->input->post();
        //trim($id);
        
        if($role == 'user' || $role=='only'){
            $aksi .= "and head_pengadaan.id_user = ".$id;
        }
        if($role == 'bidang'){
            $aksi .= "and users.bidang = ".$bidang ;

        }
        if($role == 'user' || $role == 'bidang' || $role=='only'){
          $query="SELECT head_pengadaan.tgl_usulan,head_pengadaan.status,
        head_pengadaan.id_user
                  ,users.unit_kerja, 
                            program.kodering_program, program.nama_program,
                            kegiatan.kodering_kegiatan,kegiatan.nama_kegiatan,
                            subkegiatan.kodering_subkegiatan,subkegiatan.nama_subkegiatan,
                            uraian.kodering_uraian,uraian.nama_uraian,					
                            detail_pengadaan.nama_barang,detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan,
                            UPPER(detail_pengadaan.sumber_dana) as sumber_dana
                            
        
                  FROM head_pengadaan 
                  JOIN users on head_pengadaan.id_user = users.id_user
                  JOIN  detail_pengadaan on detail_pengadaan.id_pengadaan = head_pengadaan.id_pengadaan
                    LEFT JOIN subkegiatan on subkegiatan.id_subkegiatan = detail_pengadaan.id_subkegiatan
                    LEFT join kegiatan on kegiatan.id_kegiatan = subkegiatan.id_kegiatan
                    LEFT join program on program.id_program = kegiatan.id_program
                    LEFT join uraian on uraian.id_uraian = detail_pengadaan.id_uraian
                            
                  where  head_pengadaan.tahun_anggaran = 2024 and head_pengadaan.jenis_belanja = 1 $aksi
                  GROUP BY  head_pengadaan.tgl_usulan,head_pengadaan.status,head_pengadaan.jenis_belanja,head_pengadaan.id_user
                  ,users.unit_kerja, 
                            program.kodering_program, program.nama_program,
                            kegiatan.kodering_kegiatan,kegiatan.nama_kegiatan,
                            subkegiatan.kodering_subkegiatan,subkegiatan.nama_subkegiatan,
                            uraian.kodering_uraian,uraian.nama_uraian,
                            detail_pengadaan.sumber_dana,
                            
                            detail_pengadaan.nama_barang,detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan
                            order by users.unit_kerja,head_pengadaan.jenis_belanja, 
                            detail_pengadaan.prioritas desc,detail_pengadaan.sumber_dana, 
                            program.kodering_program,kegiatan.kodering_kegiatan,subkegiatan.kodering_subkegiatan,uraian.kodering_uraian";
            return $this->db->query($query)->result();
        }else{
            $query="SELECT head_pengadaan.tgl_usulan,head_pengadaan.status,
        head_pengadaan.id_user
                  ,users.unit_kerja, 
                            program.kodering_program, program.nama_program,
                            kegiatan.kodering_kegiatan,kegiatan.nama_kegiatan,
                            subkegiatan.kodering_subkegiatan,subkegiatan.nama_subkegiatan,
                            uraian.kodering_uraian,uraian.nama_uraian,					
                            detail_pengadaan.nama_barang,detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan,
                            UPPER(detail_pengadaan.sumber_dana) as sumber_dana
                            
        
                  FROM head_pengadaan 
                  JOIN users on head_pengadaan.id_user = users.id_user
                  JOIN  detail_pengadaan on detail_pengadaan.id_pengadaan = head_pengadaan.id_pengadaan
                    LEFT JOIN subkegiatan on subkegiatan.id_subkegiatan = detail_pengadaan.id_subkegiatan
                    LEFT join kegiatan on kegiatan.id_kegiatan = subkegiatan.id_kegiatan
                    LEFT join program on program.id_program = kegiatan.id_program
                    LEFT join uraian on uraian.id_uraian = detail_pengadaan.id_uraian
                            
                  where  head_pengadaan.tahun_anggaran = 2024 and head_pengadaan.jenis_belanja = 1
                  GROUP BY  head_pengadaan.tgl_usulan,head_pengadaan.status,head_pengadaan.jenis_belanja,head_pengadaan.id_user
                  ,users.unit_kerja, 
                            program.kodering_program, program.nama_program,
                            kegiatan.kodering_kegiatan,kegiatan.nama_kegiatan,
                            subkegiatan.kodering_subkegiatan,subkegiatan.nama_subkegiatan,
                            uraian.kodering_uraian,uraian.nama_uraian,
                            detail_pengadaan.sumber_dana,
                            
                            detail_pengadaan.nama_barang,detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan
                            order by users.unit_kerja,head_pengadaan.jenis_belanja, 
                            detail_pengadaan.prioritas desc,detail_pengadaan.sumber_dana, 
                            program.kodering_program,kegiatan.kodering_kegiatan,subkegiatan.kodering_subkegiatan,uraian.kodering_uraian";
            return $this->db->query($query)->result();
        }
                         
    }
    
     public function get_cetak_barangdanspesifikasi($id){
        // $post = $this->input->post();
        //trim($id);
        //var_dump($id);die;
        if($id){
            $query="SELECT head_pengadaan.id_user
        ,users.unit_kerja, 
                  trim(detail_pengadaan.nama_barang) as nama_barang,detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan,
        UPPER(detail_pengadaan.sumber_dana) as sumber_dana
        FROM head_pengadaan 
        JOIN users on head_pengadaan.id_user = users.id_user
        JOIN  detail_pengadaan on detail_pengadaan.id_pengadaan = head_pengadaan.id_pengadaan
          JOIN subkegiatan on subkegiatan.id_subkegiatan = detail_pengadaan.id_subkegiatan
          join kegiatan on kegiatan.id_kegiatan = subkegiatan.id_kegiatan
          join program on program.id_program = kegiatan.id_program
          join uraian on uraian.id_uraian = detail_pengadaan.id_uraian
                  
        where  detail_pengadaan.id_subkegiatan != 0 and detail_pengadaan.id_uraian != 0 and head_pengadaan.id_user = $id
        GROUP BY  head_pengadaan.id_user
        ,users.unit_kerja, 
                  trim(detail_pengadaan.nama_barang),detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan,
        detail_pengadaan.sumber_dana
             order by trim(detail_pengadaan.nama_barang), users.unit_kerja";
            return $this->db->query($query)->result();                
        }else{
            $query="SELECT head_pengadaan.id_user
        ,users.unit_kerja, 
                  trim(detail_pengadaan.nama_barang) as nama_barang,detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan,
        UPPER(detail_pengadaan.sumber_dana) as sumber_dana
        FROM head_pengadaan 
        JOIN users on head_pengadaan.id_user = users.id_user
        JOIN  detail_pengadaan on detail_pengadaan.id_pengadaan = head_pengadaan.id_pengadaan
          JOIN subkegiatan on subkegiatan.id_subkegiatan = detail_pengadaan.id_subkegiatan
          join kegiatan on kegiatan.id_kegiatan = subkegiatan.id_kegiatan
          join program on program.id_program = kegiatan.id_program
          join uraian on uraian.id_uraian = detail_pengadaan.id_uraian
                  
        where  detail_pengadaan.id_subkegiatan != 0 and detail_pengadaan.id_uraian != 0
        GROUP BY  head_pengadaan.id_user
        ,users.unit_kerja, 
                  trim(detail_pengadaan.nama_barang),detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan,
        detail_pengadaan.sumber_dana
             order by trim(detail_pengadaan.nama_barang), users.unit_kerja";
            return $this->db->query($query)->result();                
        }
         
    }public function get_cetak_barangdanspesifikasi_2024($id,$role,$bidang){
        // $post = $this->input->post();
        //trim($id);
        //var_dump($id);die;
        if($role == 'user' || $role=='only'){
            $aksi .= "and head_pengadaan.id_user = ".$id;
        }
        if($role == 'bidang'){
            $aksi .= "and users.bidang = ".$bidang ;

        }
        if($role == 'user' || $role == 'bidang' || $role=='only'){
          $query="SELECT head_pengadaan.id_user
        ,users.unit_kerja, 
                  trim(detail_pengadaan.nama_barang) as nama_barang,detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan,
        UPPER(detail_pengadaan.sumber_dana) as sumber_dana
        FROM head_pengadaan 
        JOIN users on head_pengadaan.id_user = users.id_user
        JOIN  detail_pengadaan on detail_pengadaan.id_pengadaan = head_pengadaan.id_pengadaan
          LEFT JOIN subkegiatan on subkegiatan.id_subkegiatan = detail_pengadaan.id_subkegiatan
          LEFT join kegiatan on kegiatan.id_kegiatan = subkegiatan.id_kegiatan
          LEFT join program on program.id_program = kegiatan.id_program
          LEFT join uraian on uraian.id_uraian = detail_pengadaan.id_uraian
                  
        where  head_pengadaan.tahun_anggaran = 2024 $aksi
        GROUP BY  head_pengadaan.id_user
        ,users.unit_kerja, 
                  trim(detail_pengadaan.nama_barang),detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan,
        detail_pengadaan.sumber_dana
             order by trim(detail_pengadaan.nama_barang), users.unit_kerja";
            return $this->db->query($query)->result();                
        }else{
            $query="SELECT head_pengadaan.id_user
        ,users.unit_kerja, 
                  trim(detail_pengadaan.nama_barang) as nama_barang,detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan,
        UPPER(detail_pengadaan.sumber_dana) as sumber_dana
        FROM head_pengadaan 
        JOIN users on head_pengadaan.id_user = users.id_user
        JOIN  detail_pengadaan on detail_pengadaan.id_pengadaan = head_pengadaan.id_pengadaan
          LEFT JOIN subkegiatan on subkegiatan.id_subkegiatan = detail_pengadaan.id_subkegiatan
          LEFT join kegiatan on kegiatan.id_kegiatan = subkegiatan.id_kegiatan
          LEFT join program on program.id_program = kegiatan.id_program
          LEFT join uraian on uraian.id_uraian = detail_pengadaan.id_uraian
                  
        where  head_pengadaan.tahun_anggaran = 2024
        GROUP BY  head_pengadaan.id_user
        ,users.unit_kerja, 
                  trim(detail_pengadaan.nama_barang),detail_pengadaan.spesifikasi,detail_pengadaan.kuantitas,detail_pengadaan.satuan,detail_pengadaan.harga_satuan,detail_pengadaan.total_harga,detail_pengadaan.prioritas,detail_pengadaan.catatan,
        detail_pengadaan.sumber_dana
             order by trim(detail_pengadaan.nama_barang), users.unit_kerja";
            return $this->db->query($query)->result();                
        }
         
    }


    public function save_pengguna()
    {
        // var_dump($id);die;
        $post = $this->input->post();
        //var_dump($post);die;
        
        
        $this->unit_kerja = $post["unit_kerja"];
        $this->unit_kerja_lengkap = $post["ukl"];
        $this->username = $post["username"];
        $this->password = md5($post["pass"]);
        $this->role = $post["role"];
        $this->isblokir = $post["blokir"];
        $this->bidang = $post["bidang"];
        $this->direksi = $post["direksi"];
        $this->create_at = date('Y-m-d');
        $this->modified_at = '';
        $this->delete_at = '';
        // $this->keterangan = $post["keterangan"];
      // $this->session_id = $this->session->session_id();
        // //$this->datetime = $date->format('Y-m-d H:i:s');
        $this->db->insert('users', $this);
    }
    public function get_id_pengguna()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $sql = "SELECT * FROM Users 
                where Users.id_user = ".$id;


    	return $this->db->query($sql)->result();
        
        
        // $this->db->where(["id_temp_pengadaan" => $id]);
        // return $this->db->get($this->_table)->result();
    }
    public function update_pengguna()
    {
        $post = $this->input->post();
        //var_dump($post);die;
        
        
        $this->unit_kerja = $post["e_unit_kerja"];
        $this->unit_kerja_lengkap = $post["e_ukl"];
        $this->username = $post["e_username"];
        $this->password = md5($post["e_pass"]);
        $this->role = $post["e_role"];
        $this->isblokir = $post["e_blokir"];
        $this->bidang = $post["e_bidang"];
        $this->direksi = $post["e_direksi"];
        $this->create_at = date('Y-m-d');
        $this->modified_at = '';
        $this->delete_at = '';


        $this->db->where('id_user',$post["e_id_user"]);
        $this->db->update('users', $this);
        
        
        // $this->db->where(["id_temp_pengadaan" => $id]);
        // return $this->db->get($this->_table)->result();
    }

    public function save_program()
    {
        // var_dump($id);die;
        $post = $this->input->post();
        //var_dump($post);die;
        
        
        $this->kodering_program = $post["kodering_program"];
        $this->nama_program = $post["nama_program"];
        $this->isdeleted = 0;
        $this->id_urusan = 1;
        // $this->keterangan = $post["keterangan"];
      // $this->session_id = $this->session->session_id();
        // //$this->datetime = $date->format('Y-m-d H:i:s');
        $this->db->insert('program', $this);
    }
    public function get_id_program()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $sql = "SELECT * FROM Program 
                where Program.id_program = ".$id;


    	return $this->db->query($sql)->result();
        
        
        // $this->db->where(["id_temp_pengadaan" => $id]);
        // return $this->db->get($this->_table)->result();
    }
    public function update_program()
    {
        $post = $this->input->post();
        //var_dump($post);die;
        
        
        $this->kodering_program = $post["e_kodering_program"];
        $this->nama_program = $post["e_nama_program"];
        $this->isdeleted = 0;
        $this->id_urusan = 1;


        $this->db->where('id_program',$post["e_id_program"]);
        $this->db->update('program', $this);
        
        
        // $this->db->where(["id_temp_pengadaan" => $id]);
        // return $this->db->get($this->_table)->result();
    }
    public function save_kegiatan()
    {
        // var_dump($id);die;
        $post = $this->input->post();
        //var_dump($post);die;
        
        
        $this->kodering_kegiatan = $post["kodering_kegiatan"];
        $this->nama_kegiatan = $post["nama_kegiatan"];
        $this->id_program = $post["id_program"];
        $this->isdeleted = 0;
        // $this->keterangan = $post["keterangan"];
      // $this->session_id = $this->session->session_id();
        // //$this->datetime = $date->format('Y-m-d H:i:s');
        $this->db->insert('kegiatan', $this);
    }
    public function get_id_kegiatan()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $sql = "SELECT * FROM kegiatan 
                JOIN program on kegiatan.id_program = program.id_program
                where kegiatan.id_kegiatan = ".$id;


    	return $this->db->query($sql)->result();
        
        
        // $this->db->where(["id_temp_pengadaan" => $id]);
        // return $this->db->get($this->_table)->result();
    }
    public function update_kegiatan()
    {
        $post = $this->input->post();
        //var_dump($post);die;
        
        
        $this->kodering_kegiatan = $post["e_kodering_kegiatan"];
        $this->nama_kegiatan = $post["e_nama_kegiatan"];
        $this->id_program = $post["e_id_program"];
        $this->isdeleted = 0;
       
        $this->db->where('id_kegiatan',$post["e_id_kegiatan"]);
        $this->db->update('kegiatan', $this);
        
        
        // $this->db->where(["id_temp_pengadaan" => $id]);
        // return $this->db->get($this->_table)->result();
    }
    public function save_subkegiatan()
    {
        // var_dump($id);die;
        $post = $this->input->post();
        //var_dump($post);die;
        
        
        $this->kodering_subkegiatan = $post["kodering_subkegiatan"];
        $this->nama_subkegiatan = $post["nama_subkegiatan"];
        $this->id_kegiatan = $post["id_kegiatan"];
        $this->isdeleted = 0;
        // $this->keterangan = $post["keterangan"];
      // $this->session_id = $this->session->session_id();
        // //$this->datetime = $date->format('Y-m-d H:i:s');
        $this->db->insert('subkegiatan', $this);
    }
    public function get_id_subkegiatan()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $sql = "SELECT * FROM Subkegiatan 
                JOIN Kegiatan on kegiatan.id_kegiatan = Subkegiatan.id_kegiatan
                JOIN program on kegiatan.id_program = program.id_program
                where Subkegiatan.id_subkegiatan = ".$id;


    	return $this->db->query($sql)->result();
        
        
        // $this->db->where(["id_temp_pengadaan" => $id]);
        // return $this->db->get($this->_table)->result();
    }
    public function update_subkegiatan()
    {
        $post = $this->input->post();
        //var_dump($post);die;
        
        
        $this->kodering_subkegiatan = $post["e_kodering_subkegiatan"];
        $this->nama_subkegiatan = $post["e_nama_subkegiatan"];
        $this->id_kegiatan = $post["e_id_kegiatan"];
        $this->isdeleted = 0;
       
        $this->db->where('id_subkegiatan',$post["e_id_subkegiatan"]);
        $this->db->update('subkegiatan', $this);
        
        
        // $this->db->where(["id_temp_pengadaan" => $id]);
        // return $this->db->get($this->_table)->result();
    }
    public function save_uraian()
    {
        // var_dump($id);die;
        $post = $this->input->post();
        //var_dump($post);die;
        
        
        $this->kodering_uraian = $post["kodering_uraian"];
        $this->nama_uraian = $post["nama_uraian"];
        $this->isdeleted = 0;
        // $this->keterangan = $post["keterangan"];
      // $this->session_id = $this->session->session_id();
        // //$this->datetime = $date->format('Y-m-d H:i:s');
        $this->db->insert('uraian', $this);
    }
    public function get_id_uraian()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $sql = "SELECT * FROM uraian 
                where Uraian.id_uraian = ".$id;


    	return $this->db->query($sql)->result();
        
        
        // $this->db->where(["id_temp_pengadaan" => $id]);
        // return $this->db->get($this->_table)->result();
    }
    public function update_uraian()
    {
        $post = $this->input->post();
        //var_dump($post);die;
        
        
        $this->kodering_uraian = $post["e_kodering_uraian"];
        $this->nama_uraian = $post["e_nama_uraian"];
        $this->isdeleted = 0;
       
        $this->db->where('id_uraian',$post["e_id_uraian"]);
        $this->db->update('uraian', $this);
        
        
        // $this->db->where(["id_temp_pengadaan" => $id]);
        // return $this->db->get($this->_table)->result();
    }
    public function tampil_program()
    {
        $post = $this->input->post();
        //var_dump($post);die;
        
        
        $sql = "SELECT * FROM Program where isdeleted = 0 and program.id_program=".$post['id'];


    	return $this->db->query($sql)->result();
        
        
        // $this->db->where(["id_temp_pengadaan" => $id]);
        // return $this->db->get($this->_table)->result();
    }
    public function tampil_kegiatan()
    {
        $post = $this->input->post();
        //var_dump($post);die;
        
        
        $sql = "SELECT * FROM Kegiatan where isdeleted = 0 and Kegiatan.id_kegiatan=".$post['id'];


    	return $this->db->query($sql)->result();
        
        
        // $this->db->where(["id_temp_pengadaan" => $id]);
        // return $this->db->get($this->_table)->result();
    }
    public function tampil_subkegiatan()
    {
        $post = $this->input->post();
        //var_dump($post);die;
        
        
        $sql = "SELECT * FROM Subkegiatan where isdeleted = 0 and Subkegiatan.id_subkegiatan=".$post['id'];


    	return $this->db->query($sql)->result();
        
        
        // $this->db->where(["id_temp_pengadaan" => $id]);
        // return $this->db->get($this->_table)->result();
    }
    public function tampil_uraian()
    {
        $post = $this->input->post();
        //var_dump($post);die;
        
        
        $sql = "SELECT * FROM Uraian where isdeleted = 0 and Uraian.id_uraian=".$post['id'];


    	return $this->db->query($sql)->result();
        
        
        // $this->db->where(["id_temp_pengadaan" => $id]);
        // return $this->db->get($this->_table)->result();
    }
    public function delete_program()
    {
        $post = $this->input->post();
        //var_dump($post);die;
        
        
        $sql = "UPDATE Program 
                    SET isdeleted = 1 
                where id_program=".$post['id'];

        return $this->db->query($sql);
    	//return $this->db->query($sql)->result();
        
        
        // $this->db->where(["id_temp_pengadaan" => $id]);
        // return $this->db->get($this->_table)->result();
    }
    public function delete_kegiatan()
    {
        $post = $this->input->post();
        //var_dump($post);die;
        
        
        $sql = "UPDATE Kegiatan 
                    SET isdeleted = 1 
                where id_kegiatan=".$post['id'];

        return $this->db->query($sql);
    	//return $this->db->query($sql)->result();
        
        
        // $this->db->where(["id_temp_pengadaan" => $id]);
        // return $this->db->get($this->_table)->result();
    }
    public function delete_subkegiatan()
    {
        $post = $this->input->post();
        //var_dump($post);die;
        
        
        $sql = "UPDATE Subkegiatan 
                    SET isdeleted = 1 
                where id_subkegiatan=".$post['id'];

        return $this->db->query($sql);
    	//return $this->db->query($sql)->result();
        
        
        // $this->db->where(["id_temp_pengadaan" => $id]);
        // return $this->db->get($this->_table)->result();
    }
    public function delete_uraian()
    {
        $post = $this->input->post();
        //var_dump($post);die;
        
        
        $sql = "UPDATE Uraian 
                    SET isdeleted = 1 
                where id_uraian=".$post['id'];

        return $this->db->query($sql);
    	//return $this->db->query($sql)->result();
        
        
        // $this->db->where(["id_temp_pengadaan" => $id]);
        // return $this->db->get($this->_table)->result();
    }

 	/*setelah login*/
	
}

/* End of file log_model.php */
/* Location: ./application/models/log_model.php */