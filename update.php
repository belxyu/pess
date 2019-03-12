<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update</title>
	<?php  include "header.php";
if(isset($_SESSION)==false)
    session_start();
if(!isset($_SESSION['loginUsername'])) {
header('Location: login.php');
}
	?>
	<script>
		function validateForm() {
  		var x = document.forms["form1"]["patrolcarid"].value;
  if (x == "") {
    alert("HEYYYYYYY thats invalid loser");
    return false;  
  }
}
	
	</script>
</head>

<body background="picture/white-background-diamond-plate.jpg">
	<?php
	if(!isset($_POST["btnSearch"]))
	{
	
	$con=mysql_connect("localhost","jezebel","123456");
	if(!$con)
	{
		die('Cannot connect to database:' .mysql_error());
	}
	
	mysql_select_db("18_jezebel_pessdb",$con);
	$result=mysql_query("SELECT * FROM patrolcar");
	$patrolcar;
	while($row =mysql_fetch_array($result))
	{
		$patrolcar[$row['patrolcarid']]=$row['patrolcarid'];
	}
	
	mysql_close($con);
	?>
	
	<form name="form1" method="post" onsubmit="return validateForm()" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>">
<fieldset>
  <legend>Update Patrol Car</legend>
	<center>
	 <table width="30%" border="0" align="center" cellpadding="4" cellspacing="4">
		 <tr>
		 	<td width="25%" class="td_label">Patrol Car ID:</td>
			<td width="25%" class="td_Data"> <select name="patrolcarid" id="patrolcarid">
				 <?php foreach($patrolcar as $key => $value){?>
				 <option value="<?php echo $key ?>"><?php echo $value ?></option>
					 <?php }?>
				</td>
			<td class="td_Data"><input type="submit" name="btnSearch" id="btnSearch" value="Search"></td>
		 </tr>
	</table>
	</center>
</fieldset>
</form>
	<?php 
	}
		else
		{
			$con=mysql_connect("localhost","jezebel","123456");
			if(!$con)
			{
				die('Cannot connect to database:'.mysql_error());
			}
		
		mysql_select_db("18_jezebel_pessdb",$con);
	
	$sql="SELECT * FROM patrolcar WHERE patrolcarid='".$_POST['patrolcarid']."'";
	
	$result=mysql_query($sql,$con);
	
	$patrolcarid = null;
	
	$patrolStatusid = null;
	while($row=mysql_fetch_array($result))
	{
		$patrolcarid=$row['patrolcarid'];
		$patrolStatusid=$row['patrolStatusid'];
	}
	
	$sql="SELECT * FROM patrolcar_status";
	
	$result=mysql_query($sql,$con);
	
	$patrolStatusMaster;
	while($row=mysql_fetch_array($result))
	{
		$patrolStatusMaster[$row['statusid']]=$row['statusDesc'];
	}
	
	mysql_close($con);
	
	?>	
<form name="form2" method="post" onsubmit="return fkthis()" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>">		
<fieldset>
  <legend>Update Patrol Car</legend>
		
	<table width="80%" border="0" align="center" cellpadding="4" cellspacing="4">
		<tr>
				<td width="25%" class="td_label">ID:</td>
				<td width="25%" class="td_Data"><?php echo $_POST["patrolcarid"]?><input type="hidden" name="patrolcarid" id="patrolcarid" value="<?php echo $_POST["patrolcarid"]?>"></td>
		</tr>
		<tr>
			<td class="td_label">Status:</td>
			<td class="td_Data">
			<select name="patrolStatusid" id="$patrolStatusid">
				<?php foreach($patrolStatusMaster as $key =>$value){ ?>
				<option value="<?php echo $key ?>"
				<?php if($key==$patrolStatusid){?> selected="selected" <?php }?>>
					<?php echo $value ?>
				</option>
				<?php } ?>
			</select></td>
		</tr>
			
		</table>
		<br/>
		<table width="80%" border="0" align="center" cellpadding="4" cellspacing="4">
			<tr>
				<td width="46%" class="td_label"><input type="reset" name="btnCancel" id="btnCancel" value="Reset"></td>
				<td width="54%" class="td_Data">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="btnUpdate" id="btnUpdate" value="Update"></td>
			</tr>
			
		</table>
		</fieldset>
	</form>
	
	<?php }?>
<?php
	if(isset($_POST["btnUpdate"])){
		$con=mysql_connect("localhost","jezebel","123456");
		if(!$con)
		{
			die('Cannot connect to database:'.mysql_error());
		}
		mysql_select_db("18_jezebel_pessdb",$con);
		$sql="UPDATE patrolcar SET patrolStatusid='".$_POST["patrolStatusid"]."' WHERE patrolcarid='".$_POST["patrolcarid"]."' ";
		
		if(!mysql_query($sql,$con))
		{
			die('Error4:' .mysql_error());
		}
		
		if($_POST["patrolCarStatus"]=='4'){
			$sql="UPDATE dispatch SET timeArrived=NOW() WHERE timeArrived is NULL AND patrolcarid='".$_POST["patrolcarid"]."' ";
			
			if(!mysql_query($sql,$con))
			{
				die('Error4:'.mysql_error());
			}
		} 
		else if($_POST["patrolCarStatus"]=='3')
		{
			$sql="SELECT incidentid FROM dispatch WHERE timeCompleted IS NULL AND patrolcarid='".$_POST["patrolcarid"]."'";
			
			echo $sql;
			$result=mysql_query($sql,$con);
			
			$incidentid;
			while($row=mysql_fetch_array($result))
			{
				$incidentid=$row['incidentid'];
			}
			
			$sql="UPDATE dispatch SET timeCompleted=NOW() WHERE timeCompleted is NULL AND patrolcarid='".$_POST["patrolcarid"]."'";
			
			if(!mysql_query($sql,$con))
			{
				die('Error4:' .mysql_error());
			}
			
			$sql="UPDATE incident SET incidentstatusid='3' WHERE incidentid='$incidentid' AND incidentid NOT IN(SELECT incidentid FROM dispatch WHERE timeCompleted IS NULL)";
			
			if(!mysql_query($sql,$con))
			{
				die('Error5:' .mysql_error());
			}
		}
		mysql_close($con);
	?>
	<script type="text/javascript">window.location="./logcall.php";</script>
	<?php } ?>
</body>
</html>