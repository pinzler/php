<html>
  <head>
    <title>Who Do We Eat Next?</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
    .seat {height:140px; background-color:green; margin-bottom: 1em; }
    .seat-overlay {color: red;  margin-top: 0; padding-left: 45px; padding-top: 0; position: absolute; width: 45px; }
    </style>
  </head>
  <body>
    
    <div class="container">

		<h1>Who Do We Eat Next?</h1>



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
	//echo $flight.":<BR>";
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

		$querytest = "select * from $tbl_name where flight = '$flight' AND seat = '$seat';";
		$resulttest = mysql_query($querytest);
		$rowcounttest =  mysql_num_rows($resulttest);
		
		if ($rowcounttest == 0)
			$sqlins = "INSERT INTO $tbl_name (flight, seat, name, image, option1, option2, notes) VALUES ('$flight', '$seat', '$name', '$image', '$option1', '$option2', '$notes');";
		else
			$sqlins = "UPDATE $tbl_name SET option1='$option1', option2='$option2', notes='$notes' WHERE flight = '$flight' AND seat = '$seat';";

		$resultins=mysql_query($sqlins);
	}

	$seats = array("1A", "1B", "1C", "1D","2A", "2B", "2C", "2D","3A", "3B", "3C", "3D");
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
	      'notes' => $row['notes'],
	      'eaten' => $row['eaten'],
		  'twitter' => $row['twitter']    
	      );
	}
	$countseats = 1;
	foreach ($seats as $seatkey) {
		$checkval = true;
		if($countseats==1)
				   		echo '<div class="row"><div class="span2 seat" href="#" '; 
					if($countseats==2 || $countseats==4)
						echo '<div class="span2 seat" href="#" ';
					if($countseats==3)
						echo '<div class="span2 offset3 seat" href="#" ';
					

		foreach ($filledseats as $fskey) {
					
			
			if($seatkey == $fskey['seat'])
				{	
				    
					$tempseat=$seatkey;
					$checkval = false;
					$tempname = $fskey['name'];
					$tempimage = $fskey['image'];
					if ($fskey['eaten']==0)
					{
						$formbutt = "<form name='".$tempseat."' action='submit.php' method='post'><input type='hidden' name='name' value='".$tempname."' /><input type='hidden' name='image' value='".$tempimage."' /><input type='hidden' name='flight' value='".$flight."' /><input type='hidden' name='seat' value='".$tempseat."' /><input type='submit' value='Edit This Seat' /></form>";

						echo 'rel="popover" data-content="<i>'.$fskey['option1']."<BR>".$fskey['option2']."<BR>".$fskey['notes']."<BR></i>".$formbutt;
						echo "<img src='".$tempimage."' />".'" data-original-title="'.$tempname.'"><h1 class="seat-overlay">'.$seatkey.'</h1><img src="'.$fskey['image'].'" /></div>';
						
						//echo $seatkey.": ".$fskey['name']." <img src='".$fskey['image']."'> ".$fskey['option1']." ".$fskey['option2']." ".$fskey['notes'];
						//echo "<form name='".$tempseat."' action='submit.php' method='post'><input type='hidden' name='name' value='".$tempname."' /><input type='hidden' name='image' value='".$tempimage."' /><input type='hidden' name='flight' value='".$flight."' /><input type='hidden' name='seat' value='".$tempseat."' /><input type='submit' value='Edit This Seat' /></form><BR>" ;
					}
					else
						{
						echo 'rel="popover" data-content="<i>'.$fskey['option1']."<BR>".$fskey['option2']."<BR>".$fskey['notes']."<BR></i>";
						echo "<img src='".$tempimage."' />".'" data-original-title="'.$tempname.'"><h1 class="seat-overlay">'.$seatkey.'- EATEN</h1><img src="'.$fskey['image'].'" /></div>';
						//echo "EATEN: ".$fskey['name']." <img src='".$fskey['image']."'> ".$fskey['option1']." ".$fskey['option2']." ".$fskey['notes'];

						}
						
				}	
			}
		if ($checkval)
				{	
					$tempseat = $seatkey;
					$formbutt = "<form name='".$tempseat."' action='submit.php' method='post'><input type='hidden' name='flight' value='".$flight."' /><input type='hidden' name='seat' value='".$tempseat."' /><input type='submit' value='Fill This Seat' /></form>";
					//echo $seatkey.": <form name='".$tempseat."' action='submit.php' method='post'><input type='hidden' name='flight' value='".$flight."' /><input type='hidden' name='seat' value='".$tempseat."' /><input type='submit' value='Fill This Seat' /></form><BR>";
					echo '>';
					echo '<h1 class="seat-overlay">'.$seatkey.'</h1><br>'.$formbutt.'</div>';
						
				}
				if($countseats==4)
						echo '</div>';
				$countseats++;
				if($countseats==5)
					$countseats=1;
				
						

	}

	echo '<form name="govote" action="vote.php" method="post"><input type="hidden" name="flight" value="'.$flight.'"/><input type="submit" value="Who Do We Eat Next!" /></form>';
}
else
	header("location:index.php");
?>

 </div> <!-- /container -->
    
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
	<script>  
	$(function ()  
	{ $(".seat").popover();  
	});
	</script>     
  </body>
</html>