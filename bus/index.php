<?php if(isset($_COOKIE['bus_no'])){
	header('Location:dashboard.php');
}else{
	header('Location:login.php');
}
