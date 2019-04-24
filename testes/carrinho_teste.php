<?php
session_start()

?>
<?php

if(isset($_SESSION['venda'])){
}else{
	$_SESSION['venda']= array();
}
print_r ($_SESSION['venda']);
if(isset($_GET['par'])){
	$produto = $_GET['par'];
  $_SESSION['venda'][$produto] = 1;
}
if(isset($_GET['del'])){
  $Del= $_GET['del'];
  unset($_SESSION['venda']['$Del']);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Finalizar Compras </title>
	 <?php include("header.php");?>
	  <?php include("conexao.php");?>
</head>
<body>
<ul>
<?php

$sql =mysqli_query($conexao ,"SELECT  * FROM produtos");
while($Res = mysqli_fetch_array($sql)){
?>
<li>
<span><?php echo  $Res['nome_prod'];?></span>
<strong><a href="carrinho_teste.php?par=<?php echo $Res['id_prod']?>">R$<?php echo  number_format($Res['preco'],2,",",".");?></a> 	</strong>
</li>
<?php  } ?>
      </ul>
      <table>
      	<caption>table title and/or explanatory text</caption>
      	<thead>
      		<tr>
      			<th>header</th>
      			<th>header</th>
      			<th>header</th>
      			<th>header</th>
      		</tr>
      	</thead>
         <?php
foreach ($_SESSION['venda']  as $nome => $qtd ):
  $sqlCarrinho = mysqli_query($conexao, "SELECT * FROM  produtos  WHERE id_prod = '$nome' ");
 while($resultado =mysqli_fetch_assoc($sqlCarrinho)){
  	?>
  <tr>
 
   <td><?php echo $resultado['nome_prod'];?></td> 
   <td><?php echo $resultado['preco'];?></td> 
     <?php echo '<td><a href="carrinho_teste.php?del='.$resultado['id_prod'].'">X</a></td>';
    
      ?>
     <?php $total +=$resultado['preco'] * $qtd; ?>
  </tr>
 <?php } 
endforeach;?>

<?php echo' 
<tr>';
 echo '<td>'.$total.'</td>';
echo '<tr>';
?>
<?php 
if(isset($_POST['enviar'])){
   $SqlInserirVenda= mysqli_query($conexao, "insert into  venda(id ,valor) VALUES('','$total') ");
   $idVenda= mysqli_insert_id();
   foreach($_SESSION['venda'] as $prod => $qtd):
           $SqlInserirItens =mysqli_query($conexao ,"insert into itens_venda(id_venda,id,id_prod,qtd)VALUES('$idVenda' ,'','$prod','$qtd') ");
   	endforeach;
   echo 'F';
}
?>
      </table>
   <form action="" method="post" enctype="multipart/form-data" >
   	<div>
   		
   		<input type="submit" name="enviar" id="name" value="finalizar" tabindex="1" />
   	</div>
   
   </form>
 <?php include("rodape.php");?>
</body>
</html>