<?php
$con=mysqli_connect("localhost","id16375228_project1","?c*1GNdwh^)o+^ZE","id16375228_project")or die(mysqli_connect_error());

if(isset($_POST['submit'])){
if(!empty($_POST['check_list'])) {
    
   
    
// Counting number of checked checkboxes.
$checked_count = count($_POST['check_list']);
//echo "You have selected following ".$checked_count." option(s): <br/>";
// Loop to store and display values of individual checked checkbox.
$v1=[6];
$v1[0]="";
$v1[1]="";
$v1[2]="";
$v1[3]="";
$v1[4]="";
$v1[5]="";
$i=0;
foreach($_POST['check_list'] as $selected) {
$v1[$i]=$selected;

//echo "<p>".$v1[$i] ."</p>";
$i+=1;
}

$c1=0;
$c2=0;
$c3=0;
$c4=0;

$c5=0;
$c6=0;
//echo $v1[2];
for($x=0;$x<4;$x++)
{
    if($v1[$x]=="One")
    {
        $c1=1;
        
    }
    
    if($v1[$x]=="Two")
    {
        $c2=1;
        
    }
    if($v1[$x]=="Three")
    {
        $c3=1;
        
    }
    if($v1[$x]=="Four")
    {
        $c4=1;
        
    }
    if($v1[$x]=="Five")
    {
        $c5=1;
        
    }
    if($v1[$x]=="Six")
    {
        $c6=1;
        
    }
    

    
}

//echo "<br>values are <br>$c1<br>$c2<br>$c3<br>$c4<br>$c5<br>$c6<br>";
$d1=0;
$d2=0;
$d3=0;

$b1=0;
if(($c1==1)||($c2==1))
{
    $d1=1;
    
}
if(($c3==1)||($c4==1))
{
    $d2=1;
    
}
if(($c5==1)||($c6==1))
{
    $d3=1;
    
}
//echo "<br>values are <br>$d1<br>$d2<br>$d3<br><br>";


if(($d3==0)&&($d2==0)&&($d1==1))
{
    $b1=1;
}

else if(($d3==0)&&($d2==1)&&($d1==0))
{
    $b1=2;
}

else if(($d3==0)&&($d2==1)&&($d1==1))
{
    $b1=3;
}

else if(($d3==1)&&($d2==0)&&($d1==0))
{
    $b1=4;
}

else if(($d3==1)&&($d2==0)&&($d1==1))
{
    $b1=5;
}

else if(($d3==1)&&($d2==1)&&($d1==0))
{
    $b1=6;
}

else if(($d3==1)&&($d2==1)&&($d1==1))
{
    $b1=7;
}

if($b1==1)
{
    
    $sug="Take Crocin tablet for two days and observe yourself, if you have headache continously, then contact Doctors";
    
}
if($b1==2)
{
    
    $sug="Take the combination of tablet Afinitor and lombustine for One day and observe yourself, if you have headache continously, then contact Doctors immediately";
    
}

if($b1==3)
{
    
    $sug="These symptoms seems harmfull, the better way is to have conversation with your doctor, if it takes more time then take the combination of tablet Temozolomide and Curmustine and then went to hospital";
    
}

if($b1==4)
{
    
    $sug="Take the Multivitamin tablet for One days and observe yourself, if you have this Problem continously, then contact Doctors immediately";
    
}


if($b1==5)
{
    
    $sug="Take Crocin tablet and Multivitamin tablet for One day and observe yourself, if you have Headache and imbalance continously, then contact Doctors immediately";
    
}


if($b1==6)
{
    
    $sug="These symptoms seems harmfull, the better way is to have conversation with your doctor, if it takes more time then take the combination of tablet Everolimus and Naxitamab-gqgk and then went to hospital";
    
}


if($b1==7)
{
    
    $sug="Went To hospital immediately you should need to take MRI scan and then only you can able to get treatment";
    
}
/*
echo "<br/><b>Note :</b> <span>Similarily, You Can Also Perform CRUD Operations using These Selected Values.</span>";
echo "<br/><b>$b1";

echo "<br/><b>$sug";
  */
   $db=mysqli_connect("localhost","id16375228_project1","?c*1GNdwh^)o+^ZE","id16375228_project")or die(mysqli_connect_error());

                
$query=mysqli_query($db,"UPDATE `suggestion` SET `data`='$sug' WHERE 1 ") or die(mysqli_error($conn));

echo ' <script language="javascript" type="text/javascript">
parent.document.location="result.php";
</script>';
}
else{
echo "<b>Please Select Atleast One Option.</b>";

    
    
}

    
    
}

if(isset($_GET['back']))
{
echo ' <script language="javascript" type="text/javascript">
parent.document.location="home.php";
</script>';

}
?>
<html>
    <style>
/* The container */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 80%;
  border-radius: 5px;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

img {
  border-radius: 5px 5px 0 0;
}

.container1 {
  padding: 2px 16px;
  font-size="10%";
}
/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}
/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
</style>
    <body>
<img src="dc.jpg" alt="Nature" class="responsive" width="100%" height="300">
<br><br>
<form method="GET" action="suggestions.php">
<button type="submit" name="back" class="registerbtn">Back</button>
</form>
<br><br>
<center>
<div class="card">
  <div class="container1">
   
<form method="POST" action="suggestions.php">

<h2>Choose Symptoms</h2><br><br>
<label class="container">New onset or change in pattern of headaches
  <input type="checkbox" name="check_list[]" value="One" checked="checked">
  <span class="checkmark"></span>
</label><br>
<label class="container">Headaches that gradually become more frequent and more severe
  <input type="checkbox" name="check_list[]" value="Two">
  <span class="checkmark"></span>
</label><br>
<label class="container">Unexplained nausea or vomiting
  <input type="checkbox" name="check_list[]" value="Three">
  <span class="checkmark"></span>
</label><br>
<label class="container">Vision problems, such as blurred vision, double vision or loss of peripheral vision
  <input type="checkbox" name="check_list[]" value="Four">
  <span class="checkmark"></span>
</label><br>

<label class="container">Gradual loss of sensation or movement in an arm or a leg
  <input type="checkbox" name="check_list[]" value="Five">
  <span class="checkmark"></span>
</label><br>

<label class="container">Difficulty with balance
  <input type="checkbox" name="check_list[]" value="Six">
  <span class="checkmark"></span>
</label><br><br>

<input type="submit" name="submit" Value="Submit"/>
<br><br>
</form>

</div></div>
</center>
</body>
</html>