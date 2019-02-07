<?php
include('conexao.php');
$id=$_POST['id_prod'];
$nome=$_POST['nome_prod'];
$preco=$_POST['preco'];
$estoque=$_POST['estoque'];
mysqli_query($conexao, "UPDATE produtos SET nome_prod ='$nome' , estoque ='$estoque' ,preco ='$preco' WHERE id_prod= '$id'");
echo "<script language='javascript' type='text/javascript'>
 	  alert('PRODUTO ALTERADO COM SUCESSO');window.location.href='cadastro_produtos.php';
 	</script>";
mysqli_close($conexao);

?>