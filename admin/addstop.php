<?php include "config.php"?>
<?php if (isset($_POST['save'])) {
	
		$longitude = $_POST['longitude'];
		$latitude = $_POST['latitude'];
		$name=$_POST['name'];
		
		mysqli_query($con, "INSERT INTO `stops`(`name`, `longitude`, `latitude`) VALUES ('$name','$longitude','$latitude')");
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
  <div class="form-group">
    <label for="inputAddress">Name</label>
    <input type="text" name="name" placeholder="Stop Names" class="form-control">
  </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputPassword4">Latitude</label>
       <input type="text" name="latitude" placeholder="Enter Geo Location" class="form-control">   
    </div>
	<div class="form-group col-md-6">
      <label for="inputEmail4">Longitude</label>
      <input type="text" name="longitude" placeholder="Enter Geo Location" class="form-control">  
    </div>
  </div>
  
  <button type="submit" name="save" class="btn btn-primary">Save Data</button>
</form>
<table class="table table-bordered">
    <thead>
      <tr>        
        <th>STOP NAME</th>
		<th>LATITUDE</th>
		<th>LONGITUDE</th>
      </tr>
    </thead>
	<?php
             
	$sql="SELECT * FROM stops ORDER BY `latitude` ASC ";
	$result_set=mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($result_set))
	{
		?>
        <tr>
        <td><?php echo $row['name']?></a></td>
		<td><?php echo $row['latitude']?></td>
        <td><?php echo $row['longitude']?></td>
        </tr>
	<?php }?>

</div>
