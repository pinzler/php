<?php

include 'EpiCurl.php';
include 'EpiOAuth.php';
include 'EpiTwitter.php';

$host=$_ENV['OPENSHIFT_DB_HOST']; // Host name 
$username="admin"; // Mysql username 
$password="6j2YHGr4jnng"; // Mysql password 
$db_name="whodoweeatnext"; // Database name 
$tbl_name="seats"; // Table name 


$handle = $_REQUEST['handle'];

$flight = $_REQUEST['flight'];


$consumer_key = '7J8xzQtH6xRFjYyRvBZR6w';
$consumer_secret = 'iQqqadn1PmxihkA1xaJqp1lxH5ERLfnY1OmIIqok8';
$ot = "809152548-Ned3X7fh7A7fE0gvhLA6izywsUJyVtUvuaGYK2nt";
$ots = "H3bycJ9ybBsrAU6KStNCTIoU1huSq1VyfM76O6VU";

$twitterObj = new EpiTwitter($consumer_key, $consumer_secret);

if (isset($_REQUEST['win']))
	{
	$seat = $_REQUEST['win'];
	$update = "TEST @pinzler, you are about to get eaten on flight ".$flight."!";
	//$update = "Hey ".$handle.", you are about to get eaten on flight ".$flight."!";
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB");
	
	$sqlins = "UPDATE $tbl_name SET eaten=1 WHERE flight = '$flight' AND seat = '$seat';";

	$resultins=mysql_query($sqlins);

	}
else
	{
	$numbr = $_REQUEST['number'];
	$update = "TEST @pinzler, you just got a vote from ".$numbr." to be eaten on flight ".$flight."!";
	//$update = "Hey ".$handle.", you just got a vote to be eaten on flight ".$flight."!";
	}

$twitterObj->setToken($ot, $ots);
$update_status = $twitterObj->post_statusesUpdate(array('status' => $update));
$temp = $update_status->response;

?>