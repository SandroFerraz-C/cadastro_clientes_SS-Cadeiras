<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$customerNumber = filter_input(INPUT_POST, 'customerNumber', FILTER_SANITIZE_NUMBER_INT);
$clientName = filter_input(INPUT_POST, 'clientName', FILTER_SANITIZE_STRING);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
$clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
$deliveryDate = filter_input(INPUT_POST, 'deliveryDate', FILTER_SANITIZE_NUMBER_INT);
$productPurchased = filter_input(INPUT_POST, 'productPurchased', FILTER_SANITIZE_STRING);
$purchaseAmount = filter_input(INPUT_POST, 'purchaseAmount', FILTER_SANITIZE_NUMBER_INT);


$result_cliente = "UPDATE clientes SET numeroCliente = '$customerNumber', nomeCliente= '$clientName', 	telefone= '$phone', email =  '$clientEmail', endereco = '$address', 	dataEntrega = '$deliveryDate', produtoComprado = '$productPurchased', valorCompra = '$purchaseAmount', modified =  NOW() WHERE id = '$id'";

$resultado_cliente = mysqli_query($conn, $result_cliente);

if(mysqli_affected_rows ($conn)){
  $_SESSION['msg'] = "<h2 style='color:green;'>Usuario Edidato com sucesso!</h2>";
  header("Location: index.php");
}else{
  $_SESSION['msg'] = "<h2 style='color:red;'>Usuario não Editado!</h2>";

  header("Location: edit_cliente.php?id = $id");
}
?>