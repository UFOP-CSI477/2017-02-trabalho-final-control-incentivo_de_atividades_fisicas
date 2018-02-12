<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecompensasUsuariosDAO extends CI_Model
{
	private $con;

	function __construct()
	{
		parent::__construct();
		$this->load->model('Conexao');

		$this->con = $this->Conexao::getInstance();
	}

	public function insert($idRecompensa, $idUsuario)
	{	
		$sql = "INSERT INTO recompensas_usuarios(id_recompensa, id_usuario, data_conquista)
				VALUES(?, ?, NOW());";

		$stmt = $this->con->prepare($sql);
		$stmt->bindParam(1, $idRecompensa);
		$stmt->bindParam(2, $idUsuario);
		return $stmt->execute();
	}
}
