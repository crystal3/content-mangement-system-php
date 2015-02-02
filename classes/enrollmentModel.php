<?php
/**
 * Class to handle enrollment
 */

class Enrollment
{
    // Properties

    /**
     * @var int The enrollment ID  from the database
     */
    public $enrollmentId = null;

    /**
     * @var int The course Code
     */
    public $studentId = null;

    /**
     * @var int The course name
     */
    public $courseId = null;




    /**
     * Sets the object's properties using the values in the supplied array
     *
     * @param assoc The property values
     */

    public function __construct( $data=array() ) {
        if ( isset( $data['enrollmentId'] ) ) $this->enrollmentId = (int) $data['enrollmentId'];
        if ( isset( $data['studentId'] ) ) $this->studentId = (int) $data['studentId'] ;
        if ( isset( $data['courseId'] ) ) $this->courseId =(int) $data['courseId'] ;

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

    public function storeValues ( $studentId,$courseId ) {

        if ( isset( $studentId ) ) $this->studentId = $studentId ;
        if ( isset( $courseId ) ) $this->courseId = $courseId ;


    }
//
//
    /**
     * Returns course object matching the given enrollment ID
     *
     * @param int The enrollment ID
     * @return enrollment|false The enrollment object, or false if the record was not found or there was a problem
     */

    public static function getById( $enrollmentId ) {
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "SELECT *  FROM enrollment WHERE enrollmentId = :enrollmentId";
        $st = $conn->prepare( $sql );
        $st->bindValue( ":enrollmentId", $enrollmentId, PDO::PARAM_INT );
        $st->execute();
        $row = $st->fetch();
        $conn = null;
        if ( $row ) return new Enrollment( $row );
    }



    /**
     * Inserts the current enrollment object into the database, and sets its ID property.
     */

    public function insert() {

        // Does the enrollment object already have an ID?
        if ( !is_null( $this->enrollmentId ) ) trigger_error ( "Enrollment::insert(): Attempt to insert enrollment object that already has its ID property set (to $this->enrollmentId).", E_USER_ERROR );

        // Insert the enrollment
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "INSERT INTO enrollment ( studentId, courseId )
     VALUES (:studentId,:courseId)";
        $st = $conn->prepare ( $sql );
        $st->bindValue( ":studentId", $this->studentId, PDO::PARAM_INT );
        $st->bindValue( ":courseId", $this->courseId, PDO::PARAM_INT );

        $st->execute();
        $this->enrollmentId = $conn->lastInsertId();
        $conn = null;
    }

    /**
     * Updates the current enrollment object in the database.
     */

    public function update() {

        // Does the enrollment object have an ID?
        if ( is_null( $this->enrollmentId ) ) trigger_error ( "Enrollment::update(): Attempt to update Enrollment object that does not have its ID property set.", E_USER_ERROR );

        // Update the enrollment
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "UPDATE enrollment SET studentId=:studentId, courseId=:courseId WHERE enrollmentId = :enrollmentId";
        $st = $conn->prepare ( $sql );
        $st->bindValue( ":studentId", $this->studentId, PDO::PARAM_INT );
        $st->bindValue( ":courseId", $this->courseId, PDO::PARAM_INT );

        $st->bindValue( ":enrollmentId", $this->enrollmentId, PDO::PARAM_INT );
        $st->execute();
        $conn = null;
    }


    /**
     * Deletes the current enrollment object from the database.
     */

    public function delete() {

        // Does the enrollment object have an ID?
        if ( is_null( $this->enrollmentId ) ) trigger_error ( "Enrollment::delete(): Attempt to delete enrollment object that does not have its ID property set.", E_USER_ERROR );

        // Delete the enrollment
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $st = $conn->prepare ( "DELETE FROM enrollment WHERE enrollmentId = :enrollmentId LIMIT 1" );
        $st->bindValue( ":enrollmentId", $this->enrollmentId, PDO::PARAM_INT );
        $st->execute();
        $conn = null;
    }

}

?>
