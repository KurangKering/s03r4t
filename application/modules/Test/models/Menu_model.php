<?php
class Menu_model extends CI_Model {

	public function all()
	{
		return $this->db->get('sys_menus')->result_array();

	}
}