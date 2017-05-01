<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('date_converter'))
{

	function date_converter($var)
	{
		$date = '';
		if ($dt = \DateTime::createFromFormat('d/m/Y', $var)) {
			$date = $dt->format('Y-m-d');
		}
		else if ($dt = \DateTime::createFromFormat('Y-m-d', $var)) {
			$date = $dt->format('d/m/Y');
		}

		
		return $date;
	}
}


if ( ! function_exists('currentUser'))
{

	function currentUser()
	{
		$CI =& get_instance();
		$CI->load->library('ion_auth');
		return $CI->ion_auth->user()->row_array();
	}
}