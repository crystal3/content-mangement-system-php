<?php
include "/../config.php";
include "/../include/header.php";


/* Store user details */

newUser();

function newUser() {

    if ( isset( $_POST['saveUser'] ) ) {

        $passwordHash = sha1($_POST['password']);

        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "INSERT INTO user ( userName, password )
     VALUES (:userName,:password)";
        $st = $conn->prepare ( $sql );

        $st->bindValue( ":userName", $_POST['username'], PDO::PARAM_STR );
        $st->bindValue( ":password", $passwordHash, PDO::PARAM_STR );

        $st->execute();
        $conn = null;


    }
}


//define('SALT_LENGTH', 9);
//
//function generateHash($plainText, $salt = null)
//{
//    if ($salt === null)
//    {
//        $salt = substr(md5(uniqid(rand(), true)), 0, SALT_LENGTH);
//    }
//    else
//    {
//        $salt = substr($salt, 0, SALT_LENGTH);
//    }
//
//    return $salt . sha1($salt . $plainText);
//}



/* Check user details */

//$passwordHash = sha1($_POST['password']);
//
//$sql = 'SELECT userName FROM user WHERE userName = ? AND passwordHash = ?';
//$result = $db->query($sql, array($_POST['userName'], $passwordHash));
//if ($result->numRows() < 1)
//{
//    /* Access denied */
//    echo 'Sorry, your username or password was incorrect!';
//}
//else
//{
//    /* Log user in */
//    printf('Welcome back %s!', $_POST['username']);
//}


?>


<form action="user.php" method="post" style="width: 50%;">
        <input type="hidden" name="login" value="true" />

        <?php if ( isset( $results['errorMessage'] ) ) { ?>
    <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>

<ul>

    <li>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="Your admin username" required autofocus maxlength="20" />
    </li>

    <li>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Your admin password" required maxlength="200" />
    </li>

    <li>
        <label for="password">Confirm Password</label>
        <input type="password" name="password" id="password" placeholder="Your admin password" required maxlength="200" />
    </li>

</ul>

<div class="buttons">
    <input type="submit" name="saveUser" value="Save User" />
</div>

</form>

<?php include "/../include/footer.php" ?>