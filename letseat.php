<?php
include "lib/header.php";

$host=$_ENV['OPENSHIFT_DB_HOST']; // Host name 
$username="admin"; // Mysql username 
$password="6j2YHGr4jnng"; // Mysql password 
$db_name="whodoweeatnext"; // Database name 
$tbl_name="seats"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");



?>
<style>
body {background-image:none; }

</style>
<div class="container" id="main">

<?php
$flight = $_REQUEST['flight'];	
$seat = $_REQUEST['seat'];	
$votes = $_REQUEST['votes'];

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
		<div class="span10" style="margin-bottom:2em; "><div class="well"><img style="float:left; margin-bottom:0;" class="pink-border-profile" src="<?php echo $tempimage; ?>"><h3 style="float:right; width:500px">We are going to eat <?php echo $tempname; ?>!</h3><h4 style="float:right; width:500px"> (That's some good eatin'!)</h4> <h4 style="float:right; width:500px">Your score was <?php echo $votes; ?>.</h4>
<p style="clear:both; padding:0;margin:0;"> </p></div></div>
	
		</div>


<div id="myCarousel" class="carousel slide">
  <!-- Carousel items -->
  <div class="carousel-inner">
                  <div class="active item>
                    <img src="http://www.whodoweeatnext.com/img/eatfirst.png" alt="">
                  </div>
                  <div class="item">
                    <img src="http://www.whodoweeatnext.com/img/24b.png" alt="">
                  </div>
                  
  </div>
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>


<div style="margin-left: auto; margin-right: auto; margin-top: 2em; width: 220px;"><a class="btn btn-danger btn-large" href = "flight.php?flight=Oceanic815">Who Do We Eat Next?!?!?!</a></div>

</div>

<?php 
include "lib/footer.php";
?>