<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once("Secure_Controller.php");

class Test extends Secure_Controller
{
	public function __construct()
	{
		parent::__construct('attributes');
	}

	public function index()
	{
		$data = [];
		$this->load->view('themes/index', $data);
	}

}
