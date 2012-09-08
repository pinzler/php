<?php
$flight = $_REQUEST['flight'];	
$seat = $_REQUEST['seat'];	
echo $flight."-".$seat.":<BR>";
?>
<form name="input" action="flight.php" method="post">
<input type="hidden" name="flight" value="<?php echo $flight ?>" />
<input type="hidden" name="seat" value="<?php echo $seat ?>"/>

Name: <input type="text" name="name" /><BR>
Image URL: <input type="text" name="image" /><BR>
Bad: <input type="radio" name="option1" id="option1" value="Snores">Snores 
<input type="radio" name="option1" id="option1" value="Drools">Drools 
<input type="radio" name="option1" id="option1" value="Loud">Loud 
<input type="radio" name="option1" id="option1" value="Other Thing">Other Thing 
<BR>
Good: <input type="radio" name="option2" id="option2" value="Helps with bags">Helps with Bags 
<input type="radio" name="option2" id="option2" value="Other 2">Other 2 
<input type="radio" name="option2" id="option2" value="Other 3">Other 3  
<input type="radio" name="option2" id="option2" value="Other 4">Other 4 
<BR>
Notes: <input type="text" name="notes" /><BR>
<input type="submit" value="Submit" />
</form>