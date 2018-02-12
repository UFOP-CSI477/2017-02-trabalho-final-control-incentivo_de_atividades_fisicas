<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modalidade extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('ModalidadesDAO');
		$this->load->model('ModalidadesUsuariosDAO');
	}

	public function index()
	{
		if (!$this->session->userdata('logado')) {
			set_msg('<div class="alert alert-danger alert-dismissable">Faça o login para acessar o sistema.</div>');
			redirect('Login', 'refresh');
		}

		$dados['modalidades'] = $this->ModalidadesDAO->select($this->session->userdata('id_usuario_logado'));

		$this->load->view('pages/modalidade', $dados);
	}

	public function aderir($id) {
		
		$result = $this->ModalidadesUsuariosDAO->insert($this->session->userdata('id_usuario_logado'), $id);

		if ($result) {
			set_msg('<div class="alert alert-success alert-dismissable">Modalidade Aderida.</div>');
		} else {
			set_msg('<div class="alert alert-danger alert-dismissable">Cadastro não aderida, tente novamente.</div>');
		}
		
		redirect('Modalidade', 'refresh');
	}
}