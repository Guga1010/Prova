<?php

	$vnome = $_GET['fnome'];
	$qst1= $_GET['questao1'];
	$qst2 = $_GET['questao2'];
	$qst3 = $_GET['questao3'];
	
	$acertos = 0;
	
	if($qst1 == 2){
		$acertos+=1;
	}
	if($qst2 == 5){
		$acertos+=1;
	}
	if($qst3 == 1){
		$acertos+=1;
	}
	
	include "conexao.inc";
	
	$sql = "SELECT * FROM tb_prova WHERE nome = '$vnome'"; //Alterar, caso tenha criado uma tabela com nome diferente
	mysqli_query($con,$sql);
	$lin = mysqli_affected_rows($con);
	
	if($lin == 1){
		echo "Você já fez a prova!";
	}else{
		$sql = "INSERT INTO tb_prova VALUES (NULL,'$vnome',$qst1,$qst2,$qst3,$acertos)"; //Alterar, caso tenha criado uma tabela com nome diferente
		mysqli_query($con,$sql);
		$lin = mysqli_affected_rows($con);
		
		if($lin == 1){
			echo "Registrado!<br/>";
		}else{
			echo "Falha no registro!<br/>";
		}
	}
	
	mysqli_close($con);
	
?>
