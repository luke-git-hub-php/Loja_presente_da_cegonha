<?php
include('conexao.php');
include('header_func.php');?>
<section class="newsletter container bg-black">
 <h2>Alterar Informações dos Produtos! </h2>
<form name="form_alterar" method="POST" action="alterar_2.php">
<?php
  $idAlt=$_GET['id'];
 $resultado=mysqli_query($conexao, "SELECT * FROM produtos where id_prod='$idAlt'");
 if($resultado){
    while($row=mysqli_fetch_assoc($resultado)){
    ?>	
  
    <input class="bg-black radius" readonly="true" type="text" id="id_prod" name="id_prod" value="<?php echo $row['id_prod']; ?>" />
 <br>
    
   <input  class="bg-black radius" type="text"  id="nome_prod" name="nome_prod" value="<?php echo $row['nome_prod']; ?>" size="30" />
     <br>
   <input  class="bg-black radius" type="text" id="preco" name="preco" value="<?php echo $row['preco']; ?>" size="25"/> <br>

    <input  class="bg-black radius"  type="number"  id="estoque" name="estoque" value="<?php echo $row['estoque'];?>" size="20"/> <br>
    <?php
    }
 }
?>
   <input type="submit" name="alterar" value="Alterar" />
</form>
</section>
	


<?php
mysqli_close($conexao);
?>
<?php include('rodape.php');?>