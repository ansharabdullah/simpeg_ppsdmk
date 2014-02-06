<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {
    
    public function __construct(){
		parent::__construct();
		
    }
    
	public function submit_login()
    {
		$this->session->set_userdata('user',$this->input->post('username'));
		redirect(base_url());
    }
	
	public function logout()
    {
		$this->session->sess_destroy();
		redirect(base_url());
    }
	
	public function index()
    {
		$this->load->view("v_login");
    }
        
}
