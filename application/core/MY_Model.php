<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class MY_Model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}
	var $table = '';

	//khóa chính của table
	var $key = 'id';
	var $order = '';
	var $select = '';

	/**
	*  
	*/
	function create($data = array())
	{
		if ($this->db->insert($this->table, $data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	/**
	*  
	*/
	function update_rule($data, $where)
	{
		if (!$where) {
			return FALSE;
		}
		$this->db->where($where);
		$this->db->update($this->table, $data);
	}
	function update($id, $data)
	{
		if (!$id) {
			return FALSE;
		}
		$where = array();
		$where[$this->key] = $id;
		$this->update_rule($data, $where);
		return TRUE;
	}
	/**
	* Ham xoa 
	*/
	function delete($id)
	{
		if (!$id) {
			return FALSE;
		}
		if (is_numeric($id)) {
			$where = array($this->key => $id );
		} else {
			//$id = 1,2,3
			$where = $this->key . "IN (" . $id . ") ";
		}
		$this->delete_rule($where);

		return TRUE;
	}

	function delete_rule($where)
	{
		if (!$where) {
			return FALSE;
		}
		$this->db->where($where);
		$this->db->delete($this->table);
	}

	/**
	* Ham it duoc su dung
	*/
	function query($sql = '')
	{
		$rows = $this->db->query($sql);
		return $rows->result;
	}

	/**
	* Lay 1 hoac nhieu thong tin cua row tu id 
	*/
	function get_info($id, $field = '')
	{
		if (!$id) {
			return FALSE;
		}
		$where = array($this->key => $id );
		return $this->get_info_rule($where, $field);
	}

	function get_info_rule($where = array(), $field = '')
	{
		if($field) {
			$this->db->select($field);
		}
		$this->db->where($where);
		$query = $this->db->get($this->table);
		if ($query->num_rows()) {
			return $query->row();
		}

		return FALSE;
	}

	/**
	* Đếm số hàng
	*/
	function get_total($input = array())
	{
		$this->get_list_set_input($input);
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}

	/**
	 * Lay tong so
	 * $field: cot muon tinh tong
	 */
	function get_sum($field, $where = array())
	{
		$this->db->select_sum($field);//tinh rong
		$this->db->where($where);//dieu kien
		$this->db->from($this->table);
		
		$row = $this->db->get()->row();
		foreach ($row as $f => $v)
		{
			$sum = $v;
		}
		return $sum;
	}
	
	/**
	 * Lay 1 row
	 */
	function get_row($input = array()){
		$this->get_list_set_input($input);
		
		$query = $this->db->get($this->table);
		
		return $query->row();
	}
	
	/**
	 * Lay danh sach
	 * $input : mang cac du lieu dau vao
	 */
	function get_list($input = array())
	{
	    //xu ly ca du lieu dau vao
		$this->get_list_set_input($input);
		
		//thuc hien truy van du lieu
		$query = $this->db->get($this->table);
		//echo $this->db->last_query();
		return $query->result();
	}
	
	/**
	 * Gan cac thuoc tinh trong input khi lay danh sach
	 * $input : mang du lieu dau vao
	 * Lỗi chưa tìm kiếm like được theo nhiều field, bị gán mặc định 1 tham số là tên bảng ?!?
	 */
	
	protected function get_list_set_input($input = array())
	{
		
		// Thêm điều kiện cho câu truy vấn truyền qua biến $input['where'] 
		// $input['where'] = array('email' => 'hocphp@gmail.com')
		// phải dùng dấu => để chỉ tương ứng giá trị, ko dùng dấu phẩy, do mặc định là mảng 2 chiều
		// nếu dùng dấu phẩy: $input['where'] = array('username', 'admin')
		// SELECT * FROM `admin` WHERE 0 = 'username' AND 1 = 'admin' ORDER BY `admin`.`id` DESC 
		if ((isset($input['where'])) && $input['where'])
		{
			$this->db->where($input['where']);
		}
		
		// tim kiem like
		// $input['like'] = array('name', 'abc');
		// dùng dấu phẩy, ko dùng dấu =>, do đây là mảng 1 chiều, ví dụ: $this->db->like('title', 'match');
		// nhiều điều kiện like dùng mảng 2 chiều
		// $array = array('title' => $match, 'page1' => $match, 'page2' => $match); $this->db->like($array);
		// WHERE `title` LIKE '%match%' ESCAPE '!' AND  `page1` LIKE '%match%' ESCAPE '!' AND  `page2` LIKE '%match%' ESCAPE '!'
	    if ((isset($input['like'])) && $input['like'])
		{
			$this->db->like($input['like'][0], $input['like'][1]); 
		}
		
		// Thêm sắp xếp dữ liệu thông qua biến $input['order'] 
		// $input['order'] = array('id','ASC') mặc định giá trị là DESC
		// dùng dấu phẩy do đây là mảng 1 chiều 
		if (isset($input['order'][0]) && isset($input['order'][1]))
		{
			$this->db->order_by($input['order'][0], $input['order'][1]);
		}
		else
		{
			//mặc định sẽ sắp xếp theo id giảm dần 
			$order = ($this->order == '') ? array($this->table.'.'.$this->key, 'desc') : $this->order;
			$this->db->order_by($order[0], $order[1]);
		}
		
		// Thêm điều kiện limit cho câu truy vấn thông qua biến $input['limit'] 
		// $input['limit'] = array(10, 0) có thể bỏ trống tham số thứ hai
		if (isset($input['limit'][0]) && isset($input['limit'][1]))
		{
			$this->db->limit($input['limit'][0], $input['limit'][1]);
		}
		
	}
	
	/**
	 * kiểm tra sự tồn tại của dữ liệu theo 1 điều kiện nào đó
	 * $where : mang du lieu dieu kien
	 */
    function check_exists($where = array())
    {
	    $this->db->where($where);
	    //thuc hien cau truy van lay du lieu
		$query = $this->db->get($this->table);
		
		if($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
}