<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
		<title>Usuario online</title>
	</head>
	<body>
		<?php
			//Obter a data atual
			$data['atual'] = date('Y-m-d H:i:s');	

			//Diminuir 20 segundos 
			$data['online'] = strtotime($data['atual'] . " - 20 seconds");
			$data['online'] = date("Y-m-d H:i:s",$data['online']);
			
			//Pesquisar os ultimos usuarios online nos 20 segundo
			$result_qnt_visitas = "SELECT count(id) as online FROM visitas WHERE data_final >= '" . $data['online'] . "'";
			
			$resultado_qnt_visitas = mysqli_query($conn, $result_qnt_visitas);
			$row_qnt_visitas = mysqli_fetch_assoc($resultado_qnt_visitas);
		?>
		<h1>Quantidade de usuários online: <span id='online'><?php echo $row_qnt_visitas['online']; ?></span></h1>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		
		<script>
		//Executar a cada 10 segundos, para atualizar a qunatidade de usuários online
		setInterval(function(){
			//Incluir e enviar o POST para o arquivo responsável em fazer contagem
			$.post("processa_vis.php", {contar: '',}, function(data){
				$('#online').text(data);
			});
		}, 10000);
		</script>
	</body>
</html>