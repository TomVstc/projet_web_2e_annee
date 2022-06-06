<?php
    var_dump($_FILES);
	// To
	$to = 'neykisv@outlook.fr';
 
	// Subject
	$subject = 'Candidature Stage';
 
	// clé aléatoire de limite
	$boundary = md5(uniqid(microtime(), TRUE));
 
	// Headers
	$headers = 'From: Tom Visticot <neykisv@outlook.fr>'."\r\n";
	$headers .= 'Mime-Version: 1.0'."\r\n";
	$headers .= 'Content-Type: multipart/mixed;boundary='.$boundary."\r\n";
	$headers .= "\r\n";
 
	// Message
	$msg = 'Texte affiché par des clients mail ne supportant pas le type MIME.'."\r\n\r\n";
 
	// Message HTML
	$msg .= '--'.$boundary."\r\n";
	$msg .= 'Content-type: text/html; charset=utf-8'."\r\n\r\n";
	$msg .= ''.$_POST['message']."\r\n";
 
	// Pièce jointe 1
	$file_name = $_FILES['upload_file1']['name'];
	if (file_exists($file_name))
	{
		$file_type = mime_content_type($file_name);
		$file_size = filesize($file_name);
 
		$handle = fopen($file_name, 'r') or die('File '.$file_name.'can t be open');
		$content = fread($handle, $file_size);
		$content = chunk_split(base64_encode($content));
		$f = fclose($handle);
 
		$msg .= '--'.$boundary."--\r\n";
		$msg .= 'Content-type:'.$file_type.';name='.$file_name."\r\n";
		$msg .= 'Content-transfer-encoding:base64'."\r\n";
		$msg .= $content."\r\n";
	}
 
	// Pièce jointe 2
	$file_name = $_FILES['upload_file2']['name'];
	if (file_exists($file_name))
	{
		$file_type = mime_content_type($file_name);
		$file_size = filesize($file_name);
 
		$handle = fopen($file_name, 'r') or die('File '.$file_name.'can t be open');
		$content = fread($handle, $file_size);
		$content = chunk_split(base64_encode($content));
		$f = fclose($handle);
 
		$msg .= '--'.$boundary."--\r\n";
		$msg .= 'Content-type:'.$file_type.';name='.$file_name."\r\n";
		$msg .= 'Content-transfer-encoding:base64'."\r\n";
		$msg .= $content."\r\n";
	}
 
	// Fin
	$msg .= '--'.$boundary."\r\n";
 
	// Function mail()
	mail($to, $subject, $msg, $headers);

	header("location: ../site.php");

?>