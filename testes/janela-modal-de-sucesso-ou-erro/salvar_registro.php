<?php
	include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Celke - Formulario</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container theme-showcase" role="main">
		<?php
		$usuario = $_POST['usuario'];
		$senha = md5($_POST['senha']);
		$result_ususario_acesso = "INSERT INTO usuarios (usuario, senha) VALUES ('$usuario', '$senha')";
		$resultado_usuario_acesso = mysqli_query($conn, $result_ususario_acesso);		
		
		if(mysqli_affected_rows($conn) > 0){ ?>
			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myModalLabel">Usuário cadastrado com Sucesso!</h4>
						</div>
						<div class="modal-body">
							<?php echo $usuario; ?>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-info" data-dismiss="modal">Corrigir Cadastro</button>
							<a href="index.php"><button type="button" class="btn btn-success">Ok</button></a>
						</div>
					</div>
				</div>
			</div>				
			<script>
				$(document).ready(function () {
					$('#myModal').modal('show');
				});
			</script>
		<?php }else{ ?>
			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myModalLabel">Erro ao cadastrar o usuário!</h4>
						</div>
						<div class="modal-body">								
							<?php echo $usuario; ?>
						</div>
						<div class="modal-footer">
							<a href="index.php"><button type="button" class="btn btn-danger">Ok</button></a>
						</div>
					</div>
				</div>
			</div>			
			<script>
				$(document).ready(function () {
					$('#myModal').modal('show');
				});
			</script>
		<?php } ?>
	
	
		</div>
	</body>
</html>