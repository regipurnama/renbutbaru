<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Like extends CI_Model {
	private $_table="likes";

	public $id_post;
	public $id_user;
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
    
    public function save($id)
    {
        // var_dump($id);die;
        $this->id_user = $this->session->userdata('id_user');
        $this->id_post = $id;
    	$date = new DateTime();
        $this->datetime = $date->format('Y-m-d H:i:s');
        $this->db->insert($this->_table, $this);
    }
    public function delete($id)
    {
        $this->id_user = $this->session->userdata('id_user');
        return $this->db->delete($this->_table, array("id_post" => $id,"id_user" => $this->id_user));
    }
}

/* End of file log_model.php */
/* Location: ./application/models/M_Post.php */