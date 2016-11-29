	<?php
require 'config.php';

// create socket
$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");;

// bind socket to port
$result = socket_bind($socket, $host, $port) or die("Could not bind to socket\n");;

// start listening for connections
$result = socket_listen($socket, 3) or die("Could not set up socket listener\n");;

// accept incoming connections
// spawn another socket to handle communication
$spawn = socket_accept($socket) or die("Could not accept incoming connection\n");

// read client input
$message = socket_read($spawn, 1024) or die("Could not read input\n");

// clean up input string
$message = trim($message);

$cipherValue=end(explode(".", $message));
$chopMessage=chop($message,".".$cipherValue);
$splitMessage=str_split($chopMessage);
echo "Client Message : ".$chopMessage."<br />";
$i=0;
foreach ($splitMessage as $messageChar) 
{
	if(ord($messageChar)>=97 && ord($messageChar)<=122)
	{
		$cipherText=ord($messageChar)+$cipherValue;
		if($cipherText>122)
		{
			$cipherText=$cipherText-122;
			$cipherText=$cipherText+96;
		}
		$splitMessage[$i]=chr($cipherText);
	}
	$i++;
}
$cryptedText=implode("", $splitMessage);
socket_write($spawn, $cryptedText, strlen ($cryptedText)) or die("Could not write output\n");
// close sockets
socket_close($spawn);
socket_close($socket);
?>