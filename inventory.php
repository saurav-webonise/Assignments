<?php
	$inventory = array('Personal Computer' => 450, 'Mobile' => 350, 'Gaming Consoles' => 170);
	$json_inventory=json_encode($inventory);
	if($_SERVER['REQUEST_METHOD']=='GET')
	{
		echo $json_inventory;
	}
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
  		$new_item=$_POST;
		$post_inventory=array_merge($inventory,$new_item);
		echo json_encode($post_inventory);
	}
	if($_SERVER['REQUEST_METHOD']=='PUT')
	{
		$replace_item=$_REQUEST;
		foreach($inventory as $key=>$value)
		{
			if($replace_item['id']==$key)
			{
				$newValue=$replace_item['q'];
				$rep = array(''.$key => $newValue );
				$put_inventory=array_replace_recursive($inventory, $rep);
			}
		}
		echo json_encode($put_inventory);

	}
	if($_SERVER['REQUEST_METHOD']=='DELETE')
	{
		$delete_item=$_REQUEST;
		foreach($inventory as $key=>$value)
		{
			if($delete_item['id']==$key)
			{
				$newValue=$value-1;
				$rep = array(''.$key => $newValue );
				$inventory=array_replace_recursive($inventory, $rep);
			}
		}
		echo json_encode($inventory);
	}
?>