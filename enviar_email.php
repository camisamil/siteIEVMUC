<?php
ini_set('display_errors','on');

$Nome = $_POST["nome"]; 
$Sobrenome = $_POST["sobrenome"];
$Email = $_POST["email"];
$Telefone= $_POST["telefone"];
$Mensagem = $_POST["mensagem"];

// Variável que junta os valores acima e monta o corpo do email
$Vai = "Nome: $Nome\n\nSobrenome: $Sobrenome\n\nEmail: $Email\n\nTelefone: $$Telefone\n\nMensagem: $Mensagem\n";



date_default_timezone_set('Etc/UTC');
require_once('PHPMailer/class.phpmailer.php');

define('GUSER', 'negoojulioo1996@gmail.com'); // email do gmal
define('GPWD', 'jc26973202'); // senha do gmail

function smtpmailer($para, $de, $de_nome, $assunto, $corpo) {
	
	global $error;
	$mail = new PHPMailer();
	$mail->IsSMTP();  // ativando o SMTP
	$mail->Charset = 'UTF-8';
	$mail->SMTPDebug = 0; // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
	$mail->SMTPAuth = true; // Autentificação ativada
	$mail->SMTPSecure = 'ssl'; // SSL quer o GMAIL requer
	$mail->Host = 'smtp.gmail.com'; // SMPT utilizado
	$mail->Port = 587; // Essa porta deve estar aberta no servidor
	$mail->Username = GUSER;
	$mail->Password = GPWD;
	$mail->SetFrom($de,$de_nome);
	$mail->Subject = $assunto;
	$mail->Body = $corpo;
	$mail->AddAdress($para);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Mensagem enviada!';
		return true;
	}
	
}































?>