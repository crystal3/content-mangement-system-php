<?php

include "/../adminHeader.php";
include "/../../config.php";
include "/../../classes/enrollmentModel.php";


echo "ENROLLMENT";

$action = isset( $_GET['action'] ) ? $_GET['action'] : "";


switch ( $action ) {
    case 'deleteEnrollment':
        deleteEnrollment();
        break;
    default:
        listEnrollment();
}

function deleteEnrollment() {

    if ( !$enrollment = Enrollment::getById( (int)$_GET['enrollmentId'] ) ) {
        ////        header( "Location: admin.php?error=courseNotFound" );
        return;
    }


    $enrollment->delete();
    header( "Location: view.php?action=listEnrollment" );

}

function listEnrollment(){

}
$result = mysqli_query($con,"SELECT e.enrollmentId, s.firstName, s.lastName,c.courseCode, c.courseName
 FROM enrollment e,student s,course c where s.studentId=e.studentId and c.courseId=e.courseId")
or die(mysql_error());


echo "<table border='1'>
<tr>
<th>Enrollment Id</th>
<th>student</th>
<th>course</th>

</tr>";


while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['enrollmentId'] . "</td>";
    echo "<td>" . $row['firstName'] ." ".$row['lastName']. "</td>";
    echo "<td>" . $row['courseCode'] ." - ".$row['courseName']. "</td>";

    echo '<td><a href="/Diploma/cms/admin/enrollment/update.php?enrollmentId=' . $row['enrollmentId'] .'&action=editEnrollment'.'">UpDate</a></td>';
    echo '<td><a href="/Diploma/cms/admin/enrollment/view.php?enrollmentId=' . $row['enrollmentId'] . '&action=deleteEnrollment'.'">Delete</a></td>';
    echo "</tr>";
}
echo "</table>";
?>

    <!--<p>--><?php //echo $results['totalRows']?><!-- article--><?php //echo ( $results['totalRows'] != 1 ) ? 's' : '' ?><!-- in total.</p>-->

    <p><a href="/Diploma/cms/admin/enrollment/add.php">Add new Enrollment</a></p>

    <!--</body>-->
    <!--</html>-->

<?php include "/../../include/footer.php";?>