<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD - Cadastrar</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="cad-list">
<button><a href="index.php">Listar</a></button><br />
<button><a href="edit_cliente.php">Editar</a></button><br />

</div>
  <h1>Cadastrar Cliente</h1>
  <?php 
    if(isset( $_SESSION['msg'] ))
    echo $_SESSION['msg'];
    unset( $_SESSION['msg'] );
  ?>

  <form method="POST" action="proc_cad_cliente.php">

  <label>Número do Cliente:</label>
  <input type="number" name='customerNumber' placeholder="Número ID do Cliente"><br />

  <label>Nome do Cliente:</label>
  <input type="text" name='clientName' placeholder="Nome Completo"><br />

  <label>Telefone:</label>
  <input type="phone" name='phone' placeholder="Telefone"><br />

  <label>Email do Cliente:</label>
  <input type="email" name='clientEmail' placeholder="Email"><br /> 

  <label>Endereço Cliente:</label>
  <input type="address" name='address' placeholder="Endereço"><br />

  <label>Data de Entrega:</label>
  <input type="date" name='deliveryDate'><br />

  <label>Produto Comprado:</label>
  <input type="text" name='productPurchased' placeholder="Produto Comprado"><br />

  <label>Valor da Compra:</label>
  <input type="number" name='purchaseAmount' placeholder="Valor da Compra"><br />

  <input type="submit" value="Cadastrar">
  </form>
</body>
</html>