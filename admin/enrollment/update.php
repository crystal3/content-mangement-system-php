<?php

include "/../adminHeader.php";
include "/../../config.php";
include "/../../classes/enrollmentModel.php";
include "/../../classes/studentModel.php";
include "/../../classes/courseModel.php";

echo "UPDATE ENROLLMENT";

$enrollment = Enrollment::getById( (int)$_GET['enrollmentId'] );// Check connection

//$student = Student::getById( (int)$_GET['studentId'] );

$courses = mysqli_query($con,"SELECT courseId,courseName, courseCode  FROM Course")
or die(mysql_error());

?>

    <form action="../admin.php?action=updateEnrollment" method="post">

        <input type="hidden" name="enrollmentId" id="enrollmentId" value="<?php echo $enrollment->enrollmentId;?>" />
        <li>
            <label for="studentId">student Id</label>
            <input type="text" name="studentId" id="studentId" placeholder="studentId" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $enrollment->studentId)?>" />
        </li>
        <br>
        <li>
            <label for="courseId">Course</label>
            <select name="courseId">
                <?php while($course = mysqli_fetch_array($courses))  { ?>
                    <option value="<?php echo $course['courseId']?>"<?php echo ( $course['courseId'] == $enrollment->courseId ) ? " selected" : ""?>><?php echo ( $course['courseName'] )?></option>
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