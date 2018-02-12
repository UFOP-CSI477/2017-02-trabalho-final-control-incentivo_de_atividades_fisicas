<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atividade extends CI_Controller
{
	private $idUsuario;
	private $descricao;
	private $data;
	private $pontuacao;

	function __construct()
	{
		parent::__construct();
		$this->load->model('AtividadesDAO');
		$this->load->model('ModalidadesDAO');
		$this->load->model('ModalidadesUsuariosDAO');
		$this->load->model('RecompensasDAO');
		$this->load->model('RecompensasUsuariosDAO');
	}

	public function index($idModalidade)
	{
		if (!$this->session->userdata('logado')) {
			set_msg('<div class="alert alert-danger alert-dismissable">Faça o login para acessar o sistema.</div>');
			redirect('Login', 'refresh');
		}

		$dados['modalidade'] = $this->ModalidadesDAO->get($idModalidade);
		$dados['atividades'] = $this->AtividadesDAO->select($this->session->userdata('id_usuario_logado'), $idModalidade);
		
		$this->load->view('pages/atividade', $dados);
	}

	public function incluir($idModalidade) {

		if (!$this->session->userdata('logado')) {
			set_msg('<div class="alert alert-danger alert-dismissable">Faça o login para acessar o sistema.</div>');
			redirect('Login', 'refresh');
		}

		if (in_array($idModalidade, [1, 2, 3])) {
            $label = 'Distância percorrida';
        } else if (in_array($idModalidade, [4, 6])){
            $label = 'Pontos marcados';
        } else if (in_array($idModalidade, [5])) {
            $label = 'Gols marcados';
        }

		$this->form_validation->set_rules('descricao', 'Descrição Atividade', 'trim|required');
		$this->form_validation->set_rules('pontuacao', $label, 'required|is_natural_no_zero');
		$this->form_validation->set_rules('data', 'Data', 'required');

		if ($this->form_validation->run() == false) {
			if (validation_errors('<div class="alert alert-danger alert-dismissable">', '</div>')) {
				set_msg(validation_errors('<div class="alert alert-danger alert-dismissable">', '</div>'));
			}
		} else {
			if (count($this->input->post()) > 0) {
				$this->idUsuario = $this->session->userdata('id_usuario_logado');
				$this->descricao = $this->input->post('descricao');
				$this->data = $this->input->post('data');
				$this->pontuacao = $this->input->post('pontuacao');

				$result = $this->AtividadesDAO->insert($idModalidade, $this->idUsuario, $this->descricao, $this->data, $this->pontuacao);

				if ($result) {
					$this->ModalidadesUsuariosDAO->update($idModalidade, $this->idUsuario, $this->pontuacao);
					$novasRecompensas = $this->RecompensasDAO->select($this->idUsuario, $idModalidade);

					if (count($novasRecompensas) > 0) {
						$msg = "";
						foreach ($novasRecompensas as $row) {
							$this->RecompensasUsuariosDAO->insert($row['id'], $this->idUsuario);
							$msg .= "<p>".$row['mensagem']."</p>";
						}
						set_msg('<div class="alert alert-success alert-dismissable">'.$msg.'.</div>');
						redirect(base_url('Recompensa/index/'.$idModalidade), 'refresh');
					} else {
						set_msg('<div class="alert alert-success alert-dismissable">Atividade cadastrada.</div>');
						redirect(base_url('Atividade/index/'.$idModalidade), 'refresh');
					}
				} else {
					set_msg('<div class="alert alert-danger alert-dismissable">Atividade não inserida, tente novamente.</div>');
					redirect(base_url('Atividade/incluir/'.$idModalidade), 'refresh');
				}
			}
		}

		$dados['modalidade'] = $this->ModalidadesDAO->get($idModalidade);
		$this->load->view('pages/cadastro_atividade', $dados);
	}
}