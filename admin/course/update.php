<?php

include "/../adminHeader.php";
include "/../../config.php";
include "/../../classes/courseModel.php";

echo "UPDATE COURSE";

$course = Course::getById( (int)$_GET['courseId'] );
?>

    <form action="../admin.php?action=updateCourse" method="post">

        <input type="hidden" name="courseId" id="courseId" value="<?php echo $course->courseId;?>" />
        <li>
            <label for="courseCode">Course Code</label>
            <input type="text" name="courseCode" id="courseCode" placeholder="Course Code" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $course->courseCode)?>" />
        </li>
        <br>
        <li>
            <label for="courseName">CourseName</label>
            <input type="text" name="courseName" id="courseName" placeholder="Course Name" required autofocus maxlength="255" value="<?php echo $course->courseName;?>" />
        </li>
        <br>

        <li>
            <label for="description">Description</label>
            <input type="text" name="description" id="description" placeholder="Description" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $course->description)?>"/>
        </li>
        <br>
        <li>
            <label for="headTeacher">Head Teacher</label>
            <input type="text" name="headTeacher" id="headTeacher" placeholder="Head Teacher" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $course->headTeacher)?>"/>
        </li>

        <div class="buttons">
            <input type="submit" name="saveChanges" value="Save Changes" />
            <input type="submit" formnovalidate name="cancel" value="Cancel" />
        </div>

    </form>

    <!--        --><?php //if ( $results['student']->id ) { ?>
    <!--            <p><a href="admin.php?action=deleteArticle&amp;articleId=--><?php //echo $results['article']->id ?><!--" onclick="return confirm('Delete This Article?')">Delete This Article</a></p>-->
    <!--        --><?php //} ?>




<?php include "/../../include/footer.php";?>