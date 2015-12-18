<?php
if($_POST['username'] != ""){
	if($_POST['usermail']!=""){		// checks the condition if al the feilds are enterd or not
		if($_POST['userpassword']!=""){
include "classes.php";
$user=new user();
if(isset($_POST['username'])&&isset($_POST['usermail'])&&isset($_POST['userpassword'])){//if all feilds are enterd inserts the new user into the table enabling them to login
	$user->setusername($_POST['username']);
	$user->setusermail($_POST['usermail']);
	$user->setuserpassword($_POST['userpassword']);
	$user->Insertuser();
	header("Location:../sample/lgn.php?success=1");
	}
  }else
  {
	  header("Location:../sample/signup.php?error=1");
	}}
	else
  {
	header("Location:../sample/signup.php?error=1");}}else{// if not enterd directs to the same page displaying enter all required feilds
		header("Location:../sample/signup.php?error=1");
	}
?>