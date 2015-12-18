<?php
try{
	$bdd=new PDO("mysql:host=localhost;dbname=usersfile","root","dumbu");//establishes connection with the database with name usersfile
}catch(Exception $e){
	die("ERROR:".$e->getMessage());
}
?>
