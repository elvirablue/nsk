<?php

if(!empty($_POST["user-mail"])) {
	$mail = $_POST["user-mail"];
	$ip = $_SERVER["REMOTE_ADDR"];
	
	
	$to = "olga_tretyakova@mail.ru"; //

	$titleMail = 'Заявка с сайта НСК на ПОДПИСКУ';
	$message = '
		<table style="font-family: arial ;">
		
			<tr style="border: 1px solid black;">
				<td style="padding: 10px; font-weight: bold; font-size: 16px;">E-mail:</td>
				<td style="padding: 10px; font-size: 12px;">'.$mail.'</td>
			</tr>
			
			<tr style="border: 1px solid black;">
				<td style="padding: 10px; font-weight: bold; font-size: 16px;">IP:</td>
				<td style="padding: 10px; font-size: 12px;">'.$ip.'</td>
			</tr>
			
		</table>
	';

	mail($to, $titleMail, $message, "MIME-Version: 1.0\nContent-type: text/html; charset=utf-8\nFrom: nsk-sk.ru - заполнена форма!");

} else return false;

?>

