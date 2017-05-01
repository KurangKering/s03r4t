<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Md_menu extends CI_Model {

	public function get_menu() 
	{
		return $this->db->get('sys_menus')->result_array();
	}

}

/* End of file md_menu.php */
/* Location: ./application/modules/nav_menu/models/md_menu.php */