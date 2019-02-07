  <div id="sair">
<?php 

   session_start();
   if(!isset($_SESSION["login"]) && !isset($_SESSION["senha"])){
         header("location:login_clientes.php");
         exit;          
   }else{
        echo "<center><font color='red'>".'Você está logado!'."</font></center>";
   }
?>
</div>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
     <meta charset="utf-8">
    <title>Carrinho</title>
    <style type="text/css" media="screen">
  
    </style>
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
    <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <?php include("header.php");?>
    

    </head>
 
    <body>
     
    <div id="topo">
  

</div><h1>
    <?php
          include("conexao.php");?>

<h1>Lista de Produtos</h1>
<?php

//Máximo de registros por páginas
$maximo=4;
//Declaração da pá gina inicial
@$pagina=$_GET['pagina'];
if($pagina==""){
  $pagina="1";
}
//Calculando o registro inicial
$inicio=$pagina - 1;
$inicio=$maximo * $inicio;
$query=mysqli_query($conexao, "SELECT * FROM produtos");
//Conta os resultados no total da query
$total=mysqli_num_rows($query);
########################################
// // INICIO DO CONTEÚDO
//Realizamos a query

$sql=mysqli_query($conexao, "SELECT * FROM produtos LIMIT $inicio,$maximo");
//Exibimos os query dos produtos e seus repectivos valores
while($linha=mysqli_fetch_object($sql)){
?>

<table class="table table-striped table-bordered table-condensed table-hover" >

    <tr><main class="servicos container">
              <article class="servico bg-white radius">
              <thead>
              <tr>
                <th><h2>Imagem</h2></th>
             <th><h2>COMPRAR</h2></th>
             <th><h2>Produto<h2></th>

              <th><h2>Preço</h2></th>
              </tr>
              </thead>
              <tbody>

                <tr>
                <td><img src="uploads/<?php echo $linha->imagem;?>"  width="300px"/></td>
                <td> <a href="carrinho_cliente.php?acao=add&id='.$linha->id_prod.'"> <br> <img src="img/icone_carrinho.jpg"  /><?php echo '<a href="carrinho_cliente.php?acao=add&id='.$linha->id_prod.'"><br><h4><b><i>Comprar</i></b></h4></a>';?></br></a> </td>

       <div class="inner">
    <td><?php echo '<h4> '.utf8_encode($linha->nome_prod);'</h4>'?><br></td>
   
      <td><?php echo'<h4>Preço: '. number_format($linha->preco, 2, ',', '.').'</h4>'?></td>
   
 </tr>

              </tbody>

             
        </div>
            </article>
    </main></tr>
    </table>
    <?php }//Fim do loço ?>

    <?php
    //Fim do CONTEÚDO
    ####################################
    $menos=$pagina - 1;
    $mais=$pagina + 1;
    $pgs=ceil($total / $maximo);
    if($pgs > 1){
          echo "<br />";
          //Exibição de página
          if($menos > 0){
            echo  "<a href=" . $_SERVER['PHP_SELF'] . "?pagina=$menos>anterior</a>";
          }//Listando as páginas
          for ($i=1; $i <=$pgs ; $i++) { 
            if($i != $pagina){
               echo "<a href=".$_SERVER['PHP_SELF']. "?pagina=" . ($i) .">$i</a>|";
            }else{
              echo "<strong> " .$i . "</strong>|";
            }//Fim For
            if($mais <= $pgs){
                     echo "<a href=". $_SERVER['PHP_SELF'] . "?pagina=$mais>próximo</a>";
                     }               
            }
           }
           
          
    ?>
  </article>
    </main></h1>
   <div class="container">
  
  <div class="row">
    <div class="col-sm-6" style="background-color:#0099cc;">
   
    </div>
    <div class="col-sm-6" style="background-color:#0099cc;">
   
    </div>
  </div>
</div>
<h1>Fitros de Pesquisa<h1>
    <form name="cons" method="post" action="index_carrinho_cliente.php">
  <h1>Escolha uma categoria<h1>
<select name='sel_cat'>
  <?php
       $resultado=mysqli_query($conexao,"SELECT * FROM categorias");
    while($linha=mysqli_fetch_assoc($resultado)){
  ?>
  <option value="<?php echo $linha['id_cat']; ?>">
  <?php echo utf8_encode($linha['nome_cat']);?></option>
  <?php }?>
  </select> 
  <input type="submit" value="Consultar">
</form>
  <?php
@$idcat=$_POST['sel_cat'];
$sql="SELECT * FROM produtos WHERE id_cat='$idcat' ";
$querysql=mysqli_query($conexao,$sql);
while($linha=mysqli_fetch_array($querysql)){
    ?><table class="table table-striped table-bordered table-condensed table-hover" >

    <tr><main class="servicos container">
              <article class="servico bg-white radius">
              <thead>
              <tr>
                <th>Imagem</th>
              
              <th>Comprar</th>
              <th>Produto</th>
              <th>Preço</th>
              </tr>
              </thead>
              <tbody>
               <td><img src="uploads/<?php echo $linha['imagem'];?>"  width="300px"/></td>
                <td> <a href="carrinho_cliente.php?acao=add&id='.$linha['id_prod'].'"> <br> <img src="img/icone_carrinho.jpg"  /><?php echo '<a href="carrinho_cliente.php?acao=add&id='.$linha['id_prod'].'"><br><h4><b><i>Comprar</i></b></h4></a>';?></br></a> </td>

       <div class="inner">
    <td><?php echo '<h4>'.utf8_encode($linha['nome_prod']).'</h4>'?><br></td>
  
      <td><?php echo'<p>Preço: '. number_format($linha['preco'], 2, ',', '.').'</p>'?></td>
   
 </tr>

              </tbody>

             
        </div>
            </article>
    </main></tr>
    </table>
 
           <?php
  }   ?>
  <div id="dialog" title="Janela de Dialogo">
    <p align="center">
    
    <button id="opener" class="bg-white radius""> <a href="logout_cliente.php">Sair</a></button>
    </p>
  </div>

 
    </body>
     </html>
<?php include("rodape.php");?>
          <!--$sql = "SELECT * FROM produtos";
          $qr = mysqli_query($conexao, $sql) or die(mysqli_error());
          while($ln = mysqli_fetch_assoc($qr)){
             echo '<h2>'.$ln['nome_prod'].'</h2>';
             echo "Preço : R$ ".number_format($ln['preco'], 2, ',', '.')."";

  $arquivos= glob ('uploads/*.*');
         $qtd = 1;
         $atual=(isset($_GET['pg'])) ? intval($_GET['pg']):1;
        $pagarquivo = array_chunk($arquivos, $qtd);
        $contar = count($pagarquivo);
        $result=$pagarquivo[$atual-1];
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
  
             echo '<img src="upload/'.$ln['imagem'].'" /> ';
             echo '<a href="carrinho.php?acao=add&id='.$ln['id_prod'].'">Comprar</a>';
             echo '<hr />';
          }
    ?>-->