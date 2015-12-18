

<!DOCTYPE html>
<html>
<head>
<title>chat</title>
<link type="text/css" rel="stylesheet" href="style.css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js">
</script>
<script type="text/javascript">
$(document).ready(function(){
	
	$("#list").load("displayfreinds.php"); //displays the freinds list from displayfreinds.php file into list block
	$("#lg").click(function(){				//if user clicks logout takes to logout.php file
       
       window.location = 'logout.php?logout=true';
   });
   setInterval(function(){//refresh every 1500ms
	$("#list").load("displayfreinds.php");	// this refreshes the freinds list in list block every 1500ms so that the online and offline status will be displayed as per the oncurrent status
	},1500);
	$("#list").load("displayfreinds.php");

	      
	
	
});
</script>
</head>
<body>
<center><div>
<i><b><h1 style="color:brown">	your freinds list</h1></b></i></br></br>
<marquee> <p style="color:yellow;font-size:15px"><b>click on the freinds name to chat</b></p></marquee></br>
<div id="list">
</div>
<div id="chat">
<?php
include "classes.php";
?>
<input id="lg" type="submit" value="LOG OUT" name="logout" >
</div>
</div>


</body>
</center>
</html>
