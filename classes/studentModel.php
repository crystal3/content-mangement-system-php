<?php

/**
 * Class to handle students
 */

class Student
{
  // Properties

  /**
  * @var int The student ID  from the database
  */
  public $studentId = null;

  /**
  * @var int The student first name
  */
  public $firstName = null;

    /**
     * @var int The student last name
     */
  public $lastName = null;

    /**
  * @var string The student street
  */
  public $street = null;

  /**
  * @var string The student suburb
  */
  public $suburb = null;

  /**
  * @var string The student postcode
  */
  public $postcode = null;

    /**
     * @var string The student email
     */
    public $email = null;

    /**
     * @var string The student dob
     */
    public $dob = null;

    /**
     * @var string The student status
     */
    public $phone = null;



  /**
  * Sets the object's properties using the values in the supplied array
  *
  * @param assoc The property values
  */

  public function __construct( $data=array() ) {
    if ( isset( $data['studentId'] ) ) $this->studentId = (int) $data['studentId'];
    if ( isset( $data['firstName'] ) ) $this->firstName = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['firstName'] );
    if ( isset( $data['lastName'] ) ) $this->lastName = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['lastName'] );
    if ( isset( $data['street'] ) ) $this->street = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['street'] );
    if ( isset( $data['suburb'] ) ) $this->suburb = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['suburb'] );
    if ( isset( $data['postcode'] ) ) $this->postcode = $data['postcode'];
    if ( isset( $data['email'] ) ) $this->email = $data['email'];
    if ( isset( $data['dob'] ) ) $this->dob = $data['dob'];
    if ( isset( $data['phone'] ) ) $this->phone = $data['phone'];

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
  * Returns student object matching the given student ID
  *
  * @param int The student ID
  * @return Student|false The student object, or false if the record was not found or there was a problem
  */

  public static function getById( $studentId ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT *  FROM student WHERE studentId = :studentId";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":studentId", $studentId, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ( $row ) return new Student( $row );
  }



  /**
  * Inserts the current Student object into the database, and sets its ID property.
  */

  public function insert() {

    // Does the Student object already have an ID?
    if ( !is_null( $this->studentId ) ) trigger_error ( "Student::insert(): Attempt to insert student object that already has its ID property set (to $this->studentId).", E_USER_ERROR );

    // Insert the student
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "INSERT INTO student ( firstName, lastName, street, suburb, postcode, email, dob, phone )
     VALUES (:firstName,:lastName,:street,:suburb,:postcode,:email,FROM_UNIXTIME(:dob),:phone)";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":firstName", $this->firstName, PDO::PARAM_INT );
    $st->bindValue( ":lastName", $this->lastName, PDO::PARAM_INT );
    $st->bindValue( ":street", $this->street, PDO::PARAM_STR );
    $st->bindValue( ":suburb", $this->suburb, PDO::PARAM_STR );
    $st->bindValue( ":postcode", $this->postcode, PDO::PARAM_STR );
    $st->bindValue( ":email", $this->email, PDO::PARAM_STR );
    $st->bindValue( ":dob", $this->dob, PDO::PARAM_STR );
    $st->bindValue( ":phone", $this->phone, PDO::PARAM_STR );

    $st->execute();
    $this->studentId = $conn->lastInsertId();
    $conn = null;
  }


  /**
  * Updates the current Student object in the database.
  */

  public function update() {

    // Does the Student object have an ID?
    if ( is_null( $this->studentId ) ) trigger_error ( "Student::update(): Attempt to update Student object that does not have its ID property set.", E_USER_ERROR );
   
    // Update the Student
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "UPDATE student SET firstName=:firstName, lastName=:lastName, street=:street, suburb=:suburb, postcode=:postcode, email=:email, dob=FROM_UNIXTIME(:dob), phone=:phone WHERE studentId = :studentId";
    $st = $conn->prepare ( $sql );
      $st->bindValue( ":firstName", $this->firstName, PDO::PARAM_INT );
      $st->bindValue( ":lastName", $this->lastName, PDO::PARAM_INT );
      $st->bindValue( ":street", $this->street, PDO::PARAM_STR );
      $st->bindValue( ":suburb", $this->suburb, PDO::PARAM_STR );
      $st->bindValue( ":postcode", $this->postcode, PDO::PARAM_STR );
      $st->bindValue( ":email", $this->email, PDO::PARAM_STR );
      $st->bindValue( ":dob", $this->dob, PDO::PARAM_STR );
      $st->bindValue( ":phone", $this->phone, PDO::PARAM_STR );
//
    $st->bindValue( ":studentId", $this->studentId, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }


  /**
  * Deletes the current Student object from the database.
  */

  public function delete() {

    // Does the Student object have an ID?
    if ( is_null( $this->studentId ) ) trigger_error ( "Student::delete(): Attempt to delete student object that does not have its ID property set.", E_USER_ERROR );

    // Delete the Student
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $st = $conn->prepare ( "DELETE FROM student WHERE studentId = :studentId LIMIT 1" );
    $st->bindValue( ":studentId", $this->studentId, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }

   public static function getList() {

       $conn=mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD,DB_NAME);
// Check connection
       if (mysqli_connect_errno()) {
           echo "Failed to connect to MySQL: " . mysqli_connect_error();
       }

       $sql = "SELECT studentId,firstName, lastName  FROM student";
        $rows = mysqli_query($conn,$sql) or die(mysql_error());
        $conn = null;
        return $rows;

    }

}

?>
