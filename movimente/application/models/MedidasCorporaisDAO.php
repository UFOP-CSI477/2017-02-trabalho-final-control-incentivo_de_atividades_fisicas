<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MedidasCorporaisDAO extends CI_Model
{
	private $con;

	function __construct()
	{
		parent::__construct();
		$this->load->model('Conexao');

		$this->con = $this->Conexao::getInstance();
	}

	public function insert($idUsuario, $altura, $peso, $biceps, $antebraco, $peito, $cintura, $quadris, $coxas, $panturrilha)
	{	
		echo $idUsuario;
		$sql = "INSERT INTO medidas_corporais(id_usuario, data_cadastro, altura, peso, biceps, antebraco, peito, cintura, quadris, coxas, panturrilha) 
				VALUES(?, NOW(), ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$stmt = $this->con->prepare($sql);
		$stmt->bindParam(1, $idUsuario);
		$stmt->bindParam(2, $altura);
		$stmt->bindParam(3, $peso);
		$stmt->bindParam(4, $biceps);
		$stmt->bindParam(5, $antebraco);
		$stmt->bindParam(6, $peito);
		$stmt->bindParam(7, $cintura);
		$stmt->bindParam(8, $quadris);
		$stmt->bindParam(9, $coxas);
		$stmt->bindParam(10, $panturrilha);
		return $stmt->execute();
	}

	public function select($idUsuario)
	{
		$sql = "SELECT *
				FROM medidas_corporais 
				WHERE id_usuario = ?
				ORDER BY id DESC
				LIMIT 1";

		$stmt = $this->con->prepare($sql);
		$stmt->bindParam(1, $idUsuario);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function selectAll($idUsuario)
	{
		$sql = "SELECT *
				FROM medidas_corporais 
				WHERE id_usuario = ?
				ORDER BY id";

		$stmt = $this->con->prepare($sql);
		$stmt->bindParam(1, $idUsuario);
		$stmt->execute();
		return $stmt->fetchAll();
	}


}
