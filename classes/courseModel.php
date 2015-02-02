<?php

/**
 * Class to handle course
 */

class Course
{
    // Properties

    /**
     * @var int The course ID  from the database
     */
    public $courseId = null;

    /**
     * @var int The course Code
     */
    public $courseCode = null;

    /**
     * @var int The course name
     */
    public $courseName = null;

    /**
     * @var string The course Description
     */
    public $description = null;

    /**
     * @var string The course head teacher
     */
    public $headTeacher = null;




    /**
     * Sets the object's properties using the values in the supplied array
     *
     * @param assoc The property values
     */

    public function __construct( $data=array() ) {
        if ( isset( $data['courseId'] ) ) $this->courseId = (int) $data['courseId'];
        if ( isset( $data['courseCode'] ) ) $this->courseCode = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['courseCode'] );
        if ( isset( $data['courseName'] ) ) $this->courseName = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['courseName'] );
        if ( isset( $data['description'] ) ) $this->description = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['description'] );
        if ( isset( $data['headTeacher'] ) ) $this->headTeacher = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['headTeacher'] );

    }


    /**
     * Sets the object's properties using the edit form post values in the supplied array
     *
     * @param assoc The form post values
     */

    public function storeFormValues ( $params ) {

        // Store all the parameters
        $this->__construct( $params );

    }
//
//
    /**
     * Returns course object matching the given course ID
     *
     * @param int The course ID
     * @return Course|false The course object, or false if the record was not found or there was a problem
     */

    public static function getById( $courseId ) {
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "SELECT *  FROM course WHERE courseId = :courseId";
        $st = $conn->prepare( $sql );
        $st->bindValue( ":courseId", $courseId, PDO::PARAM_INT );
        $st->execute();
        $row = $st->fetch();
        $conn = null;
        if ( $row ) return new Course( $row );
    }



    /**
     * Inserts the current Course object into the database, and sets its ID property.
     */

    public function insert() {

        // Does the Course object already have an ID?
        if ( !is_null( $this->courseId ) ) trigger_error ( "Course::insert(): Attempt to insert course object that already has its ID property set (to $this->courseId).", E_USER_ERROR );

        // Insert the course
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "INSERT INTO course ( courseCode, courseName, description, headTeacher )
     VALUES (:courseCode,:courseName,:description,:headTeacher)";
        $st = $conn->prepare ( $sql );
        $st->bindValue( ":courseCode", $this->courseCode, PDO::PARAM_STR );
        $st->bindValue( ":courseName", $this->courseName, PDO::PARAM_STR );
        $st->bindValue( ":description", $this->description, PDO::PARAM_STR );
        $st->bindValue( ":headTeacher", $this->headTeacher, PDO::PARAM_STR );

        $st->execute();
        $this->courseId = $conn->lastInsertId();
        $conn = null;
    }

    /**
     * Updates the current course object in the database.
     */

    public function update() {

        // Does the course object have an ID?
        if ( is_null( $this->courseId ) ) trigger_error ( "Course::update(): Attempt to update Course object that does not have its ID property set.", E_USER_ERROR );

        // Update the course
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "UPDATE course SET courseCode=:courseCode, courseName=:courseName, description=:description, headTeacher=:headTeacher WHERE courseId = :courseId";
        $st = $conn->prepare ( $sql );
        $st->bindValue( ":courseCode", $this->courseCode, PDO::PARAM_INT );
        $st->bindValue( ":courseName", $this->courseName, PDO::PARAM_INT );
        $st->bindValue( ":description", $this->description, PDO::PARAM_STR );
        $st->bindValue( ":headTeacher", $this->headTeacher, PDO::PARAM_STR );

//
        $st->bindValue( ":courseId", $this->courseId, PDO::PARAM_INT );
        $st->execute();
        $conn = null;
    }


    /**
     * Deletes the current course object from the database.
     */

    public function delete() {

        // Does the course object have an ID?
        if ( is_null( $this->courseId ) ) trigger_error ( "Course::delete(): Attempt to delete course object that does not have its ID property set.", E_USER_ERROR );

        // Delete the Student
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $st = $conn->prepare ( "DELETE FROM course WHERE courseId = :courseId LIMIT 1" );
        $st->bindValue( ":courseId", $this->courseId, PDO::PARAM_INT );
        $st->execute();
        $conn = null;
    }

    public static function getList() {
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "SELECT *  FROM course";
        $st = $conn->prepare( $sql );
        $st->execute();
        $rows = $st->fetch();
        $conn = null;
        return $rows;
    }

}

?>
