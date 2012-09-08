<?php
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Who Do We Eat Next?</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
    .seat {height:140px; background-color:green; margin-bottom: 1em; }
    .seat-overlay {color: red;  margin-top: 0; padding-left: 45px; padding-top: 0; position: absolute; width: 45px; }
    </style>
  </head>
  <body>
    
    <div class="container">

		<h1>Who Do We Eat Next?</h1>

		<div class="row">
			<div class="span2 seat" href="#" rel="popover" data-content="<i>AND here's some amazing content. It's very engaging. right?</i><img src='http://cdn07.boweryboogie.com/content/uploads/2012/01/williamsburg-brige-approach-1-210x158.jpg' />" data-original-title="Name of Passenger"><h1 class="seat-overlay">A1</h1>
			</div>
			<div class="span2 seat" href="#" rel="popover" data-content="<i>AND <a href='http://google.com'>here's</a> some amazing content. It's very engaging. right?</i><img src='http://cdn07.boweryboogie.com/content/uploads/2012/01/williamsburg-brige-approach-1-210x158.jpg' />" data-original-title="Name of Passenger"><h1 class="seat-overlay">A2</h1><img src='http://cdn07.boweryboogie.com/content/uploads/2012/01/williamsburg-brige-approach-1-210x158.jpg' />
			</div>
			
			<div class="span2 offset3 seat" href="#" rel="popover" data-placement="left" data-content="<i>AND here's some amazing content. It's very engaging. right?</i><img src='http://cdn07.boweryboogie.com/content/uploads/2012/01/williamsburg-brige-approach-1-210x158.jpg' />" data-original-title="Name of Passenger"><h1 class="seat-overlay">A3</h1>
			</div>
			<div class="span2 seat" href="#" rel="popover" data-placement="left" data-content="<i>AND here's some amazing content. It's very engaging. right?</i><img src='http://cdn07.boweryboogie.com/content/uploads/2012/01/williamsburg-brige-approach-1-210x158.jpg' />" data-original-title="Name of Passenger"><h1 class="seat-overlay">A4</h1>
			</div>
		</div>
		
		<div class="row">
		  <div class="span2 seat">B1</div>
		  <div class="span2 seat">B2</div>
		  <div class="span2 offset3 seat">B3</div>
		  <div class="span2 seat">B4</div>
		</div>
		
		<div class="row">
		  <div class="span2 seat">C1</div>
		  <div class="span2 seat">C2</div>
		  <div class="span2 offset3 seat">C3</div>
		  <div class="span2 seat">C4</div>
		</div>


    </div> <!-- /container -->
    
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
	<script>  
	$(function ()  
	{ $(".seat").popover();  
	});
	</script>     
  </body>
</html>