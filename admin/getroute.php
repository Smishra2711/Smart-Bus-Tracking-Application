<?php
   include "config.php";
   $sql = "SELECT * FROM routes WHERE source=".$_GET['source']." AND destination=".$_GET['destination']."'"; 
   $result = $mysqli->query($con,$sql);
   $json = [];
   while($row = $result->fetch_assoc()){
        $json[$row['id']] = $row['id'];
   }
   echo json_encode($json);
?>