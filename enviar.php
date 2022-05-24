<?php
// Cambiar por direccion de la empresa 
$destinatario = "ceciliadel@gmail.com";

$nombre = $_POST['nombre'];

$verificacion = $_POST['namelast'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$consultas = utf8_encode(trim($_POST['consultas']));

$redir = "gracias.html";

if(($nombre == "") || ($email == "") || ($telefono == "")) {
	$redir = "incompleto.html";
} else {
	$header = 'From: ' . $email . " \r\n";
	$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
	$header .= "Mime-Version: 1.0 \r\n";
	$header .= "Content-Type: text/plain";
	
	$mensaje = "Este mensaje fue enviado por " . $nombre . " \r\n";
	
	$mensaje .= "Email: " . $email . " \r\n";
	$mensaje .= "Telefono: " . $telefono . " \r\n\r\n";
	$mensaje .= "Consultas/ Comentarios:\r\n" . $consultas . " \r\n\r\n";
	$mensaje .= "Enviado el " . date('d/m/Y', time());
	
	$para = $destinatario;
	$asunto = 'Contacto desde el sitio www.arditopropiedades.com.ar';
	
	if ($_POST['namelast'] != ""){
    // Es un SPAMbot
    exit();
}else{
    // Es un usuario real, proceder a enviar el formulario.
}
	if (mail($para, $asunto, utf8_decode($mensaje), $header)) {
		$redir = "gracias.html";
	} else {
		$redir = "error.html";
	}	
}
header("location:".$redir);
?>