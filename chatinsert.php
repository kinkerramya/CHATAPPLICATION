<?php
session_start();
include "classes.php";
if(isset($_POST['chattext'])){
	$chat=new chat();
	$chat->setchatuserid($_SESSION['userid']);
	$chat->setchattext($_POST['chattext']);
	$chat->setsender($_SESSION['username']);
	$chat->setreceiver($_POST['receiver']);
	$chat->insertchatmessage();//saves all the chat messages with session username and receiver name in data table by calling the function in classes.php
    
}
?>
