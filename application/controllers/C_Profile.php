<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Profile extends CI_Controller {

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
	   	$this->load->helper('url', 'form');
	   	
		$this->load->database();
		$this->load->model('M_User');
	}
	public function index()
	{
		$this->session_check();
		$id_user =  $this->session->userdata('id_user');
		$result =  $this->M_User->getById($id_user);
		$data['profile'] = $result;
		$this->load->view('header/meta');
		$this->load->view('header/header',$data);
		$this->load->view('Profile/index',$data);
	}
	public function detail()
	{
		$this->session_check();
		//$id_user =  $this->session->userdata('id_user');
		$id_user = $this->input->get('id');
		$result =  $this->M_User->getById($id_user);
		$data['profile'] = $result;
		$this->load->view('header/meta');
		$this->load->view('header/header',$data);
		$this->load->view('Profile/detail',$data);
	}
	public function updateprofile()
	{
		$this->session_check();
		$this->M_User->update();
		if ($this->db->affected_rows() > 0) {
        	$this->session->set_flashdata('status', 'Data Profile Berhasil di Ubah.');
        }else {
        	$this->session->set_flashdata('status', 'Ups, Tidak Ada Data yang berubah');
        }
		redirect('C_Profile/index');
	}

	function session_check(){
		if($this->session->userdata('is_login') == FALSE){
			$this->session->set_flashdata('status', 'Please Login First! ');
			redirect('C_Home/index');
		}
	}
}
