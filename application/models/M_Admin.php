<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model {
	

	//private $_table = "users";

    public $id_user;
    public $name;
    public $username;
    public $password;
    public $email;
    public $bio;
    public $hobby;
    public $gender;
    public $picture;
    

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

 	/*setelah login*/
	
}

/* End of file log_model.php */
/* Location: ./application/models/log_model.php */