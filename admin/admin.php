<!DOCTYPE html>
<!--[if IE 8]>    <html class="no-js ie8 ie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9 ie" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

	<head>
		<meta charset="utf-8">
		<title>KaozRadio</title>
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="robots" content="index, follow">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Styles -->
		<link rel="stylesheet" href="../css/frenzy-red.css">
		<link rel="stylesheet" href="../css/stilo.css">
		
		<!-- Fav and touch icons -->
		<link rel="shortcut icon" href="img/ico/favicon.ico">

		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../img/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../img/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="../img/ico/apple-touch-icon-57-precomposed.png">
		
		<!-- JS Libs -->
		
		<script>window.jQuery || document.write('<script src="../js/libs/jquery.js"><\/script>')</script>

		<script src="../js/libs/modernizr.js"></script>
		<script src="../js/libs/selectivizr-min.js"></script>
		
		<script src="../js/bootstrap/bootstrap.js"></script>
		<script src="../js/custom.js"></script>

	</head>
	<body>
	<div id="bg"><img src="../img/assets/bg/halftone.png" alt="background image" /></div>
	<div class="conteiner">
		<div class="row-fluid">
			<div class="span12">
				<table class="table">
					<tr>
						<!--<td id="ingresaBanda">Bandas</td>-->
						<td id="ingresaCancion" class="mano">Canciones</td>
						<td id="ingresaBanda" class="mano">Bandas</td>
						<td id="ingresaAlbum" class="mano">Album</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span12" id="areaTrabajo"></div>
		</div>
	</div>
	</body>
	<script>
	$('#ingresaCancion').click(function() {
		var pagina,div,datos;
		pagina = 'ingresaCancion.php';
		div = 'areaTrabajo';
		datos = '';
		enviaDatos(pagina,div,datos);
	});
	$('#ingresaBanda').click(function() {
		var pagina,div,datos;
		pagina = 'ingresaBanda.php';
		div = 'areaTrabajo';
		datos = '';
		enviaDatos(pagina,div,datos);
	});
	$('#ingresaAlbum').click(function() {
		var pagina,div,datos;
		pagina = 'ingresaAlbum.php';
		div = 'areaTrabajo';
		datos = '';
		enviaDatos(pagina,div,datos);
	});
	</script>
</html>