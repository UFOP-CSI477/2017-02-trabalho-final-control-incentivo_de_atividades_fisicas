<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('set_msg')) {
	function set_msg($msg = nulll)
	{
		$ci = & get_instance();
		$ci->session->set_userdata('aviso', $msg);
	}
}

if (!function_exists('get_msg')) {
	function get_msg($destroy = true)
	{
		$ci = & get_instance();
		$retorno = $ci->session->userdata('aviso');
		if ($destroy) {
			$ci->session->unset_userdata('aviso');
		}
		return $retorno;
	}
}

if (!function_exists('print_array')) {
	function print_array($array)
	{
		echo "<pre>";
		print_r($array);
		echo "</pre>";
	}
}