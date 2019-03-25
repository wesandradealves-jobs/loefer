<?php

	/**

	 * This example shows settings to use when sending via Google's Gmail servers.

	 * This uses traditional id & password authentication - look at the gmail_xoauth.phps

	 * example to see how to use XOAUTH2.

	 * The IMAP section shows how to save this mensagem to the 'Sent Mail' folder using IMAP commands.

	 */

	//Import PHPMailer classes into the global namespace

	// require("PHPMailer.php");

	// require("SMTP.php");

	// require("Exception.php");

	// require("OAuth.php");

	require ( dirname(__FILE__).'/../wp-load.php' );

	require_once dirname(__FILE__)."/PHPMailerAutoload.php";

	$message = null;

	foreach ($_POST as $key => $value) {
		${$key} = $value;

		if($key != 'avaliacoes' && $key != 'informacoes' && $key != 'form_type' && $key != 'visita' && $key != 'nota' && $key != 'area'){
			$message .= $key.': '.$value.'<br>';
		} elseif($key == 'form_type'){
			$subject = ($value != 'contato') ? 'Pesquisa de Avaliação' : 'Contato';
		} elseif($key == 'area'){
			$message .= 'Sobre que áreas deseja fazer um comentário?: '.implode(', ',$area).'<br>';
		} else {
			switch ($key) {
				case 'visita':
					$message .= 'Gostaria de uma visita de nossos representantes?: '.$value.'<br>';
					break;
				case 'informacoes':
					$message .= 'Deseja receber informações por este e-mail?: '.$value.'<br>';
					break;
				default:
					// code...
					break;
			}
		}
	}

	if($form_type != 'contato'){
		$i = -1;
		foreach ($nota as $key => $value) {
			$i++;
			$message .= str_replace('*','',$avaliacoes[$i]).' '.$value.'<br>';
		}	
	}

	$mail = new PHPMailer;

	$mail->setFrom($Email, $Nome);

	// $mail->setFrom('wesandradealves@gmail.com', 'Wesley Andrade');

	$mail->addAddress('wesandradealves@gmail.com', 'Wesley Andrade');

	// $recipients = array(
	//     'wesandradealves@gmail.com' => 'Wesley Andrade'
	// );

	// foreach($recipients as $Email => $name)

	// {

	//    $mail->AddBCC($Email, $name);

	// }

	$mail->Subject = $subject.' - Site'. PHP_EOL . PHP_EOL;

	$mail->isHTML(true);

	$mail->Body    = $message;

	$mail->AltBody = 'This is a plain-text mensagem body';

	$mail->CharSet = 'UTF-8';

	if($mail->send()){
	    header("Location: ".$_SERVER['HTTP_REFERER']);     
	}

?>