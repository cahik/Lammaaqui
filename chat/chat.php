<?php

class chat { 

	// Dados de acesso
	CONST HOST = "127.0.0.1:3307";
	CONST USER = "root";
	CONST PASS = "";
	CONST DB   = "chat";


 


	public $conexao;

// Meto construtor
	public function __construct() {

		$this->conexao();
		// parent:: __construct();


	}

	public function conexao() {


	// Conexão
		$this->conexao = mysqli_connect(self::HOST, self::USER, self::PASS,self::DB);

	// Verificando se foi efetuada com sucesso
		if (!$this->conexao) {
			die("ERRO: Não foi possível conectar => " . mysqli_connect_error());
		}

	}

	}



















?>