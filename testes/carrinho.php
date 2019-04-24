<?php session_start(); if(!isset($_SESSION['carrinho'])){ $_SESSION['carrinho'] = array(); }  if(isset($_GET['acao'])){ if($_GET['acao'] == 'add'){ $id = intval($_GET['id']); if(!isset($_SESSION['carrinho'][$id])){ $_SESSION['carrinho'][$id] = 1; }else{ $_SESSION['carrinho'][$id] += 1; } } if($_GET['acao'] == 'del'){ $id = intval($_GET['id']); if(isset($_SESSION['carrinho'][$id])){ unset($_SESSION['carrinho'][$id]); } }  if($_GET['acao'] == 'up'){ if(is_array($_POST['prod'])){ foreach($_POST['prod'] as $id => $qtd){
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
 

<tfoot>
                
<tr>
                 
<td colspan="2"><input type="submit" value="Atualizar Carrinho" /></td>
 
 

                 
<td colspan="2"><a href="index_carrinho.php">Continuar Comprando</a></td><br>
 
 <td colspan="2"><input type="submit" value="finalizar Compras" name="enviar"  onclick="<?php cadastrar()?>" /><a href="logout_carrinho.php"></a></td>

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
                                  $sql   = "SELECT *  FROM produtos WHERE id_prod= '$id' ";

                                  $qr    = mysqli_query($conexao, $sql) or die(mysqli_error());
                                  $ln    = mysqli_fetch_assoc($qr);
                                 
                                  $nome  = $ln['nome_prod'];
                           $i  = $ln['id_cat'];
                                  $preco = number_format($ln['preco'], 2, ',', '.');
                                  $sub   = number_format($ln['preco'] * $qtd, 2, ',', '.');
                               $data= date("Y/m/d");

                                                                    $total += $ln['preco'] * $qtd;
                          if(isset($_POST['enviar'])){
                            $sqlup=mysqli_query($conexao, "update produtos set estoque=estoque - '$qtd' where id_prod='$id' ");    
$SqlInserirVenda= mysqli_query($conexao, "insert into  venda(id,valor,data_compra) VALUES('','$total','$data') ");
   $idVenda= mysqli_insert_id($conexao);

    $SqlInserirItens =mysqli_query($conexao ,"insert into itens_venda(id_venda,id,id_prod,nome_prod,qtd,id_cat,data_compra)VALUES('$idVenda' ,'','$id','$nome','$qtd','$i','$data') ");
echo "<script language='javascript' type='text/javascript'>
    alert('Compra Realizada com Sucesso!');window.location.href='logout_carrinho.php';
  </script>";


}
 

                               echo '
<tr>       
                                      
<td class="info">'.$nome.'</td>


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
                         }
    
                   ?>
         <?php  function cadastrar() {

if(isset($_POST['enviar'])){
   $SqlInserirVenda= mysqli_query($conexao, "insert into  venda(id ,valor) VALUES('','$total') ");
   $idVenda= mysqli_insert_id();
   foreach($_SESSION['carrinho'] as $prod => $qtd):
           $SqlInserirItens =mysqli_query($conexao ,"insert into itens_venda(id_venda,id,id_prod,nome_prod,qtd)VALUES('$idVenda' ,'','$id'  ,'$prod','$qtd') ");
    endforeach;
   echo 'F';

}
 
   }
?>

         </tbody>
 
            </form>
 
    </table>

 <?php include("rodape.php");?>
    </body>
    </html>