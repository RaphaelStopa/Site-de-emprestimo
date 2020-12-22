<?php

Class Usuario{

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

	public function cadastrar($nome, $email, $senha, $telefone, $sexo, $estado, $cidade, $bairro, $apelido, $cpf, $celular, $rua, $datanas)
	{

		$cmd = $this->pdo->prepare("SELECT id from usuario WHERE email = :e");
		$cmd->bindValue(":e",$email);
		$cmd->execute();
		if($cmd->rowCount() > 0)
		{
			return false;
		}else
		{
			$cmd = $this->pdo->prepare("INSERT INTO usuario (nome, email, senha, apelido, cpf, telefone, celular, sexo, data_nascimento, rua, bairro, cidade, estado) values (:n, :e, :s, :a, :c, :t, :ce, :se, :d, :r, :b, :ci, :es)");
			$cmd->bindValue(":n",$nome);
			$cmd->bindValue(":e",$email);
			$cmd->bindValue(":s",md5($senha));
			$cmd->bindValue(":a",$apelido);
			$cmd->bindValue(":c",$cpf);
			$cmd->bindValue(":t",$telefone);
			$cmd->bindValue(":ce",$celular);
			$cmd->bindValue(":se",$sexo);
			$cmd->bindValue(":d",$datanas);
			$cmd->bindValue(":r",$rua);
			$cmd->bindValue(":b",$bairro);
			$cmd->bindValue(":ci",$cidade);
			$cmd->bindValue(":es",$estado);
			$cmd->execute();
			return true;
		}
	}


	public function alterar($nome, $apelido, $telefone, $celular, $rua, $bairro, $cidade, $estado, $senha, $id)
	{
		$sql = "UPDATE usuario 
		SET nome = :n,
		apelido = :a,
		telefone = :t,
		celular = :ce,
		rua = :r,
		bairro = :b,
		cidade = :ci,
		estado = :es,
		senha = :s
        WHERE id_usuarios = :iu";

		$cmd = $this->pdo->prepare($sql);
		$cmd->bindValue(":n",$nome);
		$cmd->bindValue(":a",$apelido);
		$cmd->bindValue(":t",$telefone);
		$cmd->bindValue(":ce",$celular);
		$cmd->bindValue(":r",$rua);
		$cmd->bindValue(":b",$bairro);
		$cmd->bindValue(":ci",$cidade);
		$cmd->bindValue(":es",$estado);
		$cmd->bindValue(":s",md5($senha));
		$cmd->bindValue(":iu",$id);
		$cmd->execute();
	}


	
	public function entrar($email, $senha)
	{
		$cmd = $this->pdo->prepare("SELECT * from usuario WHERE email = :e AND senha = :s");
		$cmd->bindValue(":e",$email);
		$cmd->bindValue(":s",md5($senha));
		$cmd->execute();
		if($cmd->rowCount() > 0)
		{
			$dados = $cmd->fetch();
			session_start();
			$_SESSION['nome'] = $dados['nome'];
			$_SESSION['email'] = $dados['email'];
			$_SESSION['telefone'] = $dados['telefone'];
			$_SESSION['bairro'] = $dados['bairro'];
			$_SESSION['apelido'] = $dados['apelido'];
			$_SESSION['cpf'] = $dados['cpf'];
			$_SESSION['celular'] = $dados['celular'];
			$_SESSION['rua'] = $dados['rua'];
			$_SESSION['cidade'] = $dados['cidade'];
			$_SESSION['data_nascimento'] = $dados['data_nascimento'];
			$_SESSION['id_usuarios'] = $dados['id_usuarios'];
			$exp = time() + 60 * 60 * 24 * 30;
			setcookie('email', $dados['email'], $exp);

			if($dados['id_usuarios'] == 1)
			{
				
				$_SESSION['id_master']  = 1;
				header("location: index.php");
			}else
			{
				
				$_SESSION['id'] = $dados['id_usuario'];
				header("location: index.php");
			}
			return true;//encontrada
		}else
		{
			return false;//não encontrada
		}
	}


}
?>


