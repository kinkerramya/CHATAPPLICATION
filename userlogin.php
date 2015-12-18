<?php
session_start();
include "conn.php";
		$req=$bdd->prepare("SELECT * FROM usersfile WHERE username=:username AND userpassword=:userpassword");
		$req->execute(array(
		'username'=>$_POST['username'],
		'userpassword'=>$_POST['userpasswordlogin']			//selects everything from usersfile  and checks if the login credentials
		));												 //matches with any of the signed users.if exists allows to login if satus is 0 else prompts ad error login
		if($req->rowCount()==0){
			header("Location:../sample/lgn.php?error=1");
			return false;
			}else{
		while($data=$req->fetch()){
			 if($data[status]=="false")
			{
        $q = $bdd->prepare ("UPDATE usersfile SET status=:status WHERE username=:username");
        $q->execute(array(
		'username'=>$_POST['username'],// this is checked to avoid same user to login multiple browsers at the same time
		'status'=>"true"				// if the user is logged in his status will be set true until logout then it sets to false
		));
		include "classes.php";			//if status=true shoes useer already logged in
	$user=new user();
	$user->setusername($_POST['username']);  // after checking the two conditions if registerd and not in any session user is allowed to log in
	$user->setuserpassword($_POST['userpasswordlogin']);
	if($user->userlogin()==true){
		$_SESSION['userid']=$user->getuserid();
		$_SESSION['username']=$user->getusername();
		$_SESSION['usermail']=$user->getusermail();
	}
			}
			else{
				header("Location:../sample/lgn.php?blur=1");
				return false;
				
			}
		}
			}


?>	

	