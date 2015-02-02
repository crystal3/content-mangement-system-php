<?php
include "/config.php";
include "include/header.php";
include "/classes/studentModel.php";
include "/classes/courseModel.php";
include "/classes/enrollmentModel.php";

$action = isset( $_GET['action'] ) ? $_GET['action'] : "";

$courses = mysqli_query($con,"SELECT courseId,courseName, courseCode  FROM Course")
or die(mysql_error());

newStudent();

function newStudent() {
$results = array();
$results['pageTitle'] = "New Student";
$results['formAction'] = "newStudent";


if ( isset( $_POST['saveChanges'] ) ) {

// User has posted the student add form: save the new student
$student = new Student;
$student->storeFormValues( $_POST );
$student->insert();

//now save the enrollment
 $enrollment = new Enrollment();
    $enrollment->storeValues( $student->studentId, $_POST["courseId"] );
    $enrollment->insert();

//header( "Location: enrollment.php?status=changesSaved" );

} elseif ( isset( $_POST['cancel'] ) ) {


}
}

?>

<?php echo "<p>How to enroll?</p>";?>

<div id="">
     <a href="course.php">Courses Available</a>
</div>

<?php echo "<p>Enrollment News</p>";?>
<br>
<?php echo "<h3 style='align center'>STUDENT ENROLLMENT FORM</h3>";?>

<form action="/Diploma/cms/enrollment.php?action=" method="post">
    <li>
        <label for="firstName">First Name</label>
        <input type="text" name="firstName" id="firstName" placeholder="First Name" required autofocus maxlength="255" value="" />
    </li>
    <br>
    <li>
        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" id="lastName" placeholder="Last Name" required autofocus maxlength="255" value="" />
    </li>
    <br>
    <li>
        <label for="street">Street</label>
        <input type="text" name="street" id="street" placeholder="Street of the Address" required autofocus maxlength="255" value=""/>
    </li>
    <br>
    <li>
        <label for="suburb">Suburb</label>
        <input type="text" name="suburb" id="suburb" placeholder="Suburb of the Address" required autofocus maxlength="255" value=""/>
    </li>
    <br>
    <li>
        <label for="postcode">Postcode</label>
        <input type="text" name="postcode" id="postcode" placeholder="Postcode of the Address" required autofocus maxlength="20" value=""/>
    </li>
    <br>
    <li>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="Email Address" required autofocus maxlength="100" value=""/>
    </li>
    <br>
    <li>
        <label for="phone">Phone No</label>
        <input type="text" name="phone" id="phone" placeholder="Phone Number" required autofocus maxlength="255" value=""/>
    </li>
    <br>
    <li>
        <label for="dob">Date of Birth</label>
        <input type="date" name="dob" id="dob" placeholder="DD-MM-YYYY" required  maxlength="20" value=""/>
    </li>
    <br>
    <li>
        <label for="courseId">Course</label>
        <select name="courseId">
            <option value="0">--Select Course--</option>

            <?php while($course = mysqli_fetch_array($courses))  { ?>
                <option value="<?php echo $course['courseId']?>"><?php echo ( $course['courseName'] )?></option>
            <?php } ?>
        </select>
    <li>


    <div class="buttons">
        <input type="submit" name="saveChanges" value="Enroll" />
        <input type="submit" formnovalidate name="cancel" value="Cancel" />
    </div>

</form>

<?php
//
//
//        $result = mysql_query("SELECT * FROM enrolment ")
//                or die(mysql_error());
//
//
//        echo "<p><b>All Enrolments: </b></p>";
//
//        echo "<table border='1' cellpadding='10'>";
//        echo "<tr> <th>EID</th> <th>SID</th> <th>CID</th>  </tr>";
//
//
//        while($row = mysql_fetch_array( $result )) {
//
//
//                echo "<tr>";
//                echo '<td>' . $row['EID'] . '</td>';
//                echo '<td>' . $row['SID'] . '</td>';
//                echo '<td>' . $row['CID'] . '</td>';
//
//
//
//                echo "</tr>";
//        }
//
//
//        echo "</table>";
//?>

</body>
</html>

<?php include "include/footer.php";?>
