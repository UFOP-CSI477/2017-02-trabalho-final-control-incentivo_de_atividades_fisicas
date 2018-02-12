<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioDAO extends CI_Model
{
	private $con;

	function __construct()
	{
		parent::__construct();
		$this->load->model('Conexao');

		$this->con = $this->Conexao::getInstance();
	}

	public function insert($cpf, $nome, $login, $senha, $email, $dataNascimento)
	{
		$stmt = $this->con->prepare("INSERT INTO usuarios(cpf, nome, login, senha, email, data_nascimento) VALUES(?, ?, ?, ?, ?, ?)");
		$stmt->bindParam(1, $cpf);
		$stmt->bindParam(2, $nome);
		$stmt->bindParam(3, $login);
		$stmt->bindParam(4, $senha);
		$stmt->bindParam(5, $email);
		$stmt->bindParam(6, $dataNascimento);
		return $stmt->execute();
	}

	public function update($nome, $senha, $email, $dataNascimento, $idUsuario)
	{
		$sql = "UPDATE usuarios
				SET nome = ?, email = ?, senha = ?, data_nascimento = ?
				WHERE id = ?";

		$stmt = $this->con->prepare($sql);
		$stmt->bindParam(1, $nome);
		$stmt->bindParam(2, $email);
		$stmt->bindParam(3, $senha);
		$stmt->bindParam(4, $dataNascimento);
		$stmt->bindParam(5, $idUsuario);
		return $stmt->execute();
	}

	public function selectPorLogin($login)
	{
		$stmt = $this->con->prepare("SELECT * FROM usuarios WHERE login = ?");
		$stmt->bindParam(1, $login);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function delete($idUsuario) {

		$stmt = $this->con->prepare("DELETE FROM medidas_corporais WHERE id_usuario = ?");
		$stmt->bindParam(1, $idUsuario);
		$stmt->execute();

		$stmt = $this->con->prepare("DELETE FROM modalidades_usuarios WHERE id_usuario = ?");
		$stmt->bindParam(1, $idUsuario);
		$stmt->execute();

		$stmt = $this->con->prepare("DELETE FROM atividades WHERE id_usuario = ?");
		$stmt->bindParam(1, $idUsuario);
		$stmt->execute();

		$stmt = $this->con->prepare("DELETE FROM recompensas_usuarios WHERE id_usuario = ?");
		$stmt->bindParam(1, $idUsuario);
		$stmt->execute();

		$stmt = $this->con->prepare("DELETE FROM usuarios WHERE id = ?");
		$stmt->bindParam(1, $idUsuario);
		return $stmt->execute();
	}
}
