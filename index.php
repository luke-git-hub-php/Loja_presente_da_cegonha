<!DOCTYPE html>
<html lang="pt-br">
    <head>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title> Presente da Cegonha </title>
    	<meta name="description" content="loja com produtos infatis, calçados , roupas, brinquedos.">
    	<?php include("header.php" );?>
    	 <?php
          include("conexao.php");?>
    	</head>
        <!-- SERVICOS --> 
        <main class="servicos container">
            <article class="servico bg-white radius">
            <?php
            $sql=mysqli_query($conexao, "SELECT * FROM produtos WHERE  id_prod = 14");
//Exibimos os query dos produtos e seus repectivos valores

?>
           <img src="uploads/Carrinho_Max_Flash.jpg"  width="300px"/> <br>
                                    <!--<a href="carrinho.php"><img src="uploads/Carrinho_Max_Flash.jpg" alt="Criação de Sites"></a>-->
                                    <img src="img/icone_carrinho.jpg"  />
               <div class="inner">
                   <h4>Ofertas Promocionais</h4>
                   <h4>Carrinho Max_Flash</h4>

                   <h4>Categoria: Brinquedos </h4>
                   <p><s>Preço R$ 22,50</s></p>
                   <p><h4> Preço R$ 17,60<h4></p>
            
               </div>
            </article>
            <article class="servico bg-white radius">
               <?php
            $sql=mysqli_query($conexao, "SELECT * FROM produtos WHERE  id_prod = 17");
//Exibimos os query dos produtos e seus repectivos valores

?>
          <img src="uploads/enxoval.jpg"  width="300px"/> <br>
                                    <!--<a href="carrinho.php"><img src="uploads/Carrinho_Max_Flash.jpg" alt="Criação de Sites"></a>-->
               <div class="inner">
                  <img src="img/icone_carrinho.jpg"  />
                   <h4>Ofertas Promocionais</h4>
                    <h4>Enxoval "Seja linda"</h4>
                   <h4>Categoria: Roupa</h4>
                   <p><s>Preço R$ 50,00</s></p>
                   <p><h4>Preço R$ 48,80</h4></p>
               </div>
            </article>
            <article class="servico bg-white radius">
                <?php
            $sql=mysqli_query($conexao, "SELECT * FROM produtos WHERE  id_prod = 6");
//Exibimos os query dos produtos e seus repectivos valores
?>
          <img src="uploads/Fralda_pampers.jpg"  width="300px"/> 
               <div class="inner">
               <img src="img/icone_carrinho.jpg"  />
                <h4>Ofertas Promocionais</h4>
                   <h4>Fralda Pampers</h4>
                   <h4>Categoria: Higene</h4>
                   <p><s>Preço R$ 17,69</s></p>
                   <p><h4>Preço R$ 13,20</h4></p>
                  </div>
            </article>
        
        </main>
        <!-- NEWSLETTER -->
        <section class="newsletter container bg-black">
           <h2>Cadastre-se agora! </h2>
           <h3> Faça suas compras ,receba novidades, o e muito mais </h3>
           <form action="cadastro_clientes.php" method="post">
              <button class="bg-white radius"> Cadastrar </button>
           </form>
        </section>
       <?php include("rodape.php");?>
    </body>
</html>