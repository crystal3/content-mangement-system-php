<?php
/**
 * Created by PhpStorm.
 * User: Hesandi
 * Date: 12/07/14
 * Time: 9:05 PM
 */
//include "/../config.php";
?>
<link rel="stylesheet" type="text/css" href="/diploma/cms/contactForm/style.css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript">

    var messageDelay = 2000;  // How long to display status messages (in milliseconds)

    // Init the form once the document is ready
    $( init );

    // Initialize the form

    function init() {

        // Hide the form initially.
        // Make submitForm() the form's submit handler.
        // Position the form so it sits in the centre of the browser window.
        $('#contactForm').hide().submit( submitForm ).addClass( 'positioned' );

        // When the "Send us an email" link is clicked:
        // 1. Fade the content out
        // 2. Display the form
        // 3. Move focus to the first field
        // 4. Prevent the link being followed

        $('a[href="#contactForm"]').click( function() {
            $('#content').fadeTo( 'slow', .2 );
            $('#contactForm').fadeIn( 'slow', function() {
                $('#senderName').focus();
            } )

            return false;
        } );

        // When the "Cancel" button is clicked, close the form
        $('#cancel').click( function() {
            $('#contactForm').fadeOut();
            $('#content').fadeTo( 'slow', 1 );
        } );

        // When the "Escape" key is pressed, close the form
        $('#contactForm').keydown( function( event ) {
            if ( event.which == 27 ) {
                $('#contactForm').fadeOut();
                $('#content').fadeTo( 'slow', 1 );
            }
        } );

    }


    // Submit the form via Ajax

    function submitForm() {
        var contactForm = $(this);

        // Are all the fields filled in?

        if ( !$('#senderFName').val() || !$('#senderEmail').val() || !$('#message').val() ) {

            // No; display a warning message and return to the form
            $('#incompleteMessage').fadeIn().delay(messageDelay).fadeOut();
            contactForm.fadeOut().delay(messageDelay).fadeIn();

        } else {

            // Yes; submit the form to the PHP script via Ajax

            $('#sendingMessage').fadeIn();
            contactForm.fadeOut();

            $.ajax( {
                url: contactForm.attr( 'action' ) + "?ajax=true",
                type: contactForm.attr( 'method' ),
                data: contactForm.serialize(),
                success: submitFinished
            } );
        }

        // Prevent the default form submission occurring
        return false;
    }


    // Handle the Ajax response

    function submitFinished( response ) {
        response = $.trim( response );
        $('#sendingMessage').fadeOut();

        if ( response.substr(0,7) == "success" ) {

            // Form submitted successfully:
            // 1. Display the success message
            // 2. Clear the form fields
            // 3. Fade the content back in

            $('#successMessage').fadeIn().delay(messageDelay).fadeOut();
            $('#senderName').val( "" );
            $('#senderEmail').val( "" );
            $('#message').val( "" );

            $('#content').delay(messageDelay+500).fadeTo( 'slow', 1 );

        } else {

            // Form submission failed: Display the failure message,
            // then redisplay the form
            $('#failureMessage').fadeIn().delay(messageDelay).fadeOut();
            $('#contactForm').delay(messageDelay+500).fadeIn();
        }
    }

</script>

<form id="contactForm" action="contactForm/processForm.php" method="post">

    <h2>Contact Us</h2>

    <ul>
        <li>
            <label for="senderTitle">Title</label>
            <input type="text" name="senderTitle" id="senderTitle" placeholder="Please type your Title" required="required" maxlength="40" />
        </li>

        <li>
            <label for="senderFName">First Name</label>
            <input type="text" name="senderFName" id="senderFName" placeholder="Please type your First Name" required="required" maxlength="40" />
        </li>

        <li>
            <label for="senderLName">Last Name</label>
            <input type="text" name="senderLName" id="senderLName" placeholder="Please type your Last Name" required="required" maxlength="40" />
        </li>

        <li>
            <label for="senderPhone">Phone No</label>
            <input type="text" name="senderPhone" id="senderPhone" placeholder="Please type your Phone Number" required="required" maxlength="40" />
        </li>

        <li>
            <label for="senderEmail">Email</label>
            <input type="email" name="senderEmail" id="senderEmail" placeholder="Please type your email address" required="required" maxlength="50" />
        </li>

        <li>
            <label for="message" style="padding-top: .5em;">Message</label>
            <textarea name="message" id="message" placeholder="Please type your message" required="required" cols="80" rows="10" maxlength="10000"></textarea>
        </li>

    </ul>
    <div id="formButtons">
        <input type="submit" id="sendMessage" name="sendMessage" value="Send" />
        <input type="button" id="cancel" name="cancel" value="Cancel" />
    </div>

</form>

<div id="sendingMessage" class="statusMessage"><p>Sending your message. Please wait...</p></div>
<div id="successMessage" class="statusMessage"><p>Thanks for sending your message! We'll get back to you shortly.</p></div>
<div id="failureMessage" class="statusMessage"><p>There was a problem sending your message. Please try again.</p></div>
<div id="incompleteMessage" class="statusMessage"><p>Please complete all the fields in the form before sending.</p></div>






