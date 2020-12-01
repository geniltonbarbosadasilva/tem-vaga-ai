<?php

require_once("../autoload.php");

$arquivo =$_FILES["file"]["tmp_name"];
$nome	=$_FILES["file"]["name"];
$email;


	$ext = explode(".",$nome);
	$extensao = end($ext);
	
	if($extensao != "csv")
	{
		echo "Por favor, importe um arquivos .csv!";
	}else
	{
		//echo "Extensão valida!";
		$objeto = fopen($arquivo,'r');
		
		while(($dados = fgetcsv($objeto, 1000, ",")) !== FALSE) // ler o arquivo
		{
			
			$nome = $dados[1];
			$email = $dados[0];
			$senha = $dados[2];
   echo $email,$nome,$senha;

		$result = $conn->query("insert into users (email,name,password) values ('$email','$nome','$senha')");
			if($result){
			//echo "Dados inseridos com sucesso!";
			header('create-user2.php');
			}else{
				echo "Erro!";
			}

		}	
		
	}

?>