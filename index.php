<?php
//header("location:flight.php?flight=Oceanic815");

//echo $_ENV['OPENSHIFT_DB_HOST']."<BR>";
include "lib/header.php";

?>
<style>
body {background-image:none; }
#main {padding-top:0; }
</style>

  <style>      
      @media screen and (min-width: 980px) {
        body {
          padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
          }
          
        }
    @media screen and (min-width: 460px) {
          #hmpg-logo img {height: 60px; width:78px; margin-top: -30px;}
        }
        
        #main-nav-logo img {width:20px; margin-top: -7px; }
        
        
        label.valid {
    width: 24px;
    height: 24px;
    background: url(../assets/img/valid.png) center center no-repeat;
    display: inline-block;
    text-indent: -9999px;
    }
    label.error {
    font-weight: bold;
    color: red;
    padding: 2px 8px;
    margin-top: 2px;
    }
    #twitter-widget p {font-size:14px !important;}
    </style>

<div class="container" id="main">

  <div class="row">
    <div class="span10" style="margin-bottom:2em; "><p class="well">Coming Soon!
<form name="input" action="flight.php" method="post">
Flight: <input type="text" name="flight" />
<input type="submit" value="Submit" />
</form></p></div>


<div id="twitter-widget" class="hidden-phone" style="float:right">
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

