<?php /*
   session_start();
   if(!isset($_SESSION["login"]) && !isset($_SESSION["senha"])){
        ?>
        <script>
           setTimeout("window.location='index.php'");
        </script>
        <?php          
   }else{
   */
?>
<?php 
 if(!isset($_SESSION['carrinho_cliente'])){ 

  $_SESSION['carrinho_cliente'] = array(); 
} 
 if(isset($_GET['acao'])){ if($_GET['acao'] == 'add'){
  $id = intval($_GET['id']);
 if(!isset($_SESSION['carrinho_cliente'][$id])){
 $_SESSION['carrinho_cliente'][$id] = 1; 
}else{ $_SESSION['carrinho_cliente'][$id] += 1; 
} 
} if($_GET['acao'] == 'del'){ $id = intval($_GET['id']); 
 if(isset($_SESSION['carrinho_cliente'][$id])){ 

  unset($_SESSION['carrinho_cliente'][$id]);
}
}

  if($_GET['acao'] == 'up_c'){ if(is_array($_POST['prod'])){
   foreach($_POST['prod'] as $id => $qtd){
                      $id  = intval($id);
                      $qtd = intval($qtd);
                         if(!empty($qtd) || $qtd <> 0){
                         $_SESSION['carrinho_cliente'][$id] = $qtd;
                      }else{
                         unset($_SESSION['carrinho_cliente'][$id]);
                      }
                     
                   }
                }
             }
           
          }
           
           
    ?>
    <?php

if(isset($_SESSION['venda'])){
}else{
  $_SESSION['venda']= array();
}

if(isset($_GET['par'])){
  $produto = $_GET['par'];
  $_SESSION['venda'][$produto] = 1;
}
?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
  
    <?php include("conexao.php");?>
   
    <title>Carrinho de compras</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    
    
    <script src="bootstrap/js/bootstrap.min.js"></script>

    </head>
 
    <body background="img/orangeyellow-background.jpg">
  
     
<table class="table-responsive table">
         
<h1 class="alert-warning"><center>Carrinho de Compras</center></h1>
 
 
<thead>
 
<tr>
                 
<th width="244"><h3>Produto</h3></th>
 
 
<th width="10" ><h3>Quantidade</h3></th>
 
 
<th width="89"><h3>Pre&ccedil;o</<h3></th>
 
 
<th width="100"><h3>Total</h3></th>
 
 
<th width="4"><h3>Remover</h3></th>
 
              </tr>
 
        </thead>
 
 
<form action="?acao=up_c" method="post">
 

<tfoot>
                
<tr>
                 
<td ><input type="submit" value="Atualizar Carrinho" class="btn btn-primary"></td>
 
 

                 
<td ><a href="cliente.php"><h4>Continuar Comprando<h4></a></td><br>
 
 <td ><a href="autenticacao_carrinho.php"><input class="btn btn-success" type="submit" value="finalizar Compras" name="enviar"   /></a></td><td><td>
 
    
  
    
 </tr>
        </tfoot>
 
 
<tbody>
  
                   <?php
                         if(count($_SESSION['carrinho_cliente']) == 0){
                            echo '
<tr>
<td colspan="5">Não há produto no carrinho</td>
</tr >

 
';
                         }else{
            $conexao=mysqli_connect("localhost", "root", "","cosmeticos") or die(mysql_error()); 
                            foreach($_SESSION['carrinho_cliente'] as $id => $qtd){
                                  $consulta   = "SELECT *  FROM produtos WHERE id_produto= '$id' ";
                                  $query   = mysqli_query($conexao, $consulta) or die(mysqli_error());
                                  $ln    = mysqli_fetch_assoc($query);
                                   
                                  $nome  = utf8_encode($ln['nome_produto']);
                                  $id_categoria  = $ln['id_categoria'];
                                  $preco = number_format($ln['preco'], 2, '.', ',');
                                  $total   = number_format($ln['preco'] * $qtd, 2, '.', ',');
                                  $data= date("d/m/Y");
                                  $_SESSION['nome_produto'] = $nome;
                                  $_SESSION['qtd'] = $qtd;
                                  $_SESSION['total'] = $total;
                                  $_SESSION['preco'] = $preco;

                          if(isset($_POST['enviar'])){
                          
 $sqlup=mysqli_query($conexao, "update produtos set estoque=estoque - '$qtd' where id_produto='$id' ");    

$id_cliente = $_SESSION['id_cliente'];
$nome_cliente = $_SESSION['nome_cliente'];

$SqlInserirItens =mysqli_query($conexao, "insert into vendas(id,id_produto,nome_produto,qtd,id_categoria,data_compra,id_cliente,preco,total,nome_cliente)VALUES('','$id','$nome','$qtd','$id_categoria','$data','$id_cliente','$preco','$total','$nome_cliente') ");
echo "<script language='javascript' type='text/javascript'>
    alert('Compra Realizada com Sucesso!');window.location.href='nota_fiscal.php';
  </script>";
}


echo '
<tr>       
                                      
<td><h4>'.$nome.'</h4></td>


<td><h4><input class="form-control" type="number" size="3"  name="prod['.$id.']" value="'.$qtd.'" ></h4></td>
 
 
<td><h4>R$ '.$preco = number_format($ln['preco'], 2, ',', '.').'</h4></td>
 
 
<td><h4>R$ '.$total = number_format($ln['preco'] * $qtd, 2, ',', '.').'</h4></td>
 
 
<td><h4><a href="?acao=del&id='.$id.'">X</a></h4></td>
 
                                  </tr>
 
';
                            }
                         }
    
                   ?>
         </tbody>
 
            </form>
 
   
    </table>
<br><br><br><br><br><br><br><br>

 <?php include("rodape.php");?>
    </body>
    </html>