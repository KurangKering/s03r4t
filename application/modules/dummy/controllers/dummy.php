<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dummy extends CI_Controller {

	public function index()
	{
		$this->load->view('vw_dummy');
	}

}

/* End of file dummy.php */
/* Location: ./application/modules/dummy/controllers/dummy.php */