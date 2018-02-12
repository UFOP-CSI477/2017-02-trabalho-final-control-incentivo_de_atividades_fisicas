<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('UsuarioDAO');
	}

	public function index()
	{
		$dados['titulo'] = "Login";

		$this->form_validation->set_rules('usuario', 'Usuário', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('senha', 'Senha', 'trim|required|min_length[6]');

		if ($this->form_validation->run() == false) {
			if (validation_errors('<div class="alert alert-danger alert-dismissable">', '</div>')) {
				set_msg(validation_errors('<div class="alert alert-danger alert-dismissable">', '</div>'));
			}
		} else {
			$result = $this->UsuarioDAO->selectPorLogin($this->input->post('usuario'));

			if (count($result) > 0) {
				if (password_verify($this->input->post('senha'), reset($result)['senha'])) {
					$this->session->set_userdata('logado', TRUE);
					$this->session->set_userdata('usuario_logado', reset($result)['login']);
					$this->session->set_userdata('id_usuario_logado', reset($result)['id']);

					redirect('Perfil', 'refresh');
				} else {
					set_msg('<div class="alert alert-danger alert-dismissable">Senha incorreta.</div>');
					redirect('Login', 'refresh');
				}
			} else {
				set_msg('<div class="alert alert-danger alert-dismissable">Usuário incorreto.</div>');
				redirect('Login', 'refresh');
			}
		}

		$this->load->view('pages/login', $dados);	
	}

	public function deslogar() {
		$this->session->set_userdata('logado', FALSE);
		redirect('Login', 'refresh');
	}
}