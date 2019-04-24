<? include("conexao.php");?>
<?php session_start(); if(!isset($_SESSION['carrinho'])){ $_SESSION['carrinho'] = array(); } 
 if(isset($_GET['acao'])){ if($_GET['acao'] == 'add'){ $id = intval($_GET['id']); 
 if(!isset($_SESSION['carrinho'][$id])){ $_SESSION['carrinho'][$id] = 1; 
}else{ $_SESSION['carrinho'][$id] += 1; } }
 if($_GET['acao'] == 'del'){ $id = intval($_GET['id']);
  if(isset($_SESSION['carrinho'][$id])){ unset($_SESSION['carrinho'][$id]); } }
    if($_GET['acao'] == 'up'){ if(is_array($_POST['prod']))
    	{ foreach($_POST['prod'] as $id => $qtd){
                      $id  = intval($id);
                      $qtd = intval($qtd);
                      	
                         if(!empty($qtd) || $qtd <> 0){
                         $_SESSION['carrinho'][$id] = $qtd;
                            
                      }else{
                         unset($_SESSION['carrinho'][$id]);

                      }
                     
                   }
                }
             }
           
          }
           
           
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
  
    <?php include("header.php");?>
    <?php include("conexao.php");?>
           <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    <title>Carrinho de compras</title>

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

    </head>
 
    <body>
   

     
<table class="table table-striped table-bordered table-condensed table-hover" >
         
<caption>Carrinho de Compras</caption>
 
 
<thead>
 
<tr class="success">
                 
<th width="244">Produto</th>
 
 
<th width="10" >Quantidade</th>
 
 
<th width="89">Pre&ccedil;o</th>
 
 
<th width="100">SubTotal</th>
 
 
<th width="4">Remover</th>
 
              </tr>
 
        </thead>
 
 
<form action="?acao=up" method="post">
 
  <select name="select">
<?php
  $seleciona = mysqli_query($conexao,"select * from produtos");
    while ($consulta = mysqli_fetch_assoc($seleciona)){
  ?>
    <option value='<?php echo $consulta["id_prod"] ?>'>
  <?php
        
        echo $consulta['id_prod']." - ".$consulta['estoque']; 
    ?>
    </option>
   <?php } ?>

</select><br> 

<tfoot>
                
<tr>
                 
<td colspan="2"><input type="submit" value="Atualizar Carrinho" /></td>
 
 

                 
<td colspan="2"><a href="index_carrinho.php">Continuar Comprando</a></td><br>
 
 <td colspan="2"><a href="finalizar.php?finalizar=up"><input type="submit" value="finalizar"  name="enviar" onclick="<?php cadastrar()?>" /></a></td>
 </tr>
        </tfoot>
 
 
<tbody>
                   <?php
                         if(count($_SESSION['carrinho']) == 0){
                            echo '
<tr>
<td colspan="5">Não há produto no carrinho</td>
</tr >
 
';
                         }else{
                 include("conexao.php");
                            $total = 0;
                            foreach($_SESSION['carrinho'] as $id => $qtd){
                                  $sql   = "SELECT *  FROM venda WHERE id= '$id' ";
                                   $insert ="INSERT INTO venda(id,valor) values('$id','$qtd')";
                                  $qr    = mysqli_query($conexao, $sql) or die(mysqli_error());
                                  $ln    = mysqli_fetch_assoc($qr);
                                   
                                  $nome  = $ln['nome'];
                                  $preco = number_format($ln['preco'], 2, ',', '.');
                                  $sub   = number_format($ln['preco'] * $qtd, 2, ',', '.');
                               

                                  $total += $ln['preco'] * $qtd;
                                $query_v=mysqli_query($conexao ,"insert into compra (quant) values($qtd') ");
       $query_i=mysqli_query($conexao ,"insert into itens_venda(id,nome_prod,qtd) values('','$nome','$qtd') ");
       if($query_v){
 echo "ddd";
       }else if($query_i){
       	echo "ooo";
       }
                               echo '
<tr>       
                                      
<td class="info"><input type="">'.$nome.'</td>


<td><input type="number" size="3"  name="prod['.$id.']" value="'.$qtd.'" /></td>
 
 
<td class="danger">R$ '.$preco.'</td>
 
 
<td>R$ '.$sub.'</td>
 
 
<td class="warning"><a href="?acao=del&id='.$id.'">X</a></td>
 
</tr>
 
';
      }
$total = number_format($total, 2, ',', '.');
echo '
<tr>
                                         
<td colspan="4" class="danger">Total</td>
 
 
<td class="danger">R$ '.$total.'</td>
 
</tr>
';
?>
<tr>
<td colspan="2">
 <?php  function cadastrar()
   {
   	if(isset($_POST['enviar'])){
       mysqli_query($conexao ,"insert into venda (id, valor) values('','$total') ");
       mysqli_query($conexao ,"insert into itens_venda(id,nome_prod,qtd) values('','$nome','$qtd') ");
       echo "A";
       
  
   	}
   }
?>
</td> 
</tr>

<?php
                         }
                   ?>
        
         </tbody>
 
            </form>
 
    </table>
 <!--"<iframe width="560" height="315" src="https://www.youtube.com/embed/yjk1fewr9uY" frameborder="0" allowfullscreen></iframe>--->
 <?php include("rodape.php");?>

    </body>
    </html>
