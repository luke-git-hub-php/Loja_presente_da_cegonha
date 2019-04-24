<?php
  require_once("conexao.php");
  ?>
  <!DOCTYPE html>
  <html>
  <head lang="pt">
      <meta charset="UTF-8">
      <title>Armazenando imagens no banco de dados Mysql</title>
  </head>
  <body>
  <h2>Selecione um novo arquivo de imagem</h2>
   
  <form enctype="multipart/form-data" action="upload.php" method="post">
      <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
     
      <div><input name="imagem" type="file"/></div>
      <div><input type="submit" value="Salvar"/></div>
  </form>
  <br />
  <table border="1">
      <tr>
         
       
         
          <td align="center">
              Visualizar imagem
          </td>
  <td align="center">
              Excluir imagem
          </td>
      </tr>
      <?php
   
      $querySelecao = "SELECT imagem FROM produtos";
      $resultado = mysql_query($querySelecao);
   
      while ($aquivos = mysql_fetch_array($resultado)) { ?>
      
          <td align="center">
          <?php echo '<a href="ver_imagem.php?id='.$aquivos[‘codigo’].'">Imagem '.$aquivos[‘codigo’].'</a>'; ?>
      </td>
      <td align="center">
          <?php echo '<a href="excluir_imagem.php?id='.$aquivos[‘codigo’].'">Imagem '.$aquivos[‘codigo’].'</a>'; ?>
      </td>
      <?php } ?>
  </table>
  </body>
  </html>