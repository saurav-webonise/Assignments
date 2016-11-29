<?php
require "config.php";
$input=$_POST['txtMessage'];
$cipherValue=$_POST['txtCipher'];
if (is_int($cipherValue)<10)
{
	$message = $_POST['txtMessage'].".".$_POST['txtCipher'];
	echo "Message To server : ".chop($message,".".$cipherValue)."<br/>";

	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");

	// connect to server
	$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");  

	// send string to server
	socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");

	// get server response
	$result = socket_read ($socket, 1024) or die("Could not read server response<br/>");
	echo "Cipher Text From Server  : ".$result;

	// close socket
	socket_close($socket);
}
else{
	echo "Key should be less than 10";
}
?>