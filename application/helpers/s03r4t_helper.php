<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('date_converter'))
{

	function date_converter($var)
	{
		$date = '';
		$dt = \DateTime::createFromFormat('d/m/Y', $var);
		$date = $dt->format('Y-m-d');
		return $date;
	}
}
