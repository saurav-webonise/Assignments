<?php
	$cart = array('Microsoft' => 45000, 'Apple' => 75000, 'XBOX' => 27000, 'DELL' => 37000);
	$json_cart=json_encode($cart);
	if($_SERVER['REQUEST_METHOD']=='GET')
	{
		echo $json_cart;
		echo "\n Total of cart =".array_sum ($cart);
	}
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
  		$new_item=$_POST;
		$post_cart=array_merge($cart,$new_item);
		echo json_encode($post_cart);
		echo "\n Total of cart =".array_sum ($post_cart);
	}
	if($_SERVER['REQUEST_METHOD']=='PUT')
	{
		$replace_item=$_REQUEST;
		$put_cart = array_replace_recursive($cart, $replace_item);
		echo json_encode($put_cart);
		echo "\n Total of cart =".array_sum ($put_cart);
	}
	if($_SERVER['REQUEST_METHOD']=='DELETE')
	{
		$delete_item=$_REQUEST;
		unset($cart[$delete_item['id']]);
		echo json_encode($cart);
		echo "\n Total of cart =".array_sum ($cart);
	}
?>