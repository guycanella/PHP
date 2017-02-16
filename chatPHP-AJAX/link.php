
<?php

$nome	= $_POST['nome'];
$msg	= $_POST['msg'];

$con	= new PDO("mysql:host=localhost;dbname=chatPhpAJAX", "root", "");
$stmt	= $con->prepare("INSERT INTO mensagens (nome, msg) VALUES (?, ?)");
$stmt->bindParam(1,$nome);
$stmt->bindParam(2,$msg);


if($stmt->execute()){
	echo true;
}else{
	echo false;
}

?>
