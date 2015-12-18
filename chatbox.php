<?php
session_start();

if(isset($_GET['logout'])){  						//gets the logout if true
session_destroy(); 									//destrous the session i.e sets the $_SESSION['username'] to ""
header("Location: frndslist.php"); //Redirect the user
}
$fname=$_GET['fname'];						//fname gets the selected freinds name from the freinds list


?>


<!DOCTYPE html>
<html>
<head>
<title>chat</title>
<link type="text/css" rel="stylesheet" href="STYLE/style.css" />
</head>
<body>
<div id="wrapper" style="background-image:url('Images/bck.gif')">
<div id="menu">
<p class="welcome">Welcome, <b><?php echo $_SESSION['username']; ?></b></p><br/>
<p class="welcome" id="">say hai to   </p>
<b><p class="welcome" id="ji"><?php echo "$fname"; ?></p></b>     <! gets the fname i.e. the seected freinds name from freindlist>
<p class="logout"><a id="exit" href="../sample/frndslist.php">Exit Chat</a></p> 
<div style="clear:both"></div>
</div>

<div id="chatbox" name=""></div>   <! block to display the chat messages>

<textarea name="chattext" id="chattext"></textarea>  <!block to type the text>

</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js">
</script>

<script type="text/javascript">

$(document).ready(function(){       
	$("#exit").click(function(){	/* when we click exit chat link this function gets executed.It takes to the freinds list page*/
       window.location = 'frndslist.php?logout=true';
   });
            
  var fname=document.getElementById("ji").innerHTML;   // gets the inner html of element with id ji into fname
			
	$("#chattext").keyup(function(e){			//this is a function when enter is pressed after entering the text in the text box 
		//when click enter do
		if(e.keyCode ==13)
		{
			
			var chattext=$("#chattext").val();	//this loads the chattext element to chat text
			var fname=document.getElementById("ji").innerHTML;
			
			$.ajax({       //this ajax is used to store the chat text into the data table 
				type:'POST',
				url:'chatinsert.php',//url which executes with this data
				data: 'chattext='+chattext+'&receiver='+fname,// data for chattext and receiver table elemts
				success:function(data){
					$("#chatbox").load("displaymessages.php", { receiver: fname });//this will load the chatbox block with the chattext calling the file displaymessages.php
					$("#chattext").val("");
				}
			});
		}
	});
	
setInterval(function(){                   //refresh the chatbox block every 1500ms so that the messages that are new displays without the need of refreshing entire page
	$("#chatbox").load("displaymessages.php",{receiver: fname });
	},1500);
	$("#chatbox").load("displaymessages.php", { receiver: fname });

	      
	
   setInterval (loadLog, 2500);//sets the scrollheight for the chatbox
   function loadLog(){
    var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20;

}

});

</script>




</body>
</html>
