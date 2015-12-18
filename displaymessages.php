<?php
include "classes.php";
$chat=new chat();
$chat->setreceiver($_POST['receiver']);//takes the receiver name from the lgn.php
$chat->displaymessages();

?>