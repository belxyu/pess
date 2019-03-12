<?php
if(isset($_POST['btnprocessCall']))
	{
		$con=mysql_connect("localhost","jezebel","123456");
		if(!$con)
			die("Cannot connect to database:" .mysql_error());
		mysql_select_db("18_jezebel_pessdb" ,$con);
		
		$sql="INSERT INTO incident(callerName, phoneNumber,incidentTypeid,incidentLocation,incidentDesc,incidentStatusid) VALUES ('$_POST[callerName]','$_POST[contactNum]','$_POST[incidentType]','$_POST[location]','$_POST[incidentDesc]','1')" ;
		
		if(!mysql_query($sql,$con))
			die ("Error:" .mysql_error());
		
		mysql_close($con);
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dispatch</title>
	<?php  include "header.php";
	
	
	$con=mysql_connect("localhost","jezebel","123456");
	if(!$con)
	{
		die('Cannot connect to database:'.mysql_error());
	}
	
	mysql_select_db("18_jezebel_pessdb" ,$con);
	
	$sql="SELECT patrolcarid,statusDesc FROM patrolcar JOIN patrolcar_status ON patrolcar.patrolStatusId=patrolcar_status.statusid WHERE patrolcar.patrolStatusid='2' OR patrolcar.patrolStatusid='3'";
	
	$result=mysql_query($sql,$con);
	
	$incidentArray;
	$count=0;
	
	while($row=mysql_fetch_array($result))
	{
		$patrolcarArray[$count]=$row;
		$count++;
	}
	
	if(!mysql_query($sql,$con))
	{
		die('Error:'.mysql_error());
	}
	
	if(isset($_POST["btnSubmit"]))
	{
		$con= mysql_connect("localhost","jezebel","123456");
		if(!$con)
		{
			die('Cannot connect to database:'.mysql_error());
		}
		
		mysql_select_db("18_jezebel_pessdb",$con);
		
		$patrolcarDispatched=$_POST["chkPatrolcar"];
		
		$c=count($patrolcarDispatched);
		
		$status;
		
		if($c>0)
		{
			$status='2';
		}
		
		else
		{
			$status='1';
		}
		$sql="INSERT INTO incident(callerName, phoneNumber,incidentTypeid,incidentLocation,incidentDesc,incidentStatusid) VALUES ('".$_POST['callerName']."','".$_POST['contactNum']."','".$_POST['incidentType']."','".$_POST['location']."','".$_POST['incidentDesc']."','$status')" ;
		
		if(!mysql_query($sql,$con))
		{
			die('Error1:'.mysql_error());
		}
		$incidentid=mysql_insert_id($con);;
		
		for($i=0; $i<$c; $i++)
		{
			$sql="UPDATE patrolcar SET patrolStatusid='1' WHERE patrolcarid='$patrolcarDispatched[$i]'";
			
				if(!mysql_query($sql,$con))
				{
					die('Error2:'.mysql_error());
				}
			
			$sql="INSERT INTO dispatch(incidentid,patrolcarid,timeDispatched)VALUES('$incidentid','$patrolcarDispatched[$i]',NOW())";
			
			if(!mysql_query($sql,$con))
			{
				die('Error 3:'.mysql_error());
			}
		}
	}
	
	mysql_close($con);
	
	?>
	</head>

<body background="picture/white-background-diamond-plate.jpg">
	<form name="myForm" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>">
<fieldset>
    <legend>Dispatch Patrol Cars</legend>
	 <center>
		 <table>
			<tr>
		 	<td>
				Caller's Name: 
			</td>
			<td>
			<?php echo $_POST["callerName"]; ?>
			<input type="hidden" name="callerName" id="callerName" value="<?php echo $_POST["callerName"]; ?>" >
 			</td>
			</tr>
			<tr>
			<td>
			 	Contact No.  :
			</td>
			<td>
			<?php echo $_POST["contactNum"]; ?>
			<input type="hidden" name="contactNum" id="contactNum" value="<?php echo $_POST["contactNum"]; ?>" >
			</td>
			</tr>
			<tr>
			<td>
			 	Location :
			</td>
			<td>
			<?php echo $_POST["location"]; ?>
			<input type="hidden" name="location" id="location" value="<?php echo $_POST["location"]; ?>" >
			</td>
			</tr>
			<tr>
			<td>
			 	Incident Type : 
			</td>
			<td>
			<?php echo $_POST["incidentType"]; ?>
			<?php echo $_POST["incidentType"]; ?>
			<input type="hidden" name="incidentType" id="incidentType" value="<?php echo $_POST["incidentType"]; ?>" >
			</td>
			</tr>
			<tr>
			<td>
     			Description : 
			</td>
			<td>
			<h2>
			<?php echo $_POST["incidentDesc"]; ?>
			<input type="hidden" name="incidentDesc" id="incidentDesc" value="<?php echo $_POST["incidentDesc"]; ?>" readonly >
			</h2>
			</td>
			</tr>
		 </table>
		 <table width="40%" border="1" align="center" cellpadding="4" cellspacing="8">
		 <tr>
			<td width="20%">&nbsp;</td>	 
			<td width="51%">Patrol Car ID</td>
			<td width="29%">Status</td>
		 </tr>
			 
		<?php
			 $i=0;
			 while($i<$count){ 
			 ?>
			 <tr>
			 	<td class="td_label"><input type="checkbox" name="chkPatrolcar[]" value="<?php echo $patrolcarArray[$i]['patrolcarid']?>"></td>
				 <td><?php echo $patrolcarArray[$i]['patrolcarid']?></td>
				 <td><?php echo $patrolcarArray[$i]['statusDesc']?></td>
			 </tr>
				 
			 <?php $i++;
			 } ?>
			 
		 </table>
		 <table width="15%" border="0" align="center" cellpadding="4" cellspacing="4">
			 <td width="40%" class="td_label"><input type="reset" name="btnCancel" id="btnCancel" value="Reset"></td>
			 <td width="54%" class="td_Data">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="btnSubmit" id="btnSubmit" value="Submit">
			 </td>
		 	
		 </table>
	</center>
</fieldset>
		</form>
</body>
</html>
