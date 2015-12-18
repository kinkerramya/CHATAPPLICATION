<!DOCTYPE html>
<html>
<head>
<style>
body {
font:12px arial;
color: #222;
text-align:center;
padding:35px;
background-color: pink;
background-image:url("Images/log.gif");
background-size: 1500px 1000px;
background-repeat: no-repeat;
}
input[type=text] {padding:5px; border:2px solid #ccc; 
-webkit-border-radius: 5px;
border-radius: 5px;
}
input[type=text]:focus {border-color:#333; }

input[type=submit] {padding:5px 15px; background:#ccc; border:0 none;
cursor:pointer;
-webkit-border-radius: 5px;
border-radius: 5px; }
</style>
<script type="text/javascript" src="jquery.1.7.2.js"></script>
<title>welcome to chat app</title>
</head>
<body>
<center>
</br></br></br></br></br></br>
<h2>LOGIN FORM</h2> 
<form method="post" action="userlogin.php">
<div id="logindiv">
</br> 
<table>
<tr>
<td style="font-size:18px"><b><i>Username:  	</i></b></td><td><input style="color:blue" type="mail" name="username"/></td>
</tr>
<tr>
<td style="font-size:18px"><b><i>Password:  	</b></i></td><td><input style="color:blue" type="password" name="userpasswordlogin"/></td>
</tr>
<tr>
<td></td><td><input style="color:blue" type="submit" value="LOG IN"/></td>
</tr>
<?php
if(isset($_GET['error'])){
?>
<tr>
<td></td><td><span style="color:red;font-family:aerolite">ERROR LOGIN</span></td>
</tr>
<?php
}
?>
<?php
if(isset($_GET['blur'])){
?>
<tr>
<td></td><td><span style="color:red;font-family:aerolite">USER ALREADY LOGGED IN</span></td>
</tr>
<?php
}
?>


</table>
</form>
</br></br></br>
<form method="post" action="signup.php"><!allows new user to signup>
<div id="signupdiv">
<table>
<tr>
<td></td><td><input style="color:blue" type="submit" value="SIGN UP"/></td>
</tr>
<?php
if(isset($_GET['success'])){
	?>
	<tr>
	<td></td><td><span style="color:green">USER INSERTED</span></td>
	</tr>
<?php
}
?>
</table>
</div>
</form>
</center>
	
</body>
</html>
