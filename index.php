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
    <div class="span10" style="margin-bottom:2em; "><p class="well">Your flight is stuck on the runway for 6 hours. Times are tough. We're hungry, but there's no food. So who do we eat?</p>


		<form class="form-inline" action="flight.php" method="post">  
		  <!--<label>Flight:</label>-->
		  <input type="text" name="flight" placeholder="Enter a flight number...">
		  <button type="submit" value="Submit" class="btn">Submit</button>
		</form>
	</div>


	    
    </div>
    
    <div class="row">
    <div id="myCarousel" class="span6 well carousel slide">
  <!-- Carousel items -->
  <div class="carousel-inner">
                  <div class="active item">
                    <img src="/img/eatfirst.png" alt="">
                  </div>
                  <div class="item">
                    <img src="/img/24b.png" alt="">
                  </div>
                  <div class="item">
                    <img src="/img/delicious.png" alt="">
                  </div>
                  <div class="item">
                    <img src="/img/i-want-human.png" alt="">
                  </div>
                  <div class="item">
                    <img src="/img/im-voting-to-eat-you.png" alt="">
                  </div>
                  <div class="item">
                    <img src="/img/organic.png" alt="">
                  </div>
                  <div class="item">
                    <img src="/img/flavor-flav.png" alt="">
                  </div>
                  
  </div>
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>
    
   
    	<div id="twitter-widget" class="span2">
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
	      background: '#ffffff',
	      color: '',
	      links: ''
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

    </div><!- end row->
    </div><!- end container->

<?php 
include "lib/footer.php";
?>

