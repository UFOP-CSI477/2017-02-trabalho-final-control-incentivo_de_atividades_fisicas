<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecompensasDAO extends CI_Model
{
	private $con;

	function __construct()
	{
		parent::__construct();
		$this->load->model('Conexao');

		$this->con = $this->Conexao::getInstance();
	}

	public function select($idUsuario, $idModalidade)
	{
		$sql = "SELECT r.id, r.mensagem
				FROM recompensas r
				INNER JOIN modalidades_usuarios m ON r.id_modalidade = m.id_modalidade
				WHERE r.id_modalidade = ?
					AND m.id_usuario = ?
						AND r.pontuacao_meta <= m.pontuacao_obtida
							AND r.id NOT IN (
								SELECT id_recompensa
								FROM recompensas_usuarios
								INNER JOIN recompensas ON id_recompensa = recompensas.id
								WHERE id_usuario = ?
									AND id_modalidade = ? 
							)";

		$stmt = $this->con->prepare($sql);
		$stmt->bindParam(1, $idModalidade);
		$stmt->bindParam(2, $idUsuario);
		$stmt->bindParam(3, $idUsuario);
		$stmt->bindParam(4, $idModalidade);
		$stmt->execute();
		return $stmt->fetchAll();
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

	public function selectAll($idUsuario) {
		$sql = "SELECT m.nome AS modalidade, r.descricao, ru.id AS recompensaAdquirida
				FROM recompensas r
				INNER JOIN modalidades m ON r.id_modalidade = m.id
				INNER JOIN modalidades_usuarios mu ON m.id = mu.id_modalidade
				LEFT JOIN recompensas_usuarios ru ON r.id = ru.id_recompensa
				WHERE mu.id_usuario = ?
				ORDER BY m.nome, r.pontuacao_meta";

		$stmt = $this->con->prepare($sql);
		$stmt->bindParam(1, $idUsuario);
		$stmt->execute();
		return $stmt->fetchAll();
	}
}
