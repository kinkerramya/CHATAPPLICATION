<?php
session_start();
$frnds=new frnds();//call the class
$frnds->displayfreinds();// calls the display freinds function
class frnds{
public function displayfreinds(){
	$run=$_SESSION['username'];
		include "conn.php";
		$userreq=$bdd->prepare("SELECT * FROM usersfile");// select everything from the data table userffile
		$userreq->execute(); 							  //execcutes the above statement
			$datauser=$userreq->fetchALL();					//fetches everything rom user file to datauser
			foreach($datauser as $row){     
				if ($row['username']!="$run"){				//checks for the condition for each username 
																//in the row if the username is the session name so as not to display the login person in freinds list
			?>
			<table><tr>
			<td>
			<a id="ramya" style="font-size:20px;color:firebrick"href="../sample/chatbox.php?fname=<?php echo $row['username'];?>"><?php echo '<b>'.$row['username'].'</b>';?></a></td><td><?php
			if ($row["status"]=="true"){?>		
				<b><i><input type="submit" style="background-color:#006600" value="online">      <! checks if the status of the username is true then displays as online else as offline>
				<?php } else{?>
				<input type="submit" value="offline">
				<?php } ?></td></tr>
				</table><br/><br/><br/>
			
			<?php
				}
	
}
}
}
?>
