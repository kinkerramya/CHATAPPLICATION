 <?php
 session_start();
   class user{			//class with table contents of usersfile for executing functions
	private $userid,$username,$usermail,$userpassword,$status;
	public function getuserid(){
		return $this->userid;
	}
	public function setuserid($userid){
		$this->userid=$userid;
	}
	public function getusername(){
		return $this->username;
	}
	public function setusername($username){
		$this->username=$username;
	}
	public function getusermail(){
		return $this->usermail;
	}
	public function setusermail($usermail){
		$this->usermail=$usermail;
	}
	public function getuserpassword(){
		return $this->userpassword;
	}
	public function setuserpassword($userpassword){
		$this->userpassword=$userpassword;
	}
	public function getstatus(){
		return $this->status;
	}
	public function setstatus($status){
		$this->status=$status;
	}
									//function that inserts a user in the table
	public function Insertuser(){
		include "conn.php";
		$req=$bdd->prepare("INSERT INTO usersfile(username,usermail,userpassword) VALUES(:username,:usermail,:userpassword)");
		$req->execute(array(
		'username'=>$this->getusername(),
		'usermail'=>$this->getusermail(),
		'userpassword'=>$this->getuserpassword()
		));
	}
	//sets the userid username password etc. on checking all the conditions as in page lgn.php
	public function userlogin(){
		include "conn.php";
		$req=$bdd->prepare("SELECT * FROM usersfile WHERE username=:username AND userpassword=:userpassword");
		$req->execute(array(
		'username'=>$this->getusername(),
		'userpassword'=>$this->getuserpassword()
		));
		
				while($data=$req->fetch()){
					
					$this->setuserid($data['userid']);
					$this->setusername($data['username']);
					$this->setuserpassword($data['userpassword']);
					$this->setusermail($data['usermail']);
					header("Location:frndslist.php");
					return true;
				}
		
	}
	
	
}
   
class chat{  // class for datatable to store chat sender receiver etc.
	private $chatid,$chatuserid,$chattext,$sender,$receiver;
	public function getchatid(){
		return $this->chatid;
	}
	public function setchatid($chatid){
		$this->chatid=$chatid;
	}
	public function getchatuserid(){
		return $this->chatuserid;
	}
	public function setchatuserid($chatuserid){
		$this->chatuserid=$chatuserid;
	}
	public function getchattext(){
		return $this->chattext;
	}
	public function setchattext($chattext){
		$this->chattext=$chattext;
	}public function getsender(){
		return $this->sender;
	}
	public function setsender($sender){
		$this->sender=$sender;
	}
	public function getreceiver(){
		return $this->receiver;
	}
	public function setreceiver($receiver){
		$this->receiver=$receiver;
	}
	                            //function to insert chat messages
	public function insertchatmessage(){
	include "conn.php";
$req=$bdd->prepare("INSERT INTO chat(chatuserid,chattext,sender,receiver) VALUES(:chatuserid,:chattext,:sender,:receiver)");
$req->execute(array(
'chatuserid'=>$this->getchatuserid(),
'chattext'=>$this->getchattext(),
'sender'=>$this->getsender(),
'receiver'=>$this->getreceiver()
));	
}
	//function to display messages checking the receiver and sender and displaying the chat text of only them
	
public function displaymessages(){
		include "conn.php";
		$chatreq=$bdd->prepare("SELECT * FROM chat where (sender=:sender AND receiver=:receiver) OR (sender=:receiver AND receiver=:sender) ORDER BY chatid DESC");
		$chatreq->execute(array(
		'sender'=>$_SESSION['username'],
		'receiver'=>$this->getreceiver()
		     
		));
		while($datachat=$chatreq->fetch()){
			$userreq=$bdd->prepare("SELECT * FROM usersfile WHERE userid=:userid");
			$userreq->execute(array(
			'userid'=>$datachat['chatuserid']
			));
			$datauser=$userreq->fetch();
			if($datauser['username']==$_SESSION['username']){
			?>
	
			<span class="chatmessages" style="color:red"><i><?php echo $datachat['timestamp'];?></i></span><br/> 
			<span class="usernames" style="color:green"><b><?php echo " me:";?></b></span><br/>
			<span class="chatmessages" style="color:green"><i><?php echo $datachat['chattext'];?></i></span><br/><br/>
			<?php
			}else{
				?>
	
			<span class="chatmessages" style="float:right;color:blue"><i><?php echo $datachat['timestamp'];?></i></span><br/> 
			<span class="usernames" style="float:right;color:violet"><b><?php echo $datauser['username']." says:";?></b></span><br/>
			<span class="chatmessages" style="float:right;color:violet"><i><?php echo $datachat['chattext'];?></i></span><br/><br/>
			<?php
			}
			
		}
	}
	
}
	


?>