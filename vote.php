<?php

$host=$_ENV['OPENSHIFT_DB_HOST']; // Host name 
$username="admin"; // Mysql username 
$password="6j2YHGr4jnng"; // Mysql password 
$db_name="whodoweeatnext"; // Database name 
$tbl_name="seats"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

if(isset($_REQUEST['flight']))
{
	$flight = $_REQUEST['flight']; 
	$seats = array("1A", "1B", "1C", "1D","2A", "2B", "2C", "2D","3A", "3B", "3C", "3D","4A", "4B", "4C", "4D","5A", "5B", "5C", "5D","6A", "6B", "6C", "6D");
	$query = "select * from $tbl_name where flight = '$flight';";
	$result = mysql_query($query);
	$rowcount =  mysql_num_rows($result);
	if($rowcount==0)
	{
		header("location:flight.php?flight=".$flight);
	}
	else
	{	
		?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Who Do We Eat Next - <?php echo $flight; ?></title>
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="http://node-apinzler.rhcloud.com/socket.io/socket.io.js"></script>
</head>

<body>

  <script>

var dataTest = [];
var answers = [];
var voters = [];

var voteCount=0;

  function updateArr(seat) {
    dataTest[seat]++;
    voteCount++;
    document.getElementById(seat).innerHTML=dataTest[seat];
  }
        
function checkAns() {
  
  var str = "<?php echo $flight; ?>";
  
   $(listA).append('<strong>'+ str + '</strong><BR><BR>');
    
<?php
		$filledseats = array();
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		      $filledseats[] = array(
		      'name' => $row['name'],
		      'seat' => $row['seat'],
		      'image' => $row['image'],
		      'option1' => $row['option1'],
		      'option2' => $row['option2'],
		      'notes' => $row['notes'],
		      'eaten' => $row['eaten']
		      );
		}
		foreach ($seats as $seatkey) {
			$checkval = true;
			foreach ($filledseats as $fskey) {
				if($seatkey == $fskey['seat'] && $fskey['eaten']==0)
					{
						$tempseat = $fskey['seat'];
						$tempname = $fskey['name'];
						$checkval = false;
						?>
						answers.push("<?php echo $tempseat; ?>");
   						dataTest["<?php echo $tempseat; ?>"] = 0;
   						$(listA).append('<?php echo $tempseat; ?>' +': ' + '<?php echo $tempname; ?>' + '<div id="<?php echo $tempseat; ?>"></div><BR>');

						<?php
					}	
				else if ($seatkey == $fskey['seat'] && $fskey['eaten']==1)
					{	
						$tempseat = $fskey['seat'];
						$tempname = $fskey['name'];
						$checkval = false;
						?>

						$(listA).append('<?php echo $tempseat; ?>' +': ' + '<?php echo $tempname; ?>' + '-EATEN<BR>');
						
						<?php
					}
			}
				if($checkval)
					{
					$tempseat = $seatkey;
					?>
						$(listA).append('<?php echo $tempseat; ?>' +': EMPTY<BR>');
					<?php
					}
			
	    }
    }
}
else
	header("location:index.php");

?>
} 

function processVote(vote)
{
	var voter =  vote.substring(12, 26);  
    var votenum = vote.substring(vote.length-2,vote.length).toUpperCase();
 	var checkOnce = true;
 if ($.inArray(voter, voters) != -1)
    {
    
    if (document.getElementById("once").checked == false)
        {
        checkOnce = false;
    	$('<span/>').text(voter + ': you already voted\n')
                      .appendTo(events);
    	}
    }
 
 if ($.inArray(votenum, answers) != -1 )
      {
        if (checkOnce) {
          updateArr(votenum);
          voters.push(voter);
        }
      }
      else
      $('<span/>').text(voter +': ' + votenum + ' is not a valid option\n')
                      .appendTo(events);
 
     
}

	var events;
	var listA;
    $(document).ready(function() {
      events = $('#events');
      listA = $('#list');
      checkAns();
    
    });
 
    // so console.log always works
    if (!window.console) {
      window.console = new function() {
        this.log = function(str) { /* alert(str) */ };
      };
    }
    
 
    // null defaults to the domain that this file is served from.
    var socket = new io.connect('http://node-apinzler.rhcloud.com'); 

    //socket.connect();
    
   socket.on('message', function(obj) {
      console.log('message:');
      console.log(obj);
      processVote(obj);
     });
    
    socket.on('disconnect', function(obj) {
      console.log('disconnect');
      console.log(obj);
       processVote(obj);
     
    });
  </script>

SMS your seat number choice to (402) 509-8669 or (402) 50-YUMMY <BR><BR>

<div id="list">
</div>

<BR><BR>

<div id="events2">
<pre id="events"></pre>
</div>  

<BR><BR>


  <div id="checkboxes" >
<form name="myboxes">
  <BR>
<input type="checkbox" id="once" checked/> Allow multiple votes per person<br />
</form>
</div>

</body>
</html>

