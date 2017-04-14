<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Md_users extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}	


	public function get_users()
	{
		$sql = 'SELECT sys_users.*, GROUP_CONCAT(sys_groups.name SEPARATOR \',\') as data_group from sys_users join sys_user_group on sys_users.id = sys_user_group.user_id join sys_groups on sys_groups.id = sys_user_group.group_id group by sys_users.id';
		$que = $this->db->query($sql);
		return $que->result();

	}

}

/* End of file md_users.php */
/* Location: ./application/modules/access/models/md_users.php */