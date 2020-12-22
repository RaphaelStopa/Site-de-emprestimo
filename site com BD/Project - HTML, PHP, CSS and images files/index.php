<?php 
session_start();

if(!$_SESSION['email']) {
    header('Location: login.php');
}

if($_COOKIE['email']) {
    $_SESSION['email'] = $_COOKIE['email'];
}
?>

<!DOCTYPE html> 
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="..\css\estilo.css">
    <script src="https://kit.fontawesome.com/cc0b553e60.js" crossorigin="anonymous"></script>
    <title>ATP - Raphael Mendes Stopa</title>
</head>
<body>
    <div class="container">
        <header>
        <?php echo 'Seja bem vindo '.$_SESSION['apelido'].'! - '.date('Y')?>
        </header>
        <main class="conteudo">
            <?php

            if($_GET['file']) {
                include($_GET['file']);
            } else {
                include('consulta.php');
            }
                
            ?>
        </main>
        <div class="bar">
            <img class="picon" src="../img/BoxIcons.svg" alt="">
            <nav>
                <ul class="links">
                    <a href="index.php?file=consulta.php"><li><i i class="fas fa-home"></i> Página inicial</li></a>
                    <a href="index.php?file=item.php"><li><i i class="fas fa-box-open"></i> Cadastro de item</li></a>
                    <a href="index.php?file=alterar.php&codigo=<?=$_SESSION['id_usuarios']?>"><li><i i class="fas fa-address-card"></i> Perfil</li></a>
                    <a href="classes/logout.php"><li><i i class="fas fa-door-open"></i> Sair</li></a>
                </ul>
        </div>
        <aside>
        <img src="img/bannerInicial.jpg" alt="banner">
        </aside>
        <footer></footer>
    </div>    
</body>
</html>

