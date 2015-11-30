<html>
<head>
	<title>Memorice</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="JS/jquery-1.11.1.js"></script>
	<script src="Bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="JS/Memorice.js"></script>

	<style type="text/css">
		body{
			padding-top: 2%;
		}
		.img{
			cursor: pointer;
		}
	</style>

</head>
<body>
	<div class="container jumbotron">
		<div id="Presentacion" class="row">
			<div class="col-xs-12">
					  <h1>Memorice</h1>
					  <h2>Un juego ideal para desarrollar tú memoria visual.</h2>
					  <h3>Debes en encontrar la pareja de los dibujos escondidos boca abajo.</h3>
					  <br>
					  <h2>Niveles de dificultad</h2>
					  <h4>(Acontinuacion se muestran los niveles que tendras que enfrentar)</h4>
					  <div id="formulario" class="row col-lg-12">
						  <div class="form-group col-sm-8">
						      <label class="col-lg-2 control-label">Dificultad</label>
						      <div class="col-lg-10">
						        <div class="radio">
						          <label>
						            <input type="radio" name="dificul" id="MuyFacil" value="1" onclick="CambioEj('1');">
						            Muy Facil
						          </label>
						        </div>
						        <div class="radio">
						          <label>
						            <input type="radio" name="dificul" id="Facil" value="2" onclick="CambioEj('2');">
						            Facil
						          </label>
						        </div>
						        <div class="radio">
						          <label>
						            <input type="radio" name="dificul" id="Medio" value="3" onclick="CambioEj('3');">
						            Intermedio
						          </label>
						        </div>
						        <div class="radio">
						          <label>
						            <input type="radio" name="dificul" id="Dificil" value="4" onclick="CambioEj('4');">
						            Dificil
						          </label>
						        </div>
						        <div class="radio">
						          <label>
						            <input type="radio" name="dificul" id="MuyDificil" value="5" onclick="CambioEj('5');">
						            Muy Dificil
						          </label>
						        </div>
						        <div class="radio">
						          <label>
						            <input type="radio" name="dificul" id="Experto" value="6" onclick="CambioEj('6');">
						            Experto
						          </label>
						        </div>
						      </div>
						  </div>
					      <div class="col-sm-4">
						      <div>
						      	<img src="img/3.png" alt="0" id="Ejemplo" class="img-thumbnail">
						      </div>
					   	  </div>
				   	</div>
				   	<br>
					  <div class="col-lg-12">
					  	<button id="Iniciar" class="btn btn-primary btn-lg" onclick="iniciar();" value="1">Iniciar</button>
					  	<button id="Salir" onclick="exit" class="btn btn-danger btn-lg">Salir</button>
					  </div>

			</div>
		</div>
		<div class="row" id="Juego">

			<div class="col-sm-8 col-md-8 " id="tabla">
					<div class="visible-xs">
						<h2>Memorice</h2>
					</div>
					<!-- aqui se carga la tabla para jugar -->
			</div>
			<br>
			<div class=" col-sm-4 col-md-4" id="casi">
				<div class="row hidden-xs">
					<h2>Memorice</h2>
					<h4>Tablero</h4>
				</div>
					<div class="row">
						<div class="col-md-8">
				      		<label>Tiempo</label><input class="form-control" id="tiempo" value="00:00" type="text" disabled>
				      	</div>

				      	<div class="col-md-4">
				      		<label>Nivel</label><input class="form-control" id="nivel" type="text" value="1" disabled > <!-- dato obtenido de la bd -->
				      	</div>
				    </div>
				    <br>
				    <div class="row">
				      	<div class="col-md-12 col-lg-6">
				      		<label>Nuemro de Intentos</label><input class="form-control" id="intentos" type="text" value="0" disabled>
				      	</div>

				      	<div class="col-md-12 col-lg-6">
				      		<label>Aciertos</label><input class="form-control" id="disabledInput" type="text" value="100" disabled>
				      	</div>
					</div>

					<br>

					<div class="row">
						<div class="col-md-12">
							<button id="IniciarOtra" class="btn btn-primary btn-lg btn-block"  onclick="iniciar();">Intentar de Nuevo</button>
						</div>
					</div>

						<br>

					<div class="row">
						<div class="col-md-12">
							<button id="Volver" class="btn btn-danger btn-lg btn-block" onclick="Volver();" value="cancel">Volver</button>
						</div>
					</div>

			</div>
		</div>

		<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Nivel Finalizado</h4>
				</div>
				<div class="modal-body">
					<p>pasaste de nivel logii!!!</p>
				</div>
				<div class="modal-footer">
					<button id="Continuar" type="button" class="btn btn-primary">Continuar</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
	</div>

	



</body>
</html>
