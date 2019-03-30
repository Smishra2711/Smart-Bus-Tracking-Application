<?php include "config.php"?>
<?php if (isset($_POST['save'])) {
	
		$source = $_POST['source'];
		$destination = $_POST['destination'];
		$route=$_POST['route'];
		$busno=$_POST['busno'];
		$dep_time=$_POST['dep_time'];
		$type=$_POST['type'];
		
		mysqli_query($con, "INSERT INTO `buses`(`bus_no`, `source`, `destination`, `route`, `dep_time`, `cat`) 
		             VALUES ('$busno','$source','$destination','$route','$dep_time','$type')");
		$_SESSION['message'] = "Address saved"; 
		//header('location: index.php');
		$errTyp = "success";
		$errMSG = "Successfully Entered";
		unset($source);
}
?>
<div class="container">
<hr />
<?php
			if ( isset($errMSG) ) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>
<form action="" method="POST">
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="inputEmail4">Bus No.</label>
      <input type="text" placeholder="Enter Bus No." name="busno" class="form-control">
    </div>
	<div class="form-group col-md-6">
      <label for="inputEmail4">Bus Name</label>
      <input type="text" placeholder="Departure Time (IST) 00:00" name="dep_time" class="form-control">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Source</label>
      <select id="source" name="source" class="form-control" placeholder="Party" maxlength="50">  
	<?php
            $cdquery="SELECT * FROM stops  ORDER BY id ASC";
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
            $cdquery="SELECT * FROM stops  ORDER BY id ASC";
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
  <div class="form-group">
    <label for="inputAddress">Stops</label>
    <input type="text" name="stop" placeholder="stop1,stop2,stop3,.." class="form-control" disabled>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Type</label>
      <select id="type" name="type" class="form-control">
        <option selected>Choose...</option>
		<option value="Standard">Standard</option>
        <option value="Luxury">Luxury</option>
		<option value="Express">Express</option>
		<option value="Premium">Premium</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Route</label>
      <select id="route" name="route" class="form-control" placeholder="Party" maxlength="50">  
	<?php
            $cdquery="SELECT id FROM routes  ORDER BY id ASC";
            $cdresult=mysqli_query($con,$cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());            
            while ($cdrow=mysqli_fetch_array($cdresult)) {
            $N=$cdrow["id"];
                echo "<option>
                    $N
                </option>";            
            } 
    ?>  
    </select> 
    </div>
  </div>
  <button type="submit" name="save" class="btn btn-primary">Save Data</button>
</form>