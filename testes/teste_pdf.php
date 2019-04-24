<html>
<head>
<meta charset="utf-8">
<title>Relatorio compra</title>
<script type="text/javascript">
window.print();
</script>
</head>
<body>


<p align="center"><img src="img/Logomakr_32QuiT.png" width="100px"></p>
<h2>Relatorio da compra</h2>

<p><?php 

include('conexao.php');?></p>
<?php
$id_cat=$_POST['sel_cat'];
?>
 
<table>
	
	<thead>
		
	</thead>
	<tbody>
		<tr>
			<?php 
			$query=mysqli_query($conexao, "Select * from itens_venda where id_cat='$id_cat' ");
 $query_r=mysqli_query($conexao,"Select  id_por from produtos ");
$query_p=mysqli_query($conexao,"Select  * from itens_vendas  where id_prod= '$query_r'");
			while($resultado=mysqli_fetch_assoc($query)){
?>
	 	<td><?php echo $resultado['nome_prod'];?></td>
	 	<td><?php echo substr($resultado['data_compra'], 8, 2) . " / ". substr($resultado['data_compra'], 5, 2) . " / ". substr($resultado['data_compra'], 0, 4);;?></td>
	 	
	<!--$pdf->Cell(5,1,'Preco :'.$resultado['nome_cat'],0,0,'C');
	$pdf->Cell(5,1,'Estoque: '.$resultado['estoque'],0,1,'C');*/-->

			
		</tr>
	</tbody>
	<?php }?>
</table>

<table>
	
	<thead>
		<tr><th>Estoque</th>
		
		</tr>
	</thead>
	<tbody>
		<tr>
		<?php

$query_r=mysqli_query($conexao,"Select  id_prod from produtos ");
$query_p=mysqli_query($conexao,"Select  estoque,nome_prod  from produtos  where id_cat='$id_cat'");
while($resultado=mysqli_fetch_assoc($query_p)){ 
	?>
		<td><?php echo $resultado['nome_prod'];?></td>
	 	<td><?php echo $resultado['estoque'];?></td>
		
		</tr>
	</tbody>
	<?php }?>
</table>


</body>
</html>