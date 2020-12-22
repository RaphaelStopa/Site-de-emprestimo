<!DOCTYPE html>
<html>
<head>
	<title>ATP - Raphael Mendes Stopa</title>
	<link rel="stylesheet" href="css/style_ini.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/cc0b553e60.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="base">
		<div class="login">
			<form method= "POST" >
				<img src="img/icon.svg">
				<h2 class="title">Acesse nossa plataforma</h2>
           		<div class="inputDiv one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Email</h5>
           		   		<input type="text" name = "email" class="input">
           		   </div>
           		</div>
           		<div class="inputDiv pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Senha</h5>
           		    	<input type="password" name ="senha" class="input">
            	   </div>
                </div>
                <input type="submit" class="button1"  value="Acessar">
                <div>
                <a href="cadastro.php">Quer se cadastrar?</a>
                </div>
            </form>
        </div>
	</div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>


<?php
if(isset($_POST['email']))
{
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);
	
	if(!empty($email) && !empty($senha))
	{
		require_once 'classes/usuarios.php';
		$us = new Usuario("atp", "127.0.0.1:3307", "root", "root");
		if($us->entrar($email, $senha) === true)
		{
		}else
		{
			echo "Email e/ou senha estão incorretos!";
		}
	}else
	{
		echo "Preencha todos os campos!";
	}
}

?>



