<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//$this->load->database();
		// $this->load->library(array('ion_auth','form_validation'));
		// $this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}
	public function index()
	{

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		else
		{
			redirect('dashboard','refresh');
		}

		// if (!$this->ion_auth->logged_in())
		// {
		// 	// redirect them to the login page
		// 	redirect('auth/login', 'refresh');
		// }
		// elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		// {
		// 	// redirect them to the home page because they must be an administrator to view this
		// 	return show_error('You must be an administrator to view this page.');
		// }
		// else
		// {
		// 	// set the flash data error message if there is one
		// 	$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		// 	//list the users
		// 	$this->data['users'] = $this->ion_auth->users()->result();
		// 	foreach ($this->data['users'] as $k => $user)
		// 	{
		// 		$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
		// 	}

		// 	$this->_render_page('auth/index', $this->data);
		// }
	}


	public function login()
	{

		$this->data['title'] = $this->lang->line('login_heading');

		//validate form input
		$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

		if ($this->form_validation->run() == true)
		{
			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('dashboard', 'refresh');
			}
			else
			{
				// if the login was un-successful
				// redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array('name' => 'identity',
				'id'          => 'identity',
				'type'        => 'text',
				'value'       => $this->form_validation->set_value('identity'),
				'class'       => 'form-control',
				'placeholder' => 'Username',
				//'required'    => '',
				);
			$this->data['password'] = array('name' => 'password',
				'id'          => 'password',
				'type'        => 'password',
				'class'       => 'form-control',
				'placeholder' => 'Password',
				//'required'    => '',
				);

			$this->load->view('auth/vw_login', $this->data);
			// $this->_render_page('auth/login', $this->data);
		}
	}

	
	public function logout()
	{
		$this->data['title'] = "Logout";

		// log the user out
		$logout = $this->ion_auth->logout();

		// redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('auth/login', 'refresh');
	}
	

}

/* End of file Auth.php */
/* Location: ./application/modules/auth/controllers/Auth.php */