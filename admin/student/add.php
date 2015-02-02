<?php

include "/../adminHeader.php";
include "/../../config.php";
include "/../../classes/studentModel.php";
include "/../../classes/courseModel.php";
include "/../../classes/enrollmentModel.php";

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

<?php  echo "ADD NEW STUDENT"; ?>

   <form action="add.php?action=" method="post">
                <li>
                    <label for="firstName">First Name</label>
                    <input type="text" name="firstName" id="firstName" placeholder="First Name of the student" required autofocus maxlength="255" value="" />
                </li>
            <br>
                <li>
                    <label for="lastName">Last Name</label>
                    <input type="text" name="lastName" id="lastName" placeholder="Last Name of the student" required autofocus maxlength="255" value="" />
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
                    <input type="text" name="phone" id="phone" placeholder="Phone No of the student" required autofocus maxlength="255" value=""/>
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
                <input type="submit" name="saveChanges" value="Save Changes" />
                <input type="submit" formnovalidate name="cancel" value="Cancel" />
            </div>

      </form>

<!--        --><?php //if ( $results['student']->id ) { ?>
<!--            <p><a href="admin.php?action=deleteArticle&amp;articleId=--><?php //echo $results['article']->id ?><!--" onclick="return confirm('Delete This Article?')">Delete This Article</a></p>-->
<!--        --><?php //} ?>




<?php include "/../../include/footer.php";?>