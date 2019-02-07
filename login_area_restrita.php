
<html>
<head>
	<title>Aréa Restrita</title>
	<link rel="stylesheet" type="text/css" href="css/style_login_adm.css">
	</head>
<body>
<?php include('header.php');?>
<br><br>

    <br>
    
     <section class="newsletter container bg-black">
           <h2>ÁREA RESTRITA</h2>
           <h3>  Login </h3>
           <form action="autenticado_usuario.php" method="POST" >
              <input class="bg-black radius" type="email" name="email" placeholder="Login"><br>
                <input class="bg-black radius" type="password" name="senha" placeholder="Sua senha"><br>
              <button class="bg-white radius"> Cadastrar </button>
           </form>
        </section>
	  <br>
	   <?php include('rodape.php');?>
</body>
</html>