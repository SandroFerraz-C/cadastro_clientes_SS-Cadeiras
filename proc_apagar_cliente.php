<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_cliente = "DELETE  FROM clientes WHERE id = '$id' ";
$resultado_cliente = mysqli_query($conn, $result_cliente);

if(mysqli_affected_rows($conn)){
  $_SESSION['msg'] = "<h2 style='color:green;'>Usuario Excluido com sucesso!</h2>";
  header("Location: index.php");
}else{
  $_SESSION['msg'] = "<h2 style='color:red;'>Usuario não Excluido!</h2>";

  header("Location: index.php");
}
?>