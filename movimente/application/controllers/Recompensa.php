<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recompensa extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('RecompensasDAO');
	}

	public function index()
	{
		if (!$this->session->userdata('logado')) {
			set_msg('<div class="alert alert-danger alert-dismissable">Faça o login para acessar o sistema.</div>');
			redirect('Login', 'refresh');
		}

		$dados['recompensas'] = $this->RecompensasDAO->selectAll($this->session->userdata('id_usuario_logado'));

		$this->load->view('pages/recompensa', $dados);
	}
}