<?php
$db=mysqli_connect("localhost","id16375228_project1","?c*1GNdwh^)o+^ZE","id16375228_project")or die(mysqli_connect_error());

if(isset($_GET['back']))
{
echo ' <script language="javascript" type="text/javascript">
parent.document.location="home.php";
</script>';

}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 90%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 90%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
/*
#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}*/
</style>
</head>
<body>
<img src="admin.jpg" alt="Nature" class="responsive" width="100%" height="300">
<br><br>
<form method="GET" action="manage_patients.php">
<button type="submit" name="back" class="registerbtn">Back</button>
</form>
<center>
<h2>Patients List</h2>
</center>
<center>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Doctor names.." title="Type in a name">
<div style="overflow-x:auto;">

<table id="myTable">
  <tr class="header">
    <th style="width:60%;">Name</th>
    <th style="width:40%;">Age</th>
    <th style="width:60%;">Dob</th>
    <th style="width:40%;">Address</th>
    <th style="width:40%;">Email</th>
  </tr>
      
         <?php  
				$query=mysqli_query($db,"SELECT * FROM `patient_details` WHERE 1 ") or die(mysqli_error($conn));
                $x=1;
while($row=mysqli_fetch_array($query))
{
	$id=$row['id'];
    $name=$row['name'];
    $age=$row['age'];
	$dob=$row['dob'];
	$address=$row['address'];
	$email=$row['email'];
	
echo" <tr>
    <td>$name</td>
	<td>$age</td>
    <td>$dob</td>
    <td>$address</td>
    <td>$email</td>
    
<td><form method=\"POST\" action=\"manage_patients.php\"><input type=\"submit\" name=\"$id\" value=\"Delete\"onClick=\"document.location.reload(true)\">
	</td>
	</tr>";
	
	if((isset($_POST[$id])))
{
$query=mysqli_query($db,"DELETE FROM `patient_details` WHERE `id`= $id") or die(mysqli_error($db));
echo ' <script language="javascript" type="text/javascript">
alert("Patient ID Deeted Successfully");
parent.document.location="manage_patients.php";
</script>';
break;
}
 $x+=1;
}
?> 

      
      
  
</table>
</div>
</center>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>
</html>
