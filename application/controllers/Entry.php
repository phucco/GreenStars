<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Entry extends MY_Controller
{	
	function __construct()
	{
		parent::__construct();
		$this->load->model('entry_model');
		$this->load->model('category_model');
	}

	public function index($slug = FALSE)
	{
		$input = array();
		if ($slug === FALSE)
        {        	
        	$list = $this->entry_model->get_list($input);
        } else {
        	if (strlen($slug) == 2) {
        		$input['where'] = array('building' => $slug);
        	} else {
        		$category_id = $this->_cate_slug_to_id($slug);
        		$input['where'] = array('category_id' => $category_id);
        	}        	
        	$list = $this->entry_model->get_list($input);			
        }
        foreach ($list as $row) {
        	$row->slug = $this->_cate_id_to_slug($row->category_id);
        	$row->category_name = $this->_cate_id_to_name($row->category_id);
        }

		$this->data['list'] = $list;
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['type_message'] = $this->session->flashdata('type_message');

		$this->data['temp'] = 'entry/index';
		$this->load->view('templates/layout', $this->data);
	}

	/**
	* 3 function hỗ trợ cho chuyển đổi category và entry
	*/

	function _cate_slug_to_id($slug = '')
	{
		if (!$slug) {
			return FALSE;
		}
		
		$input = array();
		$input['where'] = array('slug' => $slug);
		$info = $this->category_model->get_row($input);
		if (!$info) {
			show_404();			
		}
		return $info->id;
	}

	function _cate_id_to_slug($id)
	{
		if (!$id) {
			return FALSE;
		}
		
		$input = array();
		$input['where'] = array('id' => $id);
		$info = $this->category_model->get_row($input);
		if (!$info) {
			show_404();			
		}
		return $info->slug;
	}

	function _cate_id_to_name($id)
	{
		if (!$id) {
			return FALSE;
		}
		
		$input = array();
		$input['where'] = array('id' => $id);
		$info = $this->category_model->get_row($input);
		if (!$info) {
			show_404();			
		}
		return $info->name;
	}	

	public function add()
	{	
		$this->_check_login();
		$this->load->library('form_validation');
		$this->load->helper('form');
		
		if ($this->input->post())
		{
			$config = array(
		        array(
	                'field' => 'category_id',
	                'label' => 'danh mục',
	                'rules' => 'required',
	                'errors' => array('required' => 'Chưa chọn %s!')
		        ),
		        array(
	                'field' => 'name',
	                'label' => 'sản phẩm - dịch vụ',
	                'rules' => 'required',
	                'errors' => array('required' => 'Chưa điền tên %s.')
		        ),
		        
		        array(
	                'field' => 'room',
	                'label' => 'số phòng',
	                'rules' => 'required|max_length[5]',
	                'errors' => array('required' => 'Chưa điền %s.','max_length' => 'Số phòng chứa tối đa 5 ký tự.')
		        ),
		        array(
	                'field' => 'building',
	                'label' => 'tòa',
	                'rules' => 'required',
	                'errors' => array('required' => 'Chưa chọn %s.')
		        ),
		        array(
		        	'field' => 'phone',
	                'label' => 'Số điện thoại',
	                'rules' => 'numeric|min_length[10]|max_length[11]|callback_check_num0_phone',
	                'errors' => array(
	                	'numeric' => '%s không đúng định dạng, chỉ bao gồm 10 hoặc 11 chữ số, không chứa khoảng trắng hoặc ký tự khác.',
	                	'min_length' => '%s không đúng định dạng, chỉ bao gồm 10 hoặc 11 chữ số, không chứa khoảng trắng hoặc ký tự khác.',
	                	'max_length' => '%s không đúng định dạng, chỉ bao gồm 10 hoặc 11 chữ số, không chứa khoảng trắng hoặc ký tự khác.',
	                	'check_num0_phone' => '%s không đúng định dạng, phải bắt đầu bằng số 0.'
	                	)
	        	),
			);
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run())
			{
				$info = array(
					'name' => $this->input->post('name'),
					'category_id' => $this->input->post('category_id'),
					'room' => $this->input->post('room'),
					'building' => $this->input->post('building'),
					'phone' => $this->input->post('phone'),
					'fb_name' => $this->input->post('fb_name'),
					'fb_link' => $this->input->post('fb_link'),
					'note' => $this->input->post('note')
				);
				if ($this->entry_model->create($info))
				{
					$this->session->set_flashdata('type_message', 'success');
		        	$this->session->set_flashdata('message','Thêm sản phẩm - dịch vụ mới thành công.');
		        }
		        else
		        {
		        	$this->session->set_flashdata('type_message', 'danger');
		        	$this->session->set_flashdata('message','Thêm sản phẩm - dịch vụ mới thất bại. Vui lòng thử lại.');
		        }
		        redirect(base_url());
		    }
		}

		$this->data['temp'] = 'entry/add';
		$this->load->view('templates/layout', $this->data);
	}

	function check_num0_phone()
	{
		$phone = $this->input->post('phone');
		$first_char = substr($phone, 0, 1);
		if ($first_char == '0') {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

	public function edit()
	{
		$this->_check_login();
		$this->load->library('form_validation');
		$this->load->helper('form');

		$id = intval($this->uri->rsegment('3'));

		$info = $this->entry_model->get_info($id);
		if (!$info)
		{
			$this->session->set_flashdata('message','Không tồn tại sản phẩm dịch vụ này.');
			$this->session->set_flashdata('type_message', 'danger');
			redirect(base_url());
		}
		$this->data['info'] = $info;

		if ($this->input->post())
		{
			$config = array(
		        array(
	                'field' => 'category_id',
	                'label' => 'danh mục',
	                'rules' => 'required',
	                'errors' => array('required' => 'Chưa chọn %s!')
		        ),
		        array(
	                'field' => 'name',
	                'label' => 'sản phẩm - dịch vụ',
	                'rules' => 'required',
	                'errors' => array('required' => 'Chưa điền tên %s.')
		        ),
		        
		        array(
	                'field' => 'room',
	                'label' => 'số phòng',
	                'rules' => 'required|max_length[5]',
	                'errors' => array('required' => 'Chưa điền %s.','max_length' => 'Số phòng chứa tối đa 5 ký tự.')
		        ),
		        array(
	                'field' => 'building',
	                'label' => 'tòa',
	                'rules' => 'required',
	                'errors' => array('required' => 'Chưa chọn %s.')
		        ),
		        array(
		        	'field' => 'phone',
	                'label' => 'Số điện thoại',
	                'rules' => 'numeric|min_length[10]|max_length[11]|callback_check_num0_phone',
	                'errors' => array(
	                	'numeric' => '%s không đúng định dạng, chỉ bao gồm 10 hoặc 11 chữ số, không chứa khoảng trắng hoặc ký tự khác.',
	                	'min_length' => '%s không đúng định dạng, chỉ bao gồm 10 hoặc 11 chữ số, không chứa khoảng trắng hoặc ký tự khác.',
	                	'max_length' => '%s không đúng định dạng, chỉ bao gồm 10 hoặc 11 chữ số, không chứa khoảng trắng hoặc ký tự khác.',
	                	'check_num0_phone' => '%s không đúng định dạng, phải bắt đầu bằng số 0.'
	                	)
	        	),
			);
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run())
			{
				$info2 = array(
					'name' => $this->input->post('name'),
					'category_id' => $this->input->post('category_id'),
					'room' => $this->input->post('room'),
					'building' => $this->input->post('building'),
					'phone' => $this->input->post('phone'),
					'fb_name' => $this->input->post('fb_name'),
					'fb_link' => $this->input->post('fb_link'),
					'note' => $this->input->post('note')
				);
				if ($this->entry_model->update($id, $info2))
				{
					$this->session->set_flashdata('type_message', 'success');
		        	$this->session->set_flashdata('message','Thay đổi thông tin sản phẩm - dịch vụ thành công.');
		        }
		        else
		        {
		        	$this->session->set_flashdata('type_message', 'danger');
		        	$this->session->set_flashdata('message','Thay đổi thông tin sản phẩm - dịch vụ thất bại. Vui lòng thử lại.');
		        }
		        redirect(base_url());
		    }
		}

		$this->data['temp'] = 'entry/edit';
		$this->load->view('templates/layout', $this->data);		
	}
}