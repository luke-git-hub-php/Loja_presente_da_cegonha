<html>
<head>
<meta charset="utf-8">
	<title>Login do cliente</title>
	<link rel="stylesheet" type="text/css" href="css/style_login_clientes.css">
	</head>
<body>
<?php include('header.php');?>
      <br>
    
    	
      <section class="newsletter container bg-black">
           <h2>Login</h2>
           
           <form action="autenticado_clientes.php" method="POST" >
                            <input class="bg-black radius" type="text"  name="login" placeholder="Digite seu Email"/><br>
                            <input  class="bg-black radius" type="password" name="senha" id="input2" maxlength="8" placeholder="Digite sua senha" />
         <br>
                
              <button class="bg-white radius"> Cadastrar </button>
           </form>
        </section>
  	  </div>
            </div>
      <?php include('rodape.php');?>
</body>
</html>