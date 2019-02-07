  <?php include("header_func.php");?>
  <div id="sair">
<?php 

   session_start();
   if(!isset($_SESSION["login"]) && !isset($_SESSION["senha"])){
         header("location:login_area_restrita.php");
         exit;          
   }else{
        echo "<center><font color='red'>".'Funcionário logado!'."</font></center>";
   }
?>
</div>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    <title>Cadastro de Produtos</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/jquery/jquery-1.11.2.min.js"></script>
	<script src="js/jquery/jquery-ui.js"></script>
	<link href="js/jquery/jquery-ui.css" rel="stylesheet">
<script>
$(function() {
  $( "#tabs" ).tabs();
});
</script>
<script type="text/javascript">
$(document).ready(function() {
       	 $('.dica + span')
       	 .css({display:'none',
       	       border: '1px solid #336600',
       	       padding:'2px 4px',
       	       background:'#999966',
       	       marginLeft:'10px'   });
       	 $('.dica').focus(function() {
           $(this).next().fadeIn(1500);    	 	
       	 })
       	 .blur(function(){
       	 	$(this).next().fadeOut(1500);
       	 });
       });
	</script>
	<script src="js/jquery/jquery-1.11.2.min.js"></script>
	<script src="/js/jquery/jquery-ui.js"></script>
	<link href="/js/jquery/jquery-ui.css" rel="stylesheet">
	<script>
	//Aplica o padrão da animação e velocidade para exibição do efeito
	$.fx.speeds._default =1000;
	$($function() {
		$("#dialog" ).dialog({
           autoOpen: false,
           show: "blind",
           hide: "explode"
		});
		$( "#opener" ).click(function() {
            $( "#dialog" ).dialog( "open" );
            return false;
		});
	});
	</script>
	</script>
	 
	
<?php include("conexao.php");?>

</head>
<body><h4>Relatório por Categoria<h4>
    <form name="cons" method="post" action="relax.php">
  <h4>Imprimir<h4>
           
<select  class="selectpicker show-menu-arrow" name="sel_cat">
  <?php
       $resultado=mysqli_query($conexao,"SELECT * FROM categorias");
    while($linha=mysqli_fetch_assoc($resultado)){
  ?>
  <option   value="<?php echo $linha['id_cat']; ?>" >
  <?php echo utf8_encode($linha['nome_cat']);?></option>
  <?php }?>
  </select> 
  <input type="submit" value="Consultar">
</form>
  <?php
@$idcat=$_POST['sel_cat'];
$sql="SELECT * FROM categorias WHERE id_cat='$idcat' ";
$querysql=mysqli_query($conexao,$sql);
while($linha=mysqli_fetch_array($querysql)){
echo '<a href="relax.php">'.$linha['nome_cat'].'</a>';

}
    ?>
 
</div>
</div>
<form name="cons" method="POST" action="relax_data.php">   
<input  type="date"  placeholder="Data do Relatório" name="data" />	<br>
	

  <input type="submit" value="Consultar">
</form>
  
 
<h4>Relatório por Produtos</h4>
 <form name="cons" method="post" action="relax_produto.php">
    
      <select  class="selectpicker show-menu-arrow" name="sel_cat">
  <?php
       $resultado=mysqli_query($conexao,"SELECT * FROM produtos");

    while($linha=mysqli_fetch_assoc($resultado)){
  ?>
  <option   value="<?php echo $linha['id_prod']; ?>" >
  <?php echo  utf8_encode($linha['nome_prod']);?></option>
  <?php }?>
  </select> 
  <input type="submit" value="Consultar">
</form>

	

     <section class="newsletter container bg-black">
          
<form action="funcao_upload.php" method="post" enctype="multipart/form-data" name="upload_insere">
              <input type="file" name="arquivo">
			
	<?php
	$arquivos= glob ('uploads/*.*');
         $qtd = 3;
         $atual=(isset($_GET['pg'])) ? intval($_GET['pg']):1;
        $pagarquivo = array_chunk($arquivos, $qtd);
        $contar = count($pagarquivo);
        $result=$pagarquivo[$atual-1];
	?>
	<?php
        foreach ($result as $value) {
        	printf('<img src="%s" width="300" height="300" />', $value);

        }
        echo "<hr/>";
 for($i =1; $i<=$contar; $i++){
 	if($i==$atual){
     printf('<a href="#">(%s)</a>', $i, $i);
 	}else
 	printf('<a href="?pg=%s"> %s </a>', $i, $i);
 }
	?>
<br><br><br>
	<h4>Selecione a Categoria do Produto</h4><select name="sel_cat">
  <?php
       $resultado=mysqli_query($conexao,"SELECT * FROM categorias");
    while($linha=mysqli_fetch_assoc($resultado)){
  ?>
  <option value="<?php echo $linha['id_cat']; ?>">
  <?php echo utf8_encode($linha['nome_cat']);?></option>
  <?php }?>
  </select> <br><br>
              <input class="bg-black radius" type="text" name="nome_prod" placeholder="nome"><br>
                <input class="bg-black radius" type="text" name="preco" placeholder="preço"><br>
                   <input class="bg-black radius" type="number" name="estoque" placeholder="Estoque"><br>
             
  <!--<input   class="bg-black radius" name="id_cat" type="text" id="id_cat" maxlength="1" placeholder="Categoria"> <br>-->
              <button class="bg-white radius"> Cadastrar </button>
           </form>
        </section>
	  


<div id="tabs-2">
<h1>Listando dados da Tabela</h1>
	<table class="table table-striped table-bordered table-condensed table-hover" >
		<thead>
			<tr>
				<th>ID</th>
				<th>nome</th>
				<th>Preço</th>
                <th>Alterar</th> 
                <th>Excluir</th>
			</tr>
		</thead>
<?php
 $resultado=mysqli_query($conexao, "SELECT * FROM produtos");
  if($resultado){
   while($row = mysqli_fetch_assoc($resultado)){
      	?>
   	<tbody>
      	<tr>
       		<td>
       		<?php echo "<p></p>",$row['id_prod'];?>
      			</td>
          			<td>
       				<?php echo "<p></p>".utf8_encode($row['nome_prod']);?></td>
       				<td><?php $row['preco'];
       				 echo $valor_preco=number_format($row['preco'],2,",","."); ?></td>
               <td><a href="alterar.php?id=<?php echo $row['id_prod'];?>">Alterar</a></td>
               <td><a href="excluir.php?id=<?php echo $row['id_prod'];?>"><p>X</p></a></td>
          	</tr>
            </tbody>
            <?php
        }//fim do while
        }//fim do if
        mysqli_close($conexao);//fecha conexão
        ?>
	</table>
</div>

<div>

 <div id="dialog" title="Janela de Dialogo">
    <p align="center">
    
    <button id="opener" class="bg-white radius""> <a href="logout_area_restrita.php">Sair</a></button>
    </p>
  </div>
	<?php include("rodape.php");?>
</body>
</html>