<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD - Listar</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="cad-list">
<button><a href="cad_cliente.php">Cadastrar</a></button><br />
<button><a href="edit_cliente.php">Editar</a></button><br />
</div>

  <h1>Listagem de Clientes</h1>

  <?php 
    if(isset( $_SESSION['msg'] )){
    echo $_SESSION['msg'];
    unset( $_SESSION['msg'] );
    }
    
    //Receber o número de Página
$pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);

$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

//Setar a quantidade de itens por Página
$qnt_result_pg = 3;

//Calcular o inicio da Visualização
$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;


$res_clientes = "SELECT * FROM clientes LIMIT $inicio, $qnt_result_pg";
$resulta_clientes =  mysqli_query($conn, $res_clientes);
while($row_cliente = mysqli_fetch_assoc($resulta_clientes)){
  echo "ID:" . $row_cliente['id'] . "<br />";
  echo "Numero do Cliente " . $row_cliente['numeroCliente'] . "<br />";
  echo "Nome: " . $row_cliente['nomeCliente'] . "<br />";
  echo "Telefone: " . $row_cliente['telefone'] . "<br />";
  echo "Emal: " . $row_cliente['email'] . "<br />";
  echo "Endereço: " . $row_cliente['endereco'] . "<br />";
  echo "Data da Entrega: " . $row_cliente['dataEntrega'] . "<br />";
  echo "Produto Comprado " . $row_cliente['produtoComprado'] . "<br />";
  echo "Valor da Compra: " . $row_cliente['valorCompra'] . "<br />";
  echo "Cadastrado em: " . $row_cliente['created'] . "<br />";
  echo "<a href ='edit_cliente.php?id=" . $row_cliente['id'] . "'>Editar</a><br />";
  echo "<a href ='proc_apagar_cliente.php?id=" . $row_cliente['id'] . "'>Apagar</a><br /><br /><hr/><br />";
}

// Paginação - Somar a quantidade de Clientes Cadastrados
$result_pagina = "SELECT COUNT(id) AS numero_resultado FROM clientes";
$resultado_pagina = mysqli_query($conn, $result_pagina);
$row_pagina = mysqli_fetch_assoc($resultado_pagina);

//echo $row_pagina['numero_resultado'];

//Quantidade de Páginas
$quantidade_pagina = ceil($row_pagina['numero_resultado'] / $qnt_result_pg);

//Limitando os links antes e depois
$max_links = 2;
echo "<a href = 'index.php?pagina=1'>Primeira</a>";

for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant ++){
  if($pag_ant >= 1){
    echo "<a href = 'index.php?pagina=$pag_ant'>$pag_ant</a>";
  }
  
}

echo "$pagina";

for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep ++){
 
  if($pag_dep <= $quantidade_pagina){
    echo "<a href = 'index.php?pagina=$pag_dep'>$pag_dep</a>";
  }
}

echo "<a href = 'index.php?pagina=$quantidade_pagina'>Ultima</a>";

?>
</body>
</html>