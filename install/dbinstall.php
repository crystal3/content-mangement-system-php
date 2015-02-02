
<html>
<head>
<title>Database install</title>
</head>
<body>
<h2 align="left">Please insert:</h2>

<form name="database" method="post" action="createdb.php">
<table  width="400">
<tr>
<td>HostName:</td>
<td><input type="text" name="hostname" value="localhost" /></td>
</tr>
<tr>
<td>Database Name:</td>
<td><input type="text" name="databaseName" maxlength="8" />
</td>
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
<td></td>
<td><input type="submit" name="insert" value="Submit" />
</td>
</tr>
</table>
</form>
<hr />


<?php
if (isset ($_POST['insert']))
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
}
}

?>
 </body>
 </html>