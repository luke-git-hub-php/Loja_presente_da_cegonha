<?php
include("conexao.php");
?>
<html>
<head>
	<title>Autenticando Funcionário</title>
	<script type="text/javascript">
	    function loginsuccessfully(){
	    	setTimeout("window.location='cadastro_produtos.php'",5000);
	    }
	   function loginfailed() { 	
            setTimeout("window.location='login_area_restrita.php'",5000);
	   }
	</script>
	
	<?php include('header.php');?>
</head>
<body>
<div id="autenticando">
<?php
$email=$_POST['email'];
$senha=$_POST['senha'];

  
  if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      
  }else{
  	
  	echo "<script language='javascript' type='text/javascript'>
 	  alert('E-MAIL INVÁLIDO!');window.location.href='login_area_restrita.php';
 	</script>";
  }

$sql=mysqli_query($conexao,"SELECT * FROM funcionarios WHERE login_func='$email' and senha_func='$senha'")or die(mysqli_error());
$linha=mysqli_num_rows($sql);
if($linha > 0){
  session_start();
  $_SESSION['email']=$_POST['email'];
  $_SESSION['senha']=$_POST['senha'];
  echo "<i><center><b>Você foi autenticado com sucesso! Aguarde um instante.</b></center></i>";
  echo "<script>loginsuccessfully()</script>";
}else{
	echo "<center><h1><b>Nome do usuário ou senha inválidos! Aguade um instante para tentar novamente.</h1></b></center>";
	echo "<script>loginfailed()</script>";
}
?>
</div>
<br><br><br><br>
<?php include('rodape.php');?>
</body>
</html>