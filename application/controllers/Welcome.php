<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	 public function __construct() {
		
 	    parent::__construct();
        $this->load->library(array('session'));
		$this->load->helper('url');
		

 }
	
public function index()
	{
		$this->load->view('user/login');
	}

	
function ceklogin(){
	
		$data = $this->input->post();
		$this->db->where("username",$data['username']);
		$this->db->where("password",md5($data['password']));
		$this->db->where("status",'1');
		$res = $this->db->get("users");
		$rows = $res->row();
 
		if($res->num_rows() == 1 ) { // login berhasil
			$this->session->set_userdata("logged_in_pas",true);
			$this->session->set_userdata("themes",'default');
			$this->session->set_userdata("pas_level",$rows->level);
			$this->session->set_userdata("pas_userid",$rows->id_user);
			$this->session->set_userdata("pas_nama",$rows->nama);
			$ret = array("success"=>true);
		} else {
			$ret = array("success"=>false,"pesan"=> "Login failed. Username or password wrong");
		}
 
		echo json_encode($ret);
	}
	
	
		 // Fungsi login
	public function do_login() {

	 $username = $this->input->post('username');
	 $password = $this->input->post('password');
	 
	 $query = $this->db->get_where('user',array('aktif'=>'Y','userakun'=>$username,'pwdakun' => password_verify($password)));
	 if($query->num_rows() == 1) {
	 $row = $this->db->query('SELECT * FROM user WHERE userakun = "'.$username.'"');
	 $admin = $row->row();
	 
	 if(password_verify($password,$admin->pwdakun)==true) {
	
	
	// Add  data in session
	$this->session->set_userdata('namauser', $admin->nama);
	$this->session->set_userdata('session_email', $admin->email);
	$this->session->set_userdata('session_cabang', $admin->cabang);
	$this->session->set_userdata('iduser', $admin->iduser);
	$this->session->set_userdata('level', $admin->level);
	$this->session->set_userdata('logged_in',true);
	 
	 redirect('index.php/apps/dashboard');
	 
	 } else {
		 
	 $this->session->set_flashdata('sukses','<div class="alert alert-warning"> Password anda salah <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button> </div>');
	 redirect('index.php/welcome');	 
	 }
	 }else {
		 
	 $this->session->set_flashdata('sukses','<div class="alert alert-warning"> Username anda salah <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button> </div>');
	 redirect('index.php/welcome');
	 }

	 
	 }
	 
function logout()
{
    $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'logged_in_pas' && $key != 'pas_level' && $key != 'pas_userid' && $key != 'themes' && $key != 'pas_nama') {
                $this->session->unset_userdata($key);
            }
        }
    $this->session->sess_destroy();
    redirect('index.php/welcome');
}

}
