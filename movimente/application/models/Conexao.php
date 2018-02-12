<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conexao extends CI_Model
{
	private static $instance;

	function __construct()
	{
		parent::__construct();
	}

	public static function getInstance()
	{
		try {
	        if (!isset(self::$instance)) {
	            self::$instance = new PDO(
	            	'mysql:host=localhost;dbname=movimente',
	            	'movimente',
	            	'123456',
	            	[PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'']
            	);
	            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        }

	        return self::$instance;
	    } catch (PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
	    }
	}
}
