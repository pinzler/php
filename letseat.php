<?php
include "lib/header.php";

$host=$_ENV['OPENSHIFT_DB_HOST']; // Host name 
$username="admin"; // Mysql username 
$password="6j2YHGr4jnng"; // Mysql password 
$db_name="whodoweeatnext"; // Database name 
$tbl_name="seats"; // Table name 

?>
<style>
body {background-image:none; }
#main {padding-top:0; }
</style>
<div class="container" id="main">

<?php
$flight = $_REQUEST['flight'];	
$seat = $_REQUEST['seat'];	

		$querytest = "select * from $tbl_name where flight = '$flight' AND seat = '$seat';";
		$resulttest = mysql_query($querytest);
		$rowcounttest =  mysql_num_rows($resulttest);

		
