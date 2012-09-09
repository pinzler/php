<?php
//header("location:flight.php?flight=Oceanic815");

//echo $_ENV['OPENSHIFT_DB_HOST']."<BR>";
include "lib/header.php";

?>
<style>
body {background-image:none; }
#twitter-widget p {font-size:14px !important;}
</style>


<div class="container" id="main">

  <div class="row">
    <div class="span10" style="margin-bottom:2em; "><p class="well">Coming Soon!</p>


<form action="flight.php" method="post">  
  <label>Flight:</label>
  <input type="text" name="flight" placeholder="Enter a flight number..."><br />
  <button type="submit" value="Submit" class="btn">Submit</button>
</form>


</div>


<div id="twitter-widget" class="hidden-phone" style="float:right; margin-top: -130px;">
    <script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
    <script>
    new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 2,
  interval: 30000,
  width: 250,
  height: 300,
  theme: {
    shell: {
      background: '#f7f2f7',
      color: '#0d010d'
    },
    tweets: {
      background: '#000000',
      color: '#cae6db',
      links: '#4aed05'
    }
  },
  features: {
    scrollbar: false,
    loop: false,
    live: false,
    behavior: 'all'
  }
}).render().setUser('WhoDoWeEatNext').start();
</script>
</div>
    
    </div>

    </div>

<?php 
include "lib/footer.php";
?>

