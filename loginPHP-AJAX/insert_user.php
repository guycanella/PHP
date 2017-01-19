<?php
require "conexao.php";

$email = 'nobody@gmail.com';
$senha = password_hash('adminNobody', PASSWORD_DEFAULT);


$conexao = conexao::getInstance();
$sql = "INSERT INTO login_Users (email, password) VALUES ('{$email}', '{$senha}')";
$stm = $conexao->prepare($sql);
$stm->execute();
?>
