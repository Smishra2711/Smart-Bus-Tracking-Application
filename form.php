<form action="#query.php" method="post" enctype="multipart/form-data">
<div class="form-row">
    <div class="form-group col-md-4">
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
    <div class="form-group col-md-4">
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
	<div class="form-group col-md-4">
      <button type="submit" name="search" class="btn btn-success">Search Buses</button>
    </div>
  </div>
</form>

<div class="container"> 
  <div id="query">
  <table class="table table-bordered">
    <thead>
      <tr>        
        <th>Rote Id</th>
        <th>Route</th>
		<th>Options</th>
      </tr>
    </thead> 
	<?php
	if ( isset($_POST['search']) ) 
	{
		$source = $_POST['source'];		
		$dest = $_POST['destination'];
		{
	        $get_route ="select * from routes where stops like '%$source%' or stops like '%$dest%'";
	        $run_route = mysqli_query($con,$get_route);
					while($row_routes=mysqli_fetch_array($run_route))
					{
						?>
					<tr>
					<td><?php echo $row_routes['id']?></td>
					<td>
				    <?php 
					$str=$row_routes['stops'];
					$arr = explode(',', $str);
					$k = strlen($str);
					for($i=0;$i<$k-1;$i++){
					echo $str[$i];
					//$i=$i+2;
					};
					?></td>
					<td>
					<button type="button" class="btn btn-primary">Check Status</button>
					<button type="button" class="btn btn-secondary"></button>
					<button type="button" class="btn btn-success">Success</button></td>
					</tr>
					<?php }
	}}
	?>