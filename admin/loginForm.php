<?php
/**
 * Created by PhpStorm.
 * Date: 18/09/14
 * Time: 1:47 PM
 */
include "/../include/header.php";

?>


<body>

    <form action="admin.php" method="post" style="width: 50%;">
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

        </ul>

        <div class="buttons">
            <input type="submit" name="login" value="Login" />
        </div>

    </form>


<?php include "/../include/footer.php" ?>