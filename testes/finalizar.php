<? include('conexao.php');?>
<?php

$nome=$_POST['nome'];
$total=$_POST['total'];



	$query=mysqli_query($conexao, "INSERT INTO venda(id, valor) VALUES ('','$total') ");
    
		 if($query){
		  	echo "<script language='javascript' type='text/javascript'>
 	  alert('Usuário cadastro com sucesso!');window.location.href='index.php';
 	</script>";
	}else{
	echo "<script language='javascript' type='text/javascript'>
 	  alert('Não foi possível cadastrar esse usuário!');window.location.href='carrinho (2).php';
 	</script>";	
	}
	
  
?>