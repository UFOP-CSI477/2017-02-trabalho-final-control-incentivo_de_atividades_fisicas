<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AtividadesDAO extends CI_Model
{
	private $con;

	function __construct()
	{
		parent::__construct();
		$this->load->model('Conexao');

		$this->con = $this->Conexao::getInstance();
	}

	public function insert($idModalidade, $idUsuario, $descricao, $data, $pontuacao)
	{	
		$sql = "INSERT INTO atividades(id_modalidade, id_usuario, descricao, data, pontuacao)
				VALUES(?, ?, ?, ?, ?)";

		$stmt = $this->con->prepare($sql);
		$stmt->bindParam(1, $idModalidade);
		$stmt->bindParam(2, $idUsuario);
		$stmt->bindParam(3, $descricao);
		$stmt->bindParam(4, $data);
		$stmt->bindParam(5, $pontuacao);
		return $stmt->execute();
	}
	
	public function select($idUsuario, $idModalidade)
	{
		$sql = "SELECT a.descricao, a.data, a.pontuacao
				FROM atividades a
				WHERE a.id_usuario = ?
					AND a.id_modalidade = ?";

		$stmt = $this->con->prepare($sql);
		$stmt->bindParam(1, $idUsuario);
		$stmt->bindParam(2, $idModalidade);
		$stmt->execute();
		return $stmt->fetchAll();
	}
}
