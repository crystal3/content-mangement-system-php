<?php
require 'dbinstall.php';

$connection = @mysql_connect($hostname,$userName, $userpassword);
if (!$connection) 
	{
	print("<p>Database connection failed:<br /> " . mysql_error()."</p>");
	}	
	else 
	{
	 print "<p>Database connection succeed</p>";
	}
	
$query="CREATE DATABASE $databaseName";

if (mysql_query($query,$connection))
  {
  print "<p>Database created</p>";
  }
else
  {
  print "<p>Error creating database: <br />" . mysql_error()."</p>";
  }
  
mysql_select_db($databaseName, $connection);
if (mysql_select_db($databaseName, $connection))
 {
  print "<p>The Database has been selected</p>";
  }
else
  {
  print "<p>Error selecting database: <br />" . mysql_error()."</p>";
  }

function createTable($query1){

$result1=mysql_query($query1);
if ($result1)
{
	 print "<p>The table have been created</p>";
	
	}	

	else 
	{
	print("<p>Could not create the tables:<br /> " . mysql_error()."</p>");
	}
 
}

createTable("CREATE TABLE REP
(REP_NUM CHAR(2) PRIMARY KEY,
LAST_NAME CHAR(15),
FIRST_NAME CHAR(15),
STREET CHAR(15),
CITY CHAR(15),
STATE CHAR(2),
ZIP CHAR(5),
COMMISSION DECIMAL(7,2),
RATE DECIMAL(3,2) );");



createTable("
CREATE TABLE CUSTOMER
(CUSTOMER_NUM CHAR(3) PRIMARY KEY,
CUSTOMER_NAME CHAR(35) NOT NULL,
STREET CHAR(15),
CITY CHAR(15),
STATE CHAR(2),
ZIP CHAR(5),
BALANCE DECIMAL(8,2),
CREDIT_LIMIT DECIMAL(8,2),
REP_NUM CHAR(2) );
");


createTable("
CREATE TABLE ORDERS
(ORDER_NUM CHAR(5) PRIMARY KEY,
ORDER_DATE DATE,
CUSTOMER_NUM CHAR(3) );
");



createTable("
CREATE TABLE PART
(PART_NUM CHAR(4) PRIMARY KEY,
DESCRIPTION CHAR(15),
ON_HAND DECIMAL(4,0),
CLASS CHAR(2),
WAREHOUSE CHAR(1),
PRICE DECIMAL(6,2) );
");



createTable("
CREATE TABLE ORDER_LINE
(ORDER_NUM CHAR(5),
PART_NUM CHAR(4),
NUM_ORDERED DECIMAL(3,0),
QUOTED_PRICE DECIMAL(6,2),
PRIMARY KEY (ORDER_NUM, PART_NUM) );
");


function insertInto($query2){
 $result2=mysql_query($query2) or die(mysql_error());
 if (!$result2) 
{
	die("<p>Could not add the entry:<br /> " . mysql_error()."</p>");
	}	
	else 
	{
	 print "<p>The data has been added </p>";
	}

}


insertInto("
INSERT INTO REP
VALUES
('20','Kaiser','Valerie','624 Randall','Grove','FL','33321',20542.50,0.05),
('35','Hull','Richard','532 Jackson','Sheldon','FL','33553',39216.00,0.07),
('65','Perez','Juan','1626 Taylor','Fillmore','FL','33336',23487.00,0.05);
");

insertInto("
INSERT INTO CUSTOMER
VALUES
('148','Al''s Appliance and Sport','2837 Greenway','Fillmore','FL','33336',6550.00,7500.00,'20'),
('356','Ferguson''s','382 Wildwood','Northfield','FL','33146',5785.00,7500.00,'65'),
('408','The Everything Shop','1828 Raven','Crystal','FL','33503',5285.25,5000.00,'35'),
('462','Bargains Galore','3829 Central','Grove','FL','33321',3412.00,10000.00,'65'),
('524','Kline''s','838 Ridgeland','Fillmore','FL','33336',12762.00,15000.00,'20'),
('608','Johnson''s Department Store','372 Oxford','Sheldon','FL','33553',2106.00,10000.00,'65'),
('687','Lee''s Sport and Appliance','282 Evergreen','Altonville','FL','32543',2851.00,5000.00,'35'),
('725','Deerfield''s Four Seasons','282 Columbia','Sheldon','FL','33553',248.00,7500.00,'35'),
('842','All Season','28 Lakeview','Grove','FL','33321',8221.00,7500.00,'20');

");

insertInto("
INSERT INTO ORDERS
VALUES
('21608','2007-10-20','148'),
('21610','2007-10-20','356'),
('21613','2007-10-21','408'),
('21614','2007-10-21','282'),
('21617','2007-10-23','608'),
('21619','2007-10-23','148'),
('21623','2007-10-23','608');
");

insertInto("
INSERT INTO PART
VALUES
('AT94','Iron',50,'HW','3',24.95),
('BV06','Home Gym',45,'SG','2',794.95),
('CD52','Microwave Oven',32,'AP','1',165.00),
('DL71','Cordless Drill',21,'HW','3',129.95),
('DR93','Gas Range',8,'AP','2',495.00),
('DW11','Washer',12,'AP','3',399.99),
('FD21','Stand Mixer',22,'HW','3',159.95),
('KL62','Dryer',12,'AP','1',349.95),
('KT03','Dishwasher',8,'AP','3',595.00),
('KV29','Treadmill',9,'SG','2',1390.00);
");

insertInto("
INSERT INTO ORDER_LINE
VALUES
('21608','AT94',11,21.95),
('21610','DR93',1,495.00),
('21610','DW11',1,399.99),
('21613','KL62',4,329.95),
('21614','KT03',2,595.00),
('21617','BV06',2,794.95),
('21617','CD52',4,150.00),
('21619','DR93',1,495.00),
('21623','KV29',2,1290.00);
");



mysql_close(); 
?>