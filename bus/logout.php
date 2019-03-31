<?php
include "../db.php";
$bus_no=$_COOKIE['bus_no'];
$sql="DELETE FROM `busstatus` WHERE `busstatus`.`bus_no`= '$bus_no'";
$query=mysqli_query($con,$sql);
echo "Session lOgout Successfull";
?>