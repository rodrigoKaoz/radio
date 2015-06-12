<?php 
$email = $_REQUEST["email"];
require 'mailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "info@kaoztv.com";

//Password to use for SMTP authentication
$mail->Password = "chupalo123";

//Set who the message is to be sent from
$mail->setFrom('info@kaoztv.com', 'KaozRadio');

//Set an alternative reply-to address
$mail->addReplyTo('info@kaoztv.com', 'KaozRadio');
$mail->addBCC('info@kaoztv.com', 'KaozRadio');
//Set who the message is to be sent to
$mail->addAddress($email, $contacto);

//Set the subject line
$mail->Subject = 'Contacto KaozRadio';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$mail->msgHTML('Estimado amigo/a acá adjuntamos una ficha para que la llenes con los datos del tema o los temas que deseas que difundamos.<br><p>Por favor llena esta ficha con los datos que se solicitan y lee las instruciones de envio.<br><p>Agradecemos tu tiempo y las ganas de participar en este proyecto.<br><p>En Kaozradio difundimos lo mejor de lo nuestro. En kaozradio, Todos te quieren escuchar!!!');
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
$mail->addAttachment('doc/terminosycondicionesKaozRadio.pdf');
$mail->addAttachment('doc/Ficha-datos-tema.docx');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "<p>Estamos enviandote un correo desde info@kaoztv.com con la informacion que debes ingresar por favor agreganos a tu lista de contactos para que no ingrese a spam.</p>";
}