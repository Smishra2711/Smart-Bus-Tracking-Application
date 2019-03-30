<?php include 'head.php'?>
<?php include 'db.php'?>
<?php include 'headnav.php'?>
<div class="container">

<?php include 'form.php'?>
<hr/>
<?php include 'menu.php'?>


<?php
 if(isset($_GET['search']))
 {
	
			$source=$_GET['source'];
			$dest=$_GET['destination'];
			echo "<div>Source: $source<br>
					Destination : $dest</div>";
		echo "<div class='row'>";
			
	$get_route ="select * from routes where stops like '%$source%'
				and stops like '%$dest%'";
	$run_route = mysqli_query($con,$get_route);
					while($row_routes=mysqli_fetch_array($run_route))
					{
						$route_id =$row_routes['id'];
						//echo "$route_id";
						$stopname=$row_routes['stops'];
						?>
						<div class="col-sm-4">
									<img width="200" height="200" src="https://busimg.cardekho.com/n/649x396/daimler-confident-of-growth-in-indian-bus-market-2.jpg">
									
									<p >
										<p>
										<?php echo "route ->$stopname "?>
										</p>
							<?php
							$get_route1 ="select * from buses where route='$route_id'";
							$run_route1 = mysqli_query($con,$get_route1);
							while($row_bus=mysqli_fetch_array($run_route1))
							{
								$bus_no =$row_bus['bus_no'];
								
								$depart =$row_bus['dep_time'];
								
											
								echo "<font color='blue'>Bus no.</font>$bus_no 
								<font color='red'>Departure Time:</font>$depart<br>
								";
								
								}?>
						</a></p>
						</div>
			<?php	}
 }
 ?>

   
  </div>
</div>
