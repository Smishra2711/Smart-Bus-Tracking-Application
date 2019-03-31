<?php include "config.php"?>
<?php if (isset($_POST['save'])) {
	
	    $error = false;
		$source = $_POST['source'];
		$destination = $_POST['destination'];
		$route=$_POST['route'];
		$busno=$_POST['busno'];
		$dep_time=$_POST['dep_time'];
		$type=$_POST['type'];
		
		// basic awb validation
            $cdquery1="SELECT * FROM routes  ORDER BY id ASC";
            $cdresult1=mysqli_query($con,$cdquery1) or die ("Query to get data from firsttable failed: ".mysql_error()); 
			$cdrow1=mysqli_fetch_array($cdresult1);
		if ($source!=$cdrow1['source'] and $destination!=$cdrow1['destination']) {
			$error = true;
			$routeError = "Please enter your Select Proper Route.";
		}if (empty($dep_time)) {
			$error = true;
			$awbError = "Please enter your Departure Time.";
		}
		if(!$error ) {
			$query="INSERT INTO `buses`(`bus_no`, `source`, `destination`, `route`, `dep_time`, `cat`) 
		             VALUES ('$busno','$source','$destination','$route','$dep_time','$type')";
		$res=mysqli_query($con,"INSERT INTO `buses`(`bus_no`, `source`, `destination`, `route`, `dep_time`, `cat`) 
		             VALUES ('$busno','$source','$destination','$route','$dep_time','$type')" );
	
		//header('location: index.php');
		if ($res) {
				$errTyp = "success";
				$errMSG = "Successfully Entered";  
					unset($source);
					unset($destination);
					unset($route);
					unset($bus_no);
					unset($dep_time);
			} else {
				$errTyp = "danger";
				$errMSG = "Something went wrong, try again later...";	
			}
}}
?>
<script>
$( "select[name='source']" ).change(function () {
    var stateID = $(this).val();
    if(stateID) {
        $.ajax({
            url: "getroute.php",
            dataType: 'Json',
            data: {'id':stateID},
            success: function(data) {
                $('select[name="route"]').empty();
                $.each(data, function(key, value) {
                    $('select[name="route"]').append('<option value="'+ key +'">'+ value +'</option>');
                });
            }
        });
    }else{
        $('select[name="route"]').empty();
    }
});
</script>
<div class="container">
<h3>Add Bus</h3>
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