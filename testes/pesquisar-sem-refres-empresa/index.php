<?php
include_once("conexao.php");
?>
<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Using MySQL and PHP with Google Maps</title>
    <style>      
      #map {
        width: 100%;
		height: 400px; 
      }
	  .carregando{
		  color:#ff0000;
		  dispaly:none;
	  }
	  
    </style>
  </head>

  <body>
    <div id="map"></div><br><br>
	<a href="cadastrar.php">Cadastrar</a><br><br>
	
	<form action="" method="POST">
		<label>Estado</label>
		<select name="estado_id" id="estado_id">
			<option value="">Selecione</option>
			<?php
				$result_estado = "SELECT DISTINCT est.* 
					FROM estados est
					INNER JOIN markers mak ON mak.estado_id = est.id
					ORDER BY est.estado_nome ASC";
				$resultado_estado = mysqli_query($conn, $result_estado);
				while($row_estado = mysqli_fetch_array($resultado_estado)){
					echo '<option value="'.$row_estado['id'].'">'.$row_estado['estado_nome'].'</option>';
				}
			?>
		</select>
	</form>
	
	<span class="carregando">Aguarde, pesquisando...</span>
	<span id="estado"></span><br><br>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	
	<script type="text/javascript">
		$(function(){
			$('.carregando').hide();
			$('#estado_id').change(function(){
				if( $(this).val() ) {
					$('#estado').hide();
					$('.carregando').show();
					$.getJSON('emp_estados.php?search=',{estado_id: $(this).val(), ajax: 'true'}, function(j){
						var valor = '';	
						for (var i = 0; i < j.length; i++) {
							valor += 'ID: ' + j[i].id + '<br>Empresa: ' + j[i].name +'<br>Endereço: ' + j[i].address + '<hr>';
						}	
						$('#estado').html(valor).show();
						$('.carregando').hide();
					});
				} else {
					$('.carregando').hide();
					$('#estado').html('Nenhuma empresa encontrada');
				}
			});
		});
		</script>
	
    <script>
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-25.494938, -49.294372),
          zoom: 5
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('resultado.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
    </script>
  </body>
</html>