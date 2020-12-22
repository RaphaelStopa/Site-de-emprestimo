<?php

Class Items{

	private $pdo;

	//Construtor
	public function __construct($dbname, $host, $usuario, $senha)
	{
		try
		{
			$this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host, $usuario, $senha);
		} catch(PDOException $e) 
		{
			echo "Erro com BD: ".$e->getMessage();
		} catch(Exception $e)
		{
			echo "Erro: ".$e->getMessage();
		}
    }
	
	//cadastrar item
	public function cadastrarItem($nome_item, $data_envio, $data_devolucao, $descricao, $fk_id_usuario, $cpf_destinatario)
	{
			$cmd = $this->pdo->prepare("INSERT INTO item (nome_item, data_envio, data_devolucao, descricao, fk_id_usuario, cpf_destinatario ) values (:ni, :de, :dd, :nh, :fi, :cde)");
			$cmd->bindValue(":ni",$nome_item);
			$cmd->bindValue(":de",$data_envio);
			$cmd->bindValue(":dd",$data_devolucao);
			$cmd->bindValue(":nh",$descricao);
			$cmd->bindValue(":fi",$fk_id_usuario);
			$cmd->bindValue(":cde",$cpf_destinatario);
			$cmd->execute();
			return true;
	}
}



