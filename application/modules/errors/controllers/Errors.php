<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	public function show_404()
	{
		
		$this->load->view('vw_error_404');
	}

}

/* End of file Errors.php */
/* Location: ./application/modules/errors/controllers/Errors.php */