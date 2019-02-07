<?php
include("conexao.php");
?>
<?php


	$nome = utf8_decode($_POST['nome']);
	$email= utf8_decode($_POST['email']);
	$tel=$_POST['tel'];
	$cpf= $_POST['cpf'];
	$senha= $_POST['senha'];
	$bairro = $_POST['bairro'];
	$rua= $_POST['rua'];
		$cep= $_POST['cep'];

	$num=$_POST['numero'];
	
$dominio_email=explode("@",$email);
$validar=checkdnsrr($dominio_email[0],"ANY");
if($validar){
	echo "Endereço de E-mail não existe!";
}
?>
<?php
  
  if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      
  }else{
  	require("cadastro_clientes.php");
  	echo "<script language='javascript' type='text/javascript'>
 	  alert('E-MAIL INVÁLIDO!');window.location.href='cadastro_clientes.php';
 	</script>";
  }
?> <?php
	$query_select="SELECT Email_login FROM clientes WHERE Email_login='$email'";
$select=mysqli_query($conexao,$query_select);
$array=mysqli_fetch_array($select);
$logarray=$array['Email_login'];
 if($email=="" || $email==null){
 echo "<script language='javascript' type='text/javascript'>
 	  alert('O campo email deve ser preenchido');window.location.href='cadastro_clientes.php';
 	</script>";
}else{
	if($logarray==$email){
		echo "<script language='javascript' type='text/javascript'>
 	  alert('Esse email já existe');window.location.href='cadastro_clientes.php';
 	</script>";
 	die();	
}else{
	 $query="INSERT INTO clientes (id_cli, nome_cli, cpf, telefone, bairro, rua,cep, numero, Email_login, senha) VALUES ('','$nome','$cpf','$tel','$bairro','$rua','$num','$cep','$email','$senha')";
     $insert=mysqli_query($conexao,$query);
		 if($insert){
		  echo "<script language='javascript' type='text/javascript'>
 	  alert('Cadastro realizado com sucesso!');window.location.href='login_clientes.php';
 	</script>";	
	}else{
	echo "<script language='javascript' type='text/javascript'>
 	  alert('Não foi possível cadastrar esse usuário!');window.location.href='cadastro_clientes.php';
 	</script>";	
	}
	}
  }
  mysqli_close($conexao);
		?>
		