<?php include '../db.php';
$page= $_SERVER['PHP_SELF'];
$sec="3";

?>
<?php 
$clat=$_COOKIE['lat'];
$clong=$_COOKIE['long'];
$bus_no = $_COOKIE['bus_no'];
$query=mysqli_query($con, "UPDATE `busstatus` SET longitude='$clong',latitude='$clat' WHERE bus_no='$bus_no'");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="<?php echo $sec ?>;URL='<?php echo $page ?>'"></meta>
</head>
<body onload="getLocation()">

<p id="demo"></p>

<script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}
function showPosition(position) {
	var latitude = position.coords.latitude;
	var longitude = position.coords.longitude;
  x.innerHTML = "Latitude: " + latitude + 
  "<br>Longitude: " + longitude;
   setCookie("lat",latitude, 30);
   setCookie("long",longitude, 30);
   
}

function setCookie(cname,cvalue,exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires=" + d.toGMTString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
</script>
</body>
</html>