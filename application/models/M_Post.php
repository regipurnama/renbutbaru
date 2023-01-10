<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Post extends CI_Model {
	private $_table="posts";

	public $id_post;
	public $id_user;
	public $title;
	public $picture;
	public $datetime;

    public function getAll()
    {
    	$this->db->order_by('datetime','DESC');
        return $this->db->get($this->_table)->result();
    }
    public function gettimeline()
    {
         $this->id_user = $this->session->userdata('id_user');
    	$sql = "SELECT users.id_user,users.username,users.picture as pp,posts.title,posts.id_post,posts.picture,(SELECT COUNT(*) FROM posts a JOIN comments ON a.id_post = comments.id_post WHERE a.id_post = posts.id_post ) as sum_comment,(SELECT COUNT(*) FROM posts a JOIN likes ON a.id_post = likes.id_post WHERE a.id_post = posts.id_post ) as sum_like,(SELECT count(*) FROM likes WHERE likes.id_user = users.id_user AND likes.id_post = posts.id_post) as stat,(SELECT likes.id_user FROM likes WHERE likes.id_user = $this->id_user AND likes.id_post = posts.id_post) as user_like FROM posts JOIN users ON posts.id_user = users.id_user ORDER BY posts.id_post DESC";
		return $this->db->query($sql)->result();
    }
    public function getbyidpost($id)
    {
    	// var_dump($id);

    	$this->db->where(["id_post" => $id]);
        return $this->db->get($this->_table)->row();
    }


    public function getpostuserbyidpost($id){
        $this->db->select('*,posts.picture as picture, users.picture as pp');
        $this->db->from('posts');
        $this->db->join('users', 'users.id_user = posts.id_user');
        $this->db->where(["posts.id_post" => $id]);
        return $this->db->get()->row();
    }
    public function getbyiduser()
    {
        $this->id_user = $this->session->userdata('id_user');
    	$sql = "SELECT users.id_user,users.username,users.picture as pp,posts.title,posts.id_post,posts.picture,(SELECT COUNT(*) FROM posts a JOIN comments ON a.id_post = comments.id_post WHERE a.id_post = posts.id_post ) as sum_comment,(SELECT COUNT(*) FROM posts a JOIN likes ON a.id_post = likes.id_post WHERE a.id_post = posts.id_post ) as sum_like,(SELECT count(*) FROM likes WHERE likes.id_user = users.id_user AND likes.id_post = posts.id_post) as stat
                FROM posts 
                JOIN users ON posts.id_user = users.id_user
                WHERE users.id_user = $this->id_user
                ORDER BY posts.id_post DESC";
        return $this->db->query($sql)->result();
    }
    public function save()
    {
        $post = $this->input->post();
        //var_dump($post);die;
        $this->id_user = $this->session->userdata('id_user');
        $this->title = $post["title"];
        $this->picture = $this->UploadImage();
    	$date = new DateTime();
        $this->datetime = $date->format('Y-m-d H:i:s');
        $this->db->insert($this->_table, $this);
    }
    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_post" => $id));
    }
    private function UploadImage(){
        $date = new DateTime();
        $now =  $date->format('U');
        
        $config['upload_path']          = './assets/img_post/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000000;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $new_name = $now.$_FILES['picture']['name'];
        $config['file_name']           = $new_name;
        
        $this->load->library('upload', $config);
        
        $path          = '../assets/img_post/';
        
        if ($this->upload->do_upload('picture')){
    
            $data = array('upload_data' => $this->upload->data());
            $return = $path . $new_name;
            return $return;
        }

         $return =  NULL;
        return $return;
    
    }
}

/* End of file log_model.php */
/* Location: ./application/models/M_Post.php */