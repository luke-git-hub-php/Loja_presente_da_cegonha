<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Celke - Formulario</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1>Cadastrar Usuário</h1>
			</div>
			<div class="row">
				<form class="form-horizontal" action="salvar_registro.php" method="POST">
					<div class="form-group">
						<label class="col-sm-2 control-label">Usuário</label>
						<div class="col-sm-10">
							<input type="text" name="usuario" class="form-control" id="usuario" placeholder="Usuário">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Senha</label>
						<div class="col-sm-10">
							<input type="password" name="senha" class="form-control" id="senha" placeholder="Senha">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-success">Cadastrar</button>
						</div>
					</div>
				</form>
			</div>
			
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>