<?php 
$email = $_REQUEST["email"];?>
<p>Estimado/a<br>
Estamos a punto de enviarte un correo con las indicaciones para el envio de tu música. Pero antes debes aceptar los términos y condiciones.<br>
No te asustes. Es para informarte  lo que te pertenece y los derechos de difusión que nos debes autorizar, no es de los típicos contratos EULA de software (esos que nadie lee y les ponemos aceptar).
Tómate unos minutos o más bien sientate, relajate y lee el documento. No hay trampas, NO LUCRAREMOS con tu música sólo la difundiremos.</p>
<form id="termycond" name="termycond">
	<input type="hidden" name="email" id="email" value="<?php echo $email;?>">
<!--<input type="hidden" name="contacto" id="contacto" value="<?php echo $contacto;?>">-->
<span id="botones">
	<span class="alert mano" id="leeDocumento">Presiona ac&aacute; para leer el documento</span>
	<span class="alert alert-error mano" id="descargaDocumento">Presiona ac&aacute; descargar el documento</span>
</span>
</form>
<script type="text/javascript">
	$('#descargaDocumento').click(function(){
		window.open('doc/terminosycondicionesKaozRadio.pdf');
		$('#botones').slideUp('fast').html('<span class="alert alert-success mano" id="ultimoPaso">Continuar</span>').slideDown('slow');
	});
	$('#leeDocumento').click(function(){
		var datos = $('#termycond').serialize();
		var pagina= 'leerTermyCond.php';
		var div = 'cuerpoModal';
		enviaDatos(pagina,div,datos);
	});
	$('#ultimoPaso').live('click',function() {
		var datos = $('#termycond').serialize();
		var pagina= 'finalTermyCond.php';
		var div = 'cuerpoModal';
		enviaDatos(pagina,div,datos);
	});
</script>