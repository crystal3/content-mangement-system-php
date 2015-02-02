<?php

include "/../adminHeader.php";
include "/../../config.php";
include "/../../classes/studentModel.php";


echo "STUDENT DETAILS";

$action = isset( $_GET['action'] ) ? $_GET['action'] : "";


switch ( $action ) {
    case 'deleteStudent':
        deleteStudent();
        break;
    default:
        listStudent();
}

function deleteStudent() {

    if ( !$student = Student::getById( (int)$_GET['studentId'] ) ) {
        ////        header( "Location: admin.php?error=studentNotFound" );
        return;
    }

    //    $student->deleteImages();
    $student->delete();
    header( "Location: view.php?action=listStudent" );

}

function listStudent(){

}
$result = mysqli_query($con,"SELECT * FROM student")
                or die(mysql_error());


echo "<table border='1'>
<tr>
<th>Student Id</th>
<th>First Name</th>
<th>Last Name</th>
<th>Street</th>
<th>Suburb</th>
<th>Post Code</th>
<th>Email</th>
<th>phone</th>
<th>Date of Birth</th>
</tr>";


while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['studentId'] . "</td>";
    echo "<td>" . $row['firstName'] . "</td>";
    echo "<td>" . $row['lastName'] . "</td>";
    echo '<td>' . $row['street'] . '</td>';
    echo '<td>' . $row['suburb'] . '</td>';
    echo '<td>' . $row['postcode'] . '</td>';
    echo '<td>' . $row['email'] . '</td>';
    echo '<td>' . $row['phone'] . '</td>';
    echo '<td>' . $row['dob'] . '</td>';
    echo '<td><a href="/Diploma/cms/admin/student/update.php?studentId=' . $row['studentId'] .'&action=editStudent'.'">UpDate</a></td>';
    echo '<td><a href="/Diploma/cms/admin/student/view.php?studentId=' . $row['studentId'] . '&action=deleteStudent'.'">Delete</a></td>';
    echo "</tr>";
}
echo "</table>";
?>

<!--<p>--><?php //echo $results['totalRows']?><!-- article--><?php //echo ( $results['totalRows'] != 1 ) ? 's' : '' ?><!-- in total.</p>-->

<p><a href="/Diploma/cms/admin/student/add.php">Add new student</a></p>

<!--</body>-->
<!--</html>-->

<?php include "/../../include/footer.php";?>