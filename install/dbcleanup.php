<html>
<head>
<title>Delete Database</title>
</head>
<body>
<h1>Delete Database</h1>
<h2 align="left">Please insert:</h2>
<form name="delete" method="post" action="dbcleanup.php">

<table width="600">
<tr>
<td>HostName:</td>
<td><input type="text" name="hostname" value="localhost" /></td>
</tr>
<tr>
<td>Username:</td>
<td><input type="text" name="userName" maxlength="8" />
</td>
</tr>
<tr>
<td>Password:</td>
<td><input type="password" name="userpassword" maxlength="8" />
</td></tr>
<tr>
<td>Database Name:</td>
<td><input type="text" name="databaseName" maxlength="8" />
</td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="delete" value="Submit" />
</td>
</tr>
</table>
</form>
<hr />

<?php
if (isset ($_POST['delete']))
{ 
$problem=FALSE;
$hostname=$_POST['hostname'];
$databaseName=$_POST['databaseName'];
$userName=$_POST['userName'];
$userpassword=$_POST['userpassword'];
$userName = trim($userName);
$userpassword = trim($userpassword);
$userName = stripslashes($userName);
$userpassword = stripslashes($userpassword);
$userName = mysql_real_escape_string($userName);
$userpassword = mysql_real_escape_string($userpassword);

if (empty($hostname))
{
$problem=TRUE;
print ("<p>Please enter a hostname!</p>");
}

if (empty($userName))
{
$problem=TRUE;
print ("<p>Please enter a username!<p/>");
}

if (empty($databaseName))
{
$problem=TRUE;
print ("<p>Please enter a name of the database!</p>");
}
if (!$problem)
{
print ("<p>You successfully entered all information!</p>");


$connection = mysql_connect($hostname,$userName, $userpassword);
if (!$connection) 
	{
	print("<p>Database connection failed:<br /> " . mysql_error()."</p>");
	}	
	else 
	{
	 print "<p>Database connection succeed</p>";
	}
	
$result2 =mysql_select_db($databaseName, $connection);

if ($result2)
 {
  print "<p>The Database has been selected</p>";
  }
else
  {
  print "<p>Error selecting database: <br />" . mysql_error()."</p>";
  }


$query1 = "Drop database $databaseName";
$result1 = mysql_query($query1, $connection);
if (!$result1) 
	{
	die("<p>Cannot drop database:<br /> " . mysql_error()."</p>");
	}	
	else 
	{
	 print "<p>Database has been deleted</p>";
	}
}
mysql_close(); 
}

?>
</body>
</html>