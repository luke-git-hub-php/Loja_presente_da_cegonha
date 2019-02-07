<html>
<head>
		 <link href="css/estilo_form2.css" rel="stylesheet">
	 	<script type="text/javascript" src="../Loja_presente_da_cegonha/jquery/jquery-1.12.3.min.js"></script>
      <script> 
        function Mascara(objeto){

           if(objeto.value.length==0)
              objeto.value='(' +objeto.value;

              	if(objeto.value.length==3)
              		objeto.value= objeto.value +')';
                   
                   if(objeto.value.length==9)
                       objeto.value=objeto.value +'-';     
        }	 
       </script>
       <script> 
        function Mascara_cpf(objeto){

           if(objeto.value.length==0)
              objeto.value='' +objeto.value;

              	if(objeto.value.length==3)
              		objeto.value= objeto.value +'.';
                   if(objeto.value.length==7)
              		objeto.value= objeto.value +'.';
                    

                   if(objeto.value.length==11)
                       objeto.value=objeto.value +'-';     
        }	 
       </script>
       <script type="text/javascript">
       function Mascara_cep(objeto){
 
           if(objeto.value.length==0)
              objeto.value='' +objeto.value;


                   if(objeto.value.length==5)
                       objeto.value=objeto.value +'-';     
        }	 
       </script>

       <script>
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
       </head>
<body>
<?php include('header.php');?>

<section class="newsletter container bg-black">
           <h2>Cadastre-se agora! </h2>
           <h3>  Receba novidades,facilidades na compras,ofertas, o e muito mais ! </h3>
           <form action="cadastrar_clientes.php" method="POST">
           <input class="bg-black radius" type="text"  placeholder="nome" name="nome" />	<br>
           <input class="bg-black radius" type="text"  placeholder="CPF" name="cpf"  maxlength="14" onKeypress="Mascara_cpf(this);" />
           <br>
           <input class="bg-black radius" type="text"  placeholder="telefone(celular)" name="tel"  maxlength="14" onKeypress="Mascara(this);" />
             <input class="bg-black radius" type="text"  placeholder="Bairro" name="bairro" />	<br>
               <input class="bg-black radius" type="text"  placeholder="Rua" name="rua" /><br>
                <input class="bg-black radius" type="number"  placeholder="Nº" name="numero" />	<br>
                    <input class="bg-black radius" type="text"   maxlength="9"  placeholder="CEP" name="cep" onKeypress="Mascara_cep(this);" />	<br> 
                  <input class="bg-black radius" type="email" name="email" placeholder="Seu email"><br>
                    <input class="bg-black radius" type="password"  maxlength="9" name="senha" placeholder="Senha"><br>
              <button class="bg-white radius"> Cadastrar </button>
              
           </form>
        </section>
<?php include('rodape.php');?>
</body>
</html>
