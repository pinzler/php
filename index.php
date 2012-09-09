<?php
//header("location:flight.php?flight=Oceanic815");

//echo $_ENV['OPENSHIFT_DB_HOST']."<BR>";
include "lib/header.php";

?>
<style>
body {background-image:none; }
#main {padding-top:0; }
</style>
<div class="container" id="main">

  <div class="row">
    <div class="span10" style="margin-bottom:2em; "><p class="well">Coming Soon!
<form name="input" action="flight.php" method="post">
Flight: <input type="text" name="flight" />
<input type="submit" value="Submit" />
</form></p></div>
    
    </div>

    </div>

<?php 
include "lib/footer.php";
?>

