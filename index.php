<?php


?>

<!DOCTYPE html>
<html lang="es">

<head>

	<title>Home</title>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<script src="JS/jquery-1.11.1.js"></script>

	<link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<script type="text/javascript">

    window.onload = function(){ //Cuando Carga la pagina, es lo primero que hace

        
        $("#procesar_button").hide();
        $("#span_img_alert").hide();
        $("#memorise").hide();
        $("#memorise_usuario").prop('readonly', true);
        $("#Memorise_juego").hide();

    }
     $(document).ready(function() {

        $("#iniciar_button").click(function(){
        $("#memorise_usuario").prop('readonly', false);
        $("#span_img_alert").hide();
        $("#Memorise_juego").hide();
        document.getElementById('memorise_usuario').value = "";
        $("#iniciar_button").hide(); //esconde el boton de Iniciar.
        $("#procesar_button").hide(); //esconde el boton de procesar.
        $("#memorise").show(); // mostramos el memorise.

        memorise = document.getElementById("memorise");
        var Puntaje = parseInt(document.getElementById('puntaje').innerHTML);
        var Numero_random;
        

        if(Puntaje < 3){ // Dependiendo del puntaje le brinda un número al azar
            document.getElementById('nivel_juego').innerHTML = 1;
            Numero_random = ObetnerNumeroRandom(100, 1000);


        }else{

            if(Puntaje < 6){
                document.getElementById('nivel_juego').innerHTML = 2;
                Numero_random = ObetnerNumeroRandom(1000, 10000); // nivel 2

            }else{

                if(Puntaje < 9){
                    document.getElementById('nivel_juego').innerHTML = 3;
                    Numero_random = ObetnerNumeroRandom(10000, 100000); //nivel 3

                }else{

                    if(Puntaje < 12){
                        document.getElementById('nivel_juego').innerHTML = 4;
                        Numero_random = ObetnerNumeroRandom(100000, 1000000); // Nivel 4

                    }else{

                        if(Puntaje < 15){
                            document.getElementById('nivel_juego').innerHTML = 5;
                            Numero_random = ObetnerNumeroRandom(1000000, 10000000); //nivel 5

                        }
                    }
                }
            }
        }
        

        memorise.innerHTML = Numero_random; // 

        

        contador_s = 0;
        
        var cronometro = setInterval(

            function(){

                contador_s++;

                if(contador_s==7)
                {

                    clearInterval(cronometro); //para el cronometro
                    document.getElementById('memorise').style.display = 'none'; // escondemos el memorise.
                    $("#procesar_button").show(); //  mostramos el boton de procesar.
                    $("#Memorise_juego").show();
                    $("#memorise_usuario").focus();                  
                }

                }

            ,1000);

        });


     });

$(function(){ 

    $("#memorise_usuario").keyup(function (e) {

    if (e.which == 13) {

      if(!$('#span_img_alert').is(":visible")){
        
            procesarJuego();
        
        }
    
    }

 });

});

    function ObetnerNumeroRandom(min, max){ //Funcion que permite obtener un numero random entre un minimo y un maximo

        return Math.floor(Math.random() * (max - min)) + min;

    }
   
    function procesarJuego(){
       

    	$("#iniciar_button").show();
    	document.getElementById('procesar_button').style.display = 'none';
    	memorise = document.getElementById('memorise').innerHTML;
    	memorise_usuario = document.getElementById('memorise_usuario').value;
    	

    	if(memorise_usuario == memorise){
            
            $("#span_img_alert").removeClass("alert-success alert-danger").addClass("alert-success");
            $("#img_alert").removeClass("glyphicon-remove glyphicon-ok").addClass("glyphicon-ok");
            $("#span_img_alert").show();
            $("#memorise_usuario").prop('readonly', true);
    		document.getElementById('puntaje').innerHTML = parseInt(document.getElementById('puntaje').innerHTML) + 1;


                var datos = new FormData();
                datos.append('id_estadistica', id_estadistica);
                datos.append('nivel_actual', nivel_actual);
                datos.append('acierto', acierto);
                datos.append('fracaso', fracaso);

                var miAjax = $.ajax({
                async: false,
                type: 'POST',
                url: 'estadisticaJuego.php',
                data:datos,
                contentType:false,
                processData:false,
                cache:false

            
                }).done(function(response) { 


                }); 
                		
    	}else{
            
    		document.getElementById('fracasos').innerHTML = parseInt(document.getElementById('fracasos').innerHTML) + 1;
            $("#span_img_alert").removeClass("alert-success alert-danger").addClass("alert-danger");
            $("#img_alert").removeClass("glyphicon-remove glyphicon-ok").addClass("glyphicon-remove");
            $("#span_img_alert").show();
            $("#memorise_usuario").prop('readonly', true);
    	}

        




    		

    }

    
 
    </script>



</head>

<body>
    <div class="container">

        <br />
        <br />
    <div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">

		<div id="juego" class="panel panel-primary text-center">
         <div class="panel-heading"> <h2> Memoricé </h2> </div>       
                
        <div class="panel-body">
               	            <div class="row">
                
                <h1 id="memorise" class="bg-primary"> </h1>
                </div>
                
		

           <br />


			<div id="Memorise_juego" class="input-group col-md-10 col-md-offset-1 ">

  				<span id="img_ojo" class="input-group-addon"> <div class="glyphicon glyphicon-eye-open"> </div> </span>
  				<input type="text" class="form-control" aria-describedby="basic-addon1" id="memorise_usuario" />
                <span class="input-group-addon" id="span_img_alert"> <div id="img_alert" class="glyphicon"> </div> </span>

		    </div>
             
	

        

        <br />

            <div class="col-xs-6 col-sm-6 col-md-6 col-xs-offset-3 col-sm-offset-3 col-md-offset-3">

                <input type="button" onclick="iniciarJuego()" value="Iniciar" id="iniciar_button" class="btn btn-primary btn-lg" />
            </div>
            

	       <div class="col-xs-6 col-sm-6 col-md-6 col-xs-offset-3 col-sm-offset-3 col-md-offset-3">

	           <input type="button" onclick="procesarJuego()" value="Procesar" id="procesar_button" class="btn btn-primary btn-lg" />

            </div>

        </div> <!--cerramos el panel-body -->
        </div> <!-- Cierra el Juego -->
        <br />

        <div id="panel_puntaje" class="panel panel-primary text-center">
            <div class="panel-heading"> <h2> Tabla Puntaje </h2> </div>

            <div class="panel-body">
                <label> Nivel: </label> <label id="nivel_juego"> 0 </label>
                <br />
                <label> Aciertos: </label> <label id="puntaje"> 0 </label>
                <br />
                <label> Fracasos: </label> <label id="fracasos"> 0 </label>
                
            </div>
        </div>
        
        </div> <!-- Cierra el porte -->
    </div> <!-- cierra el Container para bootstrap -->

</body>

</html>


<!-- misa gay -->

