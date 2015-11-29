//variables globales
	
	var vectorImg = new Array();	// Arreglo que va a contener la ruta de las img
	var RutaFruta = "img/frutas/";	// Ruta de ubicacion de las img
	var RutaDefec = "img/0.png";		// Ruta por defecto de la img incognita
	var RutaWin = 'img/1.png';		// Ruta img de acierto, se muestra cuando hay 2 selecciones correctas
	
	var Contador;
	var tamamin;
	var Nivel;
	
	var CantImg;
	
	var Click = 0;	// Variable para las selecciones de cartas, 0 = 1 y 1 = 2
	// Variables para evaluar la primera seleccion
	var valor1;		// el id
	var loc1;		// el objeto completo
	// Variables para evaluar la segunda seleccion
	var valor2; 	// el id
	var loc2;		// el objeto completo	
	
	var tiempo = {
        minuto: 0,
        segundo: 0
    };
	var cronometro;
	

	window.onload = function(){ //Cuando Carga la pagina, es lo primero que hace
       Limpiar();				// por precaucion se limpian todas las variables 
	   //$("#myModal").hide();
    }
	
	$(document).ready(function() {
        cronometro = setInterval(
            function(){
                tiempo.segundo++;
                if(tiempo.segundo >= 60){
                    tiempo.segundo = 0;
                    tiempo.minuto++;
                }
				
				minutero = tiempo.minuto < 10 ? '0' + tiempo.minuto : tiempo.minuto;
				segundero = tiempo.segundo < 10 ? '0' + tiempo.segundo : tiempo.segundo;
				
				$("#tiempo").val(minutero +":"+ segundero);
           	},1000);
		
	});
	
	function iniciar(){
			Limpiar();					// Al momento de iniciar todas las variables vuelven a 0
			$("#tabla").empty();		//se limpia el div, para que no se agregen nuevas columnas
			$("#Presentacion").hide();	//escondemos la presentacion del juego
			$("#Juego").show();		  	// Mostramos el juego
			Nivel = $("#Iniciar").attr("value");
			$("#nivel").attr("value", Nivel);  
			
				switch(Nivel){
					case "1":
						Contador = 4;
						tamamin = 6;
						CantImg = 2;
						break;
					case "2":
						Contador = 6;
						tamamin = 4;
						CantImg = 3;
						break;
					case "3":
						Contador = 8;
						tamamin = 3;
						CantImg = 4;
						break;
					case "4":
						Contador = 12;
						tamamin = 4;
						CantImg = 6;
						break;
					case "5":
						Contador = 16;
						tamamin = 3;
						CantImg = 8;
						break;
					case "6":
						Contador = 20;
						tamamin = 3;
						CantImg = 10;
						break;
					default:
						Contador = 0;
						break;
				}
				
			for(var i = 0; i < Contador; i++){ // llenamos la tabla, con las imagenes correspondientes
				$("#tabla").append('<div class="col-xs-'+ tamamin +' "><img src="'+ RutaDefec +'" alt="0" id="'+ i + '" class="img img-thumbnail" ></div>')
				
			}
			
			var u = CantImg - 1;//variable para el IF
			var aux;			
			for(var j = 0; j < CantImg; j++){ 	//asignamos al vector las imagenes respectivas
				vectorImg[j] = j+".png"; 		//vector[0] = 0.png (nombre de la imagen)
				if( j == u){					// evaluamos si J trae 
					var C = CantImg;
					for(var y = 0; y < CantImg; y++){//duplicamos las imagenes en los siguientes vectores  
						vectorImg[C] = y+".png"; 	 //vector[n](dependiendo de la cantidad de cartas que se necesite) = 0.png
						C++;
					}
				}	
			}
			for(var i = 0; i< Contador; i++){
				var aleatorio = Math.round(Math.random()*(Contador-2))+1;//variable aleatoria segun la cantidad de cartas
				aux = vectorImg[i];
				vectorImg[i]= vectorImg[aleatorio];
				vectorImg[aleatorio] = aux;
			}	
						
			var cop = 0; // para evaluar cuando gana
			var contNivel = 0;
			$("img").on('click',function(){
				if (Click == 0 && $(this).attr("id") != "listo") { 			// evaluamos si es el primer click 
					loc1 = $(this); 		//el primer objeto
					valor1 = parseInt($(this).attr("id"));   // obtenemos el id para evaluar 
					Click = 1;				//variable de valor 1 para que no evalue el mismo if
					$.each( vectorImg, function( numero, ruta ) {	//Recorremos el arreglo					
						if(numero == valor1){						//buscamos la coincidencia
							loc1.attr("src" , RutaFruta+ruta);		//mostramos la carta
						}
					});
				}else if(Click == 1 && $(this).attr("id") != "listo"){ 		//evaluamos si es el segundo click
					loc2 = $(this); 		//el segundo objeto
					valor2 = parseInt($(this).attr("id"));	// obtenemos el id para evaluar	
					
					if(valor1 != valor2){								// evaluamos si es que se selecciona la misma carta
						$.each( vectorImg, function( numero, ruta ) {	//Recorremos el arreglo
							if(numero == valor2){						//buscamos la coincidencia
								loc2.attr("src", RutaFruta + ruta);		//mostramos la carta			
								Click = 2;
							}
						});
					}else{							//si se esta seleccionando la misma carta
						Click = 1;					//mantenemos la oportunidad del segundo click
						valor2 = null; 				//volvemos el valor2 a null para que tome valores nuevos
						loc2 = null;				//volvemos el loc2 a null para que tome valores nuevos
					}
				}
				
				if(Click == 2 && loc1.attr("id") != "listo" && loc2.attr("id") != "listo"){
					if(loc1.attr("src") == loc2.attr("src")){							
							setTimeout('loc1.attr({id: "listo","src": RutaWin})',200);
							setTimeout('loc2.attr({id: "listo","src": RutaWin})',200);
							cop = cop + 1;
							contNivel ++;
							if(cop == CantImg){ 
								//aqui pondremos la bd de nivel
								$('#myModal').modal('show');
								$('#Continuar').click(function(){
									$("#Iniciar").attr("value", contNivel);
									iniciar();
									$('#myModal').modal('hide');
								});
							}
							Click = 0;
					}else{
						setTimeout('loc1.attr("src", RutaDefec)',600);
						setTimeout('loc2.attr("src", RutaDefec)',600);
						setTimeout('Click = 0',600);
						//Click = 0;
					}
				}
			});
		} 
	
	function CambioEj(valor){ // funcion para mostrar ejemplos de los niveles
		switch(valor){
			case "1":
				$( "#Ejemplo").attr('src', 'img/Ej/4.png');
				break;
			case "2":
				$( "#Ejemplo").attr('src', 'img/Ej/6.png');
				break;
			case "3":
				$( "#Ejemplo").attr('src', 'img/Ej/8.png');
				break;
			case "4":
				$( "#Ejemplo").attr('src', 'img/Ej/12.png');
				break;
			case "5":
				$( "#Ejemplo").attr('src', 'img/Ej/16.png');
				break;
			case "6":
				$( "#Ejemplo").attr('src', 'img/Ej/20.png');
				break;
			default:
				$( "#Ejemplo").attr('src', 'img/3.png');
				break;
		}
	}
	
	
	function Volver(){ //volvemos todo a 0 y todo al estado inical
		
		
			$("#Juego").hide();
			$("#malo").hide();
			$("#Presentacion").show();
			
			Contador = 0;
			tamamin = 0;
			CantImg = 0;
			//Nivel = 1;
			
			Click = 0;	// Variable para las selecciones de cartas
		// Variables para evaluar la primera seleccion
			valor1 = null;		
			loc1 = null;		
		// Variables para evaluar la segunda seleccion
			valor2 = null; 	
			loc2 = null;	
		// Variables para el cronometro
			tiempo = {
				minuto: 0,
				segundo: 0
			};
			cronometro = null;
			
			$("#Iniciar").attr("value", 1);
	}
	
	function Limpiar(){ //volvemos todo a 0 y todo al estado inical
			$("#Juego").hide();
			$("#malo").hide();
			$("#Presentacion").show();
			
			Contador = 0;
			tamamin = 0;
			CantImg = 0;
			//Nivel = 1;
			
			Click = 0;	// Variable para las selecciones de cartas
		// Variables para evaluar la primera seleccion
			valor1 = null;		
			loc1 = null;		
		// Variables para evaluar la segunda seleccion
			valor2 = null; 	
			loc2 = null;
			
