<!DOCTYPE html>
<html>
<head>
<title>Logcall</title>
	
<?php  include "header.php";

if(isset($_SESSION)==false)
    session_start();
if(!isset($_SESSION['loginUsername'])) {
header('Location: login.php');
}
	$con=mysql_connect("localhost","jezebel","123456");
	if(!$con)
	{
		die('Cannot connect to database:' .mysql_error());
	}
	mysql_select_db("18_jezebel_pessdb",$con);
	$result=mysql_query("SELECT * FROM incidenttype");
	$incidentType;
	while($row =mysql_fetch_array($result))
	{
		$incidentType[$row['incidentTypeid']]=$row['incidentTypeDesc'];
	}
	
	mysql_close($con);
	?>
	
	<script>
		function validateForm() {
  var x = document.forms["myForm"]["callerName"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
		}
		
		function validateForm() {
  var x = document.forms["myForm"]["contactNum"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
		}
		function validateForm() {
  var x = document.forms["myForm"]["location"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
		}
		
		function validateForm() {
  var x = document.forms["myForm"]["incidentDesc"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
		}
		
	</script>

</head>
<body background="picture/white-background-diamond-plate.jpg">
	<?php
	$con=mysql_connect("localhost","jezebel","123456");
	if(!$con)
	{
		die('Cannot connect to database:' .mysql_error());
	}
	
	mysql_select_db("18_jezebel_pessdb",$con);
	$result=mysql_query("SELECT * FROM incidenttype");
	$incidentType;
	while($row =mysql_fetch_array($result))
	{
		$incidentType[$row['incidentTypeid']]=$row['incidentTypeDesc'];
	}
	
	mysql_close($con);
	?>


<div style="padding-left:16px">

</div>
<br>
<form name="myForm" method="post" onsubmit="return validateForm()" action="dispatch.php">
  <fieldset>
    <legend>Log Call:</legend>
	 <center>
	 <table>
		 <tr>
				 <td align="right">Caller Name:</td>
				 <td><p><input type="text" name="callerName" ></p></td>	
		 </tr>
		 <tr>
			 <td align="right">Contact Number:</td>
			 <td><p><input type="text" name="contactNum"></p></td>	
		 </tr>
		 <tr>
			 <td align="right">Location:</td>
			 <td><p><input type="text" name="location" ></p></td>	
		 </tr>
		 <tr>
			 <td class="td_label">Incident Type:</td>
			 <td class="td_Date"> 	
				 <select name="incidentType" id="incidentType">
				 <?php foreach($incidentType as $key => $value){?>
				 <option value="<?php echo $key ?>"><?php echo $value ?></option>
					 <?php }?>
				 </select>
	  		</td>
		</tr>
		<tr>
			<td align="right">Description</td>
			<td><p><input type="text" rows="4" cols="50" name="incidentDesc" ></p></td>
		</tr>
		 <tr>
			 <td align="center"><button type="reset" value="Reset">Reset</button></td>
			<td align="center"><button type="submit" value="Process Call" name="btnprocessCall">Process Call</button></td>
		 </tr>
  </fieldset>
</center> 
</form>



</body>
</html>