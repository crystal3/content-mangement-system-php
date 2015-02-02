<?php
//include "config.php";
include "include/header.php";
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>STUDENT ENROLLMENT FORM</title>
    <h1>Student Information</h1>

</head>
<body>
<?php
echo "<p>Why you should be a student with us</p>";
echo "<p>Student Benefits</p>";
echo "<p>Student News</p>";
?>

<div id="enrollToday">
     <a href="enrollment.php">Enroll Today</a>
</div>


<?php //
//
//        $result = mysqli_query("SELECT * FROM student")
//                or die(mysql_error());
//
//
//        echo "<p><b>All Students:</b></p>";
//
//        echo "<table border='1' cellpadding='10'>";
//        echo "<tr> <th>Student Id</th> <th>First name</th> <th>Last name</th> <th>Street</th> <th>Suburb</th> <th>Postcode</th> <th>Email</th> <th>Date of Birth</th> <th>Status</th> ";
//
//
//        while($row = mysql_fetch_array( $result )) {
//
//
//                echo "<tr>";
//                echo '<td>' . $row['studentId'] . '</td>';
//                echo '<td>' . $row['firstName'] . '</td>';
//                echo '<td>' . $row['lastName'] . '</td>';
//                echo '<td>' . $row['street'] . '</td>';
//                echo '<td>' . $row['suburb'] . '</td>';
//                echo '<td>' . $row['postcode'] . '</td>';
//                echo '<td>' . $row['email'] . '</td>';
//				echo '<td>' . $row['dob'] . '</td>';
//                echo '<td>' . $row['status'] . '</td>';
//
//                echo "</tr>";
//        }
//
//        echo "</table>";
//?>
<!---->

</body>
</html>

<?php include "include/footer.php";?>
