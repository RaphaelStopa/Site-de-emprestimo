<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro2.css">
    <title>Cadastro</title>
</head>
<body> 
    <div class="container"> 
    <div class="box">
    <h1>Cadastro de item</h1>
        <form method="POST">
		<input type="text"  name="nome_item" placeholder= "Nome do item"  maxlength="30">
		<br>
		<label for="date"> Data do empréstimo: </label>
		<input class= "date" type="date" name="dataemp" >
		<br>
		<label for="date"> Data da devolução: </label>
		<input class= "date" type="date" name="datadevo" >
		<br>
		<label for="date"> CPF do recebedor: </label>
		<input type="text" name="cpf_e"  placeholder= "CPF" maxlength="11">
		<br>
		<div style= "font-size: 1.5rem;">Descreva sobre o item que será emprestado abaixo.</div>
		<br>
		<textarea name="dec" rows="30" cols="140"></textarea>
		<br>
			<input class="envio" type="submit" value="Cadastrar item">
        </form>
		<?php

		?>
 </body>
</html>


<?php

if(isset($_POST['nome_item']))
{
	$nome_item = addslashes($_POST['nome_item']);
	$data_envio = addslashes($_POST['dataemp']);
	$data_devolucao = addslashes($_POST['datadevo']);
	$descricao = addslashes($_POST['dec']);
	$fk_id_usuario = $_SESSION['id_usuarios'];
	$cpf_destinatario = addslashes($_POST['cpf_e']);

	require_once 'classes/itens.php';
		$it = new Items("atp", "127.0.0.1:3307", "root", "root");
		if($it->cadastrarItem($nome_item, $data_envio, $data_devolucao, $descricao, $fk_id_usuario, $cpf_destinatario)){
			
		}
	
}
?>




