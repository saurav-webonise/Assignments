<?php
    include 'database.php';
    Class MysqlConnection implements DBConnectionInterface{
        public function connect(){
            $dbHost = "localhost";
            $dbUser = "root";
            $dbPassword = "root";
            $dbName = "design_pattern";
            try{
                $mysqlConn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
                $mysqlConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $mysqlConn;
            }catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();
            }        
        }    
    }	
?>
