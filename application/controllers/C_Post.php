<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Post extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
		parent::__construct();
	   	$this->load->library('session');
	   	$this->load->library('form_validation');
    	// $this->load->helper('url', 'form');

	   	
		$this->load->database();
		$this->load->model('M_User');
		$this->load->model('M_Post');
		$this->load->model('M_Comment');
		$this->load->model('M_Like');
	}
	public function index()
	{
		$this->session_check();
		$id_user =  $this->session->userdata('id_user');
		$result =  $this->M_User->getById($id_user);
		$data['profile'] = $result;
		$result =  $this->M_Post->getbyiduser();
		$data['posts'] = $result;
		$this->load->view('header/meta');
		$this->load->view('header/header',$data);
		$this->load->view('post/index',$data);
	}
	public function post()
	{
		$this->session_check();
		$id = $this->input->get('id');
		//var_dump($id);die;
		$id_user =  $this->session->userdata('id_user');
		$result =  $this->M_User->getById($id_user);
		$data['profile'] = $result;
		$post =  $this->M_Post->getpostuserbyidpost($id);
		// var_dump($post);die;
		$data['post'] = $post;

		$comment =  $this->M_Comment->getcomuserbyidpost($id);
		$data['comment'] = $comment;
		$this->load->view('header/meta');
		$this->load->view('header/header',$data);
		$this->load->view('post/post',$data);
	}
	public function savepost()
	{
		$this->session_check();
		$this->M_Post->save();
		if ($this->db->affected_rows() > 0) {
        	$this->session->set_flashdata('status', 'Anda telah Berkicau');
        }else {
        	$this->session->set_flashdata('status', 'Ups, Kicauan Anda Tidak Terdengar');
        }
		redirect('C_Post/index');
	}
	public function savecomment()
	{
		$this->session_check();
		// //var_dump($this->input->post());die;
		// $id = $this->input->get('id');
		$this->M_Comment->save();
		redirect('C_Post/post?id='.$this->input->post('id_post'));
	}
	public function likes()
	{
		$this->session_check();
		$id = $this->input->get('id');
		$this->M_Like->save($id);
		redirect('C_timeline/index');
	}
	public function likesfrompost()
	{
		$this->session_check();
		$id = $this->input->get('id');
		$this->M_Like->save($id);
		redirect('C_Post/index');
	}
	public function unlikes()
	{
		$this->session_check();
		$id = $this->input->get('id');
		$this->M_Like->delete($id);
		redirect('C_timeline/index');
	}public function unlikesfrompost()
	{
		$this->session_check();
		$id = $this->input->get('id');
		$this->M_Like->delete($id);
		redirect('C_Post/index');
	}


	function session_check(){
		if($this->session->userdata('is_login') == FALSE){
			$this->session->set_flashdata('status', 'Please Login First! ');
			redirect('C_Home/index');
		}
	}
}
