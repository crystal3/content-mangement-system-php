<?php
include "/../config.php";



try{


    $senderTitle = isset( $_POST['senderTitle'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['senderTitle'] ) : "";
    $senderFName = isset( $_POST['senderFName'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['senderFName'] ) : "";
    $senderLName = isset( $_POST['senderLName'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['senderLName'] ) : "";
    $senderPhone = isset( $_POST['senderPhone'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['senderPhone'] ) : "";
    $senderEmail = isset( $_POST['senderEmail'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['senderEmail'] ) : "";
    $message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";

    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "INSERT INTO contactForm ( senderTitle, senderFName, senderLName, senderPhone, senderEmail, message )
     VALUES (:senderTitle,:senderFName,:senderLName,:senderPhone,:senderEmail,:message)";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":senderTitle", $senderTitle, PDO::PARAM_STR );
    $st->bindValue( ":senderFName", $senderFName, PDO::PARAM_STR );
    $st->bindValue( ":senderLName", $senderLName, PDO::PARAM_STR );
    $st->bindValue( ":senderPhone", $senderPhone, PDO::PARAM_STR );
    $st->bindValue( ":senderEmail", $senderEmail, PDO::PARAM_STR );
    $st->bindValue( ":message", $message, PDO::PARAM_STR );


    $st->execute();
//$this->id = $conn->lastInsertId();
    $conn = null;

    echo "success";
} catch(Exception $e){
    //Something went bad
    echo "Fail " ;
}

?>

