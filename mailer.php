<?php
        
$from 	  = "Renato Lopes <renato@renato.com>";
$subject  = "Hi there!";
$html	  = "body.html";
$contacts = "contacts.txt";

function send_email($subject, $sender, $to, $content)
{
	$headers = "From: $sender\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        if (mail($to, $subject, $content, $headers)) {
		return true;
        } else {
		return false;
        }
}

$f_html = fopen($html, "r") or exit("error opening the html file");
$body = "";
while(!feof($f_html))
{
         $body .= fgets($f_html);
}
fclose($f_html);

$f_contacts = fopen($contacts, "r") or exit("error opening the contacts file");
while(!feof($f_contacts))
{
	sleep(1);
        $to = fgets($f_contacts);
	if (send_email($subject, $from, $to, $body))
	{
		echo "email sent to $to";
	}else{
		echo "error sending email to $to";
	}
}
fclose($f_contacts);
?>
