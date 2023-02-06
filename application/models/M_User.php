<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model {
	
	private $_table = "users";

    // public $id_user;
    // public $name;
    // public $username;
    // public $password;
    // public $email;
    // public $bio;
    // public $hobby;
    // public $gender;
    // public $picture;
    

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
 	// public function getkepuasan()
 	// {
	// 	$db2 = $this->load->database('database_kedua', TRUE);
	// 	$db2->select('*');
	// 	$db2->from('kepuasan');
	// 	//$db2->where('id', 25);
	// 	$query = $db2->get()->result();
 	// 	return $query;
 	// }

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

	 public function ubahpassword(){
		$post = $this->input->post();
	
		$this->password = md5($post["pass"]);
		$id = $post["id_user"];
		
		$this->db->where('id_user',$id);
        $this->db->update($this->_table, $this);


	 }

	 public function totalanggaransemua($id_user,$role){
		$tahun = $_SESSION['tahun'];
		$aksi = ' and head_pengadaan.tahun_anggaran = '.$tahun. '';
		$aksi2 = ' head_pengadaan.tahun_anggaran = '.$tahun. '';
		if($role == 'user'){
			$aksi .= ' and head_pengadaan.id_user='.$id_user;
		}
		if($tahun < 2024){
			$query = "SELECT sum(total_harga) as total, ((sum(total_harga)/188745535841)*100) as persentase FROM 
			head_pengadaan 
			join detail_pengadaan  on head_pengadaan.id_pengadaan = detail_pengadaan.id_pengadaan
			where detail_pengadaan.id_subkegiatan !=0 and detail_pengadaan.id_uraian !=0  $aksi";
			
		}else{
			$query = "SELECT sum(total_harga) as total, ((sum(total_harga)/188745535841)*100) as persentase FROM 
				head_pengadaan 
				join detail_pengadaan  on head_pengadaan.id_pengadaan = detail_pengadaan.id_pengadaan
				where  $aksi2";
				
		}
		return $this->db->query($query)->result();
	 }

	 public function totalbelanjapegawai($id_user,$role){
		$tahun = $_SESSION['tahun'];
		$aksi = ' and head_pengadaan.tahun_anggaran = '.$tahun. '';
		$aksi2 = ' head_pengadaan.tahun_anggaran = '.$tahun. '';
		if($role == 'user'){
			$aksi .= ' and head_pengadaan.id_user='.$id_user;
		}
		if($tahun < 2024){
			$query = "SELECT sum(total_harga) as total FROM 
			head_pengadaan 
			join detail_pengadaan  on head_pengadaan.id_pengadaan = detail_pengadaan.id_pengadaan
			where detail_pengadaan.id_subkegiatan !=0 and detail_pengadaan.id_uraian !=0 and head_pengadaan.jenis_belanja = 0 $aksi";
			return $this->db->query($query)->result();
		}else{
			$query = "SELECT sum(total_harga) as total FROM 
			head_pengadaan 
			join detail_pengadaan  on head_pengadaan.id_pengadaan = detail_pengadaan.id_pengadaan
			where $aksi2";
			return $this->db->query($query)->result();
		}
	 }
	 
	 public function totalbelanjabarjas($id_user,$role){
		$tahun = $_SESSION['tahun'];
		$aksi = ' and head_pengadaan.tahun_anggaran = '.$tahun. '';
		$aksi2 = ' head_pengadaan.tahun_anggaran = '.$tahun. '';
		if($role == 'user'){
			$aksi .= ' and head_pengadaan.id_user='.$id_user;
		}
		if($tahun < 2024){
			$query = "SELECT sum(total_harga) as total FROM 
			head_pengadaan 
			join detail_pengadaan  on head_pengadaan.id_pengadaan = detail_pengadaan.id_pengadaan
			where detail_pengadaan.id_subkegiatan !=0 and detail_pengadaan.id_uraian !=0 and head_pengadaan.jenis_belanja = 1 $aksi";
			return $this->db->query($query)->result();
		}else{
			$query = "SELECT sum(total_harga) as total FROM 
			head_pengadaan 
			join detail_pengadaan  on head_pengadaan.id_pengadaan = detail_pengadaan.id_pengadaan
			where $aksi2";
			return $this->db->query($query)->result();
		}
	 }
	 public function totalbelanjamodal($id_user,$role){
		$tahun = $_SESSION['tahun'];
		$aksi = ' and head_pengadaan.tahun_anggaran = '.$tahun. '';
		$aksi2 = ' head_pengadaan.tahun_anggaran = '.$tahun. '';
		if($role == 'user'){
			$aksi .= ' and head_pengadaan.id_user='.$id_user;
		}
		if($tahun < 2024){
			$query = "SELECT sum(total_harga) as total FROM 
			head_pengadaan 
			join detail_pengadaan  on head_pengadaan.id_pengadaan = detail_pengadaan.id_pengadaan
			where detail_pengadaan.id_subkegiatan !=0 and detail_pengadaan.id_uraian !=0 and head_pengadaan.jenis_belanja = 2 $aksi";
			return $this->db->query($query)->result();
		}else{
			$query = "SELECT sum(total_harga) as total FROM 
			head_pengadaan 
			join detail_pengadaan  on head_pengadaan.id_pengadaan = detail_pengadaan.id_pengadaan
			where $aksi2";
			return $this->db->query($query)->result();
		}
	 }
	 public function belanjaperunit($id_user,$role){
		$tahun = $_SESSION['tahun'];
		$aksi = ' and head_pengadaan.tahun_anggaran = '.$tahun. '';
		$aksi2 = ' head_pengadaan.tahun_anggaran = '.$tahun. '';
		if($role == 'user'){
			$aksi .= ' AND  head_pengadaan.id_user='.$id_user;
		}
		if($tahun < 2024){
			$query = "SELECT users.unit_kerja, if(sum(total_harga) is null,0,sum(total_harga)) as total 
			FROM users
			left join head_pengadaan on users.id_user = head_pengadaan.id_user 
			left join detail_pengadaan  on head_pengadaan.id_pengadaan = detail_pengadaan.id_pengadaan and detail_pengadaan.id_subkegiatan !=0 and detail_pengadaan.id_uraian !=0 
			WHERE users.id_user != 1
			$aksi
			group by users.unit_kerja";
			return $this->db->query($query)->result();
		}else{
			$query = "SELECT users.unit_kerja, if(sum(total_harga) is null,0,sum(total_harga)) as total 
			FROM users
			left join head_pengadaan on users.id_user = head_pengadaan.id_user 
			left join detail_pengadaan  on head_pengadaan.id_pengadaan = detail_pengadaan.id_pengadaan  
			WHERE users.id_user != 1 $aksi
			group by users.unit_kerja";
			return $this->db->query($query)->result();
		}
	 }
 	/*setelah login*/
	
}

/* End of file log_model.php */
/* Location: ./application/models/log_model.php */