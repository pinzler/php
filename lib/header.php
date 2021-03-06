<?php 
//Header file for site
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Who Do We Eat Next?</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
    
    /*Bootstrap overrides*/
    .container { width: 780px; padding-left: 1em; padding-right: 1em; }
    body {background-color: #233D92; background-image: url("/img/wing_outline.png"); background-position: center top; background-repeat: no-repeat; }
    .footer .container {padding:0; }
    .btn-primary:hover, .btn-primary:active, .btn-primary.active, .btn-primary.disabled, .btn-primary[disabled] {background-color: #E64395; color: #FFFFFF; }
    /*End overrides*/   
    
    #main {background:#00B1C4; padding-top: 1em; border-left: 5px solid #E64395; border-right: 5px solid #E64395;  padding-bottom: 200px; padding-top: 40px;}
    #hdr-container {background:#fff; width: 99%; padding-left: 0; }
    .seat {height:140px; background-color:#E3E3E3; margin-bottom: 1em; position:relative; }
    .skull {background: none repeat scroll 0 0 #fff; left: 0; opacity: 0.6; position: absolute; top:0; }
    .seat img {height: auto; max-width: 100%; min-height: 100%; max-height:100%; min-width: 100%; border: 2px solid #E64395;}
    .seat-overlay {  color: #FD0091;
    margin-left: 2px;
    margin-top: 99px;
    padding-left: 6px;
    padding-top: 0;
    position: absolute;
    text-shadow: 2px 2px 2px #000000;
    width: 46px; }
    header {border-bottom:5px solid #E64395;}
    .vote-overlay {bottom: 12px;
    color: #FD0091;
    font-size: 32px;
    margin-right: 10px;
    position: absolute;
    right: 0;
    text-shadow: 2px 2px 2px #000000;}
    
    #submit-wrap {margin: 2em auto 0; width: 366px; }
    .eat-button {height:90px; font-size: 34px; }
    
    .popover-title {background-color: #E3E3E3; color: #233D92; font-size: 18px; font-weight: bold; }
    .popover-content img {max-height: 250px;}
    #hdr-right {max-width: 800px; margin-top: 1em;}
    .first-class {border-bottom:5px solid #E64395; margin-bottom:2em; }
    .radio img {border: 2px solid #E64395; width: 162px; }
    .pink-border-profile {border: 2px solid #E64395; height: 220px; margin-bottom: 2em; }
    
   /* Footer -------------------------------------------------- */

	.footer {background-color: #F5F5F5; border-top: 5px solid #E64395; margin-top: 0; padding: 20px 0; }
	.footer p {margin-bottom: 0; color: #777; }
	.footer-links {margin: 10px 0; }
	.footer-links li {display: inline; margin-right: 10px; }
    
    </style>
  </head>
  <body>
  <header class="jumbotron subhead" id="overview">
  <div id="hdr-container" class="container">
	  <div class="row"> 
		  <div class="span4"><img src="/img/oceanic_logo.gif"> </div>	
		  <div id="hdr-right" class="span6 row well well-small pull-right"><img class="span1" style="margin-right:1em" src="/img/plastic_knife__fork_and_spoon-for-twitter.png"><h2 class="">Who Do We Eat Next?</h2></div>   
</div>
  </div>
</header>
 