<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->library(array('session','pagination'));
				
	}
	
	
	
	function themes($id) {
	
		$this->session->set_userdata("themes",$id);
		
		redirect('index.php/apps/dashboard');
		
	}
	
	
}