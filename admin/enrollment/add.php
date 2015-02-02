
<?php

include "/../adminHeader.php";
include "/../../config.php";
include "/../../classes/enrollmentModel.php";
include "/../../classes/studentModel.php";
include "/../../classes/courseModel.php";

$students = mysqli_query($con,"SELECT studentId  FROM Student")
or die(mysql_error());
$courses = mysqli_query($con,"SELECT courseId,courseName, courseCode  FROM Course")
or die(mysql_error());



newEnrollment();

function newEnrollment() {
    $results = array();
    $results['pageTitle'] = "New Enrollment";
    $results['formAction'] = "newEnrollment";


    if ( isset( $_POST['saveChanges'] ) ) {

        // User has posted the enrollment add form: save the new enrollment
        $enrollment = new Enrollment;
        $enrollment->storeFormValues( $_POST );
        $enrollment->insert();

        header( "Location: add.php?status=changesSaved" );

    } elseif ( isset( $_POST['cancel'] ) ) {


    }
}


?>

<?php  echo "ADD NEW ENROLLMENT"; ?>

    <form action="add.php?action=" method="post">
        <li>
            <label for="studentId">Student</label>
            <select name="studentId">
                <option value="0">--Select Student--</option>

                <?php while($student = mysqli_fetch_array($students))  { ?>
                    <option value="<?php echo $student['studentId']?>"><?php echo ( $student['studentId'] )?></option>
                <?php } ?>
            </select>
        <li>
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
            <input type="submit" name="saveChanges" value="Save Changes" />
            <input type="submit" formnovalidate name="cancel" value="Cancel" />
        </div>

    </form>

    <!--        --><?php //if ( $results['student']->id ) { ?>
    <!--            <p><a href="admin.php?action=deleteArticle&amp;articleId=--><?php //echo $results['article']->id ?><!--" onclick="return confirm('Delete This Article?')">Delete This Article</a></p>-->
    <!--        --><?php //} ?>




<?php include "/../../include/footer.php";?>