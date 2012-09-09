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


	    
    </div>
    
    <div class="row">
    <div id="myCarousel" class="span6 well carousel slide">
  <!-- Carousel items -->
  <div class="carousel-inner">
                  <div class="active item">
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

