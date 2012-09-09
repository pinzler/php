<?php
include "lib/header.php";

$host=$_ENV['OPENSHIFT_DB_HOST']; // Host name 
$username="admin"; // Mysql username 
$password="6j2YHGr4jnng"; // Mysql password 
$db_name="whodoweeatnext"; // Database name 
$tbl_name="seats"; // Table name 

?>
<style>
body {background-image:none; }
#main {padding-top:0; }
</style>
<div class="container" id="main">

<?php
$flight = $_REQUEST['flight'];	
$seat = $_REQUEST['seat'];	

		$query = "select * from $tbl_name where flight = '$flight' AND seat = '$seat';";
		
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
$tempname = $filledseats[0]['name'];
$tempimage = $filledseats[0]['image'];
?>

<div class="row">
		<div class="span10" style="margin-bottom:2em; "><p class="well">We are going to eat <?php echo $tempname; ?>! (That's some good eatin'!)<BR>
<img src="<?php echo $tempimage; ?>"></p></div>
		
		</div>

 <BR>
<img src="http://www.whodoweeatnext.com/img/eatfirst.png"> <img src="http://www.whodoweeatnext.com/img/24b.png">

<BR>

<h1><a href = "flight.php?flight=Oceanic815">Who Do We Eat Next?!?!?!</a></h1>

</div>

<?php 
include "lib/footer.php";
?>