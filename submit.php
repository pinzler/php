<?php
include "lib/header.php";
?>
<style>
body {background-image:none; }
#main {padding-top:0; }
</style>
<div class="container" id="main">

<div class="row">
	<div class="span10" style="margin-bottom:2em; ">
		<div class="well">

			<?php
			$flight = $_REQUEST['flight'];	
			$seat = $_REQUEST['seat'];	
			echo "<h3>Flight: ".$flight." - ".$seat."</h3>";
			
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
			<img style="float:left; margin-bottom:0;" class="pink-border-profile" src="<?php echo $tempimg ?>">
			<h3 style="float:right; width:500px">Name: <?php echo $tempname ?></h3>
			<p style="float:right; width:500px">Next, choose the passenger's flaws and leave any additional notes.</p>
			
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
		</div>
	</div>
</div><!- /row ->

<label>Bad Traits:</label>
<label class="radio inline"><input type="radio" name="option1" id="option1" value="Overly talkative"><img src='/img/overly-talkative.jpg' /> </label> 
<label class="radio inline"><input type="radio" name="option1" id="option1" value="Baggage bin hog"><img src='/img/overhead-compartment.jpg' /> </label>
<label class="radio inline"><input type="radio" name="option1" id="option1" value="Talking on cell phone"><img src='/img/talking-on-cell.png' /> </label>
<label class="radio inline"><input type="radio" name="option1" id="option1" value="Tweeting in flight"><img src='/img/tweeting-in-flight.png' /> </label>
<br><br>
<label>Notes:</label><input type="text" name="notes" /><BR>
<button  value="Submit" type="submit" class="btn">Submit</button>
</form>
</div>
<?php 
include "lib/footer.php";
?>