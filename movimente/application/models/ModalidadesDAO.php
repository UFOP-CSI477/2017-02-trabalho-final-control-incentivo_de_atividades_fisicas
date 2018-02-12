<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModalidadesDAO extends CI_Model
{
	private $con;

	function __construct()
	{
		parent::__construct();
		$this->load->model('Conexao');

		$this->con = $this->Conexao::getInstance();
	}

	public function select($idUsuario)
	{
		$sql = "SELECT m.id, m.nome, m.descricao, mu.id_usuario FROM modalidades m
				LEFT JOIN modalidades_usuarios mu ON m.id = mu.id_modalidade AND mu.id_usuario = ?";

		$stmt = $this->con->prepare($sql);
		$stmt->bindParam(1, $idUsuario);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function selectModalidadesUsuario($idUsuario) {
		$sql = "SELECT m.id, m.nome, m.descricao, mu.id_usuario FROM modalidades m
				INNER JOIN modalidades_usuarios mu ON m.id = mu.id_modalidade
				WHERE mu.id_usuario = ?
				ORDER BY m.nome";

		$stmt = $this->con->prepare($sql);
		$stmt->bindParam(1, $idUsuario);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function get($id) {
		$sql = "SELECT * FROM modalidades WHERE id = ?";

		$stmt = $this->con->prepare($sql);
		$stmt->bindParam(1, $id);
		$stmt->execute();
		return $stmt->fetchAll();
	}
}