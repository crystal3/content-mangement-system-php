<?php

include "/../adminHeader.php";
include "/../../config.php";
include "/../../classes/courseModel.php";


echo "COURSE DETAILS";

$action = isset( $_GET['action'] ) ? $_GET['action'] : "";


switch ( $action ) {
    case 'deleteCourse':
        deleteCourse();
        break;
    default:
        listCourse();
}

function deleteCourse() {

    if ( !$course = Course::getById( (int)$_GET['courseId'] ) ) {
        ////        header( "Location: admin.php?error=courseNotFound" );
        return;
    }


    $course->delete();
    header( "Location: view.php?action=listCourse" );

}

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
    echo '<td><a href="/Diploma/cms/admin/course/update.php?courseId=' . $row['courseId'] .'&action=editCourse'.'">UpDate</a></td>';
    echo '<td><a href="/Diploma/cms/admin/course/view.php?courseId=' . $row['courseId'] . '&action=deleteCourse'.'">Delete</a></td>';
    echo "</tr>";
}
echo "</table>";
?>

    <!--<p>--><?php //echo $results['totalRows']?><!-- article--><?php //echo ( $results['totalRows'] != 1 ) ? 's' : '' ?><!-- in total.</p>-->

    <p><a href="/Diploma/cms/admin/course/add.php">Add new Course</a></p>

    <!--</body>-->
    <!--</html>-->

<?php include "/../../include/footer.php";?>