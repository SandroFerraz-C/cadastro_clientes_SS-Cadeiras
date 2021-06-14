<?php
session_start();
include_once ("conexao.php");
$id = filter_input(INPUT_GET,  'id'  , FILTER_SANITIZE_NUMBER_INT);
$result_cliente = "SELECT * FROM clientes WHERE id = '$id'";
$resultado_cliente = mysqli_query($conn, $result_cliente);
$row_cliente = mysqli_fetch_assoc($resultado_cliente);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD - Editar</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="cad-list">
<button><a href="index.php">Listar</a></button><br />
<button><a href="cad_cliente.php">Cadastrar</a></button><br />

</div>
  <h1>Editar Cliente</h1>
  <?php 
    if(isset( $_SESSION['msg'] ))
    echo $_SESSION['msg'];
    unset( $_SESSION['msg'] );
  ?>

  <form method="POST" action="proc_edit_cliente.php">

  <input type="hidden" name='id'  value = "<?php echo $row_cliente ['id']; ?>"><br />

  <label>Número do Cliente:</label>
  <input type="number" name='customerNumber' placeholder="Número ID do Cliente" value = "<?php echo $row_cliente ['numeroCliente']; ?>"><br />

  <label>Nome do Cliente:</label>
  <input type="text" name='clientName' placeholder="Nome Completo" value = "<?php echo $row_cliente ['nomeCliente']; ?>"><br />

  <label>Telefone:</label>
  <input type="phone" name='phone' placeholder="Telefone" value = "<?php echo $row_cliente ['telefone']; ?>"><br />

  <label>Email do Cliente:</label>
  <input type="email" name='clientEmail' placeholder="Email" value = "<?php echo $row_cliente ['email']; ?>"><br /> 

  <label>Endereço Cliente:</label>
  <input type="address" name='address' placeholder="Endereço" value = "<?php echo $row_cliente ['endereco']; ?>"><br />

  <label>Data de Entrega:</label>
  <input type="date" name='deliveryDate' value = "<?php echo $row_cliente ['dataEntrega']; ?>"><br />

  <label>Produto Comprado:</label>
  <input type="text" name='productPurchased' placeholder="Produto Comprado" value = "<?php echo $row_cliente ['produtoComprado']; ?>"><br />

  <label>Valor da Compra:</label>
  <input type="number" name='purchaseAmount' placeholder="Valor da Compra" value = "<?php echo $row_cliente ['valorCompra']; ?>"><br />

  <input type="submit" value="Editar">
  </form>
</body>
</html>