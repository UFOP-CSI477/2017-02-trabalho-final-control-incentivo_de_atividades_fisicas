<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller
{
	private $usuario;
	private $medidasCorporais;
	private $idade;

	function __construct()
	{
		parent::__construct();
		$this->load->model('UsuarioDAO');
		$this->load->model('MedidasCorporaisDAO');
	}

	public function index()
	{
		if (!$this->session->userdata('logado')) {
			set_msg('<div class="alert alert-danger alert-dismissable">Faça o login para acessar o sistema.</div>');
			redirect('Login', 'refresh');
		}

		$this->usuario = $this->UsuarioDAO->selectPorLogin($this->session->userdata('usuario_logado'));
		$this->usuario = reset($this->usuario);
		$this->medidasCorporais = $this->MedidasCorporaisDAO->select($this->usuario['id']);
		$this->medidasCorporais = reset($this->medidasCorporais);

		$date = new DateTime($this->usuario['data_nascimento']);
		$interval = $date->diff(new DateTime());
		$this->idade = $interval->format('%Y Anos');

		$dados['idade'] = $this->idade;
		$dados['nome'] = $this->usuario['nome'];
		$dados['email'] = $this->usuario['email'];
		$dados['dataNascimento'] = (new DateTime($this->usuario['data_nascimento']))->format('d/m/Y');
		$dados['altura'] = !empty($this->medidasCorporais['altura']) ? number_format($this->medidasCorporais['altura'], 2, ',', '.') . " metros" : "Não cadastrado";
		$dados['peso'] = !empty($this->medidasCorporais['peso']) ? number_format($this->medidasCorporais['peso'], 2, ',', '.') . " kg" : "Não cadastrado";
		$dados['biceps'] = !empty($this->medidasCorporais['biceps']) ? number_format($this->medidasCorporais['biceps'], 2, ',', '.') . " cm" : "Não cadastrado";
		$dados['antebraco'] = !empty($this->medidasCorporais['antebraco']) ? number_format($this->medidasCorporais['antebraco'], 2, ',', '.') . " cm" : "Não cadastrado";
		$dados['peito'] = !empty($this->medidasCorporais['peito']) ? number_format($this->medidasCorporais['peito'], 2, ',', '.') . " cm" : "Não cadastrado";
		$dados['cintura'] = !empty($this->medidasCorporais['cintura']) ? number_format($this->medidasCorporais['cintura'], 2, ',', '.') . " cm" : "Não cadastrado";
		$dados['quadris'] = !empty($this->medidasCorporais['quadris']) ? number_format($this->medidasCorporais['quadris'], 2, ',', '.') . " cm" : "Não cadastrado";
		$dados['coxas'] = !empty($this->medidasCorporais['coxas']) ? number_format($this->medidasCorporais['coxas'], 2, ',', '.') . " cm" : "Não cadastrado";
		$dados['panturrilha'] = !empty($this->medidasCorporais['panturrilha']) ? number_format($this->medidasCorporais['panturrilha'], 2, ',', '.') . " cm" : "Não cadastrado";

		$this->load->view('pages/pagina_inicial', $dados);
	}

	public function incluirMedidasCorporais()
	{
		$altura = !empty($this->input->post('altura')) ? str_replace(',', '.', $this->input->post('altura')) : null;
		$peso = !empty($this->input->post('peso')) ? str_replace(',', '.', $this->input->post('peso')) : null;
		$biceps = !empty($this->input->post('biceps')) ? str_replace(',', '.', $this->input->post('biceps')) : null;
		$antebraco = !empty($this->input->post('antebraco')) ? str_replace(',', '.', $this->input->post('antebraco')) : null;
		$peito = !empty($this->input->post('peito')) ? str_replace(',', '.', $this->input->post('peito')) : null;
		$cintura = !empty($this->input->post('cintura')) ? str_replace(',', '.', $this->input->post('cintura')) : null;
		$quadris = !empty($this->input->post('quadris')) ? str_replace(',', '.', $this->input->post('quadris')) : null;
		$coxas = !empty($this->input->post('coxas')) ? str_replace(',', '.', $this->input->post('coxas')) : null;
		$panturrilha = !empty($this->input->post('panturrilha')) ? str_replace(',', '.', $this->input->post('panturrilha')) : null;

		if (!empty($altura) || !empty($peso) || !empty($biceps) || !empty($antebraco) || !empty($peito) || !empty($cintura) || !empty($quadris) || !empty($coxas) || !empty($panturrilha)) {
			$this->MedidasCorporaisDAO->insert($this->session->userdata('id_usuario_logado'), $altura, $peso, $biceps, $antebraco, $peito, $cintura, $quadris, $coxas, $panturrilha);
		}
		
		redirect('Perfil', 'refresh');
	}
}