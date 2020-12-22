<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro2.css">
    <title>Alterar cadastro</title>

<?php 
require_once "classes/conexao.php";
$conexao = novaConexao();

if($_GET['codigo']) {
    $sql = "SELECT * FROM usuario WHERE id_usuarios = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $_GET['codigo']);
    
    if($stmt->execute()) {
        $resultado = $stmt->get_result();
        if($resultado->num_rows > 0) {
            $dados = $resultado->fetch_assoc();
          
        }
    }
}
?>


</head>
<body> 
    <div class="container"> 
    <div class="box">
    <h1>Alterar cadastro</h1>
        <form method="POST">
		<input type="text" id="nome" name="nome" placeholder= "Nome Completo"  maxlength="30" value="<?= $dados['nome'] ?>"  >
		<input type="text" name="apelido"  placeholder= "Apelido" maxlength="15" value="<?= $dados['apelido'] ?>" >
		<input type="text" name="telefone" placeholder= "Telefone" maxlength="10" value="<?= $dados['telefone'] ?>" >
        <input type="text" name="celular" placeholder= "Celular" maxlength="10" value="<?= $dados['celular'] ?>" >
            <input type="text" name="rua"  placeholder= "Rua" maxlength="30" value="<?= $dados['rua'] ?>" >
			<input type="text" name="bairro" placeholder= "Bairro" maxlength="30" value="<?= $dados['bairro'] ?>" >
            <input type="text" name="cidade"  placeholder= "Cidade" maxlength="30" value="<?= $dados['cidade'] ?>" >
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
	$id = $_GET['codigo'];
	$nome = addslashes($_POST['nome']);
	$apelido = addslashes($_POST['apelido']);
	$telefone = addslashes($_POST['telefone']);
	$celular = addslashes($_POST['celular']);
	$rua = addslashes($_POST['rua']);
	$bairro = addslashes($_POST['bairro']);
	$cidade = addslashes($_POST['cidade']);
	$estado = addslashes($_POST['estado']);
	$senha = addslashes($_POST['senha']);
	$confSenha = addslashes($_POST['confSenha']);


	if(!empty($nome) && !empty($apelido) && !empty($rua) && !empty($bairro) && !empty($cidade) && !empty($estado) && !empty($senha) && !empty($confSenha))
	{
		if($senha == $confSenha)
		{
			require_once 'classes/usuarios.php';
			$us = new Usuario("atp", "127.0.0.1:3307", "root", "root");
			if($us->alterar($nome, $apelido, $telefone, $celular, $rua, $bairro, $cidade, $estado, $senha, $id))
			{ ?>
				<p class="mensagem">Cadastrado alterado com sucesso!</p> 
				
<?php		}
		}else
		{ ?>
			<p class="mensagem">Senhas não correspondem!</p>
<?php	}	
	}else
	{ ?>
		<p class="mensagem">Preencha todos os campos!</p>
<?php }

?>




