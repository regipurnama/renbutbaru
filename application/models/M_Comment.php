<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Comment extends CI_Model {
	private $_table="comments";

	public $id_post;
	public $id_user;
	public $title;
	public $datetime;

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
        $post = $this->input->post();;
        $this->id_user = $this->session->userdata('id_user');
        $this->id_post = $post["id_post"];
        $this->title = $post["title"];
    	$date = new DateTime();
        $this->datetime = $date->format('Y-m-d H:i:s');
        $this->db->insert($this->_table, $this);
    }
    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_post" => $id));
    }
}

/* End of file log_model.php */
/* Location: ./application/models/M_Post.php */