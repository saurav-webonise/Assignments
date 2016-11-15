<?php
	$host="localhost"; // Host name 
	$username=$_POST['user_name']; 
	$password=$_POST['password'];
	$db=$_POST['database'];
	// Connect to server.
	$conn=mysql_connect($host, $username, $password);
	
	$query="create database IF NOT EXISTS ".$db;
	if(mysql_query($query))
	{
		mysql_select_db($db,$conn);
	}
	else
	{
		@header("Location:mysqlconnect.html");
		
	}
	// Check connection
	if ($conn)
	{
		$userstable = "CREATE TABLE if not exists users( users_name VARCHAR(50) NOT NULL,users_email VARCHAR(45) NOT NULL,  users_password VARCHAR(8) NOT NULL,  users_type VARCHAR(45) NOT NULL,  PRIMARY KEY (users_email));";	
		
		$usersrecord ="insert ignore into users values('Saurav','saurav.mazumder@webonise.com','s1234','Inventory Manager'),('Rohan','rohan.kulkarni@webonise.com','r1234','Buyer'),('Jay','jay.singhvi@webonise.com','j1234','Buyer'),('Amit','amit.kumar@webonise.com','a1234','Buyer'),('Pramodh','pramodh.bhalothia@webonise.com','p1234','Buyer')";
			
		$productstable = "CREATE TABLE if not exists products (  products_id INT NOT NULL AUTO_INCREMENT,  product_name VARCHAR(45) NOT NULL,  products_color varchar(45) NOT NULL,  price INT UNSIGNED NOT NULL,  PRIMARY KEY (products_id));";	
		
		$productsrecord ="insert ignore into products(product_name,products_color,price) values('Iphone','Jet Black',82000),('Surface Pro','Cyan',290000),('Google Pixel','Really Blue',57000),('Surface Pro','Black',250000),('Iphone','Rose Gold',60000);";
					
		$orderstable = "CREATE TABLE if not exists orders (  orders_id INT(10) UNSIGNED NOT NULL,  users_email VARCHAR(45) NOT NULL,  orders_date DATE NOT NULL,  discount INT UNSIGNED NULL,  payment_method VARCHAR(45),  payment_status VARCHAR(45),  orders_total INT UNSIGNED,  UNIQUE INDEX orders_id_UNIQUE (orders_id ASC),  PRIMARY KEY (orders_id),constraint fk_users_email foreign key(users_email) references Users(users_email));";
		
		$ordersrecord ="insert ignore into orders(orders_id,users_email,orders_date,discount,payment_method,payment_status) values(11111111,'rohan.kulkarni@webonise.com','2016-10-11',15,'Online','Success'),(22222222,'amit.kumar@webonise.com','2016-10-22',10,'COD','Success'),(33333333,'pramodh.bhalothia@webonise.com','2016-11-09',12,'COD','Failed'),(44444444,'amit.kumar@webonise.com','2016-11-12',10,'Online','Success'),(55555555,'jay.singhvi@webonise.com','2016-11-14',12,'Online','Failed');";

		$orderdetailstable = "create table if not exists order_details(orders_id int(10) ,products_id int,products_price int not null);";	

		$orderdetailsrecord ="insert ignore into order_details values(11111111,1,82000),(11111111,3,57000),(22222222,2,290000),(33333333,5,60000),(44444444,4,250000),(44444444,3,57000),(55555555,1,82000);";

		if(mysql_query($userstable) and mysql_query($usersrecord) and mysql_query($productstable) and mysql_query($productsrecord) and mysql_query($orderstable) and mysql_query($ordersrecord) and mysql_query($orderdetailstable) and mysql_query($orderdetailsrecord))
		{
			echo "<table align=center border='1'>";
			echo "<th> Tables Created With Records </th>";
			echo "<tr><td>Users</td></tr>";
			echo "<tr><td>Products</td></tr>";
			echo "<tr><td>Orders</td></tr>";
			echo "<tr><td>Order Details</td></tr>";
			echo "</table>";
			
			$query="select od.orders_id,sum(o.products_price)-(sum(o.products_price)/od.discount) as order_total from products p,order_details o,orders od where o.orders_id=od.orders_id and p.products_id=o.products_id group by o.orders_id order by o.orders_id;";
			if($resultset=mysql_query($query))
            {
                while($record=mysql_fetch_row($resultset))
                {
                    $update="update orders set orders_total='".$record[1]."' WHERE orders_id='".$record[0]."'";
                    mysql_query($update);
                }
            }
			$view="create or replace view Bill as (select o.orders_id,count(od.products_id) as total_products,o.orders_total,o.orders_date,o.discount,o.payment_method,o.payment_status from orders o,order_details od where o.orders_id=od.orders_id group by o.orders_id);";
			mysql_query($view);
			
			$report="select o.orders_id,o.orders_date,GROUP_CONCAT(p.product_name) products,GROUP_CONCAT(p.price) price,o.orders_total,u.users_name,o.users_email from orders o,products p,order_details od,users u where o.orders_id=od.orders_id and u.users_email=o.users_email and o.orders_date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE() and od.products_id=p.products_id and od.products_price=p.price group by o.orders_id;";
			
			if($resultset=mysql_query($report))
            {
				echo "<table border=1 width=100%>";
                echo "<th>Order Id</th>";
                echo "<th>Order Date</th>";
                echo "<th>Products Name</th>";
                echo "<th>Products Price</th>";
                echo "<th>Order Total</th>";
                echo "<th>User Name</th>";
                echo "<th>Email Id</th>";
                while($record=mysql_fetch_row($resultset))
                {
					echo "<tr>";
                    echo "<br><td>".$record[0]."</td><td>".$record[1]."</td><td>".$record[2]."</td><td>".$record[3]."</td><td>".$record[4]."</td><td>".$record[5]."</td><td>".$record[6]."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
			
		}
		else{
			echo "".mysql_error();
		}
	}
	else
	{
		@header("Location:mysqlconnect.html");
	}
?>
