<?php
include "include/header.php";
include "/config.php";
include "/classes/courseModel.php";


echo "<p>New courses coming soon</p>";
echo "<p>course News</p>";
echo "<p>Courses available</p>";

$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
function listCourse(){

}
$result = mysqli_query($con,"SELECT * FROM course")
or die(mysql_error());


echo "<table border='1'>
<tr>
<th>Course Id</th>
<th>Course Code</th>
<th>Course Name</th>
<th>Description</th>
<th>headTeacher</th>

</tr>";


while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['courseId'] . "</td>";
    echo "<td>" . $row['courseCode'] . "</td>";
    echo "<td>" . $row['courseName'] . "</td>";
    echo '<td>' . $row['description'] . '</td>';
    echo '<td>' . $row['headTeacher'] . '</td>';
//    echo '<td><a href="/Diploma/cms/admin/course/update.php?courseId=' . $row['courseId'] .'&action=editCourse'.'">UpDate</a></td>';
//    echo '<td><a href="/Diploma/cms/admin/course/view.php?courseId=' . $row['courseId'] . '&action=deleteCourse'.'">Delete</a></td>';
    echo "</tr>";
}
echo "</table>";
?>



<div id="enrollToday">
    <a href="enrollment.php">Enroll Today</a>
</div>


<?php include "include/footer.php";?>
	
	


