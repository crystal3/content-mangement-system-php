<?php
/**
 * Created by PhpStorm.
 * Date: 17/09/14
 * Time: 11:05 PM
 */
include "/../config.php";
include "adminHeader.php";
include "/../classes/studentModel.php";
include "/../classes/courseModel.php";
include "/../classes/enrollmentModel.php";

?>


<?php
//session_start();
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";

if ( $action != "login" && $action != "logout" && !$username ) {
    login();
    exit;
}

switch ( $action ) {
    case 'login':
        login();
        break;
    case 'logout':
        logout();
        break;
    case 'newStudent':
        newStudent();
        break;
    case 'updateStudent':
        updateStudent();
        break;
    case 'deleteStudent':
        deleteStudent();
        break;
    case 'listStudents':
        listStudents();
        break;

    case 'newCourse':
        newCourse();
        break;
    case 'updateCourse':
        updateCourse();
        break;
    case 'deleteCourse':
        deleteCourse();
        break;
    case 'listCourse':
        listCourse();
        break;

    case 'newEnrollment':
        newEnrollment();
        break;
    case 'updateEnrollment':
        updateEnrollment();
        break;
    case 'deleteEnrollment':
        deleteEnrollment();
        break;
    case 'listEnrollment':
        listEnrollment();
        break;
//
  //  default:
  //      listStudent();
}

function login() {

    $results = array();
    $results['pageTitle'] = "Admin Login | Student Enrollment Form";

    if ( isset( $_POST['login'] ) ) {

        // User has posted the login form: attempt to log the user in

        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "SELECT password  FROM user WHERE userName = :userName";
        $st = $conn->prepare( $sql );
        $st->bindValue( ":userName", $_POST['username'], PDO::PARAM_STR );
        $st->execute();
        $row = $st->fetch();
        $conn = null;

        $passwordHash = sha1($_POST['password']);

        if ( $row['password']== $passwordHash ) {

            // Login successful: Create a session and redirect to the admin homepage
            $_SESSION['username'] = $_POST['username'];
            header( "Location: admin\admin.php" );

        } else {

            // Login failed: display an error message to the user
            $results['errorMessage'] = "Incorrect username or password. Please try again.";
//            require("loginForm.php" );
        }

    } else
    {
//
//        // User has not posted the login form yet: display the form
//        require( "loginForm.php" );
    }

}
function logout() {
    unset( $_SESSION['username'] );
    header( "Location: /../Diploma/cms/admin/admin.php" );
}


function newStudent() {

    $results = array();
    $results['pageTitle'] = "New Student";
    $results['formAction'] = "newStudent";

    if ( isset( $_POST['saveChanges'] ) ) {

        // User has posted the student edit form: save the new student
        $student = new Student;
        $student->storeFormValues( $_POST );
        $student->insert();
        header( "Location: admin.php?status=changesSaved" );

    } elseif ( isset( $_POST['cancel'] ) ) {

        // User has cancelled their edits: return to the student list
        header( "Location: admin.php" );
    } else {


    }

}


function updateStudent() {

    $results = array();
    $results['pageTitle'] = "Edit Student";
    $results['formAction'] = "editStudent";

    if ( isset( $_POST['saveChanges'] ) ) {

        // User has posted the student edit form: save the student changes

        if ( !$student = Student::getById( (int)$_POST['studentId'] ) ) {
            header( "Location: admin.php?error=studentNotFound" );
            return;
        }

        $student->storeFormValues( $_POST );

        $student->update();

        header( "Location: student/view.php?status=changesSaved" );

    } elseif ( isset( $_POST['cancel'] ) ) {

        // User has cancelled their edits: return to the student list
        header( "Location: admin.php" );
    } else {
        $results['student'] = Student::getById( (int)$_GET['studentId'] );
        header( "Location: student/update.php" );

//
    }

}





function listStudent() {
//    $results = array();
//    $data = Student::getList();
//    $results['student'] = $data['results'];
//    $results['totalRows'] = $data['totalRows'];
//    $results['pageTitle'] = "All Students";
//
//    if ( isset( $_GET['error'] ) ) {
//        if ( $_GET['error'] == "studentNotFound" ) $results['errorMessage'] = "Error: Student not found.";
//    }
//
//    if ( isset( $_GET['status'] ) ) {
//        if ( $_GET['status'] == "changesSaved" ) $results['statusMessage'] = "Your changes have been saved.";
//        if ( $_GET['status'] == "studentDeleted" ) $results['statusMessage'] = "Student deleted.";
//    }

//    require( TEMPLATE_PATH . "/admin/listArticles.php" );
    header( "Location: view.php?action=listStudent" );

}

function newCourse() {

    $results = array();
    $results['pageTitle'] = "New Course";
    $results['formAction'] = "newCourse";

    if ( isset( $_POST['saveChanges'] ) ) {

        // User has posted the course edit form: save the new Course
        $course = new Course;
        $course->storeFormValues( $_POST );
        $course->insert();
        header( "Location: admin.php?status=changesSaved" );

    } elseif ( isset( $_POST['cancel'] ) ) {

        // User has cancelled their edits: return to the course list
        header( "Location: admin.php" );
    } else {


    }

}


function updateCourse() {

    $results = array();
    $results['pageTitle'] = "Edit Course";
    $results['formAction'] = "editCourse";

    if ( isset( $_POST['saveChanges'] ) ) {

        // User has posted the course edit form: save the course changes

        if ( !$course = Course::getById( (int)$_POST['courseId'] ) ) {
            header( "Location: admin.php?error=courseNotFound" );
            return;
        }

        $course->storeFormValues( $_POST );
        $course->update();

        header( "Location: course/view.php?status=changesSaved" );

    } elseif ( isset( $_POST['cancel'] ) ) {

        // User has cancelled their edits: return to the course list
        header( "Location: admin.php" );
    } else {
        $results['course'] = Course::getById( (int)$_GET['courseId'] );
        header( "Location: course/update.php" );


    }

}
function newEnrollment() {

    $results = array();
    $results['pageTitle'] = "New Enrollment";
    $results['formAction'] = "newEnrollment";

    if ( isset( $_POST['saveChanges'] ) ) {

        // User has posted the enrollment edit form: save the new enrollment
        $enrollment = new Enrollment;
        $enrollment->storeFormValues( $_POST );
        $enrollment->insert();
        header( "Location: admin.php?status=changesSaved" );

    } elseif ( isset( $_POST['cancel'] ) ) {

        // User has cancelled their edits: return to the enrollment list
        header( "Location: admin.php" );
    } else {


    }

}


function updateEnrollment() {

    $results = array();
    $results['pageTitle'] = "Edit Enrollment";
    $results['formAction'] = "editEnrollment";

    if ( isset( $_POST['saveChanges'] ) ) {

        // User has posted the enrollment edit form: save the enrollment changes

        if ( !$enrollment = Enrollment::getById( (int)$_POST['enrollmentId'] ) ) {
            header( "Location: admin.php?error=enrollmentNotFound" );
            return;
        }

        $enrollment->storeFormValues( $_POST );
        $enrollment->update();

        header( "Location: enrollment/view.php?status=changesSaved" );

    } elseif ( isset( $_POST['cancel'] ) ) {

        // User has cancelled their edits: return to the enrollment list
        header( "Location: admin.php" );
    } else {
        $results['enrollment'] = Enrollment::getById( (int)$_GET['enrollmentId'] );
        header( "Location: enrollment/update.php" );


    }

}



?>
<?php include "/../include/footer.php";?>