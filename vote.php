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
	$seats = array("1A", "1B", "1C", "1D","2A", "2B", "2C", "2D","3A", "3B", "3C", "3D");
	$query = "select * from $tbl_name where flight = '$flight';";
	$result = mysql_query($query);
	$rowcount =  mysql_num_rows($result);

	if($rowcount==0)
	{
		header("location:flight.php?flight=".$flight);
	}
	else
	{	
		include "lib/header.php";
		?>



 <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="http://node-apinzler.rhcloud.com/socket.io/socket.io.js"></script>

  <script>

var dataTest = [];
var answers = [];
var voters = [];
var flight = "<?php echo $flight; ?>";
var voteCount=0;

  function updateArr(seat, voter) {
    dataTest[seat][0]++;
    voteCount++;
    document.getElementById(seat).innerHTML=dataTest[seat][0];
    $.post("twitter.php", { handle: dataTest[seat][1], flight: flight, number: voter } );
        
  }
        
function checkAns() {
  
  var str = "<?php echo $flight; ?>";
  
  // $(listA).append('<strong>'+ str + '</strong><BR><BR>');
    
<?php
		$divrows = "";
		$filledseats = array();
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		      $filledseats[] = array(
		      'name' => $row['name'],
		      'seat' => $row['seat'],
		      'image' => $row['image'],
		      'option1' => $row['option1'],
		      'option2' => $row['option2'],
		      'notes' => $row['notes'],
		      'eaten' => $row['eaten'],
		      'twitter' => $row['twitter']
		      );
		}
		$countseats = 1;
		$firstrow=true;	
		foreach ($seats as $seatkey) {
			$checkval = true;
			
					if($countseats==1)
				   		$divrows.='<div class="row"><div class="span2 seat" href="#"><h1 class="seat-overlay">'; 
					if($countseats==2)
						$divrows.='<div class="span2 seat" href="#"><h1 class="seat-overlay">';
					if($countseats==3)
						$divrows.='<div class="span2 offset2 seat" href="#"><h1 class="seat-overlay">';
					if($countseats==4)
						$divrows.='<div class="span2 seat" href="#"><h1 class="seat-overlay">';
					

			foreach ($filledseats as $fskey) {
				if($seatkey == $fskey['seat'] && $fskey['eaten']==0)
					{
						$tempseat = $fskey['seat'];
						$tempname = $fskey['name'];
						$tempimage = $fskey['image'];
						if ($fskey['twitter'] != "")
							$handle = $fskey['twitter'];
						else $handle = $tempname;
						$checkval = false;
						?>
						
   						answers.push("<?php echo $tempseat; ?>");
   						dataTest["<?php echo $tempseat; ?>"] = [0, "<?php echo $handle; ?>", "<?php echo $tempname; ?>", "<?php echo $tempimage; ?>"];
   						
						<?php
						$divrows=$divrows.$tempseat.' - <div id="'.$tempseat.'">0</div></h1><img src="'.$tempimage.'" /></div>';
   						
					}	
				else if ($seatkey == $fskey['seat'] && $fskey['eaten']==1)
					{	
						$tempseat = $fskey['seat'];
						$tempname = $fskey['name'];
						$checkval = false;
						?>

						<?php
						$divrows= $divrows.$tempseat.'</h1><img src="'.$tempimage.'" /><img class="skull" src="/img/skull_140x140.png" /></div>';

					}
			}
				if($checkval)
					{
					$tempseat = $seatkey;
					
						$divrows = $divrows.$tempseat.'- EMPTY<BR><BR><BR></h1></div>';
						
					}

				if($countseats==4)
						{
						$divrows.='</div>';
						}
				if($countseats==4 && $firstrow)
				{
					$firstrow=false;
					$divrows.='<div class="row"><div class="span4" style="border-bottom:5px solid #E64395; margin-bottom:2em; "></div><div class="span4 offset2" style="border-bottom:5px solid #E64395; margin-bottom:2em; "></div></div>';
				}

				$countseats++;
				if($countseats==5)
					$countseats=1;
				

			
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
          updateArr(votenum, voter);
          voters.push(voter);
          }
      }
      else
      $('<span/>').text(voter +': ' + votenum + ' is not a valid option\n')
                      .appendTo(events);
 
     
}

function endvote() 
{
		var tempIndex = "";
		var highscore = -1;
		for(var index in dataTest) {
		if (dataTest[index][0] > highscore)
		{
			tempIndex=index;
			highscore = dataTest[index][0] 
		}
		}
		alert(dataTest[tempIndex][2] + " wins!  That's some good eatin'!");
		$.post("twitter.php", { handle: dataTest[tempIndex][1], flight: flight, win: tempIndex } );

		window.location.href = "flight.php?flight="+flight;
		

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
 <div id="main" class="container">
<div class="row">
		<div class="span10" style="margin-bottom:2em; "><p class="well">SMS your seat number choice to (402) 509-8669 or (402) 50-YUMMY</p></div>
		
		</div>

 
<div id="list">
<?php echo $divrows; ?>
</div>

<BR><BR>
	<button onclick="endvote()">End Voting!</button>
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

</div><!-- /container -->
    

<?php 
include "lib/footer.php";
?>