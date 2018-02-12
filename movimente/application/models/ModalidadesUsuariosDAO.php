<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModalidadesUsuariosDAO extends CI_Model
{
	private $con;

	function __construct()
	{
		parent::__construct();
		$this->load->model('Conexao');

		$this->con = $this->Conexao::getInstance();
	}

	public function insert($idUsuario, $idModalidade)
	{
		$sql = "INSERT INTO modalidades_usuarios (id_usuario, id_modalidade)
				VALUES (?, ?)";

		$stmt = $this->con->prepare($sql);
		$stmt->bindParam(1, $idUsuario);
		$stmt->bindParam(2, $idModalidade);
		return $stmt->execute();
	}

	public function update($idModalidade, $idUsuario, $pontuacao)
	{
		$sql = "UPDATE modalidades_usuarios
				SET pontuacao_obtida = (pontuacao_obtida + ?)
				WHERE id_usuario = ?
					AND id_modalidade = ?";

		$stmt = $this->con->prepare($sql);
		$stmt->bindParam(1, $pontuacao);
		$stmt->bindParam(2, $idUsuario);
		$stmt->bindParam(3, $idModalidade);
		return $stmt->execute();
	}
}
