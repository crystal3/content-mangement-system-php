<?php

include "/../adminHeader.php";
include "/../../config.php";
include "/../../classes/studentModel.php";

 echo "UPDATE STUDENT";
$student = Student::getById( (int)$_GET['studentId'] );
?>

    <form action="../admin.php?action=updateStudent" method="post">

        <input type="hidden" name="studentId" id="studentId" value="<?php echo $student->studentId;?>" />

        <li>
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" id="firstName" placeholder="First Name of the student" required autofocus maxlength="255" value="<?php echo $student->firstName;?>" />
        </li>
        <br>
        <li>
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" id="lastName" placeholder="Last Name of the student" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $student->lastName)?>" />
        </li>
        <br>
        <li>
            <label for="street">Street</label>
            <input type="text" name="street" id="street" placeholder="Street of the Address" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $student->street)?>"/>
        </li>
        <br>
        <li>
            <label for="suburb">Suburb</label>
            <input type="text" name="suburb" id="suburb" placeholder="Suburb of the Address" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $student->suburb)?>"/>
        </li>
        <br>
        <li>
            <label for="postcode">Postcode</label>
            <input type="text" name="postcode" id="postcode" placeholder="Postcode of the Address" required autofocus maxlength="20" value="<?php echo htmlspecialchars( $student->postcode)?>"/>
        </li>
        <br>
        <li>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Email Address" required autofocus maxlength="100" value="<?php echo htmlspecialchars( $student->email)?>"/>
        </li>
        <br>
        <li>
            <label for="phone">Phone No</label>
            <input type="text" name="phone" id="phone" placeholder="Phone Number of the student" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $student->phone)?>"/>
        </li>
        <br>
        <li>
            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" id="dob" placeholder="DD-MM-YYYY" required  maxlength="20" value="<?php echo htmlspecialchars( $student->dob)?>"/>
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