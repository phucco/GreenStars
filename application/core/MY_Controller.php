<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class MY_Controller extends CI_Controller
{	
	//biến gửi dữ liệu sang view
	public $data = array();

	function __construct()
	{
		parent::__construct();		
	}

	public function _check_login()
	{
		$login = $this->session->userdata('G1Kpmvg9j0fZJ447NiOT');		
		if (!isset($login) || $login = FALSE) {
			$this->session->set_flashdata('message', 'Bạn phải đăng nhập để tiếp tục.');
			$this->session->set_flashdata('type_message', 'warning');
			redirect(base_url('login/'));
		}

	}


	public function index()
	{
		
	}
}