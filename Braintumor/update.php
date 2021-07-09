<?php
 $report=$_GET['report'];
 
 $db=mysqli_connect("localhost","id16375228_project1","?c*1GNdwh^)o+^ZE","id16375228_project")or die(mysqli_connect_error());

                
$query=mysqli_query($db,"UPDATE `mri_scan` SET `report`='$report' WHERE 1 ") or die(mysqli_error($conn));
echo "ok";
?>
