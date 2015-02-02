<?php
session_start();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>NK COLLEGE</title>

    <link rel="stylesheet" type="text/css" href="/Diploma/cms/style.css" />


    <div id="container">

        <a href="/Diploma/cms/index.php"><img id="logo" src="/Diploma/cms/images/logo.png" alt="NK COLLEGE" /></a>
<!--    </div>-->
</head>

<body>

<div id="adminHeader">
        <h2>NK COLLEGE - Admin</h2>
        <p>You are logged in as <b>
                <?php echo htmlspecialchars( $_SESSION['username']) ?></b>.
            <hr>
            <a href="/Diploma/cms/admin/student/view.php">Edit Students</a>
            <br>
            <a href="/Diploma/cms/admin/course/view.php">Edit Courses</a>
            <br>
            <a href="/Diploma/cms/admin/enrollment/view.php">Edit Enrollments</a>
            <br>
            <a href="/Diploma/cms/admin/user.php">Create Users</a>
            <br>
            <a href="/Diploma/cms/admin/loginForm.php"?>Log Out</a></p>
</div>
