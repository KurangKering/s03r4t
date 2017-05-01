<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->data['full_name'] = $this->ion_auth->user()->row()->first_name;
		
	}
	public function index()
	{

		$this->data['user'] = $this->ion_auth->user()->row()->first_name;
		$this->data['group'] = $this->ion_auth->get_users_groups()->result_array();
		$this->template->render('vw_dashboard', $this->data);
		
	}

}

/* End of file dashboard.php */
/* Location: ./application/modules/dashboard/controllers/dashboard.php */