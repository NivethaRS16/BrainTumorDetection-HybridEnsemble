<?php
$db=mysqli_connect("localhost","id16375228_project1","?c*1GNdwh^)o+^ZE","id16375228_project")or die(mysqli_connect_error());

if(isset($_GET['back']))
{
echo ' <script language="javascript" type="text/javascript">
parent.document.location="suggestions.php";
</script>';

}

 $query=mysqli_query($db,"SELECT * FROM `suggestion` WHERE 1 ") or die(mysqli_error($db));
             $row1=mysqli_fetch_array($query);
		        $data=$row1['data'];
		    
?>
<html>
           
        <style>
	.blink{
		color: #fff;
		 font-size: 50px;
		padding: 70px;
		display: inline-block;
		border-radius: 5px;
		animation: blinkingBackground 2s infinite;
	}
	@keyframes blinkingBackground{
		0%		{ background-color: #10c018;}
		25%		{ background-color: #1056c0;}
		50%		{ background-color: #ef0a1a;}
		75%		{ background-color: #254878;}
		100%	        { background-color: #04a1d5;}
	}
	.label1{
    float:left;
    padding-left:25%;
    width:100%;
}
</style>
        
    <body>
<img src="dc.jpg" alt="Nature" class="responsive" width="100%" height="300">
<br><br>
<form method="GET" action="result.php">
<button type="submit" name="back" class="registerbtn">Back</button>
</form>
<br><br>
<center>
<?php    echo "<label1>
	<p class=\"blink\">$data </p></label1><br><br><br><br>";
	?>
	
    </center>
</body>
</html>