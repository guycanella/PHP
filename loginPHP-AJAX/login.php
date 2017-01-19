<?php
session_start();

// Class of connection
require_once('conexao.php');


// Start the connection with the PDO
$conexao = Conexao::getInstance();

// Get the data from form
$email = (isset($_POST['email'])) ? $_POST['email'] : '' ;
$senha = (isset($_POST['senha'])) ? $_POST['senha'] : '' ;


// Validate the email and password if it was filled 
if (empty($email)){
	$retorno = array('mensagem' => 'Preencha seu e-mail!');
	echo json_encode($retorno);
	exit();
}

if (empty($senha)){
	$retorno = array('mensagem' => 'Preencha sua senha!');
	echo json_encode($retorno);
	exit();
}


// Validate the email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $retorno = array('mensagem' => 'Formato de e-mail inválido!');
	echo json_encode($retorno);
	exit();
}


// Validate the data sent from user with the Database
$sql = 'SELECT * FROM login_Users WHERE email = ?';
$stm = $conexao->prepare($sql);
$stm->bindValue(1, $email);
$stm->execute();
$retorno = $stm->fetch(PDO::FETCH_OBJ);

if(empty($retorno)){
	$retorno = array('mensagem' => 'Nenhum registro encontrado!');
	echo json_encode($retorno);
	exit();
}else{
	// Validate the password using Password Hash API
	if(!empty($retorno) && password_verify($senha, $retorno->password)){
		$_SESSION['id']		= $retorno->id;
		$_SESSION['email']	= $retorno->email;
		$_SESSION['logado'] = 'SIM';
	}else{
		$_SESSION['logado'] = 'NAO';
	}

	// If logged send a right code for index, if not send and error message
	if($_SESSION['logado'] == 'SIM'){
		$retorno = array('codigo' => '1', 'mensagem' => 'Logado com sucesso!');
		echo json_encode($retorno);
		exit();
	}else{
		$retorno = array('mensagem' => 'Usuário não autorizado.');
		echo json_encode($retorno);
		exit();
	}
}


