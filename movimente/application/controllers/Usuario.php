<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller
{
	private $cpf;
	private $nome;
	private $login;
	private $senha;
	private $email;
	private $dataNascimento;

	function __construct()
	{
		parent::__construct();
		$this->load->model('UsuarioDAO');
	}

	public function incluir()
	{
		$dados['titulo'] = "Cadastro Usuário";

		$this->form_validation->set_rules('nome', 'Nome Completo', 'trim|required');
		$this->form_validation->set_rules('cpf', 'CPF', 'trim|required');
		$this->form_validation->set_rules('email', 'E-mail', 'trim|required');
		$this->form_validation->set_rules('dtNascimento', 'Data de Nascimento', 'trim|required');
		$this->form_validation->set_rules('usuario', 'Usuário', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('senha', 'Senha', 'trim|required|min_length[6]');

		if ($this->form_validation->run() == false) {
			if (validation_errors()) {
				set_msg(validation_errors('<div class="alert alert-danger alert-dismissable">', '</div>'));
			}
			$this->load->view('pages/cadastro_usuario', $dados);
		} else {
			$this->cpf = $this->input->post('cpf');
			$this->nome = $this->input->post('nome');
			$this->login = $this->input->post('usuario');
			$this->senha = password_hash($this->input->post('senha'), PASSWORD_DEFAULT);
			$this->email = $this->input->post('email');
			$this->dataNascimento = $this->input->post('dtNascimento');

			$result = $this->UsuarioDAO->insert($this->cpf, $this->nome, $this->login, $this->senha, $this->email, $this->dataNascimento);

			if ($result) {
				set_msg('<div class="alert alert-success alert-dismissable">Cadastro efetuado com sucesso, use os dados cadastrados para logar no Sistema.</div>');
				redirect('Login', 'refresh');
			} else {
				set_msg('<div class="alert alert-danger alert-dismissable">Cadastro não efetuado, tente novamente.</div>');
				redirect('CadastroUsuario', 'refresh');
			}			
		}
	}

	public function alterar() {

		$this->form_validation->set_rules('nome', 'Nome Completo', 'trim|required');
		$this->form_validation->set_rules('email', 'E-mail', 'trim|required');
		$this->form_validation->set_rules('dtNascimento', 'Data de Nascimento', 'trim|required');
		$this->form_validation->set_rules('senha', 'Senha', 'trim|required|min_length[6]');

		if ($this->form_validation->run() == false) {
			if (validation_errors()) {
				set_msg(validation_errors('<div class="alert alert-danger alert-dismissable">', '</div>'));
			}
		} else {
			$this->nome = $this->input->post('nome');
			$this->senha = password_hash($this->input->post('senha'), PASSWORD_DEFAULT);
			$this->email = $this->input->post('email');
			$this->dataNascimento = $this->input->post('dtNascimento');

			$result = $this->UsuarioDAO->update($this->nome, $this->senha, $this->email, $this->dataNascimento, $this->session->userdata('id_usuario_logado'));

			if ($result) {
				set_msg('<div class="alert alert-success alert-dismissable">Cadastro alterado com sucesso.</div>');
				redirect(base_url('Perfil'), 'refresh');
			} else {
				set_msg('<div class="alert alert-danger alert-dismissable">Cadastro não alterado, tente novamente.</div>');
				redirect(base_url('Usuario/alterar'), 'refresh');
			}			
		}

		$this->load->view('pages/alterar_usuario');
	}

	public function excluir() {
		$result = $this->UsuarioDAO->delete($this->session->userdata('id_usuario_logado'));

		if ($result) {
			set_msg('<div class="alert alert-success alert-dismissable">Usuário excluído do sistema.</div>');
				redirect(base_url('Login'), 'refresh');
		} else {
			set_msg('<div class="alert alert-success alert-dismissable">Exclusão não realizada, tente novamente.</div>');
			redirect(base_url('Perfil'), 'refresh');
		}
	}
}