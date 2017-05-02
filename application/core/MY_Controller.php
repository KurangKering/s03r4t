<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model("md_Global", "menu");
		$items = $this->menu->get_menu();

		$this->load->library("multi_menu");
		$this->multi_menu->set_items($items);


		if (!$this->ion_auth->logged_in()) {
			redirect('auth');	
		}
	}



}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */