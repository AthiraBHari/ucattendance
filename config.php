<?php
 $DB_HOST = 'localhost:3306';
 $DB_USER = 'root';
 $DB_PASS = '';
 $DB_NAME = 'ucattendance';
 
 try{
	$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;", $DB_USER, $DB_PASS);
} catch(PDOException $e){
	die( "Connection failed: " . $e->getMessage());
}
?>