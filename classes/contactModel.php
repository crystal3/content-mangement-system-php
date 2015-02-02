<?php

//* Class to handle contacts


class Contact
{
    // Properties

    /**
     * @var int contact Form Id  from the database
     */
    public $contactFormId = null;

    /**
     * @var int The senderTitle
     */
    public $senderTitle = null;

    /**
     * @var int The sender First Name
     */
    public $senderFName = null;

    /**
     * @var string The sender Last Name
     */
    public $senderLName = null;

    /**
     * @var string The sender Phone
     */
    public $senderPhone = null;

    /**
     * @var string The sender Email
     */
    public $senderEmail = null;

    /**
     * @var string The message
     */
    public $message = null;


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



    /**
     * Inserts the current Student object into the database, and sets its ID property.
     */

    public function insert($data) {


        // Insert the contactForm
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "INSERT INTO contactForm ( senderTitle, senderFName, senderLName, senderPhone, senderEmail, message )
     VALUES (:senderTitle,:senderFName,:senderLName,:senderPhone,:senderEmail,:message)";
        $st = $conn->prepare ( $sql );
        $st->bindValue( ":senderTitle", (int) $data['senderTitle'], PDO::PARAM_STR );
        $st->bindValue( ":senderFName", $this->senderFName, PDO::PARAM_STR );
        $st->bindValue( ":senderLName", $this->senderLName, PDO::PARAM_STR );
        $st->bindValue( ":senderPhone", $this->senderPhone, PDO::PARAM_INT );
        $st->bindValue( ":senderEmail", $this->senderEmail, PDO::PARAM_STR );
        $st->bindValue( ":message", $this->message, PDO::PARAM_STR );


        $st->execute();
        $this->id = $conn->lastInsertId();
        $conn = null;
    }


}

?>
