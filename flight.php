<?php

$host=$_ENV['OPENSHIFT_DB_HOST']; // Host name 
$username="admin"; // Mysql username 
$password="6j2YHGr4jnng"; // Mysql password 
$db_name="whodoweeatnext"; // Database name 
$tbl_name="seats"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

if(isset($_REQUEST['flight']))
{
	$flight = $_REQUEST['flight'];	
	echo $flight.":<BR>";
	if(isset($_REQUEST['seat']))
	{
		$flight = $_REQUEST['flight'];
		$seat = $_REQUEST['seat'];
		$name = $_REQUEST['name'];
		$image = $_REQUEST['image'];
		if(isset($_REQUEST['option1']))
			$option1 = $_REQUEST['option1'];
		else
			$option1 = "";
		if(isset($_REQUEST['option2']))
			$option2 = $_REQUEST['option2'];
		else
			$option2 = "";
		
		$notes = $_REQUEST['notes'];

		$sqlins = "INSERT INTO $tbl_name (flight, seat, name, image, option1, option2, notes) VALUES ('$flight', '$seat', '$name', '$image', '$option1', '$option2', '$notes');";

		$resultins=mysql_query($sqlins);
	}
	$seats = array("1A", "1B", "1C", "1D","2A", "2B", "2C", "2D","3A", "3B", "3C", "3D","4A", "4B", "4C", "4D","5A", "5B", "5C", "5D","6A", "6B", "6C", "6D");
	$query = "select * from $tbl_name where flight = '$flight';";
	$result = mysql_query($query);
	$rowcount =  mysql_num_rows($result);
	$filledseats = array();
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	      $filledseats[] = array(
	      'name' => $row['name'],
	      'seat' => $row['seat'],
	      'image' => $row['image'],
	      'option1' => $row['option1'],
	      'option2' => $row['option2'],
	      'notes' => $row['notes']
	      );
	}
	foreach ($seats as $seatkey) {
		$checkval = true;
		foreach ($filledseats as $fskey) {
			if($seatkey == $fskey['seat'])
				{
					$checkval = false;
					echo $seatkey.": ".$fskey['name']." <img src='".$fskey['image']."'> ".$fskey['option1']." ".$fskey['option2']." ".$fskey['notes']."<BR>";
				}	
			}
		if ($checkval)
				{	
					$tempseat = $seatkey;
					echo $seatkey.": <form name='".$tempseat."' action='submit.php' method='post'><input type='hidden' name='flight' value='".$flight."' /><input type='hidden' name='seat' value='".$tempseat."' /><input type='submit' value='Fill This Seat' /></form><BR>";
				}	

	}

	echo '<form name="govote" action="vote.php" method="post"><input type="hidden" name="flight" value="'.$flight.'"/><input type="submit" value="Who Do We Eat Next!" /></form>';
		

}
else
	header("location:index.php");
?>