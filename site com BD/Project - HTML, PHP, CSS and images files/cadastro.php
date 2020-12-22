<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
    <title>Cadastro</title>
</head>
<body> 
    <div class="container"> 
    <div class="box">
    <h1>Cadastro</h1>
        <form method="POST">
		<input type="text" id="nome" name="nome" placeholder= "Nome Completo"  maxlength="30">
		<input type="text" name="apelido"  placeholder= "Apelido" maxlength="15">
		<input type="email" name="email" autocomplete="off" placeholder= "Email" maxlength="40">
		<input type="text" name="cpf"  placeholder= "CPF" maxlength="11">
		<input type="text" name="telefone" placeholder= "Telefone" maxlength="10">
        <input type="text" name="celular" placeholder= "Celular" maxlength="10">
		<label for="sexo">Sexo: </label>
            <select class="select" name="sexo">
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
            </select> 
			<br>
			<br>
			<label for="date"> Data de nascimento: </label>
			<input class= "date" type="date" name="datanas"  placeholder= "datanacimento mudar">
            <input type="text" name="rua"  placeholder= "Rua" maxlength="30">
			<input type="text" name="bairro" placeholder= "Bairro" maxlength="30">
            <input type="text" name="cidade"  placeholder= "Cidade" maxlength="30">
            <label for="estado">Estado: </label>
            <select class= "select" name="estado" id="uf">
	            <option value="">Selecione</option>
	            <option value="AC">AC</option>
	            <option value="AL">AL</option>
	            <option value="AM">AM</option>
	            <option value="AP">AP</option>
	            <option value="BA">BA</option>
	            <option value="CE">CE</option>
	            <option value="DF">DF</option>
	            <option value="ES">ES</option>
	            <option value="GO">GO</option>
	            <option value="MA">MA</option>
	            <option value="MG">MG</option>
	            <option value="MS">MS</option>
	            <option value="MT">MT</option>
	            <option value="PA">PA</option>
	            <option value="PB">PB</option>
	            <option value="PE">PE</option>
	            <option value="PI">PI</option>
	            <option value="PR">PR</option>
	            <option value="RJ">RJ</option>
	            <option value="RN">RN</option>
	            <option value="RS">RS</option>
	            <option value="RO">RO</option>
	            <option value="RR">RR</option>
	            <option value="SC">SC</option>
	            <option value="SE">SE</option>
	            <option value="SP">SP</option>
	            <option value="TO">TO</option>
            </select>
			<input type="password" name="senha" id="senha" placeholder= "Senha" maxlength="32">
			<input type="password" name="confSenha" id="confSenha" placeholder= "Confirmar senha" maxlength="32">
			<input class="envio" type="submit" value="Cadastrar">
        </form>
 </body>
</html>


<?php
if(isset($_POST['nome']))
{
	$nome = addslashes($_POST['nome']);
	$apelido = addslashes($_POST['apelido']);
	$email = addslashes($_POST['email']);
	$cpf = addslashes($_POST['cpf']);
	$telefone = addslashes($_POST['telefone']);
	$celular = addslashes($_POST['celular']);
	$sexo = addslashes($_POST['sexo']);
	$datanas = addslashes($_POST['datanas']);
	$rua = addslashes($_POST['rua']);
	$bairro = addslashes($_POST['bairro']);
	$cidade = addslashes($_POST['cidade']);
	$estado = addslashes($_POST['estado']);
	$senha = addslashes($_POST['senha']);
	$confSenha = addslashes($_POST['confSenha']);

	if(!empty($nome) && !empty($email) && !empty($bairro) && !empty($cidade) && !empty($estado) && !empty($senha) && !empty($apelido) && !empty($cpf) && !empty($rua) && !empty($datanas))
	{
		if($senha == $confSenha)
		{


			require_once 'classes/usuarios.php';
			$us = new Usuario("atp", "127.0.0.1:3307", "root", "root");
			if($us->cadastrar($nome, $email, $senha, $telefone, $sexo, $estado, $cidade, $bairro, $apelido, $cpf, $celular, $rua, $datanas))
			{ ?>
				<p class="mensagem">Cadastrado com sucesso!<a href="login.php">Acesse já!</a></p> 
				
<?php		}else
			{ ?>
				<p class="mensagem">Email já está cadastrado!</p>
<?php		}
		}else
		{ ?>
			<p class="mensagem">Senhas não correspondem!</p>
<?php	}	
	}else
	{ ?>
		<p class="mensagem">Preencha todos os campos!</p>
<?php }
}
?>



