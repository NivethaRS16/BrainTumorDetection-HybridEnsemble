<?php
$db=mysqli_connect("localhost","id16375228_project1","?c*1GNdwh^)o+^ZE","id16375228_project")or die(mysqli_connect_error());

if(isset($_GET['back']))
{
echo ' <script language="javascript" type="text/javascript">
parent.document.location="home.php";
</script>';    
}

$query=mysqli_query($db,"SELECT * FROM `mri_scan` WHERE 1 ") or die(mysqli_error($db));
$row1=mysqli_fetch_array($query);

$mri_val=$row1['mri_val'];

echo "a".$mri_val."b";
?>