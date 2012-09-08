<?php
echo $_ENV['OPENSHIFT_DB_HOST']."<BR>";
?>
<form name="input" action="flight.php" method="post">
Flight: <input type="text" name="flight" />
<input type="submit" value="Submit" />
</form>