<?php
session_start();

if($_SESSION['username']!="")  //it allows only one person to login in a browser as we see in facebook or gmail.if logged in it directly opens the frnds page
{
	header("Location:frndslist.php"); 
		
}
else{
header("Location:lgn.php");
}
?>