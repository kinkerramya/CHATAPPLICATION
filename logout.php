
<?php
session_start();
if(isset($_GET['logout']))
{
	include "conn.php";
		$req=$bdd->prepare("SELECT * FROM usersfile WHERE username=:username");
		$req->execute(array(
		'username'=>$_SESSION['username'],
		));
		while($data=$req->fetch()){// while logging out the status of the user will be set back to false so that he can login again in any other browser
		if($data[status]=="true")
			{
        $q = $bdd->prepare ("UPDATE usersfile SET status=:status WHERE username=:username");
        $q->execute(array(
		'username'=>$_SESSION['username'],
		'status'=>"false"
		));
		
		session_destroy();
header("Location:chathere.php"); 
		
	}
		}



?>

<?php

}
?>

