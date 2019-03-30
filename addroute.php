<?php include "config.php"?>
<?php if (isset($_POST['save'])) {
	
		$source = $_POST['source'];
		$destination = $_POST['destination'];
		$distance=$_POST['distance'];
		$stop=$_POST['stop'];
		$price=$_POST['fare'];
		$stage=$_POST['stage'];
		
		mysqli_query($con, "INSERT INTO `routes`(`source`, `destination`, `stops`, `distance`, `stage`, `fare`)
		VALUES ('$source','$destination','$stop','$distance','$stage','$price')");
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
    <input type="text" name="stop" placeholder="stop1,stop2,stop3,.." class="form-control">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Total Distance</label>
      <input type="text" name="distance" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Total Stage</label>
      <select id="stage" name="stage" class="form-control">
        <option selected>Choose...</option>
        <option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Fare Per Stage</label>
      <input type="num" name="fare" class="form-control" id="inputZip">
    </div>
  </div>
  <button type="submit" name="save" class="btn btn-primary">Save Data</button>
</form>