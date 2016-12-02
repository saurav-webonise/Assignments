<?php
    include 'database.php';
    Class PostgresConnection implements DBConnectionInterface{
        public function connect(){
            $host='localhost';
            $db='design_pattern';
            $username='postgres';
            $password='root';
            try{
                $postgresConn = new PDO("pgsql:host=$host;dbname=$db;user=$username;password=$password");
                return $postgresConn;
            }catch(PDOException $e){
                    echo "Connection failed: " . $e->getMessage();
            }        
        }    
    }	
?>