<?php
include "lib/header.php";
?>
<style>
body {background-image:none; }
#main {padding-top:0; }
</style>
<div class="container" id="main">
<h4>Edit</h4>
<?php
$flight = $_REQUEST['flight'];	
$seat = $_REQUEST['seat'];	
echo "<h3>".$flight." - ".$seat.":</h3>";

?>

<form name="input" action="flight.php" method="post">
<input type="hidden" name="flight" value="<?php echo $flight ?>" />
<input type="hidden" name="seat" value="<?php echo $seat ?>"/>

<?php

if (isset($_REQUEST['name']))
{

$tempname = $_REQUEST['name'];
$tempimg = $_REQUEST['image'];

?>


<input type="hidden" name="name" value="<?php echo $tempname ?>" />
<input type="hidden" name="image" value="<?php echo $tempimg ?>"/>
Name: <?php echo $tempname ?> <BR>
<img src="<?php echo $tempimg ?>"> <BR>

<?php

}

else
{

?>

<label>Name:</label><input type="text" name="name" />
<label>Image URL:</label> <input type="text" name="image" />

<?php
}
?>


<label>Bad:</label>
<label class="radio inline"><input type="radio" name="option1" id="option1" value="Overly Talkative"><img src='/img/overly-talkative.jpg' /> </label> 
<label class="radio inline"><input type="radio" name="option1" id="option1" value="Sleeping on You"><img src='/img/sleeping-on-you.jpg' /> </label>
<label class="radio inline"><input type="radio" name="option1" id="option1" value="Talking on Cell Phone"><img src='/img/talking-on-cell.png' /> </label>
<label class="radio inline"><input type="radio" name="option1" id="option1" value="Tweeting in Flight"><img src='/img/tweeting-in-flight.png' /> </label>
<br><br>
<label>Notes:</label><input type="text" name="notes" /><BR>
<button  value="Submit" type="submit" class="btn">Submit</button>
</form>
</div>
<?php 
include "lib/footer.php";
?>