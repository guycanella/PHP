
<?php

	$con = new PDO("mysql:host=localhost;dbname=chatPhpAJAX", "root", "");
	$rs = $con->query("SELECT * FROM mensagens");
	while($row = $rs->fetch(PDO::FETCH_OBJ)){
		if($row->id_msg % 2 == 1){
			echo "<p style=\"color:blue;text-align:right;\">$row->nome: $row->msg</p>";
		}else{
			echo "<p style=\"color:pink;text-align:left;\">$row->nome: $row->msg</p>";
		}
	}
?>
