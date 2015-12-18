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
border-radius: 5px;color:blue
}
input[type=text]:focus {border-color:#333; }

input[type=submit] {padding:5px 15px; background:#ccc; border:0 none;
cursor:pointer;
-webkit-border-radius: 5px;
border-radius: 5px; }
</style>
</head><body><center><h2>SIGN UP</h2>
<form method="post" action="insertuser.php"><!directs to insertuser.php on submit>
<div id="signupdiv">
<table>
<tr>
<td>Your Name:</td><td><input type="text" name="username"/><span style="color:red">"*"</span></td>
</tr>
<tr>
<td>Your Email:</td><td><input type="mail" name="usermail"/><span style="color:red">"*"</span></td>
</tr>
<tr>
<td>Password:</td><td><input type="password" name="userpassword"/><span style="color:red">"*"</span></td>
</tr>
<tr>
<td></td><td><input  type="submit" value="SIGN UP"/></td>
</tr><tr>
</tr>
<?php
if(isset($_GET['error'])){//if any of the feilds are left empty and prompted to sign in it shows enter all the required feilds
?>
<tr>
<td></td><td></br></br><span style="color:red"><b><i>****Enter all the required feilds*****</i></b></span></td>
</tr>
<?php
}
?>
  
</table>
</div>
</form></center></body>