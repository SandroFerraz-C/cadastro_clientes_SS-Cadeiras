<?php
session_start();
include_once("conexao.php");

$customerNumber = filter_input(INPUT_POST, 'customerNumber', FILTER_SANITIZE_NUMBER_INT);
$clientName = filter_input(INPUT_POST, 'clientName', FILTER_SANITIZE_STRING);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
$clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
$deliveryDate = filter_input(INPUT_POST, 'deliveryDate', FILTER_SANITIZE_NUMBER_INT);
$productPurchased = filter_input(INPUT_POST, 'productPurchased', FILTER_SANITIZE_STRING);
$purchaseAmount = filter_input(INPUT_POST, 'purchaseAmount', FILTER_SANITIZE_NUMBER_INT);


$result_cliente = "INSERT INTO clientes (numeroCliente, nomeCliente, 	telefone, email, endereco, 	dataEntrega, produtoComprado, valorCompra, created) VALUES ('$customerNumber', '$clientName', '$phone', '$clientEmail', '$address', '$deliveryDate', '$productPurchased', '$purchaseAmount', NOW() )";

$resultado_cliente = mysqli_query($conn, $result_cliente);

if(mysqli_insert_id ($conn)){
  $_SESSION['msg'] = "<h2 style='color:green;'>Usuario cadastrado com sucesso!</h2>";
  header("Location: index.php");
}else{
  $_SESSION['msg'] = "<h2 style='color:red;'>Usuario não cadastrado!</h2>";

  header("Location: cad_usuario.php");

}
?>