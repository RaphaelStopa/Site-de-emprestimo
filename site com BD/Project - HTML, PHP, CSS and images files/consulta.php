<link rel="stylesheet" href="css/tables.css">

<?php

require_once "classes/conexao.php";

session_start();

$sql = "SELECT * FROM item WHERE data_devolucao_real IS NULL AND cpf_destinatario =".$_SESSION['cpf'];

$sql2 = "SELECT * FROM item WHERE data_devolucao_real IS NULL AND fk_id_usuario =".$_SESSION['id_usuarios'];

$conexao = novaConexao();


if($_GET['devolver']) {
    $devolverSQL = "UPDATE item SET data_devolucao_real = ? WHERE pk_id_item = ?";
    $stmt = $conexao->prepare($devolverSQL);
    $datetime = date("Y-m-d");
    $stmt->bind_param("si", $datetime, $_GET['devolver']);
    $stmt->execute();
}

$resultado = $conexao->query($sql);
$resultado2 = $conexao->query($sql2);

$registro = [];
$registro2 = [];

if($resultado->num_rows> 0) {    
    while($row = $resultado->fetch_assoc()){
        $registro[] = $row;
    }
} elseif ($conexao->error) {
    echo "Erro1: ".$conexao->error;
}


if($resultado2->num_rows> 0) {
    while($row = $resultado2->fetch_assoc()){
        $registro2[] = $row;
    }
} elseif ($conexao->error) {
    echo "Erro2: ".$conexao->error;
}
$conexao->close();
?>

<body>
<div class="Ntable" >Itens emprestados:</div>
<table class="itens">
<thead>
<th>Nome do item</th>
<th>Data de envio</th>
<th>Data de devolução</th>
<th>Descrição</th>
<th>Devolução</th>
</thead>
<tbody>
<?php foreach ($registro as $registro): ?>
<tr>
<td><?= $registro ['nome_item'] ?></td>
<td><?=  date('d/m/Y', strtotime($registro['data_envio'] )) ?></td>
<td><?=
$date1 = "" ; 

if (date('Y/m/d') > $registro ['data_devolucao'] ) 
echo date('d/m/Y',  strtotime($registro ['data_devolucao'] ))." -> Esta em atraso!!!"; 
else
echo date('d/m/Y',  strtotime($registro ['data_devolucao'] )); 
 ?>
</td>
<td><?= $registro ['descricao'] ?></td>
<td><a href="index.php?file=consulta.php&devolver=<?=$registro ['pk_id_item']?>" class="btn">Devolver</a></td>
</tr>
<?php endforeach ?>
</tbody>


</table>
<br>
<br>
<br>
<br>
<div class="Ntable">Itens emprestando:</div>
<table class="itens">
<thead>
<th>Nome do item</th>
<th>Data de envio</th>
<th>Data de devolução</th>
<th>Descrição</th>
</thead>
<tbody>
<?php foreach ($registro2 as $registro2): ?>
<tr>
<td><?= $registro2 ['nome_item'] ?></td>
<td><?=  date('d/m/Y', strtotime($registro2['data_envio'] )) ?></td>
<td><?=
$date1 = "" ; 

if (date('Y/m/d') > $registro2 ['data_devolucao'] ) 
echo date('d/m/Y',  strtotime($registro2 ['data_devolucao'] ))." -> Esta em atraso!!!"; 
else
echo date('d/m/Y',  strtotime($registro2 ['data_devolucao'] )); 
  
 ?></td>
<td><?= $registro2 ['descricao'] ?></td>
</tr>
<?php endforeach ?>
</tbody>
</table>
</body>




