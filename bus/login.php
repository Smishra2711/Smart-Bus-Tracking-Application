<?php include "../db.php"?>
<?php include "../head.php"?>
<?php 
if(isset($_GET['startbus']))
{
	$bus_no=$_GET['bus_no'];
    $qry_run=mysqli_query($con, "select * from buses WHERE bus_no='$bus_no'");
	$row = mysqli_fetch_array($qry_run);
	$bus_source = $row['source'];
	$bus_dest=$row['destination'];
	$route=$row['route'];
	setcookie("bus_no",$bus_no,time()+(86400*1));
	setcookie("bus_source",$bus_source,time()+(86400*1));
	setcookie("bus_dest",$bus_dest,time()+(86400*1));
	setcookie("route",$route,time()+(86400*1));
	setcookie("qty",'0',time()+(86400*1));
	//$bus_no='50';
	//$source=$_COOKIE['bus_source'];
    $qry = "select * from stops where name='$bus_source'";
	$qry_run= mysqli_query($con,$qry);
	while($row=mysqli_fetch_array($qry_run))
	{	
		$long=$row['longitude'];
		$lat=$row['latitude'];		
	}
    $av_seat='72';
    $status='departed';
//setcookie('bus_no', $bus_no, time() + (86400 * 30), "/"); // 86400 = 1 day
mysqli_query($con, "INSERT INTO `busstatus`(`bus_no`, `longitude`, `latitude`, `av_seat`, `status`) 
                    VALUES ('$bus_no','$long','$lat','$av_seat','$status')");
	header('Location:dashboard.php');
}
?>
<div class="container">
<br>
<h3>Welcome, Conductor 1</h3>
<hr/>
<form action="" method="get">
  <div class="form-row">
   
    <div class="form-group col-md-6">
      <label for="inputPassword4">Bus Number</label>
      <select id="destination" name="bus_no" class="form-control" placeholder="Party" maxlength="50">  
	<?php
            $cdquery="SELECT * FROM buses  ORDER BY id ASC";
            $cdresult=mysqli_query($con,$cdquery) or die ("Query to get data from firsttable failed: ".mysqli_error());            
            while ($cdrow=mysqli_fetch_array($cdresult)) {
            $N=$cdrow["bus_no"];
                echo "<option>
                    $N
                </option>";            
            } 
    ?>  
    </select> 
    </div>
  </div>
  

  <button type="submit" name="startbus" class="btn btn-primary">Start</button>
</form>
</div>
