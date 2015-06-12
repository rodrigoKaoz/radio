$(function(){
			$('#infoBanda, #abreLink').hide();
			setTimeout(function(){
				try{
					cargaJson();
				}catch(err){}
			});
			setInterval(function() {
				try{
					cargaJson();
				}catch(err){}
			}, 10000);

		});
		
		function cargaJson()
		{
			$.getJSON("js/cargaDataActual.php", function(json) {
				$.each( json, function( key, val ) {
					var nombreBanda = val.nombre_banda;
					var nombreCancion = val.nombre_cancion;
					var thumbnail = 'img/thumbs/'+val.thumb;
					var idCancion = val.id_cancion;
					$('#masInfo').attr('data-cancion', idCancion);
					$('#nombreCancion').html(nombreBanda+' - "'+nombreCancion+'"');
					$('#imgCancion').css({'background': '#f00 url('+thumbnail+')',
				'background-size': '100% 100%',
				'background-repeat': 'no-repeat',
				'width': '100%',
				'height': '100%'});
				});
			});
			pasado();
		}
		$('#masInfo').click(function() {
			var idCancion = $(this).attr('data-cancion');
			//alert(idCancion);
			$('#infoBanda').slideDown('slow');
			$.getJSON("js/cargaDatosCancion.php?idCancion="+idCancion, function(json) {
				$.each( json, function( key, val ) {
					var nombreBanda = val.nombre_banda;
					var nombreCancion = val.nombre_cancion;
					var nombreAlbum = val.nombre_album;
					var anio = val.anio;
					var pais = val.pais;
					var contacto = val.contacto;
					var web = val.web;
					var face = val.fb;
					var twitter = val.twitter;
					var bandera = 'img/paises/'+pais+'.png';
					$('#bandaSeleccion').text(nombreBanda);
					$('#cancionSelecciona').text(nombreCancion);
					$('#albumSelecciona').text(nombreAlbum);
					$('#anioSelecciona').text(anio);
					$('#paisSelecciona').html('<img src="'+bandera+'">');
					var icono = '';
					if (contacto !== 'N/A')
					{
						icono += '<i class="fa fa-envelope fa-2x mano abreLink" data-link="'+contacto+'"></i>  ';
					}
					if (face !=='N/A') {
						icono +='<i class="fa fa-facebook-official fa-2x mano abreLink" data-link="'+face+'"></i>  ';
					}
					if (web !=='N/A')
					{
						icono +='<i class="fa fa-external-link fa-2x mano abreLink" data-link="'+web+'"></i>  ';
					}
					if (twitter !=='N/A')
					{
						icono +='<i class="fa fa-twitter-square fa-2x mano abreLink" data-link="'+twitter+'"></i>';	
					}
					$('#contactoSelecciona').html(icono);
				});
			});
		});
		$('#cerrarInfoBanda').click(function() {
			$('#infoBanda').slideUp('fast');
		});
		$('.abreLink').live('click',function() {
			var link = $(this).attr('data-link');
			$('#abreLink').slideDown('slow').text(link);
		});
		function pasado()
		{
			$.getJSON("js/cargaPasados.php", function(json) {
				$.each( json, function( key, val ) {
					var nombreBanda = val.nombre_banda;
					var nombreCancion = val.nombre_cancion;
					var thumbnail = 'img/thumbs/'+val.thumb;
					var fecha = val.fecha;
					var idRecord = val.idRecord;
					var pais = val.pais;
					var album = val.album;
					var bandera = 'img/paises/'+pais+'.png';
					$('#thumb'+idRecord).html('<a class="pull-left media-thumbnail" href="#"><img class="media-object" src="'+thumbnail+'" alt="thumbnail" /></a><div class="media-body"><h4 class="media-heading"><a href="#">'+nombreBanda+' - "'+nombreCancion+'"</a></h4><p>'+album+'<br><img src="'+bandera+'"></p></div>');
				});
			});	
		}