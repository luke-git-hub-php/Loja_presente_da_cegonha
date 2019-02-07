<?php
include("conexao.php");
?>
<html>
<head>
	<title>Autenticando usuário</title>
	<script type="text/javascript">
	    function loginsuccessfully(){
	    	setTimeout("window.location='index_carrinho_cliente.php'",5000);
	    }
	   function loginfailed() {
            setTimeout("window.location='login_clientes.php'",5000);
	   }
	</script>

</head>
<body>
<h1>
<?php include('header.php');?>
<div id="autenticando">
<?php
$email=$_POST['login'];
$senha=$_POST['senha'];
$nome=mysqli_query($conexao, "select nome_cli from clientes where Email_login and senha");
if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      
  }else{
  	
  	echo "<script language='javascript' type='text/javascript'>
 	  alert('E-MAIL INVÁLIDO!');window.location.href='login_clientes.php';
 	</script>";
  }
$sql=mysqli_query($conexao,"SELECT * FROM  clientes WHERE Email_login='$email' and senha='$senha'")or die(mysqli_error());
$linha=mysqli_num_rows($sql);
if($linha > 0){
  session_start();
  $_SESSION['login']=$_POST['login'];
  $_SESSION['senha']=$_POST['senha'];
 $_SESSION['nome_cli']=$nome;
  echo "<i><center><b><h1>Você foi autenticado com sucesso! Aguarde um instante.</h1></b></center></i>";
  echo "<script>loginsuccessfully()</script>";
  /*$arquivo=fopen('email.txt','a');
  $date=date("d/m/Y");
  fwrite($arquivo,"notificação:Você fez login!|Data e Hora:.$date|Nome:Lucas|De:Lanchonete lanche rápido.");*/
}else{
	echo "<i><center><b>Nome do usuário ou senha inválidos! Aguade um instante para tentar novamente.</b></center></i>";
	echo "<script>loginfailed()</script>";
}
?>
</div></h1>
<?php include('rodape.php');?>
</body>
</html>