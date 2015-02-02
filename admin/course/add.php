
<?php

include "/../adminHeader.php";
include "/../../config.php";
include "/../../classes/courseModel.php";


newCourse();


function newCourse() {
    $results = array();
    $results['pageTitle'] = "New Course";
    $results['formAction'] = "newCourse";


    if ( isset( $_POST['saveChanges'] ) ) {

        // User has posted the course add form: save the new course
        $course = new Course;
        $course->storeFormValues( $_POST );
        $course->insert();

        header( "Location: add.php?status=changesSaved" );

    } elseif ( isset( $_POST['cancel'] ) ) {

        // User has cancelled their edits: return to the student list
//    header( "Location: admin.php" );
//    } else {

        // User has not posted the student edit form yet: display the form
//    $results['article'] = new Article;
//    $data = Category::getList();
//    $results['categories'] = $data['results'];
//    require( "admin/editArticle.php" );
//    }

    }
}


?>

<?php  echo "ADD NEW COURSE"; ?>

    <form action="add.php?action=" method="post">
        <li>
            <label for="courseCode">Course Code</label>
            <input type="text" name="courseCode" id="courseCode" placeholder="course Code " required autofocus maxlength="255" value="" />
        </li>
        <br>
        <li>
            <label for="courseName">Course Name</label>
            <input type="text" name="courseName" id="courseName" placeholder="courseName" required autofocus maxlength="255" value="" />
        </li>
        <br>
        <li>
            <label for="description">Description</label>
            <input type="text" name="description" id="description" placeholder="description" required autofocus maxlength="255" value=""/>
        </li>
        <br>
        <li>
            <label for="headTeacher">headTeacher</label>
            <input type="text" name="headTeacher" id="headTeacher" placeholder="headTeacher" required autofocus maxlength="255" value=""/>
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