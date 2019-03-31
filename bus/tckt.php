<?php include "../db.php"?>
<?php 
static $avl=72;
if(isset($_GET['bookticket']))
{
	$qty=$_GET['qty'];
	$avl=$avl-$qty;
	$route=$_COOKIE['route'];	
	$qty=$_COOKIE['qty']+$qty;
	setcookie("qty",$qty,time()+(86400*1));
	$bus_no='50';
    mysqli_query($con, "UPDATE `busstatus` SET av_seat='$qty' WHERE bus_no='$bus_no'");
}
?>
<div class="container">
<br>
<h3>Welcome, Conductor 1</h3>
<p>Bus No:<?php echo $_COOKIE['bus_no'];?></p>
<hr/>
<form action="" method="get">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Source</label>
      <select id="source" name="source" class="form-control" placeholder="Party" maxlength="50">  
	<?php
            $cdquery="SELECT * FROM stops";
            $cdresult=mysqli_query($con,$cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());            
            while ($cdrow=mysqli_fetch_array($cdresult)) {
            $N=$cdrow["name"];
                echo "<option>
                    $N
                </option>";            
            } 
    ?>  
    </select> 
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Destination</label>
      <select id="destination" name="destination" class="form-control" placeholder="Party" maxlength="50">  
	<?php
            $cdquery="SELECT * FROM stops";
            $cdresult=mysqli_query($con,$cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());            
            while ($cdrow=mysqli_fetch_array($cdresult)) {
            $N=$cdrow["name"];
                echo "<option>
                    $N
                </option>";            
            } 
    ?>  
    </select> 
    </div>
  </div>
  
  <div class="form-row">
  <div class="form-group col-md-2">
      <label for="inputZip">Total Passenger Qty.</label>
      <input type="number" name="qty" class="form-control" id="inputZip">
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">Total Fare</label>
      <input type="text" name="fare" class="form-control" id="inputCity">
    </div>
    
    
  </div>
  <button type="submit" name="bookticket" class="btn btn-primary">Book</button>
</form>
</div>
<div class="container">
<table class="table table-bordered">
<tr>
<td>Source</td>
<td>Destination</td>
<td>Seat Available</td>
</tr>
<tr>
<td><?php echo $_COOKIE['bus_source']?></td>
<td><?php echo $_COOKIE['bus_dest'];?></td>
<td><?php echo 72-$qty?></td>
</tr>
</table>
</div>