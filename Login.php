<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>login</title>
	<?php  include "header.php"; ?>
</head>

<body background="picture/white-background-diamond-plate.jpg">
<?php
if(isset($_SESSION) == false)
{
	session_start();
}
if(isset($_SESSION["loginUsername"]))
{
	header("location: welcome.php");
}
if(isset($_POST['btnSubmitteds']))
	{
		$con=mysql_connect("localhost","jezebel","123456");
		if(!$con)
			die("Cannot connect to database:" .mysql_error());
		mysql_select_db("18_jezebel_pessdb" ,$con);
		
		$sql="SELECT * FROM login" ;
	
		if(!mysql_query($sql,$con))
			die ("Error:" .mysql_error());
	
		if(isset($_SESSION['loginUsername']))
		{};

		$con=mysql_connect('localhost','jezebel','123456');
	
		mysql_select_db('18_jezebel_pessdb' ,$con);
	
		$username =$_POST['username'];
		$password =$_POST['password'];
	
		$sql= "Select * FROM login WHERE loginUsername= '$username' && loginPassword='$password'" ;
	
		$result =mysql_query($sql);
		$obj = mysql_fetch_object($result);
		
		if($obj==null)
		{
			echo "<center><h1>Invalid Username or password!</h1></center>" ;	
		}
		else{
			
			$_SESSION['loginUsername']=$username;
			$_SESSION['loginUsername'] = $_POST['username'];
			
		}
	
		mysql_close($con);
	}
	
?>
	<script>
		function validateForm() {
  var x = document.forms["myFormsigns"]["username"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
		}
		
		function validateForm() {
  var x = document.forms["myFormsigns"]["password"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
	</script>


<div style="padding-left:16px">

</div>
<br>
<form name="myFormsigns" method="post" onsubmit="return validateForm()" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?> ">
  <fieldset>
    <legend>Sign In:</legend>
	 <center>
	 <table>
		 <tr>
			 <td align="right">Username</td>
				 <td><p><input type="text" name="username" ></p></td>	
		 </tr>
		 <tr>
			 <td align="right">Password:</td>
			 <td><p><input type="password" name="password"></p></td>	
		 </tr>
		
		  <table width="15%" border="0" align="center" cellpadding="4" cellspacing="4">
			 <td width="54%"><input type="submit" name="btnSubmitteds" id="btnSubmitteds" value="Submit">
			 </td>
		 	
		 </table>
  </fieldset>
</center> 
</form>
</body>
</html>