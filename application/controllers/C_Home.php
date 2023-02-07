<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Home extends CI_Controller {

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

	// constructor: fungsi yang pasti dieksekusi pertama kali
	public function __construct(){
		parent::__construct();
	   	//call db
		$this->load->database();
		// $db2 = $this->load->database('database_kedua', TRUE);

		//call model 
		$this->load->model('M_User');

		$this->load->library('session');


	}
	public function index()
	{
		$this->load->view('home/index');
	}
	public function registration()
	{
		$this->load->view('home/daftar');
	}
	public function savedaftar()
	{
		die;
		//insert user
		$this->M_User->insert();
    	if ($this->db->affected_rows() > 0) {
        	$data = ['status' => true, 'message' => 'Kamu Berhasil Daftar. Silahkan Login untuk berkicau'];
        	// $this->session->set_flashdata('status', 'Kamu Berhasil Daftar. Silahkan Login untuk berkicau');
        }else {
        	$data = ['status' => false, 'message' => 'Pendaftaran Kamu Gagal'];
        	// $this->session->set_flashdata('status', 'Pendaftaran Kamu Gagal');
        }
        $this->session->set_flashdata('data', $data);
        $this->load->view('home/index');
	}
	
    function checklogin(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$result = $this->M_User->check_login($username,$password)->row();
		$tahun = $this->input->post('tahun');
		// if exist
		if(count($result) > 0){
			$data= array(
				'id_user'=>$result->id_user,
				'unit_kerja'=>$result->unit_kerja,
				'username'=>$result->username,
				'role'=>$result->role,
				'unit_kerja_lengkap'=>$result->unit_kerja_lengkap,
				'bidang'=>$result->bidang,
				'direksi'=>$result->direksi,
				'tahun'=>$tahun,
				'session_id'=>$this->session->userdata('session_id'),
				'is_login'=>TRUE,
			);
      //$data = ['status' => true, 'message' => 'SELAMAT DATANG DI '.$data->unit_kerja];
			$this->session->set_userdata($data);
		  	redirect('RKBU/Dashboard');
		}else{
        $data = ['status' => true, 'message' => 'Username dan Password Salah'];
      
				$this->session->set_flashdata('data', $data);
				redirect('C_Home/index');
		}
	}
	function ubahpassword(){
		// var_dump("ubah");die;
		$result = $this->M_User->ubahpassword();
		
		// redirect('RKBU/Dashboard');
		
	}
	

	function logout(){
	    $this->session->sess_destroy();
	    redirect('C_Home/index');
	  }
}
