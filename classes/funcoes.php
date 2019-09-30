<?php

require_once "phpmailer/class.phpmailer.php";

define('Usuario', 'contato@llamaaqui.ml');
define('Senha', 'entra21@Blusoft');


function Enviar_email($para, $de, $de_nome, $assunto, $corpo) {

	$mail = PHPMailer();

	$mail->Charset = 'UTF-8';

	$mail->Enconding = 'base64';

	// Forçando o email a ter corpo HTML
	$mail->IsHTML(true);

	// Ativar p SMTP
	$mail->IsSMTP();

	// Ativando autenticação
	$mail->SMTPAuth = true;

	// Uso de certificados
	$mail->SMTPSecure = 'ssl';

	// Servidor SMTP utilizado para enviar o email
	$mail->HOST = 'mail.llamaaqui.ml';

	// Porta do servidor SMTP
	$mail->Port = 465;

	// Usuario
	$mail->Username = Usuario;

	// Senha
	$mail->Password = Senha;

	// Definindo o remetente
	$mail->SetFrom($de, $de_nome);

	// Definindo assunto
	$mail->Subject = $assunto;

	// Definindo o corpo do email
	$mail->Body = $corpo

	// Definindo o destinatario
	$mail->AddAddress($para);

	// Enviando email
	if ($mail->Send()) {

		return true;

	} else {

		return $mail->ErrorInfo;

	}

}


?>