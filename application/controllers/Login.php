<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Login extends CI_Controller
{	
	function __construct()
	{
		parent::__construct();
		$this->config->load('custom_config');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
	public function index()
	{		
		$login = $this->session->userdata('G1Kpmvg9j0fZJ447NiOT');
		if (isset($login) && $login = TRUE) {
			redirect(base_url());
		}
		if ($this->input->post()) {			
			$this->form_validation->set_rules('email', 'email', 'required|callback_login');
			if ($this->form_validation->run()) {
				$this->session->set_flashdata('message', 'Bạn vừa đăng nhập thành công.');
				$this->session->set_userdata(array('G1Kpmvg9j0fZJ447NiOT' => TRUE ));
				$this->session->set_userdata(array('WwmKlmIIN9Tl0zDK4zIW' => $this->input->post('email') ));
        		redirect(base_url());
			}
		}
		$this->load->view('login');
	}
	function login() {
    	$email = $this->input->post('email');
		if (in_array($email, $this->config->item('admin_emails'))) {
			return TRUE;
		}
		return FALSE;
	}
}