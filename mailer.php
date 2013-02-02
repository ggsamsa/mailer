<?php
        
$from = "Renato Lopes <vasco@vasco.com>";
$subject = "Hi there!";
$html = "body.html";
$contacts = "contacts.txt";

$headers = "From: $from\r\n" .
     "X-Mailer: php";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$f_html = fopen($html, "r") or exit("error opening html file");
$body = "";
while(!feof($f_html))
{
         $body .= fgets($f_html);
}
fclose($f_html);

$f_news = fopen($contacts, "r") or exit("error opening the contacts file");
while(!feof($f_news))
{
        $to = fgets($f_news);
	if (mail($to, $subject, $body, $headers)) {
		echo("Message sent to $to");
	} else {
		echo("Message delivery failed... to $to");
	}

}
fclose($f_news);
?>
